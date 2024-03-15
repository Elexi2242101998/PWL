<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'teacher'],function(){
    Route::get('/',[TeacherController::class,'list']);
    //Route::get('/{id}',[TeacherController::class,'detail']);
    Route::get('/add',[TeacherController::class,'add']);
    Route::get('/edit/{id}',[TeacherController::class,'edit']);

    Route::post('/update',[TeacherController::class,'update']);
    Route::post('/insert',[TeacherController::class,'insert']);
    Route::post('/delete',[TeacherController::class,'delete']);
});

Route::group(['prefix' => 'student'], function () {
    Route::get('/', [StudentController::class, 'list']);
    //Route::get('/{id}', [StudentController::class, 'detail']);
    Route::get('/add', [StudentController::class, 'add']);
    Route::get('/edit/{id}', [StudentController::class, 'edit']); // Tambahkan '/'

    Route::post('/update', [StudentController::class, 'update']);
    Route::post('/insert', [StudentController::class, 'insert']);
    Route::post('/delete', [StudentController::class, 'delete']);
});














//Route::get('/latihan1/pwl', function () {
    //echo "Hello World";
//});

//Route::get('/read/{judul}', [TestController::class, 'read']);

//Route::get('/test', [TestController::class, 'index']);

//Route::get('/teacher', [TestController::class, 'teacher']);

//Route::get('/student', [TestController::class, 'student']);
