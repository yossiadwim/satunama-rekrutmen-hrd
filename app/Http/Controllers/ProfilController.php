<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Pendidikan;
use App\Models\PengalamanKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Umpirsky\CountryList\CountryList;

use PragmaRX\Countries\Package\Countries;
use PragmaRX\Countries\Package\Services\Config;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProfilRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $this->authorize('user');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function show(Profil $profil)
    {

        $countries = new Countries(new Config());

        return view('profil.index', [
            'profils' => Profil::leftJoin('provinsis', 'profils.provinsi', '=', 'provinsis.id_provinsi')
                ->leftJoin('kabupatens', 'profils.kabupaten', '=', 'kabupatens.id_kabupaten')
                ->select(DB::raw('id,user_id,nama, profils.email, profils.nomor_telepon,
                        provinsis.nama_provinsi, kabupatens.nama_kabupaten, 
                        usia, jenis_kelamin, kewarganegaraan, tentang_saya'))
                ->where('user_id', '=', auth()->user()->id)
                ->get(),
            'pengalamanKerja' => PengalamanKerja::where('profil_id', '=', $profil->id)->orderBy('id','asc')->get(),
            'pengalamanKerjaExists' => PengalamanKerja::where('profil_id', '=', $profil->id)->exists(),
            'pendidikans' => Pendidikan::where('profil_id', '=', $profil->id)->orderBy('id','asc')->get(),
            'pendidikanExists' => Pendidikan::where('profil_id', '=', $profil->id)->exists(),
            'provinsi' => Provinsi::all(),
            'allCountries' => $countries->all(),
            'profil' => $profil

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function edit(Profil $profil)
    {
        //
        return view('profil.post-profile.edit-profil', [
            // 'checkUserId' => Profil::where('user_id', $profil->user_id)->exist()
            'profil' => $profil
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfilRequest  $request
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profil $profil)
    {
        //
        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'nomor_telepon' => 'required|string|max:12',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'usia' => 'required',
            'jenis_kelamin' => 'required',
            'kewarganegaraan' => 'required'
        ]);

        Profil::where('id', $profil->id)->update($validatedData);
        return redirect('/profil/'.$profil->id)->with('success', 'Profil Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profil $profil)
    {
        //
    }

    public function fetch_kabupaten(Request $request, Provinsi $provinsi)
    {
        // $this->id_provinsi = (int)$request->id_provinsi;
        $id_provinsi = (int)$request->id_provinsi;
        $kabupaten = Kabupaten::where('id_provinsi', $id_provinsi)->get();
        return $kabupaten;
    }

    public function description(Request $request, Profil $profil)
    {

        $rules = [
            'tentang_saya' => 'nullable',
        ];

        $validatedData = $request->validate($rules);

        Profil::where('id', $profil->id)->update($validatedData);

        return redirect('/profil/'.$profil->id)->with('success add description', 'Berhasil mengubah deskripsi');
    }

}
