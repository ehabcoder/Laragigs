<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// get all listings
Route::get('/', [ListingController::class, 'index']);

// Show create form
Route::get('/listings/create', [ListingController::class, 'create'])
->middleware('auth');

// Store Listing Data
Route::post('/listings', [ListingController::class, 'store'])
->middleware('auth');

// Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])
->middleware('auth');

// Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])
->middleware('auth');

// Manage Listings
Route::delete('/listings/{id}', [ListingController::class, 'destroy'])
->middleware('auth');

Route::get('/listings/manage', [ListingController::class, 'manage'])
->middleware('auth');;

// get single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show Register Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');;

// Create new user
Route::post('/users', [UserController::class, 'store']);

// Log user out
Route::post('/logout', [UserController::class, 'logout'])
->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')
->middleware('guest');;

// Login User
Route::post('users/authenticate', [UserController::class, 'authenticate']);
