<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;

// ===== Exercise 3: Basic Closures =====
Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello Laravel';
});

// ===== Exercise 4: Constraints =====
Route::get('/products/{id}', function ($id) {
    return 'Product ID: ' . $id;
})->whereNumber('id');

// ===== Exercise 5: Courses Controller =====
// (Assuming you have a CourseController for this)
Route::get('/courses/{courseId}/students', [CourseController::class, 'students']);


// ===== NEW HOMEWORK: Student CRUD =====
// This ONE line handles ALL 7 routes for your homework (index, create, store, edit, update, destroy).
// It replaces all the manual /students routes you wrote.
Route::resource('students', StudentController::class);
