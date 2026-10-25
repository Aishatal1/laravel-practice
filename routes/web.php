<?php

/*use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// ===== Exercise 3: Basic Routes =====

Route::get('/hello', function () {
    return 'Hello Laravel';
});

Route::get('/students', function () {
    return 'All Students';
});

Route::get('/students/{id}', function ($id) {
    return 'Student ID: ' . $id;
});

Route::get('/courses/{courseId}/students', function ($courseId) {
    return 'Course ID: ' . $courseId;
});

Route::post('/students', function () {
    return 'Student Created';
});

Route::put('/students/{id}', function ($id) {
    return 'Student Updated: ' . $id;
});

Route::delete('/students/{id}', function ($id) {
    return 'Student Deleted: ' . $id;
});

// ===== Exercise 4: Route Constraints =====

Route::get('/products/{id}', function ($id) {
    return 'Product ID: ' . $id;
})->whereNumber('id');

Route::get('/students/{id}/edit', function ($id) {
    return 'Edit Student ID: ' . $id;
});*/


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;

Route::get('/', function () {
    return view('welcome');
});

// ===== Exercise 3: Still needed as closures =====
Route::get('/hello', function () {
    return 'Hello Laravel';
});

// ===== Exercise 4: Product constraint =====
Route::get('/products/{id}', function ($id) {
    return 'Product ID: ' . $id;
})->whereNumber('id');

Route::get('/students/{id}/edit', function ($id) {
    return 'Edit Student ID: ' . $id;
});

// ===== Exercise 5: Controller-based routes =====
Route::get('/students', [StudentController::class, 'index']);
Route::get('/students/{id}', [StudentController::class, 'show']);
Route::post('/students', [StudentController::class, 'store']);
Route::put('/students/{id}', [StudentController::class, 'update']);
Route::delete('/students/{id}', [StudentController::class, 'destroy']);

Route::get('/courses/{courseId}/students', [CourseController::class, 'students']);