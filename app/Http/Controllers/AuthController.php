<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function getLoginPage() {
        return view('login');
    }

    public function handleLogin(Request $request) {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('HomePage');
        }
        return redirect()->back();
    }

    public function handleLogout() {
        Auth::logout();
        return redirect()->route('LoginPage');
    }

    public function getRegisterPage() {
        return view('register');
    }

    public function handleRegister(Request $request) {

        if($request->password != $request->confirm_password) {
            return redirect()->back()->withErrors('Passwords do not match')->withInput();
        }

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email|ends_with:.com|not_regex:/^\.com/',
            'password' => 'required|min:5|max:20',
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create([
            'id' => Str::uuid()->toString(),
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'Customer',
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'image' => 'default_pfp.png',
        ]);

        return redirect()->route('LoginPage');
    }
}
