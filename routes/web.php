<?php

use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\IposterController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\SolutionController;
use App\Http\Controllers\Admin\InquiryController as AdminInquiryController;
use App\Http\Controllers\CareerViewController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\IposterViewController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\NewsViewController;
use App\Http\Controllers\ProjectViewController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SolutionViewController;
use App\Models\News;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    $newsArticles = News::where('is_active', true)
        ->orderByDesc('published_date')
        ->orderByDesc('id')
        ->take(3)
        ->get();

    return view('welcome', compact('newsArticles'));
})->name('home');

Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/api/search/live', [SearchController::class, 'live'])->name('search.live');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/privacy-policy', function () {
    return view('pages.privacy-policy');
})->name('privacy.policy');

Route::get('/terms-of-service', function () {
    return view('pages.terms-of-service');
})->name('terms.service');

// Reference Projects Routes
Route::get('/philips-projects', [ProjectViewController::class, 'philips'])->name('projects.philips');
Route::get('/led-projects', [ProjectViewController::class, 'led'])->name('projects.led');
Route::get('/digital-display-kiosk-installations-projects', [ProjectViewController::class, 'kiosk'])->name('projects.kiosk');

Route::get('/news', [NewsViewController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [NewsViewController::class, 'show'])->name('news.show');
Route::get('/careers', [CareerViewController::class, 'index'])->name('careers.index');
Route::get('/careers/{slug}', [CareerViewController::class, 'show'])->name('careers.show');
Route::post('/careers/apply', [JobApplicationController::class, 'store'])->name('careers.apply');
Route::post('/inquiries/submit', [InquiryController::class, 'store'])->name('inquiries.submit');
Route::post('/api/chat/message', [ChatController::class, 'handleMessage'])->name('chat.message');
Route::get('/api/chat/suggestions', [ChatController::class, 'getSuggestions'])->name('chat.suggestions');

Route::get('/services/led-display-systems', [SolutionViewController::class, 'index'])->name('services.led-displays');
Route::get('/services/led-display-systems/{slug}', [SolutionViewController::class, 'show'])->name('services.led-displays.show');

Route::get('/services/digital-iposter-ad-placement', [IposterViewController::class, 'index'])->name('services.iposters.index');
Route::get('/services/digital-iposter-ad-placement/{slug}', [IposterViewController::class, 'show'])->name('services.iposters.show');
Route::get('/digital-display-iposters', function () {
    return redirect()->route('services.iposters.index');
});

Route::get('/services/digital-design-consultancy', function () {
    return view('services.digital-design-consultancy');
})->name('services.digital-design-consultancy');
Route::get('/digital-design-consultancy', function () {
    return redirect()->route('services.digital-design-consultancy');
});

// Solutions Category Routes
Route::get('/solutions/electronics-led-display', [\App\Http\Controllers\SolutionCategoryController::class, 'electronicsLed'])->name('solutions.electronics-led');
Route::get('/solutions/philips-commercial-display', [\App\Http\Controllers\SolutionCategoryController::class, 'philips'])->name('solutions.philips');
Route::get('/solutions/aver-camera-video-conferencing', [\App\Http\Controllers\SolutionCategoryController::class, 'aver'])->name('solutions.aver');
Route::get('/solutions/digital-signage-solution', [\App\Http\Controllers\SolutionCategoryController::class, 'digitalSignage'])->name('solutions.digital-signage');
Route::get('/solutions/video-matrix-solution', [\App\Http\Controllers\SolutionCategoryController::class, 'videoMatrix'])->name('solutions.video-matrix');
Route::get('/solutions/brackets', [\App\Http\Controllers\SolutionCategoryController::class, 'brackets'])->name('solutions.brackets');

// Solutions Legacy URL redirects
Route::get('/solutions-electronics-led-display', function () {
    return redirect()->route('solutions.electronics-led');
});
Route::get('/solutions-PHILIPS-COMMERCIAL-DISPLAY', function () {
    return redirect()->route('solutions.philips');
});
Route::get('/solutions-aver-camera-video-conference', function () {
    return redirect()->route('solutions.aver');
});
Route::get('/solutions-digital-signage-solution', function () {
    return redirect()->route('solutions.digital-signage');
});
Route::get('/solutions-video-matrix-solution', function () {
    return redirect()->route('solutions.video-matrix');
});
Route::get('/solutions-brackets', function () {
    return redirect()->route('solutions.brackets');
});

Route::get('/solutions', [SolutionViewController::class, 'index'])->name('solutions.index');
Route::get('/solutions/{slug}', [SolutionViewController::class, 'show'])->name('solutions.show');

// Admin Authentication Routes
Route::get('/login', fn () => redirect()->route('admin.login'))->name('login');
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::match(['get', 'post'], '/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Protected Admin CMS Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        if (request()->user()) {
            if (request()->user()->role === 'sales') {
                return redirect()->route('admin.inquiries.index');
            }
            if (request()->user()->role === 'hr') {
                return redirect()->route('admin.careers.index');
            }
        }
        return redirect()->route('admin.news.index');
    })->name('dashboard');

    // Careers & Job Applications (Accessible by Admin and HR)
    Route::middleware(['role:hr'])->group(function () {
        Route::resource('careers', CareerController::class);
        Route::patch('careers/{career}/toggle-status', [CareerController::class, 'toggleStatus'])->name('careers.toggle');
        Route::get('applications', [ApplicationController::class, 'index'])->name('applications.index');
        Route::patch('applications/{application}/status', [ApplicationController::class, 'updateStatus'])->name('applications.status');
        Route::delete('applications/{application}', [ApplicationController::class, 'destroy'])->name('applications.destroy');
    });

    // Client Inquiries & Quote Requests (Accessible by Admin and Sales)
    Route::middleware(['role:sales'])->group(function () {
        Route::get('inquiries', [AdminInquiryController::class, 'index'])->name('inquiries.index');
        Route::patch('inquiries/{inquiry}/status', [AdminInquiryController::class, 'updateStatus'])->name('inquiries.status');
        Route::patch('inquiries/{inquiry}/notes', [AdminInquiryController::class, 'updateNotes'])->name('inquiries.notes');
        Route::delete('inquiries/{inquiry}', [AdminInquiryController::class, 'destroy'])->name('inquiries.destroy');
    });

    // Admin-Only Modules (News, Solutions, iPosters, Backups, Users)
    Route::middleware(['role.admin'])->group(function () {
        Route::resource('news', NewsController::class);
        Route::patch('news/{news}/toggle-status', [NewsController::class, 'toggleStatus'])->name('news.toggle');

        Route::resource('solutions', SolutionController::class);
        Route::patch('solutions/{solution}/toggle-status', [SolutionController::class, 'toggleStatus'])->name('solutions.toggle');

        Route::resource('iposters', IposterController::class);
        Route::patch('iposters/{iposter}/toggle-status', [IposterController::class, 'toggleStatus'])->name('iposters.toggle');

        // Backup, Export & Import CMS Data
        Route::get('backup', [\App\Http\Controllers\Admin\BackupController::class, 'index'])->name('backup.index');
        Route::get('backup/export/json', [\App\Http\Controllers\Admin\BackupController::class, 'exportJson'])->name('backup.export.json');
        Route::get('backup/export/sql', [\App\Http\Controllers\Admin\BackupController::class, 'exportSql'])->name('backup.export.sql');
        Route::get('backup/download/sqlite', [\App\Http\Controllers\Admin\BackupController::class, 'downloadSqlite'])->name('backup.download.sqlite');
        Route::get('backup/export/media-zip', [\App\Http\Controllers\Admin\BackupController::class, 'exportMediaZip'])->name('backup.export.media-zip');
        Route::get('backup/file/{filename}', [\App\Http\Controllers\Admin\BackupController::class, 'downloadFile'])->name('backup.download.file');
        Route::delete('backup/file/{filename}', [\App\Http\Controllers\Admin\BackupController::class, 'deleteFile'])->name('backup.delete.file');
        Route::post('backup/open-folder', [\App\Http\Controllers\Admin\BackupController::class, 'openFolder'])->name('backup.open.folder');
        Route::post('backup/import/json', [\App\Http\Controllers\Admin\BackupController::class, 'importJson'])->name('backup.import.json');

        // User Account & Password Management
        Route::get('users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
        Route::patch('users/{user}/password', [\App\Http\Controllers\Admin\UserController::class, 'updatePassword'])->name('users.password');
    });
});
