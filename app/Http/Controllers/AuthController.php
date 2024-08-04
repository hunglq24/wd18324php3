<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;
use App\Models\User;
use App\http\Requests\UserLoginRequest;

class AuthController extends Controller
{
    //

    public function login()
    {
        return view('login');
    }


    public function postLogin(UserLoginRequest $req)
    {
        // validate

        // $req->validate([
        //     'email' => 'required|email|exists:users,email',
        //     'password' => 'required|min:8'
        // ], [
        //     'email.required' => 'email không đc để trống',
        //     'email.email' => 'email không đúng định dạng',
        //     'email.exists' => 'email chưa đc đăng ký',
        //     'password.required' => 'password không đc để trống',
        //     'password.min' => 'password quá ngắn'
            

        // ]);


        $dataUserLogin = [
            "email" => $req->email,
            "password" => $req->password,
        ];

        if (Auth::attempt($dataUserLogin)) {
            // Đăng nhập thành công
            if (Auth::user()->role == '1') {
                return redirect()->route('admin.products.listProduct')->with([
                    'message' => 'Đăng nhập thành công'
                ]);
            } else {
                echo "User"; // redirect user
                // return redirect()->route("client.dashboard")->with([
                //     'message' => "Đăng nhập thành công"
                // ]);
            }
        } else {
            // Đăng nhập thất bại
            return redirect()->route("login")->with([
                "message" => "Email hoặc Password không chính xác",
            ]);
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with([
            'message' => 'đăng xuất thành công'
        ]);
    }

    public function register()
    {
        return view('register');
    }

    public function postRegister(Request $req)
    {
        $check = User::where('email', $req->email)->exists();
        if ($check) {
            return redirect()->route('register')->with([
                'message' => 'Email đã tồn tại'
            ]);
        } else {
            $data = [
                'name' => $req->name,
                'email' => $req->email,
                'password' => Hash::make($req->password)
            ];
            $newUser = User::create($data);
            // Auth::login($newUser); // tự động đăng nhập


            //bắt nhập
            return redirect()->route('login')->with([
                'message' => 'đăng ký thành công'
            ]);
        }
    }

}