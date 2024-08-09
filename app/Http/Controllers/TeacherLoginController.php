<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherLoginController extends Controller
{
    public function TeacherIndex()
    {
        return view('auth.TeacherLogin');
    }

    public function TeacherAuthenticate(Request $request)
    {
        $credentials = $request->only('teacher_number', 'teacher_password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::HOME);
        }

        return back()->withErrors([
            'message' => '教員番号またはパスワードが正しくありません。',
        ]);
    }

    /*
    コントローラーのログアウト処理
    */
    public function TeacherLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(RouteServiceProvider::HOME);
    }
}