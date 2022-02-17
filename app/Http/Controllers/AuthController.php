<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\PostLoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function postLogin(PostLoginRequest $request)
    {
        $user = User::where('username', $request->input('username'))->first();

        if(!Hash::check($request->input('password'), $user->password)) {
            return back()->withErrors(["errors" => "Desculpe, mas os dados não conferem. Tente novamente"]);
        }

        Auth::attempt($request->validated());

        return redirect()->route('admin.dashboard')->with('message', 'Bem vindo(a)!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
