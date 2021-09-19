<?php

use App\Http\Livewire\Admincats;
use App\Http\Livewire\Students;
 
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/students',Students::class);

//USER Area






//ADMIN Area

Route::get('/admin/cats',Admincats::class);
