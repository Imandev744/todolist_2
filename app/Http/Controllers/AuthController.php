<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {

       $user= User::create($request->validated());

        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')]))
            return redirect()->route('tasks.index')->withUser($user);//TODO: redirect to dashboard
        else
            return redirect()->back();//TODO: show message
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        if ($this->attempt($request->get('username'), $request->get('password')))
            return redirect()->route('tasks.index');//TODO: redirect to dashboard
        else
            return redirect()->back()->with('error','نام کاربری یا کلمه عبور صحیح نیست ! ');//TODO: show message
    }

    public function logout()
    {
        if(auth()->check()){
            auth()->logout();
            return redirect()->route('login');
        }
    }

    public function attempt($username,$password)
    {
            $user=User::query()->where(function ($q) use ($username){
                $q->where('email' , $username)->orWhere('mobile',$username);
            });

            if($user->exists()) {
                if(Hash::check($password,$user->first()->getAuthPassword()))
                {
                    Auth::login($user->first());
                    return \auth()->check();
                }

            }

            return  redirect()->route('login');
    }

}
