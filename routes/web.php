<?php

use App\Http\Controllers\ResultTableDataController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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
    return view('home');
})->name('home');


Route::get('/login', function () {
    return view('Auth.login');
})->name('login');

Route::get('/register', function () {
    return view('Auth.register');
})->name('register');


Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // Teachers Routes
    Route::middleware('role:1')->group(function () {
        Route::get('/table', [ResultTableDataController::class, 'ResultTable'])->name('student_table');
        Route::get('/tableajax', [ResultTableDataController::class, 'ajaxTable'])->name('student_table.ajax');
        Route::get('/addStudentResult', [ResultTableDataController::class, 'addStudentResultView'])->name('add.studentResult.view');
        Route::post('/addStudentResult', [ResultTableDataController::class, 'addStudentResult'])->name('add.studentResult');
        Route::get('/editStudent/{id}', [ResultTableDataController::class, 'editStudentResultView'])->name('edit.studentResult.view');
        Route::post('/editStudent/{id}', [ResultTableDataController::class, 'updateStudentResult'])->name('update.studentResult');
        Route::get('/deleteStudent/{id}', [ResultTableDataController::class, 'deleteStudentRecord'])->name('delete.student');
    });

    // Student Routes
    Route::middleware('role:0')->group(function () {
        Route::get('/studentProfile/{email}',[ResultTableDataController::class, 'showStudentProfile'] )->name('studentProfile');
    });
});












Route::get('/download/{id}', function () {
    return "test";
})->name('test.download');

// Route::get('/', function () {
//     return view('welcome');
// });
