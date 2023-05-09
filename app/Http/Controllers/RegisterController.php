<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pelamar;
use App\Models\Karyawan;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class RegisterController extends Controller
{
    public function index()
    {
        return view("login_register.register");
    }

    public function store(Request $request)
    {
        $validated_data_pelamar = $request->validate([
            'nama_pelamar' => 'required|max:255',
            'email' => 'required|email:dns|unique:pelamar',


        ]);

        $validated_data_user = $request->validate([
            'username' => 'required|max:255',
            'slug' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',


        ]);

        $validated_data_user['password'] = Hash::make($validated_data_user['password']);

        if (strpos($validated_data_pelamar['email'], '@ti.ukdw.ac.id') !== false) {

            // User::create($validated_data_pelamar);
            // $request->session()->flash('sukses', 'Registrasi Berhasil');
        } else if (strpos($validated_data_pelamar['email'], '@satunama.org') !== false) {

            // User::create($validated_data_pelamar);
            // $request->session()->flash('sukses', 'Berhasil Registrasi');

        } else {

            // $pelamar_id = DB::table('pelamar')->insertGetId([
            //     'nama_pelamar' => $validated_data_pelamar['nama_pelamar'],
            //     'email' => $validated_data_pelamar['email']
            // ]);

            // $user_id = DB::table('users')->insertGetId([
            //     'username' => $validated_data_user['username'],
            //     'slug' => $validated_data_user['slug'],
            //     'email' => $validated_data_user['email'],
            //     'password' => $validated_data_user['password'],
            //     'id_pelamar' => $validated_data_user['id_pelamar'],
            // ]);

            $pelamar = Pelamar::create($validated_data_pelamar);

            $validated_data_user['id_pelamar'] = $pelamar->id;


            $user = User::create([
                'username' => $validated_data_user['username'],
                'slug' => $validated_data_user['slug'],
                'email' => $validated_data_user['email'],
                'password' => $validated_data_user['password'],
                'id_pelamar' => $validated_data_user['id_pelamar'],
            ]);

            UserRole::create([
                'id_user' => $user->id,
                'id_role' => 2
            ]);

            $request->session()->flash('sukses', 'Registrasi Berhasil');
        }

        return redirect('/login');
    }

    public function checkSlug(Request $request)
    {

        $slug = SlugService::createSlug(User::class, 'slug', $request->nama);

        return response()->json(['slug' => $slug]);
    }
}
