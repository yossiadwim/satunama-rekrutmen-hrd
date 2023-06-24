<?php

namespace App\Http\Controllers;

use App\Mail\MailNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function send(Request $request){
        // dd($request);

        // $email = $request->email;

        // $data_email = [
            
        //     'subject' => 'Perubahan Status Lamaran',
        //     'isi' => 'SELAMAT YEEE',
        // ];
        
        // Mail::to($email)->send(new MailNotify($data_email));
        // return '<h1>Sukses</h1>';
    }
}
