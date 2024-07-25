<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;

class PasswordController extends Controller
{
    public function showForgetPasswordForm()
    {
        return view('clients.forgot-password');
    }

    public function submitForgetPasswordForm(Request $request)
    {
        // dd($request->email);
        $user = User::where('email', $request->email)->first(); // Thêm ->first() để lấy ra một đối tượng user
        // Tạo token ngẫu nhiên
        $token = Str::random(60);
        if ($user) {
            $user->Token = $token;
            $user->save();
            Mail::send('emails.check_email_forget', compact('user','token'), function ($email) use ($user) {
                $email->subject('MyShoping - Lấy lại mật khẩu tài khoản');
                $email->to($user->Email, $user->FullName);
            });
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }


    public function showResetPasswordForm($id,$token)
    {
        $user = User::where('Id_User', $id)->first(); // Thêm ->first() để lấy ra một đối tượng user
        if ($user->Token == $token) {
            # code...
            return view('clients.reset-password', compact('user','token'));
        }else{
            return view('erorr_404');
        }
    }

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ], [
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'password.confirmed' => 'Mật khẩu không khớp với xác nhận mật khẩu.',
        ]);
        
        // $token = $request->token;

        $user = User::where('Id_User', $request->id)->first(); // Thêm ->first() để lấy ra một đối tượng user
        $password_confirmation = $request->password_confirmation;
        $password = $request->password;
        $token = Str::random(60);
        if ($password_confirmation == $password) {
            $pass_hash = Hash::make($password);
            $user->Password = $pass_hash;
            $user->Token = $token;
            $user->updated_at = now();
            $user->save();
        }
        return redirect()->route('home');

    }
}
