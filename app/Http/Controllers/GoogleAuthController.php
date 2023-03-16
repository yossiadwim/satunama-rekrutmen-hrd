<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Str;

class GoogleAuthController extends Controller
{
    public function redirect()
    {

       return Socialite::driver('google')->redirect();

    }

    public function callbackGoogle()
    {
        try{
            $google_user = Socialite::driver('google')->user();

            $user = User::where('google_id', $google_user->getId())->first();

            if(!$user){
                $new_user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id'=>$google_user->getId(),
                    'password'=>bcrypt(Str::random(20)),
                    'role'=>'user',
                    
                ]);
                

                Auth::login($new_user);
            
                return redirect('/main');
            }

            

            // if(strpos($google_user->getEmail(),'@ti.ukdw.ac.id') !== false)
            // {
            //     $user->role = 'admin';
            //     $user->save();
            // }
            // else{
            //     $user->role = 'user';
            //     $user->save();
            // }

            // else{
            //     Auth::login($user);
            //     return redirect('/main');
            // }

            Auth::login(($user));
            return redirect('/main');
        }
        catch(\Throwable $th){
            dd("Something went wrong". $th->getMessage());
        }
    }
}
