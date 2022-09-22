<?php

use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\RolePermissionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

/**
 ** ALL ADMIN ROUTES FOR SMS SYSTEM
 */

//*Admin Login Panel
Route::GET('/admin', function () {
    return redirect()->route('admin.login');
})->middleware('guest');
Route::GET('/admin/login', [LoginController::class, 'adminLoginPanel'])->name('admin.login');

// *====================================


Route::middleware('auth')->prefix('/admin')->name('admin.')->group(function () {
    //*Admin Logout
    Route::post('/logout', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('logout');


    //*DASHBAORD
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //*USER INFO
    Route::view('/my-info', 'admin.personalInfo')->name('my.info');


    //*Role & Permission
    Route::middleware('role_or_permission:super-admin|role permission')->group(function () {

        Route::get('/role-permission', [RolePermissionController::class, 'render'])->name('role.permission');
        Route::get('/role-permission/edit/{id}', [RolePermissionController::class, 'edit'])->name('role.permission.edit');
        Route::PUT('/role-permission/update/{id}', [RolePermissionController::class, 'update'])->name('role.permission.update');
    });


    //*BRANCH MANAGEMENT
    Route::middleware('role_or_permission:super-admin|branch manage')->prefix('/branch')->name('branch.')->group(function () {
        Route::get('/all', [BranchController::class, 'index'])->name('index');
    });
});
