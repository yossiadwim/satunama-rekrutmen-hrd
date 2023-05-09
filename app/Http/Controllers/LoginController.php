<?php

namespace App\Http\Controllers;


use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login_register.login');
    }

    public function authenticate(Request $request)
    {

        $credential = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:5',
        ]);

        $user = UserRole::join('users', 'user_role.id_user', '=', 'users.id')
            ->join('role', 'user_role.id_role', '=', 'role.id_role')
            ->select(DB::raw('users.username, users.email, role.nama_role as role'))
            ->where('email', $credential['email'])
            ->get()
            ->toArray();
     
        if(Auth::attempt($credential)) {
            if($user[0]['role'] === 'admin') {
                $request->session()->regenerate();
                return redirect()->intended('/admin-dashboard/lowongan');
            }
            elseif($user[0]['role'] === 'user'){
                $request->session()->regenerate();
                return redirect()->intended('/lowongan-kerja');
            }
        }

        return back()->with('loginError', 'Login Gagal');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
