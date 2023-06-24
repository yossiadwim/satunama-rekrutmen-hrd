<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pelamar;
use App\Models\Pendidikan;
use Illuminate\Http\Request;
use App\Models\PengalamanKerja;
use App\Models\Referensi;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Agama;
use Monarobase\CountryList\CountryListFacade;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

        $pelamar = DB::table('pelamar')->where('id', $user->id_pelamar)->get();
        $countries = CountryListFacade::getList('en');

        return view('profil.profil_main', [
            // 'users' => User::where('id', auth()->user()->id)->get(),
            'pelamars' => $pelamar,
            'user' => $user,
            // 'users' => $user,
            'countries' => $countries,

            'pengalamanKerjaExists' => PengalamanKerja::where('id_pelamar', '=', $user->id_pelamar)->exists(),
            'pengalamanKerja' => PengalamanKerja::where('id_pelamar', '=', $user->id_pelamar)->orderBy('id', 'asc')->get(),

            'pendidikans' => Pendidikan::where('id_pelamar', '=', $user->id_pelamar)->orderBy('id_pendidikan', 'asc')->get(),
            'pendidikanExists' => Pendidikan::where('id_pelamar', '=', $user->id_pelamar)->exists(),

            'referensis' => Referensi::where('id_pelamar', '=', $user->id_pelamar)->orderBy('id_referensi', 'asc')->get(),
            'referensiExists' => Referensi::where('id_pelamar', '=', $user->id_pelamar)->exists(),



        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'nama_pelamar' => 'required',
            'email' => 'required',
            'telepon_rumah' => 'required|string|max:12',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|string',
            'jenis_kelamin' => 'required',
            'kebangsaan' => 'required'
        ]);

        Pelamar::where('id', $user->id_pelamar)->update($validatedData);
        return redirect('/profil-kandidat/users/' . $user->slug)->with('success', 'Profil Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function description(Request $request, User $user)
    {
        $rules = [
            'deskripsi' => 'nullable',
        ];

        $validatedData = $request->validate($rules);

        Pelamar::where('id', $user->id)->update($validatedData);

        return redirect('/profil-kandidat/users/' . $user->slug)->with('success add description', 'Berhasil mengubah deskripsi');
    }

    public function my_application(User $user){
        
        return view('lamaran-saya',[
            'title' => 'Lamaran Saya',
            'user' => $user,
            'datas' => $user->pelamar->pelamarLowongan->load([
                'pelamar',
                'lowongan.departemen',
                'dokumenPelamarLowongan.dokumenPelamar',
                'statusLamaran.status',
                'activityLog',
            ])
        ]);
    }

    public function application_form(User $user){
        $countries = CountryListFacade::getList('en');
        $religion = Agama::all();
        return view('application-forms.application_form', [
            'title' => 'Application Form',
            'countries' => $countries,
            'religions' => $religion,
            'user' => $user,
            'datas' => $user->pelamar->pelamarLowongan->load([
                'pelamar.user',
                'lowongan.departemen',
                'dokumenPelamarLowongan.dokumenPelamar',
                'statusLamaran.status',
                'activityLog',
            ])
        ]);
    }
}
