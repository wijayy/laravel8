<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Support\Facades\Request;

class LoginController extends Controller
{
 public function index()
 {
  return view("login.index", [
   "title" => "login",
   "active" => "",
  ]);
 }

 public function authenticate(Request $request)
 {
  $credentials = $request->validate([
   "email" => "required|email:dns",
   "password" => "required|min:5|max:255",
  ]);

  // dd("login berhasil");

  if (Auth::attempt($credentials)) {
   $request->session()->regenerate();
   return redirect()->intended("dashboard");
  }

  return back()->with("loginError", "login failed!");
 }

 public function logout(Request $request)
 {
  Auth::logout();

  $request->session()->invalidate();
  $request->session()->regenerateToken();
  return redirect("/");
 }
}