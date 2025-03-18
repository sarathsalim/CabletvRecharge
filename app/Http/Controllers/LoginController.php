<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;

class LoginController extends Controller
{

    public function AdminLogin()
    {
        return view('Guest.Adminlogin');
    }
    public function adminlogin_process(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string',
        ], [
            'username.required' => 'The username is required.',
            'password.required' => 'The password is required.',
            'password.min' => 'The password must be at least 6 characters long.',
        ]);
        $username = $request->post("username");
        $password = $request->post("password");

        $checklogin = Login::where([
            "username" => $username,
            "password" => $password
        ])->get();

        if (count($checklogin) == 1) {
            $request->session()->put("username", $username);
            $request->session()->put("loginid", $checklogin[0]["loginid"]);
            return redirect()->route('adminhome');
        } else {
            return back()->withErrors(['login_error' => 'Invalid username or password.'])->withInput();
        }
    }
}
