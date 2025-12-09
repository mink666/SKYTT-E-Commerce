<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Mail\NewContactInquiry;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class PromotionController extends Controller
{
    /**
     * Display the main promotions page.
     */
    public function index(Request $request)
    {
        $query = News::query()->where('type', 'promotion');

        // --- Handle Search---
        if ($request->filled('search')) {
            $searchTerm = strip_tags($request->input('search'));
            $query->where('title', 'LIKE', '%' . $searchTerm . '%');
        }

        // --- Handle Filtering---
        if ($request->filled('category') && $request->input('category') != 'ALL') {
            $category = strip_tags($request->input('category'));
            $query->where('title', 'LIKE', '%' . $category . '%');
        }

        $promotions = $query->latest()->paginate(9);

        return view('promotions.index', [
            'promotions' => $promotions,
        ]);
    }

    public function submitContact(Request $request)
    {
        // 1. Rate Limiting - Prevent spam (3 attempts per 5 minutes per IP)
        $rateLimitKey = 'contact:' . $request->ip();

        if (RateLimiter::tooManyAttempts($rateLimitKey, 3)) {
            $seconds = RateLimiter::availableIn($rateLimitKey);
            $minutes = ceil($seconds / 60);

            throw ValidationException::withMessages([
                'rate_limit' => "Bạn đã gửi quá nhiều yêu cầu. Vui lòng đợi {$minutes} phút trước khi thử lại."
            ]);
        }

        // 2. Honeypot check (bot protection)
        if ($request->filled('website_url_check')) {
            // Silently fail for bots
            RateLimiter::hit($rateLimitKey, 300);
            return back()->with('success', 'Cảm ơn bạn đã liên hệ!');
        }

        // 3. Validate the incoming data
        $validated = $request->validate([
            'name'  => 'required|string|max:255|min:2',
            'email' => 'required|email:rfc,dns|max:255', // Enhanced email validation
            'phone' => ['required', 'regex:/^[0-9\s\-\+\(\)]{8,15}$/', 'min:8', 'max:15'],
        ], [
            // Custom error messages in Vietnamese
            'name.required' => 'Vui lòng nhập họ và tên.',
            'name.min' => 'Họ và tên phải có ít nhất 2 ký tự.',
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'phone.regex' => 'Số điện thoại không hợp lệ.',
        ]);

        // 4. Sanitize input data
        $validated['name'] = strip_tags(trim($validated['name']));
        $validated['email'] = strtolower(trim($validated['email']));
        $validated['phone'] = preg_replace('/[^0-9\s\-\+\(\)]/', '', $validated['phone']);

        // 5. Check if email is from a disposable email service (optional)
        if ($this->isDisposableEmail($validated['email'])) {
            return back()->withErrors([
                'email' => 'Vui lòng sử dụng địa chỉ email hợp lệ.'
            ])->withInput();
        }

        // 6. Send email with error handling
        try {
            Log::info('Contact form submission', [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            // Get recipient from config or env
            $recipient = config('mail.contact_recipient', 'minhputin2003@gmail.com');

            // Use queue for better performance (make sure queue is configured)
            Mail::to($recipient)->send(new NewContactInquiry($validated));

            // Hit rate limiter only on success
            RateLimiter::hit($rateLimitKey, 300); // 5 minutes cooldown

            Log::info('Contact email sent successfully', ['email' => $validated['email']]);

            return back()->with('success', 'Cảm ơn đã liên hệ! Chúng tôi sẽ phản hồi sớm.');

        } catch (\Exception $e) {
            Log::error('Contact form mail sending failed', [
                'error' => $e->getMessage(),
                'data' => $validated,
                'ip' => $request->ip(),
            ]);

            return back()->withErrors([
                'system' => 'Có lỗi xảy ra khi gửi thông tin. Vui lòng thử lại sau hoặc liên hệ trực tiếp qua hotline.'
            ])->withInput();
        }
    }

    /**
     * Check if email is from a disposable email service
     *
     * @param string $email
     * @return bool
     */
    private function isDisposableEmail(string $email): bool
    {
        // List of common disposable email domains
        $disposableDomains = [
            'tempmail.com',
            '10minutemail.com',
            'guerrillamail.com',
            'mailinator.com',
            'throwaway.email',
            'temp-mail.org',
            // Add more as needed
        ];

        $domain = substr(strrchr($email, "@"), 1);

        return in_array(strtolower($domain), $disposableDomains);
    }
}
