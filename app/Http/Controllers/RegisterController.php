<?php

namespace App\Http\Controllers;

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
            'password' => 'required|min:5|max:255'

        ]);
        
        // $validated_data['password'] = bcrypt($validated_data['password']);
        $validated_data['password'] = Hash::make($validated_data['password']);

        User::create($validated_data);

        $request->session()->flash('sukses', 'Registrasi Berhasil');

        return redirect('/login');
        
    }


}
