<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    // sleep(2); // Wait for 2 seconds
    // return intertia('Home', []); //can also use inertia function
    return Inertia::render('Home', []);  // can also use render function
})->name('home');

// Route::get('/about', function () {
//     return Inertia::render('About', ['user' => 'Mike']);
// });
// shorthand work only when method is get
Route::inertia('/about', 'About', ['user' => 'Mike'])->name('about');
