<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstructorController;
use App\Models\About;
use App\Models\Home;
use App\Models\Instructor;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $homes = Home::orderBy('id', 'DESC')->limit(2)->get();
    return view('compro.index', ['active' => 'home'], compact('homes'));
})->name('home.index');

Route::get('/about', function () {
    $about = About::orderBy('id', 'DESC')->first();
    $instructors = Instructor::orderBy('id', 'DESC')->limit(4)->get();
    return view('compro.about', ['active' => 'about'], compact('about', 'instructors'));
})->name('about.index');

Route::get('/courses', function () {
    return view('compro.courses', ['active' => 'courses']);
})->name('courses.index');

Route::get('/testimonial', function () {
    return view('compro.testimonial', ['active' => 'testimonial']);
})->name('testimonial.index');

Route::get('/team', function () {
    return view('compro.team', ['active' => 'team']);
})->name('team.index');

Route::get('/contact', function () {
    return view('compro.contact', ['active' => 'contact']);
})->name('contact.index');

Route::get('login', function () {
    return view('admin.login');
})->name('login.index');

Route::get('dashboard', function () {
    return view('admin.app');
});

Route::get('homeadmin', [HomeController::class, 'index'])->name('homeadmin.index');
Route::get('homeadmin/create', [HomeController::class, 'create'])->name('homeadmin.create');
Route::post('homeadmin/store', [HomeController::class, 'store'])->name('homeadmin.store');
Route::get('homeadmin/edit/{id}', [HomeController::class, 'edit'])->name('homeadmin.edit');
Route::put('homeadmin/update/{id}', [HomeController::class, 'update'])->name('homeadmin.update');
Route::delete('homeadmin/destroy/{id}', [HomeController::class, 'destroy'])->name('homeadmin.destroy');

Route::resource('aboutadmin', AboutController::class);
Route::resource('instructoradmin', InstructorController::class);

// Contact Start:
Route::post('contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('contactadmin/index', [ContactController::class, 'index'])->name('contactadmin.index');
Route::post('contactadmin/reply/{id}', [ContactController::class, 'reply'])->name('contactadmin.reply');
// Contact End

// Login with google:
Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle'])->name('google-auth');

// logout
Route::get('logout', [GoogleAuthController::class, 'logout'])->name('logout');