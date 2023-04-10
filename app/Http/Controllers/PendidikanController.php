<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use App\Http\Requests\StorePendidikanRequest;
use App\Http\Requests\UpdatePendidikanRequest;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PendidikanController extends Controller
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
     * @param  \App\Http\Requests\StorePendidikanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
   
        $validatedData = $request->validate(
            [
                'user_id' => 'required',
                'profil_id' => 'required',
                'jenjang_pendidikan' => 'required',
                'nama_instansi' => 'required',
                'tahun_selesai' => 'required',
            ]
        );

        Pendidikan::create($validatedData);
        return redirect('/profil/'.$validatedData['profil_id'])->with('success add education', 'Berhasil menambah informasi pendidikan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function show(Pendidikan $pendidikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendidikan $pendidikan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePendidikanRequest  $request
     * @param  \App\Models\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendidikan $pendidikan)
    {
        $validatedData = $request->validate(
            [
                'user_id' => 'required',
                'profil_id' => 'required',
                'jenjang_pendidikan' => 'required',
                'nama_instansi' => 'required',
                'tahun_selesai' => 'required',
            ]
        );
        Pendidikan::where('id',$pendidikan->id)->update($validatedData);
        return redirect('/profil/'.$validatedData['profil_id'])->with('success update education', 'Berhasil mengubah informasi pendidikan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendidikan $pendidikan)
    {
        Pendidikan::destroy($pendidikan->id);
        return redirect('/profil/'.$pendidikan->profil_id)->with('success delete education', 'Berhasil menghapus pengalaman kerja');
    }
}
