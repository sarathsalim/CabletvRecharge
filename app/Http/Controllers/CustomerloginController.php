<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerloginController extends Controller
{
    public function customerlogin()
    {
        return view('Guest.Customerlogin');
    }
    public function customerlogin_process(Request $request)
{
    // Add stricter validation rules
    $request->validate([
        'username' => 'required|string|min:3|max:50|regex:/^[a-zA-Z0-9_.-]*$/',
        'password' => 'required|string|min:8|max:50',
    ]);

    $username = $request->post("username");
    $password = $request->password;

    $checklogin = Customer::where(["username" => $username, "password" => $password])->get();
    if (count($checklogin) == 1) {
        $request->session()->put("username", $username);
        $request->session()->put("customerid", $checklogin[0]["customerid"]);
        return redirect()->route('Customer.customerhome');
    } else {
        return back()->with('failed', $password);
    }
}

}
