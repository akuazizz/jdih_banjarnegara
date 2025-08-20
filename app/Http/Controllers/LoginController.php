<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Session;
use Hash;
use App\Helpers\Helper;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;


class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login_proses(Request $request)
    {
        $response = [
            'status' => 'failed', 'errors' => 'login', 'msg' => 'Gagal Login. Cek kembali data anda', 'item' => '1'
        ];
    
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
            'captcha' => 'captcha|required'
        ])->stopOnFirstFailure(true);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'errors' => $validator->errors()->all(),
                'msg' => 'Gagal Login. Cek kembali data anda',
                'item' => '2'
            ]);
        }
    
        // Throttle key (e.g. based on email and IP)
        $throttleKey = Str::lower($request->email) . '|' . $request->ip();
    
        // Check if user is locked out
        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            return response()->json([
                'status' => 'failed',
                'errors' => 'login',
                'msg' => 'Terlalu banyak percobaan login. Silakan coba lagi dalam ' . ceil($seconds / 60) . ' menit.',
                'item' => '4'
            ]);
        }
    
        // Credentials
        $credentials = ['email' => $request->email, 'password' => $request->password];
    
        if (Auth::attempt($credentials)) {
            // Clear attempts on success
            RateLimiter::clear($throttleKey);
    
            $sess = Helper::checkAuth(auth()->user()->id);
            Session::put('id', @$sess[0]->id_users);
            Session::put('email', @$sess[0]->email);
            Session::put('name', @$sess[0]->name);
            Session::put('role', @$sess[0]->roles_name);
    
            $response = [
                'status' => 'success',
                'errors' => '',
                'msg' => 'Login Sukses, Selamat datang di admin JDIH Kabupaten Banjarnegara',
                'item' => '0'
            ];
        } else {
            // Increment attempt count
            RateLimiter::hit($throttleKey, 300); // lockout for 5 minutes
    
            $attemptsLeft = 5 - RateLimiter::attempts($throttleKey);
    
            $response = [
                'status' => 'failed',
                'errors' => 'login',
                'msg' => 'Username atau password salah. Sisa percobaan: ' . $attemptsLeft,
                'item' => '3'
            ];
        }
    
        return response()->json($response);
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function refreshCaptcha()
    {
        return response()->json(['captcha' => captcha_img('mini')]);
    }
}
