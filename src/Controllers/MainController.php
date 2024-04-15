<?php

namespace TestPackages\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use TestPackages\Models\User;


class MainController extends Controller
{
    public function register(){
        return view('register::register');
    }
    
    public function login(){
        return view('register::login');
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // $request->validate([
        //      'email' => 'required|string|email|max:255|unique:users',
        // ]);

        $user = User::create([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return back()->with('success', 'User created successfully');
       
    }

    function check(Request $request)
    {

        $userInfo = User::where('email', '=', $request->email)->first();
        if (!$userInfo) {
        return redirect()->route('login')->with('fail', 'We do not recognize your email address');

        } else {
            // dd($userInfo);
            //check password
            if (Hash::check($request->password, $userInfo->password)) {
                Auth::login($userInfo, true);
                return redirect()->route('welcome')->with('success', 'welcome...');        

                
            } else {
                return redirect()->back()->with('fail', 'incorrect password');
            }
        }
    }
 public function logout(){
    Auth::logout();
    return redirect()->route('login')->with('success', 'You have been logged out.');
 }
    
}