<?php
namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function authenticate(Request $request)
    {

        $credential = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:5',
        ]);

        
        if(Auth::attempt($credential) && auth()->user()->role === 'admin'){
            $request->session()->regenerate();
            return redirect()->intended('/admin-dashboard/jobs');
        }
        else if((Auth::attempt($credential) && auth()->user()->role === 'user')) {
            $request->session()->regenerate();
            return redirect()->intended('/main');
        }


        return back()->with('loginError', 'Login Gagal');
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/main');
    }
}
