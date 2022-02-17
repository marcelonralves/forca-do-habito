<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function postLogin(Request $request)
    {
        $credentials = $this->validate($request, [
            'username' => 'required|exists:users,username|email',
            'password' => 'required'
        ]);

        $user = User::where('username', $request->input('username'))->first();

        if(!Hash::check($request->input('password'), $user->password)) {
            return back()->with('message', 'Desculpe, mas os dados não conferem. Tente novamente');
        }

        Auth::attempt($credentials);

        return redirect()->route('admin.dashboard')->with('message', 'Bem vindo(a)!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
