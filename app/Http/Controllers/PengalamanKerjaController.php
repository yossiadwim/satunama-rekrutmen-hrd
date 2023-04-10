<?php

namespace App\Http\Controllers;

use App\Models\PengalamanKerja;
use App\Models\Profil;

use Illuminate\Http\Request;
use App\Http\Requests\StorePengalamanKerjaRequest;
use App\Http\Requests\UpdatePengalamanKerjaRequest;

class PengalamanKerjaController extends Controller
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
     * @param  \App\Http\Requests\StorePengalamanKerjaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validatedData = $request->validate(
            [
                'user_id' => 'required',
                'profil_id' => 'required',
                'nama_perusahaan' => 'required',
                'jabatan' => 'required',
                'bulan_mulai' => 'required',
                'tahun_mulai' => 'required',
                'bulan_berakhir' => 'required',
                'tahun_berakhir' => 'required',
                'masih_bekerja' => 'nullable',
                'gaji' => 'required',
                'alasan_mengundurkan_diri' => 'required'
            ]
        );

        PengalamanKerja::create($validatedData);
        return redirect('/profil/'.$validatedData['profil_id'])->with('success add work experience', 'Berhasil menambah pengalaman kerja');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PengalamanKerja  $pengalamanKerja
     * @return \Illuminate\Http\Response
     */
    public function show(PengalamanKerja $pengalamanKerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PengalamanKerja  $pengalamanKerja
     * @return \Illuminate\Http\Response
     */
    public function edit(PengalamanKerja $pengalamanKerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePengalamanKerjaRequest  $request
     * @param  \App\Models\PengalamanKerja  $pengalamanKerja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PengalamanKerja $pengalamanKerja)
    {
        //
        $validatedData = $request->validate(
            [
                'user_id' => 'required',
                'profil_id' => 'required',
                'nama_perusahaan' => 'required',
                'jabatan' => 'required',
                'bulan_mulai' => 'required',
                'tahun_mulai' => 'required',
                'bulan_berakhir' => 'required',
                'tahun_berakhir' => 'required',
                'masih_bekerja' => 'nullable',
                'gaji' => 'required',
                'alasan_mengundurkan_diri' => 'required'
            ]
        );

        PengalamanKerja::where('id', '=', $pengalamanKerja->id)->update($validatedData);
        return redirect('/profil/'.$validatedData['profil_id'])->with('success update work experience', 'Berhasil mengubah pengalaman kerja');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PengalamanKerja  $pengalamanKerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(PengalamanKerja $pengalamanKerja)
    {
        PengalamanKerja::destroy($pengalamanKerja->id);
        return redirect('/profil/'.$pengalamanKerja->profil_id)->with('success delete work experience', 'Berhasil menghapus pengalaman kerja');
    }
}
