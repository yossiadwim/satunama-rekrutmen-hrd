<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Status;
use App\Mail\MailNotify;
use App\Mail\ReferenceCheckToCompany;
use App\Models\Karyawan;
use App\Models\Lowongan;
use App\Models\Departemen;
use App\Models\Pendidikan;
use App\Models\ActivityLog;
use App\Models\TesTertulis;
use Illuminate\Http\Request;
use App\Models\StatusLamaran;
use App\Models\PelamarLowongan;
use App\Models\PengalamanKerja;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReferenceCheckToIndividu;
use App\Models\HasilAnalisa;
use App\Models\JenisAnalisa;
use App\Models\KomponenGaji;
use App\Models\TipeAnalisa;
use NunoMaduro\Collision\Adapters\Phpunit\State;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {

        $jobsOpen = Lowongan::join('departemen', 'lowongan.id_departemen', '=', 'departemen.id_departemen')
            ->select(DB::raw('lowongan.id, lowongan.id_departemen, departemen.nama_departemen, departemen.kode_departemen, nama_lowongan, slug, lowongan.tipe_lowongan, deskripsi, lowongan.created_at, lowongan.updated_at'))
            ->where('closed', '=', 'false');

        $jobsClose = Lowongan::join('departemen', 'lowongan.id_departemen', '=', 'departemen.id_departemen')
            ->select(DB::raw('lowongan.id, lowongan.id_departemen, departemen.nama_departemen, departemen.kode_departemen, nama_lowongan, slug, lowongan.tipe_lowongan, deskripsi, lowongan.created_at, lowongan.updated_at'))
            ->where('closed', '=', 'true');

        return view('dashboard.admin_dashboard', [

            'jobsOpen' => $jobsOpen->search(request('search'))->filter(request(['tanggal', 'tipe_lowongan', 'kode_departemen', 'sort']))->get(),

            'jobsClose' => $jobsClose->search(request('search'))->filter(request(['tanggal', 'tipe_lowongan', 'kode_departemen', 'sort']))->get(),

            'departemens' => Lowongan::rightJoin('departemen', 'lowongan.id_departemen', '=', 'departemen.id_departemen')
                ->select(DB::raw('count(lowongan.nama_lowongan) as total_lowongan, departemen.id_departemen as id_departemen, nama_departemen, kode_departemen'))
                ->groupBy('departemen.id_departemen')
                ->get(),

            'user' => Auth::user(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crud_lowongan.create_lowongan', [
            'departemen' => Departemen::all(),
            'user' => Auth::user(),
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
            'tanggal_tutup' => 'required|date',

        ]);

        Lowongan::create($validatedData);
        return redirect('/admin-dashboard/lowongan')->with('success add', 'Lowongan Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lowongan $lowongan)
    {

        $arrPengalamanId = PengalamanKerja::all()->pluck('id_pelamar')->toArray();
        $arrPendidikanId = Pendidikan::all()->pluck('id_pelamar')->toArray();
        $status = Status::all();

        //Data Review
        $review_datas = Lowongan::find($lowongan->id)->pelamarLowongan()->with([
            'pelamar' => [
                'pendidikan',
                'pengalamanKerja',
                'referensi',
                'user',

            ],
            'dokumenPelamarLowongan' => [
                'dokumenPelamar',
            ],
            'statusLamaran' => [
                'status' => function ($query) {
                    $query->where('id', 1);
                }
            ],
            'activityLog',
        ])->get()->toArray();

        //Data Seleksi Berkas
        $seleksi_berkas_datas = Lowongan::find($lowongan->id)->pelamarLowongan()->with([
            'pelamar' => [
                'pendidikan',
                'pengalamanKerja',
                'referensi',
                'user',

            ],
            'dokumenPelamarLowongan' => [
                'dokumenPelamar',
            ],
            'statusLamaran' => [
                'status' => function ($query) {
                    $query->where('id', 2);
                }
            ],
            'activityLog',
        ])->get()->toArray();

        //Data Reference Check
        $reference_check_datas = Lowongan::find($lowongan->id)->pelamarLowongan()->with([
            'pelamar' => [
                'pendidikan',
                'pengalamanKerja',
                'referensi',
                'user',

            ],
            'dokumenPelamarLowongan' => [
                'dokumenPelamar',
            ],
            'statusLamaran' => [
                'status' => function ($query) {
                    $query->where('id', 3);
                }
            ],
            'activityLog',
        ])->get()->toArray();

        //Data Tes
        $tes_datas = Lowongan::find($lowongan->id)->pelamarLowongan()->with([
            'pelamar' => [
                'pendidikan',
                'pengalamanKerja',
                'referensi',
                'user',

            ],
            'dokumenPelamarLowongan' => [
                'dokumenPelamar',
            ],
            'statusLamaran' => [
                'status' => function ($query) {
                    $query->where('id', 4);
                }
            ],
            'activityLog',
        ])->get()->toArray();

        //Data Penawaran
        $penawaran_datas = Lowongan::find($lowongan->id)->pelamarLowongan()->with([
            'pelamar' => [
                'pendidikan',
                'pengalamanKerja',
                'referensi',
                'user',

            ],
            'dokumenPelamarLowongan' => [
                'dokumenPelamar',
            ],
            'statusLamaran' => [
                'status' => function ($query) {
                    $query->where('id', 5);
                }
            ],
            'activityLog',
        ])->get()->toArray();

        $direkrut_datas = Lowongan::find($lowongan->id)->pelamarLowongan()->with([
            'pelamar' => [
                'pendidikan',
                'pengalamanKerja',
                'referensi',
                'user',

            ],
            'dokumenPelamarLowongan' => [
                'dokumenPelamar',
            ],
            'statusLamaran' => [
                'status' => function ($query) {
                    $query->where('id', 6);
                }
            ],
            'activityLog',
        ])->get()->toArray();



        $review_data = [];
        for ($i = 0; $i < count($review_datas); $i++) {
            if ($review_datas[$i]['status_lamaran'][0]['status'] != null) {
                $review_data[] = $review_datas[$i];
            }
        }

        $seleksi_berkas_data = [];
        for ($i = 0; $i < count($seleksi_berkas_datas); $i++) {
            if ($seleksi_berkas_datas[$i]['status_lamaran'][0]['status'] != null) {
                $seleksi_berkas_data[] = $seleksi_berkas_datas[$i];
            }
        }

        $reference_check_data = [];
        for ($i = 0; $i < count($reference_check_datas); $i++) {
            if ($reference_check_datas[$i]['status_lamaran'][0]['status'] != null) {
                $reference_check_data[] = $reference_check_datas[$i];
            }
        }

        $tes_data = [];
        for ($i = 0; $i < count($tes_datas); $i++) {
            if ($tes_datas[$i]['status_lamaran'][0]['status'] != null) {
                $tes_data[] = $tes_datas[$i];
            }
        }

        $penawaran_data = [];
        for ($i = 0; $i < count($penawaran_datas); $i++) {
            if ($penawaran_datas[$i]['status_lamaran'][0]['status'] != null) {
                $penawaran_data[] = $penawaran_datas[$i];
            }
        }

        $direkrut_data = [];
        for ($i = 0; $i < count($direkrut_datas); $i++) {
            if ($direkrut_datas[$i]['status_lamaran'][0]['status'] != null) {
                $direkrut_data[] = $direkrut_datas[$i];
            }
        }

        // dd($penawaran_data);

        return view('dashboard.kelola_kandidat', [
            'lowongan' => $lowongan,
            'arrPengalamanId' => $arrPengalamanId,
            'arrPendidikanId' => $arrPendidikanId,

            'datas' =>  $lowongan->pelamarLowongan->load([
                'pelamar.user',
                'pelamar.pendidikan',
                'pelamar.pengalamanKerja',
                'pelamar.referensi',
                'dokumenPelamarLowongan.dokumenPelamar',
                'statusLamaran.status',
                'activityLog',
                'tesTertulis',
            ]),
            'status' => $status,
            'review' => $review_data,
            'seleksi_berkas' => $seleksi_berkas_data,
            'reference_check' => $reference_check_data,
            'tes' => $tes_data,
            'penawaran' => $penawaran_data,
            'direkrut' => $direkrut_data,
            'user' => Auth::user(),

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lowongan $lowongan)
    {

        return view('crud_lowongan.edit_lowongan', [
            'lowongan' => $lowongan,
            'departemen' => Departemen::all(),
            'user' => Auth::user(),
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
            'deskripsi' => 'required|string',
            'tanggal_tutup' => 'required|date',
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
            'tanggal' => 'required|date',
        ];

        $validatedData = $request->validate($rules);

        Lowongan::where('id', $lowongan->id)->update($validatedData);

        return redirect('/admin-dashboard/lowongan')->with('success closed', 'Lowongan Berhasil Ditutup');
    }

    public function changePosition(Request $request, StatusLamaran $statusLamaran)
    {

        // dd($request); 

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

        $data_email = [
            'subject' => 'Perubahan Status Lamaran',
            'email' => $request->email,
            'status' => $request->status_kandidat,
            'nama_pelamar' => $request->nama_pelamar
        ];

        Mail::to($data_email['email'])->send(new MailNotify($data_email));

        $slug_lowongan = PelamarLowongan::join('lowongan', 'pelamar_lowongan.id_lowongan', 'lowongan.id')
            ->select(DB::raw('slug'))
            ->get();



        $slug_user = User::join('pelamar', 'users.id_pelamar', 'pelamar.id')
            ->join('pelamar_lowongan', 'pelamar.id', 'pelamar_lowongan.id_pelamar')
            ->where('pelamar_lowongan.id_pelamar_lowongan', '=', $request->id_pelamar_lowongan)
            ->select('users.slug')
            ->get();

        return redirect('/admin-dashboard/lowongan/detail-pelamar/' . $slug_user[0]->slug)->with('success change position', 'Berhasil Mengubah Posisi Kandidat');
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


    public function referenceCheck(Request $request)
    {

        $data_email_reference_check_to_individu = [
            'nama_pelamar' => $request->nama_pelamar,
            'nama_referensi' => $request->nama_referensi,
            'email_referensi' => $request->email_referensi,
            'nama_lowongan' => $request->nama_lowongan,
            'nama_karyawan' => $request->nama_karyawan,
            'email_karyawan' => $request->email_karyawan
        ];

        $data_email_reference_check_to_company = [
            'nama_pelamar' => $request->nama_pelamar,
            'nama_perusahaan' => $request->nama_perusahaan,
            'posisi' => $request->posisi,
            'email_referensi' => $request->email_referensi,
            'nama_lowongan' => $request->nama_lowongan,
            'nama_karyawan' => $request->nama_karyawan,
            'email_karyawan' => $request->email_karyawan
        ];

        if ($request->nama_perusahaan) {
            Mail::to($data_email_reference_check_to_company['email_referensi'])->send(new ReferenceCheckToCompany($data_email_reference_check_to_company));
        } else {
            Mail::to($data_email_reference_check_to_individu['email_referensi'])->send(new ReferenceCheckToIndividu($data_email_reference_check_to_individu));
        }


        $slug_user = User::join('pelamar', 'users.id_pelamar', 'pelamar.id')
            ->where('pelamar.nama_pelamar', '=', $request->nama_pelamar)
            ->select('users.slug')
            ->get();

        return redirect('/admin-dashboard/lowongan/detail-pelamar/' . $slug_user[0]->slug)->with('success send refererence check', 'Berhasil Mengirim Email Reference Check');
    }

    public function workLoad(User $user)
    {
        $total_poin = HasilAnalisa::join('jenis_analisa_kriteria', 'jenis_analisa_kriteria.id_jenis_analisa', 'hasil_analisa.id_jenis_analisa')
            ->selectRaw('SUM(hasil_analisa.poin) as total_poin')
            ->where('hasil_analisa.id_lowongan', $user->pelamar->pelamarLowongan[0]->lowongan->id)
            ->get();

        $lowonganId = $user->pelamar->pelamarLowongan[0]->lowongan->id;

        // DB::enableQueryLog();
        $gaji = KomponenGaji::whereRaw(
            '(SELECT SUM(poin) FROM hasil_analisa WHERE hasil_analisa.id_lowongan = ?) BETWEEN komponen_gaji.bobot_minimal AND komponen_gaji.bobot_maksimal order by komponen_gaji.id_komponen_gaji DESC',
            [$lowonganId]
        )->get();
        // dd(DB::getQueryLog());

        return view('dashboard.kelola_kandidat.bobot_kerja_kandidat', [
            'title' => 'Bobot Kerja',
            'user' => $user,
            'data_lowongan' => $user->pelamar->pelamarLowongan->load(
                'lowongan',
                'pelamar'
            ),
            'hasil_analisa' => HasilAnalisa::where('id_lowongan', $user->pelamar->pelamarLowongan[0]->lowongan->id)->get(),
            'poin' => $total_poin,
            'gaji' => $gaji
        ]);
    }


    public function detailCandidate(User $user)
    {

        $arrPengalamanId = PengalamanKerja::all()->pluck('id_pelamar')->toArray();
        $arrPendidikanId = Pendidikan::all()->pluck('id_pelamar')->toArray();
        $pelamar_lowongan = PelamarLowongan::join('pelamar', 'pelamar_lowongan.id_pelamar', 'pelamar.id')
            ->join('users', 'users.id_pelamar', 'pelamar.id')
            ->select('pelamar_lowongan.id_pelamar_lowongan')
            ->where('users.id', $user->id)
            ->get();

        $current_status_lamaran = StatusLamaran::where('id_pelamar_lowongan', '=', $pelamar_lowongan[0]->id_pelamar_lowongan)
            ->select('status_lamaran.id_status')
            ->get();

        $status = Status::select('status.nama_status')->get();

        $current_status = Status::where('id', '=', $current_status_lamaran[0]->id_status)
            ->select('status.nama_status')
            ->get();

        $search_status = $current_status[0]->nama_status;
        $index_current_status = $status->search(function ($stat) use ($search_status) {
            return $stat->nama_status === $search_status;
        });

        if ($index_current_status !== false) {

            $index_next_status = $index_current_status + 1;

            if ($status->take(7)->has($index_next_status)) {
                $next_status = $status->get($index_next_status);
                $data_next_status = Status::where('nama_status', $next_status->nama_status)->get();
            } else {
                echo "No more status after the current status";
            }
        } else {
            echo "not found";
        }

        return view('dashboard.detail_kandidat', [
            'arrPengalamanId' => $arrPengalamanId,
            'arrPendidikanId' => $arrPendidikanId,
            'title' => 'Detail Kandidat',
            'status' => Status::all(),
            'karyawan_login' => Auth::user(),
            'data_karyawan' => Karyawan::where('id_karyawan', Auth::user()->id_karyawan)->get(),
            'data_next_status' => $data_next_status,
            'datas' => $user->pelamar->pelamarLowongan->load(
                'pelamar.user',
                'pelamar.pendidikan',
                'pelamar.pengalamanKerja',
                'pelamar.referensi',
                'dokumenPelamarLowongan.dokumenPelamar',
                'statusLamaran.status',
                'lowongan',
                'activityLog',
                'tesTertulis',

            ),
            'user' => Auth::user(),
        ]);
    }

    public function instrumenAnalisaBebanKerja(Lowongan $lowongan, JenisAnalisa $jenis_analisa)
    {
        $analisa_pendidikan = $jenis_analisa->bebanIndeksPendidikan()->get();

        $analisa_pengalaman = $jenis_analisa->bebanIndeksPengalaman()->get();

        $analisa_keterampilan_hubungan = $jenis_analisa->bebanIndeksKeterampilanHubungan()->get();

        $analisa_manajemen = $jenis_analisa->bebanIndeksManajemen()->get();

        $analisa_tantangan_berpikir = $jenis_analisa->bebanIndeksTantanganBerpikir()->get();

        $analisa_lingkungan_berpikir = $jenis_analisa->bebanIndeksLingkunganBerpikir()->get();

        $analisa_tingkatan_kebebasan_bertindak = $jenis_analisa->bebanIndeksKebebasanBertindak()->get();

        $analisa_sikap_dan_besaran_dampak = $jenis_analisa->bebanIndeksSikapDanBesaranDampak()->get();

        $analisa_signifikansi_area_dampak = $jenis_analisa->bebanIndeksSignifikansiAreaDampak()->get();

        $data_hasil_analisa = HasilAnalisa::join('jenis_analisa_kriteria', 'jenis_analisa_kriteria.id_jenis_analisa', 'hasil_analisa.id_jenis_analisa')
            ->where('hasil_analisa.id_lowongan', $lowongan->id)
            ->get();

        $total_poin = HasilAnalisa::join('jenis_analisa_kriteria', 'jenis_analisa_kriteria.id_jenis_analisa', 'hasil_analisa.id_jenis_analisa')
            ->selectRaw('SUM(hasil_analisa.poin) as total_poin')
            ->where('hasil_analisa.id_lowongan', $lowongan->id)
            ->get();

        $hasil_analisa_exists = HasilAnalisa::join('jenis_analisa', 'jenis_analisa.id_jenis_analisa', 'hasil_analisa.id_jenis_analisa')
            ->join('tipe_analisa', 'tipe_analisa.id_tipe_analisa', 'jenis_analisa.id_tipe_analisa')
            ->select('tipe_analisa.id_tipe_analisa')
            ->where('hasil_analisa.id_lowongan', $lowongan->id)
            ->get();

        return view('dashboard.instrumen_analisa_beban_kerja', [
            'user' => Auth::user(),
            'lowongan' => $lowongan,
            'tipe_analisa' => TipeAnalisa::all()->sortBy('id_tipe_analisa'),
            'data_hasil_analisa' => $data_hasil_analisa,
            'total_poin' => $total_poin,
            'hasil_analisa_exists' => $hasil_analisa_exists,
            'analisa_pendidikan' => $analisa_pendidikan,
            'analisa_pengalaman' => $analisa_pengalaman,
            'analisa_keterampilan_hubungan' => $analisa_keterampilan_hubungan,
            'analisa_manajemen' => $analisa_manajemen,
            'analisa_tantangan_berpikir' => $analisa_tantangan_berpikir,
            'analisa_lingkungan_berpikir' => $analisa_lingkungan_berpikir,
            'analisa_tingkatan_kebebasan_bertindak' => $analisa_tingkatan_kebebasan_bertindak,
            'analisa_sikap_dan_besaran_dampak' => $analisa_sikap_dan_besaran_dampak,
            'analisa_signifikansi_area_dampak' => $analisa_signifikansi_area_dampak,
        ]);
    }


    private function insertUpdateAnalisa(object $request, bool $data_hasil_analisa_exists, object $data)
    {

        $data_hasil_analisa = [
            'id_jenis_analisa' => $request->id_jenis_analisa,
            'id_lowongan' => $request->id,
            'id_karyawan' => $request->id_karyawan,
        ];

        $data_update_analisa = [
            'id_jenis_analisa' => $request->id_jenis_analisa,
        ];

        $poin = $request->bobot * $request->indeks;
        $data_hasil_analisa['poin'] = $poin;
        $data_update_analisa['poin'] = $poin;

        if ($data_hasil_analisa_exists) {
            $query = HasilAnalisa::where('hasil_analisa.id_jenis_analisa', $data[0]->id_jenis_analisa)
                ->where('hasil_analisa.id_lowongan', $request->id)
                ->update($data_update_analisa);
            return true;
        }

        $query = HasilAnalisa::create($data_hasil_analisa);
        if ($query) {
            return true;
        }
    }

    public function instrumentAnalysis(Lowongan $lowongan, Request $request)
    {

        $data_hasil_analisa_exists = HasilAnalisa::join('jenis_analisa', 'jenis_analisa.id_jenis_analisa', 'hasil_analisa.id_jenis_analisa')
            ->join('tipe_analisa', 'jenis_analisa.id_tipe_analisa', 'tipe_analisa.id_tipe_analisa')
            ->where('hasil_analisa.id_lowongan', $request->id)
            ->where('tipe_analisa.id_tipe_analisa', $request->id_tipe_analisa)
            ->exists();

        $data = HasilAnalisa::join('jenis_analisa', 'jenis_analisa.id_jenis_analisa', 'hasil_analisa.id_jenis_analisa')
            ->join('tipe_analisa', 'jenis_analisa.id_tipe_analisa', 'tipe_analisa.id_tipe_analisa')
            ->where('hasil_analisa.id_lowongan', $request->id)
            ->where('tipe_analisa.id_tipe_analisa', $request->id_tipe_analisa)
            ->get();



        if ($request->slug_analisa == 'pendidikan') {
            if ($this->insertUpdateAnalisa($request, $data_hasil_analisa_exists, $data)) {
                return redirect('/admin-dashboard/lowongan/instrumen-penilaian-beban-kerja/' . $lowongan->slug)->with('success add education analysis', 'Berhasil Memasukkan Data');
            }
        } else if ($request->slug_analisa == 'pengalaman') {
            if ($this->insertUpdateAnalisa($request, $data_hasil_analisa_exists, $data)) {
                return redirect('/admin-dashboard/lowongan/instrumen-penilaian-beban-kerja/' . $lowongan->slug)->with('success add education analysis', 'Berhasil Memasukkan Data');
            }
        } else if ($request->slug_analisa == 'keterampilan-hubungan-dengan-pihak-lain') {
            if ($this->insertUpdateAnalisa($request, $data_hasil_analisa_exists, $data)) {
                return redirect('/admin-dashboard/lowongan/instrumen-penilaian-beban-kerja/' . $lowongan->slug)->with('success add education analysis', 'Berhasil Memasukkan Data');
            }
        } else if ($request->slug_analisa == 'manajemen') {

            if ($this->insertUpdateAnalisa($request, $data_hasil_analisa_exists, $data)) {
                return redirect('/admin-dashboard/lowongan/instrumen-penilaian-beban-kerja/' . $lowongan->slug)->with('success add education analysis', 'Berhasil Memasukkan Data');
            }
        } else if ($request->slug_analisa == 'tantangan-berpikir') {
            if ($this->insertUpdateAnalisa($request, $data_hasil_analisa_exists, $data)) {
                return redirect('/admin-dashboard/lowongan/instrumen-penilaian-beban-kerja/' . $lowongan->slug)->with('success add education analysis', 'Berhasil Memasukkan Data');
            }
        } else if ($request->slug_analisa == 'lingkungan-berpikir') {

            if ($this->insertUpdateAnalisa($request, $data_hasil_analisa_exists, $data)) {
                return redirect('/admin-dashboard/lowongan/instrumen-penilaian-beban-kerja/' . $lowongan->slug)->with('success add education analysis', 'Berhasil Memasukkan Data');
            }
        } else if ($request->slug_analisa == 'tingkatan-kebebasan-bertindak') {

            if ($this->insertUpdateAnalisa($request, $data_hasil_analisa_exists, $data)) {
                return redirect('/admin-dashboard/lowongan/instrumen-penilaian-beban-kerja/' . $lowongan->slug)->with('success add education analysis', 'Berhasil Memasukkan Data');
            }
        } else if ($request->slug_analisa == 'sikap-dan-besaran-dampak') {

            if ($this->insertUpdateAnalisa($request, $data_hasil_analisa_exists, $data)) {
                return redirect('/admin-dashboard/lowongan/instrumen-penilaian-beban-kerja/' . $lowongan->slug)->with('success add education analysis', 'Berhasil Memasukkan Data');
            }
        } else if ($request->slug_analisa == 'signifikansi-area-dampak') {

            if ($this->insertUpdateAnalisa($request, $data_hasil_analisa_exists, $data)) {
                return redirect('/admin-dashboard/lowongan/instrumen-penilaian-beban-kerja/' . $lowongan->slug)->with('success add education analysis', 'Berhasil Memasukkan Data');
            }
        }
    }
}
