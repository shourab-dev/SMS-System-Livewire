<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

/**===================================
 * *ALL Teacher ROUTES FOR SMS SYSTEM
 =====================================*/

//*Teacher Login Panel

Route::GET('/teacher', function () {
    return redirect()->route('teacher.login');
})->middleware('guest');
Route::prefix('/teacher')->name('teacher.')->group(function () {
    Route::GET('/login', [LoginController::class, 'teacherLoginPanel'])->name('login');
});

//*Teacher Login Panel Ends here