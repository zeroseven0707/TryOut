<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
   

    public function redirectTogoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function callback(){
            try{
                $user =  Socialite::driver('google')->user();
                $finduser = User::where('google_id',$user->getId())->first();

                if ($finduser) {
                    Auth::login($finduser);
                    if(Auth::user()->role_as == '1')
                    {
                        return redirect('ujian-index')->with('status','Welcome to your dashboard');
                    }
                    elseif(Auth::user()->role_as == '0')
                    {
                        return redirect()->intended('home')->with('status','Logged in successfully');
                    }
                }else {
                    $password = Str::random(12);
                    $newuser = User::create([
                        'name' => $user->name,
                        'image' => $user->avatar,
                        'email' => $user->email,
                        'google_id' => $user->id,
                        'password' => bcrypt($password),
                    ]);
                    Auth::login($newuser);
                    return redirect()->intended('home');
                }

            } catch (\Throwable $th){

            }
    }
}
