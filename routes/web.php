<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\BikeController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/service', [PageController::class, 'service'])->name('service');


Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{bike}', [ProductController::class, 'show'])->name('products.show');

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

Route::get('/promotions', [PromotionController::class, 'index'])->name('promotions.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

Route::post('/contact-submit', [PromotionController::class, 'submitContact'])
    ->middleware('throttle:3,1')
    ->name('contact.submit');

Route::get('/test-email', function () {
    try {
        Mail::raw('Test email from Laravel', function ($message) {
            $message->to('minhputin2003@gmail.com')
                    ->subject('Test Email');
        });

        return 'Email sent successfully!';
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});
Route::get('/test-mail-config', function () {
    return [
        'mailer' => config('mail.mailer'),
        'host' => config('mail.mailers.smtp.host'),
        'port' => config('mail.mailers.smtp.port'),
        'username' => config('mail.mailers.smtp.username'),
        'password_set' => !empty(config('mail.mailers.smtp.password')),
        'password_length' => strlen(config('mail.mailers.smtp.password')),
        'encryption' => config('mail.mailers.smtp.encryption'),
        'from_address' => config('mail.from.address'),
    ];
});
Route::get('/test-env', function () {
    return [
        'env_mail_mailer' => env('MAIL_MAILER'),
        'env_mail_encryption' => env('MAIL_ENCRYPTION'),
        'env_mail_port' => env('MAIL_PORT'),
        'config_mail_mailer' => config('mail.default'),
        'config_mail_encryption' => config('mail.mailers.smtp.encryption'),
    ];
});
