<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//for the guest 
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicController;

//View homepage
Route::get('home',[PublicController::class,'showHomePage'])->name('home');

//login and register
Route::post('login',[AuthController::class,'login'])->name('login');
Route::get('login',[AuthController::class,'showLogInForm'])->name('loginForm');
Route::post('register',[AuthController::class,'register'])->name('register');
Route::get('register',[AuthController::class,'showRegisterForm'])->name('registerForm');


//for the user (procrastinator)
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NotificationController;

//View user dashboard
Route::get('index',[UserController::class,'showUserDashboard'])->name('index');

//manage personal tasks
Route::post('task',[TaskController::class,'createTask'])->name('createTask');
Route::put('task/{id}',[TaskController::class,'updateTask'])->name('updateTask');
Route::delete('task/{id}',[TaskController::class,'deleteTask'])->name('deleteTask');

//join a group
Route::post('group',[GroupController::class,'joinGroup($groupId)'])->name('joinGroup');
