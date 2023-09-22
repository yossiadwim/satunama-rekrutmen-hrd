<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Agama;
use App\Models\Pelamar;
use App\Models\Pelatihan;
use App\Models\Referensi;
use App\Models\Pendidikan;
use Brick\Math\BigInteger;
use App\Models\AnakPelamar;
use Illuminate\Http\Request;
use App\Models\KontakDarurat;
use App\Models\KeluargaPelamar;
use App\Models\PengalamanKerja;
use App\Models\KondisiKesehatan;
use App\Models\PenguasaanBahasa;
use App\Models\KemampuanKomputer;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\PengalamanOrganisasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\VarDumper\VarDumper;
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

    public function my_application(User $user)
    {

        return view('lamaran-saya', [
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

    public function application_form(User $user)
    {

        $hobbies = [
            'berenang', 'menyanyi', 'menari', 'bersepeda', 'memahat kayu', 'bermain catur', 'memasak', 'membaca', 'menonton film', 'mendengarkan musik',
            'memainkan biola',
            'berkuda',
            'berbelanja',
            'merajut',
            'melukis',
            'menggambar',
            'membuat puisi',
            'bermain arung jeram',
            'menanjak gunung',
            'memancing',
            'berselancar',
            'bermain seluncur es',
            'fotografi',
            'bermain layang-layang',
            'menyelam',
            'membuat program',
            'menulis cerita',
            'berjalan-jalan',
            'bermain skateboard',
            'berkebun',
            'menjahit',
            'mewarnai',
            'bermain ski',
            'membuat kaligrafi',
            'berlayar'
        ];

        $illness = [
            'heart trouble', 'high blood pressure', 'diabetes', 'asthma', 'nervous disorder', 'back injury', 'skin problem', 'speech', 'sight',
            'hearing', 'heads', 'epilepsy', 'allergy'

        ];

        $computer_skills = [
            'word', 'excel', 'power point', 'internet', 'penggunaan sistem operasi', 'pemrograman',
            'pengembangan web', 'desain grafis', 'animasi', 'editing foto', 'editing video', 'UI/UX Design', 'Manajemen Basis Database'
        ];

        $software = [
            'gmail', 'WordPress',
            'facebook', 'instagram', 'microsoft access', 'NoSQL', 'MySQL', 'SQL', 'MongoDB', 'SANGO Prosfessional', 'adobe photoshop',
            'adobe illustrator', 'adobe premiere pro', 'adobe after effects',
        ];

        $languages = array('Indonesia', 'English', 'Spanish', 'French', 'German', 'Chinese', 'Russian', 'Japanese');

        $countries = CountryListFacade::getList('en');
        $religion = Agama::all();
        return view('application-forms.application_form', [
            'title' => 'Application Form',
            'countries' => $countries,
            'religions' => $religion,
            'user' => $user,
            'hobbies' => $hobbies,
            'illness' => $illness,
            'computer_skills' => $computer_skills,
            'software' => $software,
            'languages' => $languages,
            'datas' => $user->pelamar->pelamarLowongan->load([
                'pelamar.user',
                'pelamar.agama',
                'lowongan.departemen',
            ]),
            'pengalamanKerjaExists' => PengalamanKerja::where('id_pelamar', '=', $user->id_pelamar)->exists(),
            'pengalamanKerja' => PengalamanKerja::where('id_pelamar', '=', $user->id_pelamar)->orderBy('id', 'asc')->get(),

            'pendidikans' => Pendidikan::where('id_pelamar', '=', $user->id_pelamar)->orderBy('id_pendidikan', 'asc')->get(),
            'pendidikanExists' => Pendidikan::where('id_pelamar', '=', $user->id_pelamar)->exists(),

            'referensis' => Referensi::where('id_pelamar', '=', $user->id_pelamar)->orderBy('id_referensi', 'asc')->get(),
            'referensiExists' => Referensi::where('id_pelamar', '=', $user->id_pelamar)->exists(),
        ]);
    }

    public function send_application_form(Request $request, User $user)
    {
        // dd($request);

        $validatedData = $request->validate([
            'nama_pelamar' => 'nullable',
            'nik' => 'nullable',
            'jenis_kelamin' => 'nullable',
            'tempat_lahir' => 'nullable',
            'tanggal_lahir' => 'nullable',
            'alamat' => 'nullable',
            'telepon_rumah' => 'nullable',
            'telepon_kantor' => 'nullable',
            'suku' => 'nullable',
            'kebangsaan' => 'nullable',
            'id_agama' => 'nullable',
            'tinggi_badan' => 'nullable',
            'berat_badan' => 'nullable',
            'status_kawin' => 'nullable',
            'nama_pasangan' => 'nullable',

        ]);

        if ($request->hobi) {
            $hobi = implode(', ', $request->hobi);
            $validatedData['hobi'] = $hobi;
        }


        $formattedCurrency = $request->ekspetasi_gaji; // Example formatted currency string
        $cleanedString = preg_replace('/[^\d]/', '', $formattedCurrency);
        $ekspetasi_gaji = (int) $cleanedString;
        $validatedData['ekspetasi_gaji'] = $ekspetasi_gaji;
        Pelamar::where('id',$user->pelamar->id)->update($validatedData);

        // data anak
        if ($request->jumlah_anak != 0 || $request->jumlah_anak != null) {
            if ($request->nama_anak != null && $request->jenis_kelamin != null && $request->umur_anak != null) {
                for ($i = 0; $i < (int) $request->jumlah_anak; $i++) {
                    AnakPelamar::create([
                        'nama_anak' => $request->nama_anak[$i],
                        'jenis_kelamin_anak' => $request->jenis_kelamin_anak[$i],
                        'umur_anak' => $request->umur_anak[$i],
                        'id_pelamar' => $user->id_pelamar
                    ]);
                }
            }
        }

        //data keluarga
        if ($request->jumlah_anggota_keluarga != 0 || $request->jumlah_anggota_keluarga != null) {
            if (
                $request->hubungan_keluarga != null && $request->nama_anggota_keluarga != null && $request->jenis_kelamin_anggota_keluarga != null
                && $request->umur_anggota_keluarga != null && $request->jenjang_pendidikan_anggota_keluarga != null && $request->pekerjaan_anggota_keluarga != null
                && $request->perusahaan_anggota_keluarga != null
            ) {
                for ($i = 0; $i < (int) $request->jumlah_anggota_keluarga; $i++) {
                    KeluargaPelamar::create([
                        'hubungan_keluarga' => $request->hubungan_keluarga[$i],
                        'nama_anggota_keluarga' => $request->nama_anggota_keluarga[$i],
                        'jenis_kelamin_anggota_keluarga' => $request->jenis_kelamin_anggota_keluarga[$i],
                        'umur_anggota_keluarga' => $request->umur_anggota_keluarga[$i],
                        'jenjang_pendidikan_anggota_keluarga' => $request->jenjang_pendidikan_anggota_keluarga[$i],
                        'pekerjaan_anggota_keluarga' => $request->pekerjaan_anggota_keluarga[$i],
                        'perusahaan_tempat_bekerja' => $request->perusahaan_tempat_bekerja[$i],
                        'id_pelamar' => $user->id_pelamar
                    ]);
                }
            }
        }

        //data pengalaman organisasi
        if ($request->jumlah_organisasi != null || $request->jumlah_organisasi != 0) {
            if ($request->nama_organisasi != null && $request->posisi_di_organisasi != null) {
                for ($i = 0; $i < (int) $request->jumlah_organisasi; $i++) {
                    PengalamanOrganisasi::create([
                        'nama_organisasi' => $request->nama_organisasi[$i],
                        'posisi_di_organisasi' => $request->posisi_di_organisasi[$i],
                        'id_pelamar' => $user->id_pelamar

                    ]);
                }
            }
        }

        //data kontak darurat
        if ($request->jumlah_kontak_daruarat != null || $request->jumlah_kontak_darurat != 0) {
            if (
                $request->nama_kontak != null && $request->hubungan_kontak != null && $request->telepon_kontak != null &&
                $request->alamat_kontak != null
            ) {
                for ($i = 0; $i < (int) $request->jumlah_kontak_darurat; $i++) {
                    KontakDarurat::create([
                        'nama_kontak' => $request->nama_kontak[$i],
                        'hubungan_kontak' => $request->hubungan_kontak[$i],
                        'telepon_kontak' => $request->telepon_kontak[$i],
                        'alamat_kontak' => $request->alamat_kontak[$i],
                        'id_pelamar' => $user->id_pelamar
                    ]);
                }
            }
        }

        //data riwayat kesehatan
        if ($request->kondisi_kesehatan != null) {
            $kondisi_kesehatan = implode(', ', $request->kondisi_kesehatan);
            $existingId = KondisiKesehatan::where('id_pelamar', $user->id_pelamar);

            if ($existingId) {
                $existingId->update([
                    'kondisi_kesehatan' => $kondisi_kesehatan
                ]);
            } else {
                KondisiKesehatan::create([
                    'kondisi_kesehatan' => $kondisi_kesehatan,
                    'id_pelamar' => $user->id_pelamar
                ]);
            }
        }

        if ($request->adakah_penyakit_serius_lainnya != null) {
            $existingId = KondisiKesehatan::where('id_pelamar', $user->id_pelamar);
            if ($existingId) {
                $existingId->update([
                    'adakah_penyakit_serius_lainnya' => $request->adakah_penyakit_serius_lainnya,
                    'nama_penyakit_lainnya' => $request->nama_penyakit_lainnya,
                ]);
            } else {
                KondisiKesehatan::create([
                    'adakah_penyakit_serius_lainnya' => $request->adakah_penyakit_serius_lainnya,
                    'nama_penyakit_lainnya' => $request->nama_penyakit_lainnya,
                    'id_pelamar' => $user->id_pelamar
                ]);
            }
        }

        if ($request->apakah_pernah_mengalami_cedera_operasi != null) {
            KondisiKesehatan::where('id_pelamar', $user->id_pelamar)->update([
                'adakah_penyakit_serius_lainnya' => $request->adakah_penyakit_serius_lainnya,
                'nama_penyakit_lainnya' => $request->nama_penyakit_lainnya,
            ]);
        }

        if ($request->golongan_darah != null) {

            $existingId = KondisiKesehatan::where('id_pelamar', $user->id_pelamar)->first();

            if ($existingId) {

                $existingId->update([
                    'golongan_darah' => $request->golongan_darah,
                ]);
            } else {

                KondisiKesehatan::create([
                    'golongan_darah' => $request->golongan_darah,
                    'id_pelamar' => $user->id_pelamar
                ]);
            }
        }

        //data riwayat_pendidikan
        if ($request->jumlah_riwayat_pendidikan != null) {
            for ($i = 0; $i < (int) $request->jumlah_riwayat_pendidikan; $i++) {
                Pendidikan::create([
                    'jenjang_pendidikan' => $request->jenjang_pendidikan[$i],
                    'nama_institusi' => $request->nama_institusi[$i],
                    'jurusan' => $request->jurusan[$i],
                    'tahun_lulus' => $request->tahun_lulus[$i],
                    'ipk' => $request->ipk[$i],
                    'id_pelamar' => $user->id_pelamar
                ]);
            }
        }

        // data keahlian komputer dan software
        if ($request->nama_kemampuan && $request->software != null) {
            $keahlian_komputer = implode(', ', $request->nama_kemampuan);
            $software = implode(', ', $request->software);
            KemampuanKomputer::create([
                'nama_kemampuan' => $keahlian_komputer,
                'software' => $software,
                'id_pelamar' => $user->id_pelamar
            ]);
        }


        //data penguasaan bahasa
        if ($request->jumlah_tingkat_penguasaan_bahasa != null) {
            for ($i = 0; $i < (int) $request->jumlah_tingkat_penguasaan_bahasa; $i++) {
                PenguasaanBahasa::create([
                    'nama_bahasa' => $request->nama_bahasa[$i],
                    'tingkat_penguasaan' => $request->tingkat_penguasaan[$i],
                    'id_pelamar' => $user->id_pelamar
                ]);
            }
        }

        //data pengalaman kerja
        if ($request->jumlah_riwayat_pekerjaan != null) {
            for ($i = 0; $i < count($request->gaji); $i++) {
                $request_gaji_pengalaman_kerja = $request->gaji; // Example formatted currency string
                $gaji_pengalaman_clear = preg_replace('/[^\d]/', '', $request_gaji_pengalaman_kerja);
                $gaji_pengalaman_clean[] = (int) $gaji_pengalaman_clear[$i];
            }

            for ($i = 0; $i < (int) $request->jumlah_riwayat_pekerjaan; $i++) {
                PengalamanKerja::create([
                    'nama_perusahaan' => $request->nama_perusahaan[$i],
                    'posisi' => $request->posisi[$i],
                    'periode' => $request->periode[$i],
                    'gaji' => $gaji_pengalaman_clean[$i],
                    'alasan_mengundurkan_diri' => $request->alasan_mengundurkan_diri[$i],
                    'id_pelamar' => $user->id_pelamar
                ]);
            }
        }

        //data referensi
        if ($request->jumlah_referensi != null) {
            for ($i = 0; $i < (int) $request->jumlah_referensi + (int) $request->jumlah_referensi_di_satunama; $i++) {
                Referensi::create([
                    'nama_referensi' => $request->nama_referensi[$i],
                    'alamat_referensi' => $request->alamat_referensi[$i],
                    'telepon_referensi' => $request->telepon_referensi[$i],
                    'email_referensi' => $request->email_referensi[$i],
                    'hubungan_referensi' => $request->hubungan_referensi[$i],
                    'posisi_referensi' => $request->posisi_referensi[$i],
                    'id_pelamar' => $user->id_pelamar
                ]);
            }
        }

        //data pelatihan yang pernah diikuti
        if ($request->jumlah_pelatihan != null) {
            for ($i = 0; $i < (int) $request->jumlah_pelatihan; $i++) {
                Pelatihan::create([
                    'subjek_pelatihan' => $request->subjek_pelatihan[$i],
                    'tahun_pelatihan' => $request->tahun_pelatihan[$i],
                    'nama_mentor' => $request->nama_mentor[$i],
                    'id_pelamar' => $user->id_pelamar
                ]);
            }
        }
    }

    public function accountSettings(User $user)
    {
        $countries = CountryListFacade::getList('en');
        return view('pengaturan_akun.pengaturan-akun', [
            'title' => 'Pengaturan Akun',
            'user' => $user,
            'countries' => $countries,
            'datas' => $user->with('pelamar')->where('users.id', $user->id)->get()
        ]);
    }

    public function changeAccountSettings(Request $request, User $user)
    {
        if ($request->input('ganti_kata_sandi')) {
            if ($request->input('password') === $request->input('konfirmasi_password_baru')) {
                $data = $request->validate([
                    'password' => 'required',
                    'konfirmasi_password_baru' => 'required'
                ]);

                User::where('users.id', $user->id)->update($data['password']);
                return redirect('/profil-kandidat/users/' . $user->slug . '/pengaturan-akun')->with('success change password', 'Berhasil mengganti password');
            } else {
                return back()->with('failed change password', 'Gagal mengganti password');
            }
        } elseif ($request->input('ganti_email_baru')) {
            $pelamar = $user->load('pelamar');
            if ($request->input('email') != $user->email && $request->input('email') != $pelamar->email) {
                $data = $request->validate([
                    'email' => 'required|email:dns'
                ]);
                User::where('users.id', $user->id)->update($data);
                Pelamar::where('pelamar.id', $pelamar->id)->update($data);
                return redirect('/profil-kandidat/users/' . $user->slug . '/pengaturan-akun')->with('success change email', 'Berhasil mengganti email');
            } else {
                return back()->with('failed change email', 'Gagal mengganti email');
            }
        } elseif ($request->input('ganti_nomor_telepon')) {

            $pelamar = $user->load('pelamar');
            if ($request->input('telepon_rumah') !== $pelamar->telepon_rumah) {
                $data = [
                    'telepon_rumah' => $request->telepon_rumah
                ];
                Pelamar::where('pelamar.id', $pelamar->id)->update($data);
                return redirect('/profil-kandidat/users/' . $user->slug . '/pengaturan-akun')->with('success change phone number', 'Berhasil mengganti nomor telepon');
            } elseif ($request->input('telepon_rumah') === $pelamar->telepon_rumah) {
                return back()->with('faield change phone number', 'Gagal mengganti nomor telepon');
            }
        }
    }
}
