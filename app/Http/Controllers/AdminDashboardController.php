<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Lowongan;
use App\Models\Departemen;
use App\Models\ActivityLog;
use App\Models\TesTertulis;
use Illuminate\Http\Request;
use App\Models\StatusLamaran;
use App\Models\PelamarLowongan;
use Illuminate\Support\Facades\DB;
use Cviebrock\EloquentSluggable\Services\SlugService;


class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('dashboard.admin_dashboard', [

            'jobsOpen' => Lowongan::join('departemen', 'lowongan.id_departemen', '=', 'departemen.id_departemen')
                ->select(DB::raw('lowongan.id as id_lowongan, lowongan.id_departemen, departemen.nama_departemen, nama_lowongan as nama_lowongan, slug, tipe_lowongan, deskripsi, lowongan.created_at, lowongan.updated_at'))
                ->where('closed', '=', 'false')
                ->groupBy('departemen.nama_departemen', 'lowongan.id')
                ->get()
                ->sortDesc(),

            'jobsClose' => Lowongan::join('departemen', 'lowongan.id_departemen', '=', 'departemen.id_departemen')
                ->select(DB::raw('lowongan.id as job_id, lowongan.id_departemen, departemen.nama_departemen, nama_lowongan, slug, tipe_lowongan, deskripsi, lowongan.created_at, lowongan.updated_at'))
                ->where('closed', '=', 'true')
                ->groupBy('departemen.nama_departemen', 'lowongan.id')
                ->get()
                ->sortDesc(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crud_lowongan.create_lowongan', [
            'departemen' => Departemen::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_departemen' => 'required',
            'nama_lowongan' => 'required',
            'slug' => 'required',
            'tipe_lowongan' => 'required',
            'deskripsi' => 'required',
            'closed' => 'required',

        ]);

        Lowongan::create($validatedData);
        return redirect('/admin-dashboard/lowongan')->with('success add', 'Lowongan Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lowongan $lowongan)
    {

        return view('dashboard.kelola_kandidat', [
            'lowongan' => $lowongan,
            'datas' =>  $lowongan->pelamarLowongan->load(
                'pelamar.user',
                'pelamar.pendidikan',
                'pelamar.pengalamanKerja',
                'pelamar.referensi',
                'dokumenPelamarLowongan.dokumenPelamar',
                'statusLamaran.status',
                'activityLog',
                'tesTertulis',
            ),
            'status' => Status::all()

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lowongan $lowongan)
    {

        return view('crud_lowongan.edit_lowongan', [
            'lowongan' => $lowongan,
            'departemen' => Departemen::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lowongan $lowongan)
    {
        $rules = [
            'nama_lowongan' => 'required|string',
            'id_departemen' => 'required',
            'tipe_lowongan' => 'required',
            'deskripsi' => 'required|string'
        ];

        if ($request->slug != $lowongan->slug) {
            $rules['slug'] = 'required|unique:lowongan';
        }

        $validatedData = $request->validate($rules);
        Lowongan::where('id', $lowongan->id)->update($validatedData);

        return redirect('/admin-dashboard/lowongan')->with('success edit', 'Lowongan Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lowongan $lowongan)
    {
    }

    public function checkSlug(Request $request)
    {

        $slug = SlugService::createSlug(Lowongan::class, 'slug', $request->nama_lowongan);

        return response()->json(['slug' => $slug]);
    }

    public function closeJobs(Request $request, Lowongan $lowongan)
    {

        $rules = [
            'closed' => 'required',
        ];

        $validatedData = $request->validate($rules);

        Lowongan::where('id', $lowongan->id)->update($validatedData);

        return redirect('/admin-dashboard/lowongan')->with('success closed', 'Lowongan Berhasil Ditutup');
    }

    public function changePosition(Request $request, StatusLamaran $statusLamaran)
    {
        // dd($request);
        // if ($request->method() === 'GET') {

        //     if ($request->id_status == 3) {
        //         return view('dashboard.kelola_kandidat.reference_check_kandidat', [

        //             'datas' => PelamarLowongan::with(['pelamar' => function (Builder $query) use ($request) {
        //                 $query->where('id_pelamar_lowongan', $request->id_pelamar_lowongan);
        //             }])

        //         ]);
        //     }
        // } else {
        $validatedData = $request->validate([
            'tanggal' => 'required',
            'approved_by' => 'required',
            'id_status' => 'required'
        ]);

        $status_lamaran = StatusLamaran::where('id_status_lamaran', $statusLamaran->id_status_lamaran)->update($validatedData);


        $data_activity = [
            'id_pelamar_lowongan' => $request->id_pelamar_lowongan,
            'id_status' => $request->id_status
        ];

        ActivityLog::create($data_activity);

        $slug_lowongan = PelamarLowongan::join('lowongan', 'pelamar_lowongan.id_lowongan', 'lowongan.id')
            ->select(DB::raw('slug'))
            ->get();

        return redirect('/admin-dashboard/lowongan/' . $slug_lowongan[0]->slug . '/kelola-kandidat');
    }

    public function addScheduleTest(Request $request)
    {

        $validatedData = $request->validate([
            'tanggal_tes' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'nama_pelamar' => 'required'

        ]);

        $result = PelamarLowongan::join('pelamar', 'pelamar_lowongan.id_pelamar', 'pelamar.id')
            ->select(DB::raw('id_pelamar_lowongan'))
            ->where('pelamar.nama_pelamar', $request->nama_pelamar)
            ->get();

        $slug_lowongan = PelamarLowongan::join('lowongan', 'pelamar_lowongan.id_lowongan', 'lowongan.id')
            ->select(DB::raw('slug'))
            ->get();

        $validatedData['id_pelamar_lowongan'] = $result[0]->id_pelamar_lowongan;
        TesTertulis::create($validatedData);

        return redirect('/admin-dashboard/lowongan/' . $slug_lowongan[0]->slug . '/kelola-kandidat')->with('success add schedule', 'Berhasil Menambahkan Data Jadwal');
    }

    public function editScheduleTest(Request $request, TesTertulis $tesTertulis)
    {

        // dd($tesTertulis);

        $validatedData = $request->validate([
            'tanggal_tes' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'nama_pelamar' => 'required',
            'id_pelamar_lowongan' => 'required',

        ]);

        $slug_lowongan = PelamarLowongan::join('lowongan', 'pelamar_lowongan.id_lowongan', 'lowongan.id')
            ->select(DB::raw('slug'))
            ->get();

        TesTertulis::where('id_tes_tertulis', $tesTertulis->id_tes_tertulis)->update($validatedData);

        return redirect('admin-dashboard/lowongan/' . $slug_lowongan[0]->slug . '/kelola-kandidat')->with('success edit schedule', 'Berhasil Mengubah Data Jadwal');
    }

    public function referenceCheck(PelamarLowongan $pelamarLowongan)
    {
        // dd($pelamarLowongan);
        return view('dashboard.kelola_kandidat.reference_check_kandidat', [
            'datas' => $pelamarLowongan->load(
                'pelamar.user',
                'pelamar.pendidikan',
                'pelamar.pengalamanKerja',
                'pelamar.referensi',
                'dokumenPelamarLowongan.dokumenPelamar',
                'statusLamaran.status',
                'lowongan',
                'activityLog',
                'tesTertulis',
            )
        ]);
    }

    public function assesment(PelamarLowongan $pelamarLowongan)
    {
        return view('dashboard.kelola_kandidat.assesment_kandidat', [
            'datas' => $pelamarLowongan->load(
                'pelamar.user',
                'pelamar.pendidikan',
                'pelamar.pengalamanKerja',
                'pelamar.referensi',
                'dokumenPelamarLowongan.dokumenPelamar',
                'statusLamaran.status',
                'lowongan',
                'activityLog',
                'tesTertulis',
            )
        ]);
    }
}
