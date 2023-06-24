{{-- @foreach ($religions as $religion)
    {{ $religion->nama_agama }}
@endforeach --}}

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
</head>

<body style="font-family: Poppins;">
    @include('partials.navbar')

    <div class="container mt-5 mb-5 ">
        <div class="mt-4">
            <h3 class="fw-bold">Personal Data</h3>
        </div>
        <div class="row mt-5">
            <div class="col-3 d-flex justify-content-center align-items-center">
                <p>Posisi yang dilamar</p>
            </div>
            <div class="col-9">
                <div class="form-floating">
                    <input type="email" class="form-control" name="posisi" id="floatingInput"
                        placeholder="Posisi yang dilamar" value="{{ $datas[0]->lowongan->nama_lowongan }}">
                    <label for="floatingInput">Posisi yang dilamar</label>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-3 d-flex justify-content-center align-items-center">
                <p>Gaji yang diharapkan</p>
            </div>
            <div class="col-9">
                <div class="form-floating">
                    <input type="text" class="form-control currency" id="gaji"
                        placeholder="Gaji yang diharapkan" name="ekspetasi_gaji" oninput="formatCurrency(this)">
                    <label for="gaji">Gaji yang diharapkan</label>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-3 d-flex justify-content-center align-items-center">
                <p>Nama Pelamar</p>
            </div>
            <div class="col-9">
                <div class="form-floating">
                    <input type="text" class="form-control" id="nama_pelamar" name="nama_pelamar"
                        placeholder="Nama Pelamar" value="{{ $datas[0]->pelamar->nama_pelamar }}">
                    <label for="nama_pelamar">Nama Pelamar</label>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-3 d-flex justify-content-center align-items-center">
                <p>Alamat</p>
            </div>
            <div class="col-9">
                <div class="form-floating">
                    <input type="text" class="form-control" id="alamat" placeholder="Alamat"
                        value="{{ $datas[0]->pelamar->alamat }}">
                    <label for="nama_pelamar">Alamat</label>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-3 d-flex justify-content-center align-items-center">
                <p>Alamat Tetap</p>
            </div>
            <div class="col-9">
                <div class="form-floating">
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat"
                        value="{{ $datas[0]->pelamar->alamat }}">
                    <label for="nama_pelamar">Alamat</label>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-3 d-flex justify-content-center align-items-center">
                <p>Telepon Rumah</p>
            </div>
            <div class="col-9">
                <div class="form-floating">
                    <input type="text" class="form-control" id="telepon_rumah" name="telepon_rumah"
                        placeholder="Telepon Rumah" value="{{ $datas[0]->pelamar->telepon_rumah }}">
                    <label for="telepon_rumah">Telepon Rumah</label>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-3 d-flex justify-content-center align-items-center">
                <p>Telepon Kantor</p>
            </div>
            <div class="col-9">
                <div class="form-floating">
                    <input type="text" class="form-control" id="telpon_kantor" name="telepon_kantor"
                        placeholder="Telepon Kantor"
                        value="{{ $datas[0]->pelamar->telepon_kantor == null ? '-' : $datas[0]->pelamar->telpon_kantor }}">
                    <label for="telepon_kantor">Telepon Kantor</label>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-3 d-flex justify-content-center align-items-center">
                <p>Jenis Kelamin</p>
            </div>
            <div class="col-4">
                <div class="form-floating">
                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin"
                        aria-label="Floating label select example">
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
            <div class="col-9">
                <div class="form-floating">
                    <input type="text" class="form-control" id="suku" name="suku" placeholder="suku"
                        value="{{ $datas[0]->pelamar->suku == null ? '-' : $datas[0]->pelamar->suku }}">
                    <label for="suku">Suku/Keturunan</label>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-3 d-flex justify-content-center align-items-center">
                <p>Keangsaan/Warga Negara</p>
            </div>

            <div class="col-9">
                <div class="form-floating">
                    <select class="form-select selectpicker" data-live-search="true" data-show-subtext="true"
                        id="kebangsaan" name="kebangsaan" aria-label="Floating label select example">
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
                    <select class="form-select" id="agama" name="agama"
                        aria-label="Floating label select example">
                        <option value="" selected disabled>Pilih</option>
                        @foreach ($religions as $religion)
                            <option value="{{ $religion->id_agama }}">{{ $religion->nama_agama }}</option>
                        @endforeach
                    </select>
                    <label for="agama">Agama</label>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-3 d-flex justify-content-center align-items-center">
                <p>Tempat Lahir</p>
            </div>
            <div class="col-9">
                <div class="form-floating">
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                        placeholder="tempat_lahir"
                        value="{{ $datas[0]->pelamar->tempat_lahir == null ? '-' : $datas[0]->pelamar->tempat_lahir }}">
                    <label for="tempat_lahir">Tempat Lahir</label>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-3 d-flex justify-content-center align-items-center">
                <p>Tanggal Lahir</p>
            </div>
            <div class="col-4">
                <div class="form-floating">
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                        placeholder="Tanggal Lahir" value="{{ $datas[0]->pelamar->tanggal_lahir }}">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-3 d-flex justify-content-center align-items-center">
                <p>Tinggi Badan</p>
            </div>
            <div class="col-4">
                <div class="form-floating">
                    <input type="text" class="form-control" id="tinggi_badan" name="tinggi_badan"
                        placeholder="Tinggi Badan"
                        value="{{ $datas[0]->pelamar->tinggi_badan == null ? '-' : $datas[0]->pelamar->tinggi_badan }}">
                    <label for="tanggal_lahir">Tinggi Badan (cm)</label>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-3 d-flex justify-content-center align-items-center">
                <p>Berat Badan</p>
            </div>
            <div class="col-4">
                <div class="form-floating">
                    <input type="text" class="form-control" id="berat_badan" name="berat_badan"
                        placeholder="Tanggal Lahir"
                        value="{{ $datas[0]->pelamar->berat_badan == null ? '-' : $datas[0]->pelamar->berat_badan }}">
                    <label for="berat_badan">Berat Badan (kg)</label>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-3 d-flex justify-content-center align-items-center">
                <p>Status Kawin</p>
            </div>
            <div class="col-4">
                <div class="form-floating">
                    <select class="form-select" id="status_kawin" name="status_kawin"
                        aria-label="Floating label select example">
                        <option selected disabled>Pilih</option>
                        <option value="belum_kawin">Belum Kawin</option>
                        <option value="kawin">Kawin</option>
                        <option value="cerai_hidup">Cerai Hidup</option>
                        <option value="cerai_mati">Cerai Mati</option>
                    </select>
                    <label for="status_kawin">Status Kawin</label>
                </div>

            </div>
        </div>
        <div class="row mt-5">
            <div class="col-3 d-flex justify-content-center align-items-center">
                <p>Nama Suami/Istri</p>
            </div>
            <div class="col-9">
                <div class="form-floating">
                    <input type="text" class="form-control" id="nama_pasangan" name="nama_pasangan"
                        placeholder="Nama Suami/Istri"
                        value="{{ $datas[0]->pelamar->nama_pasangan == null ? '-' : $datas[0]->pelamar->nama_pasangan }}">
                    <label for="nama_pasangan">Nama Suami/Istri</label>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-3 d-flex justify-content-center align-items-center">
                <p>Anak</p>
            </div>
            <div class="col-9">
                @include('application-forms.tambah-anak')
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-3 d-flex justify-content-center align-items-center">
                <p>Keluarga</p>
            </div>
            <div class="col-9">
                @include('application-forms.tambah-anggota-keluarga')
            </div>


        </div>
        <div class="row mt-5">
            <div class="col-3 d-flex justify-content-center align-items-center">
                <p>Hobi</p>
            </div>
            <div class="col-9">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="hobi" name="hobi" placeholder="Hobi">
                    <label for="hobi">Hobi</label>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-3 d-flex justify-content-center align-items-center">
                <p>Organisasi Yang Pernah Diikuti</p>
            </div>
            <div class="col-9">
                @include('application-forms.tambah-organisasi')
            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/currency-input/1.5.0/jquery.currency-input.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0/js/bootstrap-select.min.js"></script> --}}

</body>

</html>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<script>
    $(document).ready(function() {
        $("#button_tambah_anak").click(function(e) {
            e.preventDefault();
            $("#tambah_anak").prepend(`<div class="row ">
                            <div class="col-5">
                                <div class="form-floating mt-3 mb-3">
                                    <input type="text" class="form-control" id="nama_anak1" name="nama_anak1"
                                        placeholder="Nama Anak">
                                    <label for="nama_anak1">Nama Anak</label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-floating mt-3 mb-3">
                                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin1"
                                        aria-label="Floating label select example">
                                        <option value="" selected disabled>Pilih</option>
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>

                                    </select>
                                    <label for="floatingSelect">Jenis Kelamin</label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-floating mt-3 mb-3">
                                    <input type="text" class="form-control" id="umur1" name="umur1"
                                        placeholder="Umur">
                                    <label for="umur">Umur</label>
                                </div>
                            </div>
                            <div class="col-3">
                                <button type="button" id="hapus_tambah_anak" class="btn btn-danger mt-3"><i
                                        class="fa-solid fa-trash" style="color: #ffffff;"></i>
                                    Hapus</button>
                            </div>
                        </div>`);
        });

        $(document).on('click', '#hapus_tambah_anak', function(e) {
            e.preventDefault();
            let row_item = $(this).parent().parent();
            $(row_item).remove();
        })
    });

    $(document).ready(function() {
        $("#button_tambah_organisasi").click(function(e) {
            e.preventDefault();
            $("#tambah_pengalaman_organisasi").prepend(`<div class="form-floating mt-3 mb-3">
                            <input type="text" class="form-control" id="nama_organisasi1" name="nama_organisasi1"
                                placeholder="Nama Organisasi">
                            <label for="nama_organisasi1">Nama Organisasi</label>
                        </div>


                        <div class="form-floating mt-3 mb-3">
                            <input type="text" class="form-control" id="posisi1" name="posisi1"
                                placeholder="Posisi">
                            <label for="posisi1">Posisi</label>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-floating mt-3 mb-3">
                                    <select class="form-select" id="tahun_mulai1" name="tahun_mulai1"
                                        aria-label="Floating label select example">
                                        <option value="" selected disabled>Pilih</option>
                                        @foreach (range(date('Y'), date('Y') - 73) as $year)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endforeach

                                    </select>
                                    <label for="tahun_mulai1">Tahun Mulai</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating mt-3 mb-3">
                                    <select class="form-select" id="tahun_akhir1" name="tahun_akhir1"
                                        aria-label="Floating label select example">
                                        <option value="" selected disabled>Pilih</option>
                                        @foreach (range(date('Y'), date('Y') - 73) as $year)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endforeach

                                    </select>
                                    <label for="tahun_akhir1">Tahun Berakhir</label>
                                </div>
                            </div>
                        </div>
                        <div>
                        <button type="button" id="button_hapus_organisasi" class="btn btn-danger mt-3"><i
                                class="fa-solid fa-trash" style="color: #ffffff;"></i>
                        Hapus</button></div>`);
        });

        $(document).on('click', '#button_hapus_organisasi', function(e) {
            e.preventDefault();
            let row_item = $(this).parent();
            console.log(row_item);
            $(row_item).remove();
        })
    });



    function formatCurrency(input) {
        // Get input value and remove non-numeric characters
        let value = input.value.replace(/[^\d]/g, '');

        // Format the value with IDR currency format
        let formattedValue = formatIDRCurrency(value);

        // Update the input value with the formatted currency value
        input.value = formattedValue;
    }

    function formatIDRCurrency(value) {
        // Check if value is empty or not a number
        if (value === '' || isNaN(value)) {
            return '';
        }

        // Convert the value to a number and apply currency formatting
        let formatter = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        });

        return formatter.format(Number(value));
    }

</script>
