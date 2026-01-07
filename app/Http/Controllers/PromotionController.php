<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Mail\NewContactInquiry;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Http;

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
        // Optional: Simple validation
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);

        // --- TELEGRAM CONFIG ---
        $token = "";
        $chatId = "";

        $text = "🔔 *CÓ KHÁCH HÀNG MỚI!*\n\n"
              . "👤 Tên: " . ($request->name ?? 'N/A') . "\n"
              . "📞 SĐT: " . ($request->phone ?? 'N/A') . "\n"
              . "📧 Email: " . ($request->email ?? 'Không có') . "\n"
              . "💬 Lời nhắn: " . ($request->message ?? 'Không có');

        // Send to Telegram
        try {
            Http::post("https://api.telegram.org/bot{$token}/sendMessage", [
                'chat_id' => $chatId,
                'text' => $text,
                'parse_mode' => 'Markdown'
            ]);
        } catch (\Exception $e) {
            // If Telegram fails, just continue so the user doesn't see an error
        }

        return back()->with('success', 'Cảm ơn bạn! Chúng tôi sẽ liên hệ sớm.')
            ->withFragment('tu-van');
    }
}
