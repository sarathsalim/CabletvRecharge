<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminhome()
    {
        $data = Package::withCount('recharges')->get();
        return view('Admin.adminhome', compact('data'));
    }
 public function adminlogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect(to: '/loginadmin'); // Adjust to your login route
    }
}
