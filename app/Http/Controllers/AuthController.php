<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    public function signupView(){ return view('auth.signup'); }

    public function signup(Request $request){
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('home')->with('success','✅ Account created successfully. You can now login.');
    }

    public function login(Request $request){
        $request->validate(['username' => 'required', 'password' => 'required']);
        if(Auth::attempt(['username'=>$request->username, 'password'=>$request->password])){
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
        return back()->with('error','❌ No account found with this username. Please sign up first.');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('success','✅ Logged out successfully');
    }

    public function deleteAccount(){
        auth()->user()->delete();
        return redirect()->route('home')->with('success','✅ Your account deleted permanently');
    }
}