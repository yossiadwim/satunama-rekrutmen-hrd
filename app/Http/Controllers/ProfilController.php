<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Http\Requests\StoreProfilRequest;
use App\Http\Requests\UpdateProfilRequest;
use Illuminate\Http\Request;
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
        $this->authorize('user');
        $provinsi = Provinsi::all();
        // $kab = Kabupaten::all();
        $countries = new Countries(new Config());
        $allCountries = $countries->all();


        // dd($allCountries);
        // $kabupaten = Kabupaten::where($kab->id_kabupaten,$provinsi->id_provinsi)->get();

        return view('profil.index')->with('provinsi', $provinsi)->with('allCountries', $allCountries);

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
    public function store(StoreProfilRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function show(Profil $profil)
    {
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfilRequest  $request
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfilRequest $request, Profil $profil)
    {
        //
        
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
}
