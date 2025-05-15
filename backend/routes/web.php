<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('welcome');
});

//for the guest 
 
    Route::middleware('guest')->group(function () {
        //View homepage
        Route::get('home',[PublicController::class,'showHomePage'])->name('home');

        //login and register
        Route::post('login',[AuthController::class,'login'])->name('login');
        Route::get('login',[AuthController::class,'showLogInForm'])->name('loginForm');
        Route::post('register',[AuthController::class,'register'])->name('register');
        Route::get('register',[AuthController::class,'showRegisterForm'])->name('registerForm');
    });

//for the user (procrastinator)
    
    Route::middleware('auth','role:user')->group(function () {
        //View user dashboard
        Route::get('index',[UserController::class,'showUserDashboard'])->name('showUserDashboard');

        //manage personal tasks
        Route::post('task',[TaskController::class,'createTask'])->name('createTask');
        Route::put('task/{id}',[TaskController::class,'updateTask'])->name('updateTask');
        Route::delete('task/{id}',[TaskController::class,'deleteTask'])->name('deleteTask');

        //join a group
        Route::post('group/{groupId}',[GroupController::class,'joinGroup($groupId)'])->name('joinGroup');

        //notification
        Route::post('sendNotification',[NotificationController::class,'sendNotification'])->name('sendNotification');
        Route::get('recieveNotification',[NotificationController::class,'receiveNotification'])->name('receiveNotification');

        //manage comments
        Route::post('comment',[CommentController::class,'createComment'])->name('createComment');
        Route::put('comment/{id}',[CommentController::class,'updateComment'])->name('updateComment');
        Route::delete('comment/{id}',[CommentController::class,'deleteComment'])->name('deleteComment');

        //view group tasks
        Route::get('task/{id}',[TaskController::class,'showGroupTasks'])->name('showGroupTasks');

        //logout
        Route::post('logout',[AuthController::class,'logout'])->name('logout');

    });

//for the coach
   
    Route::middleware('auth','role:coach')->group(function () {
        //View coach dashboard
        Route::get('coach',[CoachController::class,'showCoachDashboard'])->name('coach');

        //manage group tasks
        Route::post('groupTask',[TaskController::class,'createGroupTask'])->name('createGroupTask');
        Route::put('groupTask/{id}',[TaskController::class,'updateGroupTask'])->name('updateGroupTask');
        Route::delete('groupTask/{id}',[TaskController::class,'deleteGroupTask'])->name('deleteGroupTask');

        //manage groups
        Route::post('group',[GroupController::class,'createGroup'])->name('createGroup');
        Route::put('group/{id}',[GroupController::class,'updateGroup'])->name('updateGroup');
        Route::delete('group/{id}',[GroupController::class,'deleteGroup'])->name('deleteGroup');

        //manage group members
        Route::post('groupMember',[GroupController::class,'addGroupMember'])->name('addGroupMember');
        Route::get('groupMemberStats/{id}',[GroupController::class,'viewGroupMembersStats'])->name('viewGroupMembersStats');

        //manage comments
        Route::post('comment',[CommentController::class,'createComment'])->name('createComment');
        Route::put('comment/{id}',[CommentController::class,'updateComment'])->name('updateComment');
        Route::delete('comment/{id}',[CommentController::class,'deleteComment'])->name('deleteComment');

        //manage reports
        Route::post('report',[ReportController::class,'createReport'])->name('createReport');
        Route::put('report/{id}',[ReportController::class,'updateReport'])->name('updateReport');
        Route::delete('report/{id}',[ReportController::class,'deleteReport'])->name('deleteReport');
        //logout
        Route::post('logout',[AuthController::class,'logout'])->name('logout');
    });

//for the admin

    Route::middleware('auth','role:admin')->group(function () {
        //View
        Route::get('admin',[AdminController::class,'showAdminDashboard'])->name('admin');
        Route::get('viewAllTasks',[AdminController::class,'showAllTasks'])->name('viewAllTasks');
        Route::get('viewAllUsers',[AdminController::class,'showAllUsers'])->name('viewAllUsers');
        Route::get('viewAllGroups',[AdminController::class,'showAllGroups'])->name('viewAllGroups');
        
        //manage users
        Route::post('user',[UserController::class,'createUser'])->name('createUser');
        Route::put('user/{id}',[UserController::class,'banUser'])->name('banUser');
        Route::delete('user/{id}',[UserController::class,'deleteUser'])->name('deleteUser');
        Route::put('user/{id}/unban',[UserController::class,'unbanUser'])->name('unbanUser');
        Route::put('user/{id}/promote',[UserController::class,'promoteToCoach'])->name('promoteToCoach');
        Route::put('user/{id}/demote',[UserController::class,'demoteToUser'])->name('demoteToUser');
        //manage groups
        Route::post('group',[GroupController::class,'createGroup'])->name('createGroup');
        Route::put('group/{id}',[GroupController::class,'updateGroup'])->name('updateGroup');
        Route::delete('group/{id}',[GroupController::class,'deleteGroup'])->name('deleteGroup');

        //manage reports
        Route::post('report',[ReportController::class,'createReport'])->name('createReport');
        Route::put('report/{id}',[ReportController::class,'updateReport'])->name('updateReport');
        Route::delete('report/{id}',[ReportController::class,'deleteReport'])->name('deleteReport');

        //manage comments
        Route::post('comment',[CommentController::class,'createComment'])->name('createComment');
        Route::put('comment/{id}',[CommentController::class,'updateComment'])->name('updateComment');
        Route::delete('comment/{id}',[CommentController::class,'deleteComment'])->name('deleteComment');
        
        //manage tasks
        Route::post('task',[TaskController::class,'createTask'])->name('createTask');
        Route::put('task/{id}',[TaskController::class,'updateTask'])->name('updateTask');
        Route::delete('task/{id}',[TaskController::class,'deleteTask'])->name('deleteTask');
        
        //manage group tasks
        Route::post('groupTask',[TaskController::class,'createGroupTask'])->name('createGroupTask');
        Route::put('groupTask/{id}',[TaskController::class,'updateGroupTask'])->name('updateGroupTask');
        Route::delete('groupTask/{id}',[TaskController::class,'deleteGroupTask'])->name('deleteGroupTask');
        
        //manage group members
        Route::post('groupMember',[GroupController::class,'addGroupMember'])->name('addGroupMember');
        Route::get('groupMemberStats/{id}',[GroupController::class,'viewGroupMembersStats'])->name('viewGroupMembersStats');
        
        //logout
        Route::post('logout',[AuthController::class,'logout'])->name('logout');
    });