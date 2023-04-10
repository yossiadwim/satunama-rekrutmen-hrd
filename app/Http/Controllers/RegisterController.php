<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
            'role' => "user"

        ]);

        // $validated_data['password'] = bcrypt($validated_data['password']);
        $validated_data['password'] = Hash::make($validated_data['password']);
    
        if (strpos($validated_data['email'], '@ti.ukdw.ac.id') !== false) {
            $validated_data['role'] = 'admin';
            User::create($validated_data);
            $request->session()->flash('sukses', 'Registrasi Berhasil');
        }
        else if(strpos($validated_data['email'], '@satunama.org') !== false){
            $validated_data['role'] = 'admin';
            User::create($validated_data);
            $request->session()->flash('sukses', 'Berhasil Registrasi');
        }
         else {
            $validated_data['role'] = 'user';
            $user = User::create($validated_data);
            Profil::create([
                'user_id' => $user->id,
                'nama' => $user->name,
                'email' => $user->email
            ]);
            $request->session()->flash('sukses', 'Registrasi Berhasil');
        }

        

        return redirect('/login');
    }
}
