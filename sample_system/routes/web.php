<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;
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
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/add/student', [StudentController::class, 'add_student'])->name('add_student');
Route::get('/list/student', [StudentController::class, 'list_student'])->name('list_student');
Route::post('/student/store', [StudentController::class, 'store'])->name('StudentSave');
Route::post('/student/delete', [StudentController::class, 'delete_student'])->name('StudentDelete');
