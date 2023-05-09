<?php

namespace App\Http\Controllers;

use App\Models\PengalamanKerja;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengalamanKerjaController extends Controller
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
        $user = User::where('id', auth()->user()->id)->get();
        $user_slug = $user->pluck('slug');

        $validatedData = $request->validate(
            [
                'nama_perusahaan' => 'required',
                'jabatan' => 'required',
                'periode' => 'required',
                'gaji' => 'required',
                'alasan_mengundurkan_diri' => 'required',
                'id_pelamar' => 'required',
            ]
        );
    PengalamanKerja::create($validatedData);
   
        return redirect('/profil-kandidat/users/' . $user_slug[0])->with('success add work experience', 'Berhasil menambah pengalaman kerja');
    }

    /**
     * Display the specified resource.
     */
    public function show(PengalamanKerja $pengalamanKerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PengalamanKerja $pengalamanKerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PengalamanKerja $pengalamanKerja)
    {
        $user = User::where('id', auth()->user()->id)->get();
        $user_slug = $user->pluck('slug');

        $validatedData = $request->validate(
            [

                'nama_perusahaan' => 'required',
                'jabatan' => 'required',
                'periode' => 'required',
                'masih_bekerja' => 'nullable',
                'gaji' => 'required',
                'alasan_mengundurkan_diri' => 'required'
            ]
        );

        PengalamanKerja::where('id', '=', $pengalamanKerja->id)->update($validatedData);
       
        return redirect('/profil-kandidat/users/' . $user_slug[0])->with('success update work experience', 'Berhasil mengubah pengalaman kerja');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PengalamanKerja  $pengalamanKerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(PengalamanKerja $pengalamanKerja)
    {

        $user = User::where('id', auth()->user()->id)->get();
        $user_slug = $user->pluck('slug');

        PengalamanKerja::destroy($pengalamanKerja->id);

        return redirect('/profil-kandidat/users/' . $user_slug[0])->with('success delete work experience', 'Berhasil menghapus pengalaman kerja');
    }
}
