<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * method to show profile page
     */

    public function show()
    {
        return view('backend.auth.profile');
    }

    /**
     * method to show register page
     */

    public function register()
    {
        return view('backend.auth.register');
    }

    /**
     * method to create new user
     */

    public function store(RegisterRequest $request)
    {
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('login')->with('msg', 'Account has been created!');
    }

    /**
     * method to update old user
     */

    public function update(Request $request)
    {
        //checking password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return redirect()->back()->with('error_msg', 'Password is not correct!');
        }
        
        $user = User::find(auth()->user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : auth()->user()->password,
            'about' => $request->about
        ]);

        return redirect()->back()->with('msg', 'Account has been updated!');
    }

    /**
     * method to show login page
     */
    
    public function login()
    {
        return view('backend.auth.login');
    }

    /**
     * method to check if the login info is correct or not
     */
    
    public function loginCheck(LoginRequest $request)
    {
        if(Auth::attempt($request->only(['email', 'password']), $request->remember ?? false)){
            return redirect('/panel/dashboard');
        } else {
            return redirect()->back()->with('error_msg', 'Username or password is not correct. Please try again!');
        }
    }

    /**
     * method to logout the user
     */
    
    public function logout()
    {
        Auth::logout();
        
        return redirect()->route('login');
    }
}
