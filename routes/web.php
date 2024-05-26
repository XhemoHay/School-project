<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProblemController;
use App\Http\Controllers\PrayerController;
use App\Http\Controllers\CourseController;
use App\Models\Student;

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

Route::get('/', function () {
    return view('welcome');
});




Route::get('/students', [StudentController::class, 'index'])->middleware('auth');
Route::get('/student/{student}', [StudentController::class, 'show'])->name('student.show')->middleware('auth');


Route::get('/izjava', [ProblemController::class, 'index'])->middleware('auth');
Route::post('/problems', [ProblemController::class, 'store'])->name('problem.store')->middleware('auth');


Route::get('/prayers', [PrayerController::class, 'index'])->name('prayers.index');
Route::post('/prayers', [PrayerController::class, 'store'])->name('prayers.store');

Route::get('/course', [CourseController::class, 'index'])->name('course.index');


Route::get('/login',[UserController::class, 'login'])->name('login');
Route::post('/users/login',[UserController::class, 'authenticate']);
Route::post('/logout',[UserController::class, 'logout'])->name('logout');
