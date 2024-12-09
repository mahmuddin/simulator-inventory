<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
// use Inertia\Inertia;

// Route::get('/', function () {
//     // sleep(2); // Wait for 2 seconds
//     // return intertia('Home', []); //can also use inertia function
//     return Inertia::render('Home', []);  // can also use render function
// })->name('home');

// Route::get('/about', function () {
//     return Inertia::render('About', ['user' => 'Mike']);
// });
//// shorthand work only when method is get
// Route::inertia('/about', 'About', ['user' => 'Mike'])->name('about');

Route::inertia('/', 'Home',)->name('home');

Route::inertia('/register', 'Auth/Register',)->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::inertia('/login', 'Auth/Login',)->name('login');
Route::post('/login', [AuthController::class, 'login']);
