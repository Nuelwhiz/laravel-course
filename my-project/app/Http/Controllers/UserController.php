<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create(){
        return view('users.register');
    }

  public function store(Request $request) {
    $formFields = $request->validate([
        'name' => ['required', 'min:3'],
        'email' => ['required', 'email', Rule::unique('users', 'email')],
        'password' => 'required|confirmed|min:8'
    ]);

    //hash password
    $formFields['password'] = bcrypt($formFields['password']);
    $user = User::create($formFields);
    Auth::login($user);
    return redirect('/')->with('message', 'user created and logged in successfully');
  } 

  public function logout(Request $request) {
Auth::logout();
$request->session()->invalidate();
$request->session()->regenerateToken();
return redirect('/')->with('message', 'logged out successfully');
  }

  public function login(Request $request) {
    return view('users.login');
  }

  public function authenticate(Request $request) {
$formFields = $request->validate([
        'email' => ['required', 'email'],
        'password' => 'required'
    ]);

    if(Auth::attempt($formFields)) {
        $request->session()->regenerate();
        return redirect('/')->with('message', 'logged in successfully');
    }

    return back()->withErrors(['email' => 'invalid credentials'])->onlyInput('email');
  }
  
}
