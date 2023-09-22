<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SATUNAMA | {{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/main-style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/b3626122b8.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/application_form.js') }}"></script>
</head>

<body style="font-family: Poppins;">
    @include('partials.navbar')

    @if (session()->has('failed send application form'))
        <div class="container justify-content-center col-8">
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="text-align: center">
                {{ session('failed send application form') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <form action="/profil-kandidat/users/{{ $user->slug }}/send-application-form" method="POST">
        @csrf
        @method('PUT')
        <div class="container mt-5 mb-5 border border-1 shadow-sm rounded ">
            <div class="mt-4 mx-2">
                <h3 class="fw-bold">Data Pribadi</h3>
            </div>
            <div class="row mt-5">
                <div class="col-3 d-flex justify-content-center align-items-center">
                    <p>Posisi yang dilamar</p>
                </div>
                <div class="col-6">
                    <div class="form-floating ">
                        <input type="text" class="form-control @if ($datas[0]->lowongan->nama_lowongan != null) is-valid @endif"
                            name="posisi_lowongan" id="nama_lowongan" placeholder="Posisi yang dilamar"
                            value="{{ $datas[0]->lowongan->nama_lowongan }}" disabled>
                        <label for="floatingInput">Posisi yang dilamar</label>

                    </div>
                </div>

            </div>
            <div class="row mt-5 ">
                <div class="col-3 d-flex justify-content-center align-items-center">
                    <p>Nama Pelamar</p>
                </div>
                <div class="col-6">
                    <div class="form-floating">
                        <input type="text" class="form-control is-valid " id="nama_pelamar" name="nama_pelamar"
                            placeholder="Nama Pelamar" value="{{ $datas[0]->pelamar->nama_pelamar }}"
                            oninput="checkNullValue()" required>
                        <label for="nama_pelamar">Nama Pelamar</label>
                        <div class="invalid-feedback" id="validation_nama_pelamar">

                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5 ">
                <div class="col-3 d-flex justify-content-center align-items-center">
                    <p>Nomor Identitas/NIK</p>
                </div>
                <div class="col-6">
                    <div class="form-floating">
                        <input type="text"
                            class="form-control  @if ($datas[0]->pelamar->nik == null) is-invalid
                    @else
                        is-valid @endif"
                            id="nik" name="nik" placeholder="Nomor Identitas" maxlength="16"
                            oninput="validationNik()" value="">
                        <label for="nik"></label>
                        <div class="invalid-feedback" id="validation_nik">Wajib Diisi</div>
                    </div>
                </div>
            </div>

            <div class="row mt-5 ">
                <div class="col-3 d-flex justify-content-center align-items-center">
                    <p>Gaji yang diharapkan</p>
                </div>
                <div class="col-6">
                    <div class="form-floating">
                        <input type="text"
                            class="form-control currency  @if ($datas[0]->pelamar->ekspetasi_gaji == null) is-invalid
                    @else
                        is-valid @endif"
                            id="gaji" placeholder="Gaji yang diharapkan" name="ekspetasi_gaji"
                            oninput="formatCurrency(this)" value="">

                        <label for="gaji"></label>
                        <div class="invalid-feedback" id="validation-gaji">
                            Wajib Diisi
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-3 d-flex justify-content-center align-items-center">
                    <p>Alamat</p>
                </div>
                <div class=" col-6">
                    <div class="form-floating">
                        <input type="text" class="form-control is-valid" id="alamat" placeholder="Alamat"
                            value="{{ $datas[0]->pelamar->alamat }}" oninput="checkNullValue()">
                        <label for="alamat"></label>
                        <div class="invalid-feedback" id="validation-alamat">

                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-3 d-flex justify-content-center align-items-center">
                    <p>Alamat Tetap</p>
                </div>
                <div class="col-6">
                    <div class="form-floating">
                        <input type="text" class="form-control is-valid" id="alamat" name="alamat"
                            placeholder="Alamat" value="{{ $datas[0]->pelamar->alamat }}">
                        <label for="nama_pelamar">Alamat</label>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-3 d-flex justify-content-center align-items-center">
                    <p>Telepon Rumah</p>
                </div>
                <div class="col-6">
                    <div class="form-floating">
                        <input type="text" class="form-control is-valid" id="telepon_rumah" name="telepon_rumah"
                            placeholder="Telepon Rumah" value="{{ $datas[0]->pelamar->telepon_rumah }}"
                            maxlength="12" oninput="checkNullValue()">
                        <label for="telepon_rumah"></label>
                        <div class="invalid-feedback" id="validation_telepon_rumah">
                            Wajib Diisi
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-3 d-flex justify-content-center align-items-center">
                    <p>Telepon Kantor</p>
                </div>
                <div class="col-6">
                    <div class="form-floating">
                        <input type="text"
                            class="form-control @if ($datas[0]->pelamar->telepon_kantor == null) is-invalid
                        @else
                            is-valid @endif"
                            id="telepon_kantor" name="telepon_kantor" placeholder="Telepon Kantor" value=""
                            maxlength="12" oninput="checkNullValue()">
                        <label for="telepon_kantor">Telepon Kantor</label>
                        <div class="invalid-feedback" id="validation_telepon_kantor">

                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-3 d-flex justify-content-center align-items-center">
                    <p>Jenis Kelamin</p>
                </div>
                <div class="col-4">
                    <div class="form-floating">
                        <select class="form-select is-valid" id="jenis_kelamin" name="jenis_kelamin"
                            aria-label="Floating label select example">
                            <option value="" disabled>Pilih</option>
                            @if (old('jenis_kelamin', $datas[0]->pelamar->jenis_kelamin) == 'laki-laki')
                                <option value="laki-laki" selected>Laki-laki</option>
                            @elseif(old('jenis_kelamin', $datas[0]->pelamar->jenis_kelamin) == 'perempuan')
                                <option value="perempuan" selected>Perempuan</option>
                            @else
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            @endif

                        </select>
                        <label for="floatingSelect">Jenis Kelamin</label>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-3 d-flex justify-content-center align-items-center">
                    <p>Suku/Keturunan</p>
                </div>
                <div class=" col-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="suku" name="suku" placeholder="suku"
                            value="">
                        <label for="suku">Suku/Keturunan</label>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-3 d-flex justify-content-center align-items-center">
                    <p>Kebangsaan/Warga Negara</p>
                </div>

                <div class=" col-6">
                    <div class="form-floating">
                        <select class="form-select selectpicker is-valid" data-live-search="true"
                            data-show-subtext="true" id="kebangsaan" name="kebangsaan"
                            aria-label="Floating label select example">
                            @foreach ($countries as $country)
                                @if (old('kebangsaan', $country) == $datas[0]->pelamar->kebangsaan)
                                    <option value="{{ $datas[0]->pelamar->kebangsaan }}" selected>
                                        {{ $datas[0]->pelamar->kebangsaan }}
                                    </option>
                                @else
                                    <option value="{{ $country }}">{{ $country }}</option>
                                @endif
                            @endforeach

                        </select>
                        <label for="kebangsaan">Kewarganegaraan</label>
                    </div>

                </div>
            </div>
            <div class="row mt-5">
                <div class="col-3 d-flex justify-content-center align-items-center">
                    <p>Agama</p>
                </div>
                <div class="col-4">
                    <div class="form-floating">
                        <select
                            class="form-select @if ($datas[0]->pelamar->id_agama == null) is-invalid
                        @else
                            is-valid @endif"
                            id="id_agama" name="id_agama" aria-label="Floating label select example"
                            oninput="checkNullSelectOption()">
                            <option value="" selected disabled>Pilih</option>
                            @foreach ($religions as $religion)
                                <option value="{{ $religion->id_agama }}">{{ $religion->nama_agama }}
                                </option>
                            @endforeach
                        </select>
                        <label for="agama">Agama</label>
                        <div class="invalid-feedback" id="validation_agama">
                            Pilih Salah Satu
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-3 d-flex justify-content-center align-items-center">
                    <p>Tempat Lahir</p>
                </div>
                <div class=" col-6">
                    <div class="form-floating">
                        <input type="text"
                            class="form-control 
                        @if ($datas[0]->pelamar->tempat_lahir == null) is-invalid
                        @else
                            is-valid @endif
                        "
                            id="tempat_lahir" name="tempat_lahir" placeholder="tempat_lahir" value=""
                            oninput="checkNullValue()">
                        <label for="tempat_lahir"></label>
                        <div class="invalid-feedback" id="validation_tempat_lahir">
                            Wajib Diisi
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-3 d-flex justify-content-center align-items-center">
                    <p>Tanggal Lahir</p>
                </div>
                <div class="col-4">
                    <div class="form-floating">
                        <input type="date" class="form-control is-valid" id="tanggal_lahir" name="tanggal_lahir"
                            placeholder="Tanggal Lahir" value="{{ $datas[0]->pelamar->tanggal_lahir }}">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-3 d-flex justify-content-center align-items-center">
                    <p>Tinggi Badan</p>
                </div>
                <div class="col-3">
                    <div class="form-floating">
                        <input type="text"
                            class="form-control 
                        
                        is-invalid"
                            id="tinggi_badan" name="tinggi_badan" placeholder="Tinggi Badan" value=""
                            maxlength="3" oninput="checkNullValue()">
                        <label for="tinggi_badan">Satuan centimeter (cm)</label>
                        <div class="invalid-feedback" id="validation_tinggi badan">
                            Wajib Diisi
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-3 d-flex justify-content-center align-items-center">
                    <p>Berat Badan</p>
                </div>
                <div class="col-3">
                    <div class="form-floating">
                        <input type="text" class="form-control is-invalid" id="berat_badan" name="berat_badan"
                            maxlength="3" placeholder="Berat Badan" value="" oninput="checkNullValue()">
                        <label for="berat_badan">Satuan kilogram (kg)</label>
                        <div class="invalid-feedback" id="validation_berat badan">
                            Wajib Diisi
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-3 d-flex justify-content-center align-items-center">
                    <p>Status Kawin</p>
                </div>
                <div class="col-4">
                    <div class="form-floating">
                        <select class="form-select is-invalid" id="status_kawin" name="status_kawin"
                            aria-label="Floating label select example" oninput="checkNullValue()">
                            <option selected disabled>Pilih</option>
                            <option value="belum_kawin">Belum Kawin</option>
                            <option value="kawin">Kawin</option>
                            <option value="cerai_hidup">Cerai Hidup</option>
                            <option value="cerai_mati">Cerai Mati</option>
                        </select>
                        <label for="status_kawin">Status Kawin</label>
                        <div class="invalid-feedback" id="validation_status_kawin">
                            Pilih Salah Satu
                        </div>
                    </div>

                </div>
            </div>
            <div class="row mt-5 mb-5">
                <div class="col-3 d-flex justify-content-center align-items-center">
                    <p>Nama Suami/Istri</p>
                </div>
                <div class=" col-6">
                    <div class="form-floating">
                        <input type="text" class="form-control " id="nama_pasangan" name="nama_pasangan"
                            placeholder="Nama Suami/Istri" value="" oninput="checkNullValue()">
                        <label for="nama_pasangan">Nama Suami/Istri</label>

                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5 mb-5 border border-1 shadow-sm rounded">
            <div class="mt-4 mx-2">
                <h3 class="fw-bold">Data Anak</h3>
            </div>
            <div class=" mt-5 mb-5">
                <div class="">
                    @include('application-forms.tambah-anak')
                </div>
            </div>

        </div>

        <div class="container mt-5 mb-5 border border-1 shadow-sm rounded">

            <div class=" mt-5 mb-5">
                <div class="mt-4 mb-4 mx-2">
                    <h3 class="fw-bold">Data Keluarga</h3>
                </div>
                <div class="">
                    @include('application-forms.tambah-anggota-keluarga')
                </div>
            </div>

        </div>

        <div class="container mt-5 mb-5 border border-1 shadow-sm rounded">
            <div class=" mt-5 mb-5">
                <div class="mt-4 mb-4 mx-2">
                    <h3 class="fw-bold">Hobi</h3>
                </div>
                <div class="">
                    @include('application-forms.hobi')
                </div>
            </div>

        </div>

        <div class="container mt-5 mb-5 border border-1 shadow-sm rounded">
            <div class="mt-5 mb-5">
                <div class="mt-4 mb-4 mx-2">
                    <h3 class="fw-bold">Pengalaman Organisasi</h3>
                </div>
                <div class="">
                    @include('application-forms.tambah-organisasi')
                </div>
            </div>
        </div>

        <div class="container mt-5 mb-5 border border-1 shadow-sm rounded">

            <div class="mt-5 mb-5">
                <div class="mt-4 mb-4 mx-2">
                    <h3 class="fw-bold">Emergency Contact/Kontak Darurat</h3>
                </div>
                <div class="">
                    @include('application-forms.kontak_darurat')
                </div>
            </div>

        </div>


        <div class="container mt-5 mb-5 border border-1 shadow-sm rounded">
            <div class="mt-5 mb-5">
                <div class="mt-4 mb-4 mx-2">
                    <h3 class="fw-bold">Health Condition/Kondisi Kesehatan</h3>
                </div>
                <div class="">
                    @include('application-forms.kesehatan')
                </div>
            </div>
        </div>

        <div class="container mt-5 mb-5 border border-1 shadow-sm rounded">
            <div class="mt-5 mb-5">
                <div class="mt-4 mb-4 mx-2">
                    <h3 class="fw-bold">Education/Riwayat Pendidikan</h3>
                </div>
                <div class="">
                    @include('application-forms.riwayat_pendidikan')
                </div>
            </div>
        </div>

        <div class="container mt-5 mb-5 border border-1 shadow-sm rounded">
            <div class="mt-5 mb-5">
                <div class="mt-4 mb-4 mx-2">
                    <h3 class="fw-bold">Computer Skill/Kemampuan Komputer</h3>
                </div>
                <div class="">
                    @include('application-forms.keahlian_komputer')
                </div>
            </div>
        </div>

        <div class="container mt-5 mb-5 border border-1 shadow-sm rounded">
            <div class="mt-5 mb-5">
                <div class="mt-4 mb-4 mx-2">
                    <h3 class="fw-bold">Proeficiency Language/Penguasaan Bahasa</h3>
                </div>
                <div class="">
                    @include('application-forms.penguasaan_bahasa')
                </div>
            </div>
        </div>

        <div class="container mt-5 mb-5 border border-1 shadow-sm rounded">
            <div class="mt-5 mb-5">
                <div class="mt-4 mb-4 mx-2">
                    <h3 class="fw-bold">Work Experience/Pengalaman Kerja</h3>
                </div>
                <div class="">
                    @include('application-forms.riwayat_pekerjaan')
                </div>
            </div>
        </div>

        <div class="container mt-5 mb-5 border border-1 shadow-sm rounded">
            <div class="mt-5 mb-5">
                <div class="mt-4 mb-4 mx-2">
                    <h3 class="fw-bold">Reference/Referensi</h3>
                </div>
                <div class="">
                    @include('application-forms.referensis')
                </div>
            </div>
        </div>

        <div class="container mt-5 mb-5 border border-1 shadow-sm rounded">
            <div class="mt-5 mb-5">
                <div class="mt-4 mb-4 mx-2">
                    <h3 class="fw-bold">Training Followed/Pelatihan Yang Pernah Diikuti</h3>
                </div>
                <div class="">
                    @include('application-forms.pelatihan_form')
                </div>
            </div>
        </div>

        <!-- Button trigger modal -->
        <div class="container mb-5 d-flex justify-content-center">
            <button type="button" class="btn btn-primary col-5 " data-bs-toggle="modal"
                data-bs-target="#send_application_form">
                Kirim
            </button>

            <!-- Modal -->
            <div class="modal fade" id="send_application_form" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel"><i
                                    class="fa-solid fa-triangle-exclamation" style="color: #e7eb05;"></i> Pernyataan
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mt-3 form-check">
                                <input class="form-check-input" type="checkbox" value=""
                                    id="checkbox-pernyataan" onclick="declarationCheck()">
                                <label class="form-check-label" for="flexCheckDefault">
                                    I hereby certify that the above information given by me is true to the best of my
                                    knowledge
                                    and
                                    understand that any false information contained in the above application may result
                                    in my
                                    immediate dismissal from the position gained at SATUNAMA Foundation. <br><br>

                                    <i> Saya menyatakan bahwa keterangan tersebut diatas adalah benar dan apabila ada
                                        keterangan
                                        yang
                                        tidak benar saya bersedia dikeluarkan dari posisi yang saya dapatkan di Yayasan
                                        SATUNAMA.</i>

                                </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary" id="submit-pernyataan"
                                disabled>Kirim</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</body>



</html>

<script>
    function addRowTableProficiencyLanguage() {
        var jumlah_tingkat_penguasaan_bahasa = document.getElementById('jumlah_tingkat_penguasaan_bahasa');

        const table_body = document.getElementById('table-body-penguasaan-bahasa');

        table_body.innerHTML = '';

        var language = @json($languages);

        for (var i = 1; i <= jumlah_tingkat_penguasaan_bahasa.value; i++) {
            var tr = document.createElement('tr');
            tr.innerHTML = `
        <td>
            <select class="form-select" aria-label="Default select example" name="nama_bahasa[]" id="nama_bahasa">

                <option selected disabled>Pilih</option>

                <?php
                foreach ($languages as $lang) {
                    echo '<option value="' . $lang . '">' . $lang . '</option>';
                }
                
                ?>

            </select>

        </td>
        <td>
            <select class="form-select" aria-label="Default select example" name="tingkat_penguasaan[]"
                id="tingkat_penguasaan">
                <option selected disabled>Pilih</option>
                <option value="Baik Sekali">Baik Sekali</option>
                <option value="Baik">Baik</option>
                <option value="Cukup">Cukup</option>
            </select>
        </td>

        `;

            table_body.appendChild(tr);
        }
    }

    function addRowTableTraining() {
        var jumlah_pelatihan = document.getElementById('jumlah_pelatihan');

        const table_body = document.getElementById('table-body-pelatihan');

        table_body.innerHTML = '';

        for (var i = 1; i <= jumlah_pelatihan.value; i++) {
            var tr = document.createElement('tr');
            tr.innerHTML = `
        
        <td class="col-6">
            <input type="text" class="form-control" id="subjek_pelatihan" name="subjek_pelatihan[]" placeholder="Subjek Pelatihan">
        </td>
        <td class="col-1">
            <select name="tahun_pelatihan[]" id="tahun_pelatihan" class="form-select" aria-label="Default select example">
            <?php
            $currentYear = \Carbon\Carbon::now()->format('Y');
            $startYear = 1950; // Change this to your desired start year
            
            for ($year = $currentYear; $year >= $startYear; $year--) {
                echo '<option value="' . $year . '">' . $year . '</option>';
            }
            
            ?>
            </select>
        </td>
        <td class="col-5">
            <input type="text" class="form-control" name="nama_mentor[]" id="nama_mentor" placeholder="Nama Mentor">
        </td>

        `;

            table_body.appendChild(tr);
        }
    }
</script>
