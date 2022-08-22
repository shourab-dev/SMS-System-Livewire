<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function adminLoginPanel()
    {
        return view('auth.admin.adminLogin');
    }
    public function teacherLoginPanel()
    {
        return view('auth.teacher.teacherLogin');
    }

    // public function username()
    // {
    //     return 'phone';
    // }

    /**==========================
     * *Student Login Methods
     ============================*/
    public function studentLogin(Request $request)
    {
        $request->validate([
            'phone' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::guard('student')->attempt(['phone' => $request->phone, 'password' => $request->password])) {
            return redirect()->route('student.dashboard');
        } else {
            return back()->withErrors(['login' => "Credentials didn't match!"]);
        }
    }
}
