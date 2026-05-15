<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\DonationController;
use App\Http\Controllers\Admin\QuoteController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\VolunteerController;
use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;

// ========== ADMIN LOGIN ROUTES (No public register) ==========
Route::get('/admin', function () {
    if (auth()->check() && auth()->user()->is_admin) {
        return redirect('/admin/dashboard');
    }
    return view('admin.login');
})->name('admin.login');

Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');

// Hidden admin registration (only accessible if you know the URL)
Route::get('/admin-register', function () {
    return view('auth.admin-register');
})->name('admin.register');

// ========== PUBLIC PAGES ==========
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/projects', [HomeController::class, 'projects'])->name('projects');
Route::get('/projects/{slug}', [HomeController::class, 'singleProject'])->name('projects.show');
Route::get('/research', [HomeController::class, 'research'])->name('research');
Route::get('/media', [HomeController::class, 'media'])->name('media');
Route::get('/events', [HomeController::class, 'events'])->name('events');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [HomeController::class, 'singlePost'])->name('blog.show');
Route::get('/partner', [HomeController::class, 'partner'])->name('partner');
Route::get('/join', [HomeController::class, 'join'])->name('join');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'submitContact'])->name('contact.submit');
Route::post('/subscribe', [HomeController::class, 'subscribe'])->name('subscribe');
Route::post('/join/submit', [HomeController::class, 'submitJoin'])->name('join.submit');
Route::post('/partner/submit', [HomeController::class, 'submitPartner'])->name('partner.submit');
Route::get('/donate', [HomeController::class, 'donate'])->name('donate');
Route::post('/donate/submit', [HomeController::class, 'submitDonation'])->name('donate.submit');
Route::get('/team', [HomeController::class, 'team'])->name('team');

// ========== ADMIN ROUTES (Protected - requires login) ==========
Route::middleware(['auth'])->prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    // Blog Posts Management
    Route::resource('posts', PostController::class);
    
    // Projects Management
    Route::resource('projects', ProjectController::class);
    
    // Events Management
    Route::resource('events', EventController::class);
    
    // Partners Management
    Route::resource('partners', PartnerController::class);
    
    // Contacts Management
    Route::get('/contacts', [ContactController::class, 'index'])->name('admin.contacts');
    Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('admin.contacts.show');
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('admin.contacts.destroy');
    
    // Subscribers Management
    Route::get('/subscribers', [SubscriberController::class, 'index'])->name('admin.subscribers');
    Route::delete('/subscribers/{subscriber}', [SubscriberController::class, 'destroy'])->name('admin.subscribers.destroy');
    Route::get('/subscribers/export', [SubscriberController::class, 'export'])->name('admin.subscribers.export');
    
    // Donations Management
    Route::get('/donations', [DonationController::class, 'index'])->name('admin.donations');
    Route::get('/donations/{donation}', [DonationController::class, 'show'])->name('admin.donations.show');
    Route::delete('/donations/{donation}', [DonationController::class, 'destroy'])->name('admin.donations.destroy');
    
    // Quotes Management
    Route::get('/quotes', [QuoteController::class, 'index'])->name('admin.quotes');
    Route::get('/quotes/create', [QuoteController::class, 'create'])->name('admin.quotes.create');
    Route::post('/quotes', [QuoteController::class, 'store'])->name('admin.quotes.store');
    Route::get('/quotes/{quote}/edit', [QuoteController::class, 'edit'])->name('admin.quotes.edit');
    Route::put('/quotes/{quote}', [QuoteController::class, 'update'])->name('admin.quotes.update');
    Route::delete('/quotes/{quote}', [QuoteController::class, 'destroy'])->name('admin.quotes.destroy');
    
    // Team Members Management
    Route::get('/team', [TeamMemberController::class, 'index'])->name('admin.team');
    Route::get('/team/create', [TeamMemberController::class, 'create'])->name('admin.team.create');
    Route::post('/team', [TeamMemberController::class, 'store'])->name('admin.team.store');
    Route::get('/team/{teamMember}/edit', [TeamMemberController::class, 'edit'])->name('admin.team.edit');
    Route::put('/team/{teamMember}', [TeamMemberController::class, 'update'])->name('admin.team.update');
    Route::delete('/team/{teamMember}', [TeamMemberController::class, 'destroy'])->name('admin.team.destroy');
    
    // Admin Users Management
    Route::get('/users', [App\Http\Controllers\Admin\AdminUserController::class, 'index'])->name('admin.users');
    Route::put('/users/{user}/make-admin', [App\Http\Controllers\Admin\AdminUserController::class, 'makeAdmin'])->name('admin.users.make');
    Route::put('/users/{user}/remove-admin', [App\Http\Controllers\Admin\AdminUserController::class, 'removeAdmin'])->name('admin.users.remove');

        // Partnership Requests Management
    Route::get('/partnerships', [App\Http\Controllers\Admin\PartnershipController::class, 'index'])->name('admin.partnerships');
    Route::get('/partnerships/{partnership}', [App\Http\Controllers\Admin\PartnershipController::class, 'show'])->name('admin.partnerships.show');
    Route::put('/partnerships/{partnership}', [App\Http\Controllers\Admin\PartnershipController::class, 'update'])->name('admin.partnerships.update');
    Route::delete('/partnerships/{partnership}', [App\Http\Controllers\Admin\PartnershipController::class, 'destroy'])->name('admin.partnerships.destroy');

    });

// ========== VOLUNTEERS MANAGEMENT (Protected) ==========
Route::middleware(['auth'])->group(function () {
    Route::get('/volunteers', [VolunteerController::class, 'index'])->name('admin.volunteers');
    Route::get('/volunteers/{volunteer}', [VolunteerController::class, 'show'])->name('admin.volunteers.show');
    Route::delete('/volunteers/{volunteer}', [VolunteerController::class, 'destroy'])->name('admin.volunteers.destroy');
});

Route::delete('/users/{user}', [App\Http\Controllers\Admin\AdminUserController::class, 'destroy'])->name('admin.users.destroy');

// ========== JETSTREAM DASHBOARD (Redirect to homepage) ==========
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect('/');
})->name('dashboard');