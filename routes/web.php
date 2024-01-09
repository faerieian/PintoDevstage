<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Counter;
use App\Livewire\CreateUser;
use App\Livewire\UserAddress;
use App\Livewire\Dashboard;
use App\Livewire\UserDetails;
use App\Livewire\EditUser;
use App\Livewire\Ingredients;
use App\Livewire\CreateNutrients;
use App\Livewire\IngredientsDetails;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/userdetails', UserDetails::class)->name('userdetails');
Route::get('/recipes', Counter::class)->name('recipes'); //recipes
Route::get('/user', CreateUser::class)->name('user');
Route::get('/dashboard', Dashboard::class)->name('dashboard');
// menu ingrediants
Route::get('/nutrients', CreateNutrients::class)->name('nutrients');
Route::get('/ingredients', Ingredients::class)->name('ingredients');
Route::get('/ingredientsdetails', IngredientsDetails::class)->name('ingredientsdetails');




Route::get('/user/edituser/{user}', EditUser::class)->name('user.edituser');