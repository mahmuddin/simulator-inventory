<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Request;

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

Route::get('/', function (Request $request) {
    return inertia('Home', [
        'users' => User::when($request->search, function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
        })->paginate(5)->withQueryString(),

        'searchTerm' => $request->search
    ]);
})->name('home');

Route::middleware('auth')->group(function () {
    Route::inertia('/dashboard', 'Dashboard',)->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::inertia('/register', 'Auth/Register',)->name('register');
    Route::post('/register', [AuthController::class, 'register']);


    Route::inertia('/login', 'Auth/Login',)->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});
