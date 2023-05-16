{{-- @foreach ($datas as $data)
    {{ $data->tesTertulis }}
@endforeach --}}

{{-- @dd($datas) --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yayasan SATUNAMA</title>
    <link rel="icon" type="image/png" href="/img/satunama-logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/admin-kelola-lowongan-style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

</head>



<body>
    @include('partials.navbar')

    @if (session()->has('success add schedule'))
        <div class="container justify-content-center col-8">
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center">
                {{ session('success add schedule') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @elseif (session()->has('success edit schedule'))
        <div class="container justify-content-center col-8">
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center">
                {{ session('success edit schedule') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    @if (count($datas) == 0)
        <div class="container justify-content-center col-8 mt-4">
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="text-align: center">
                <h3>Belum ada pelamar yang mendaftar</h3>
                <a href="/admin-dashboard/lowongan" class="btn btn-secondary mt-4" role="button">Kembali ke halaman
                    sebelumnya</a>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @else
        @if ($lowongan->closed != true)
            <div class="container mt-4 ">
                <h3 class="fw-bold">{{ $lowongan->nama_lowongan }} </h3>
                <span class="badge rounded-pill text-bg-success mb-2">Aktif</span>
                <h6>{{ $lowongan->tipe_lowongan }}</h6>
                <h6>Dibuat pada:
                    {{ \Carbon\Carbon::parse($lowongan->created_at)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, j F Y ') }}
                    | Diedit pada:
                    {{ \Carbon\Carbon::parse($lowongan->updated_at)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, j F Y ') }}
                </h6>
            </div>
            <div class="container rounded mt-4 fw-bold" style="background-color: #EAEAEA">
                <ul class="nav nav-pills mb-3 py-2 px-2 justify-content-center" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-review-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-review" type="button" role="tab" aria-controls="pills-review"
                            aria-selected="true">Review</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-seleksi-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-seleksi" type="button" role="tab" aria-controls="pills-seleksi"
                            aria-selected="false">Seleksi Berkas</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-referensi-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-referensi" type="button" role="tab"
                            aria-controls="pills-referensi" aria-selected="false">Reference Check</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-tes-tab" data-bs-toggle="pill" data-bs-target="#pills-tes"
                            type="button" role="tab" aria-controls="pills-tes" aria-selected="false">Tes Tertulis
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-wawancara-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-wawancara" type="button" role="tab"
                            aria-controls="pills-wawancara" aria-selected="false">Wawancara</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-penawaran-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-penawaran" type="button" role="tab"
                            aria-controls="pills-penawaran" aria-selected="false">Penawaran</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-direkrut-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-direkrut" type="button" role="tab"
                            aria-controls="pills-direkrut" aria-selected="false">Direkrut</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-ditolak-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-ditolak" type="button" role="tab"
                            aria-controls="pills-ditolak" aria-selected="false">Ditolak</button>
                    </li>
                </ul>
            </div>
            <div class="container mt-4">
                {{-- <div class="tab-pane fade show active" id="pills-review" role="tabpanel"
                    aria-labelledby="pills-review-tab" tabindex="0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">Nama</th>
                                <th scope="col" class="text-center">Ekspetasi Gaji
                                </th>
                                <th scope="col" class="text-center">Pendidikan Terakhir</th>
                                <th scope="col" class="text-center">Pengalaman Kerja Terakhir
                                </th>
                                <th scope="col" class="text-center">Tindakan</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($datas as $key => $data)
                                @foreach ($data->pelamar->pendidikan as $data_pelamar_pendidikan)
                                    @foreach ($data->pelamar->pengalamanKerja as $data_pelamar_pengalaman_kerja)
                                        @foreach ($data->statusLamaran as $data_status_lamaran)
                                            <tr data-href = "/admin-dashboard/lowongan/detail-pelamar/{{ $data->id_pelamar_lowongan }}">

                                                <td class="text-center">{{ $key + 1 }}</td>
                                                <td class="text-center">
                                                    {{ $data->tesTertulis->nama_pelamar }}
                                                </td>
                                                <td class="text-center">
                                                    @if ($data->pelamar->ekspetasi_gaji == null)
                                                        {{ '-' }}
                                                    @else
                                                        {{ $data_pelamar->ekspetasi_gaji }}
                                                    @endif

                                                </td>


                                                <td class="text-center">
                                                    @if ($data_pelamar_pendidikan == null)
                                                        {{ '-' }}
                                                    @else
                                                        {!! nl2br($data_pelamar_pendidikan->jenjang_pendidikan . "\n") !!}
                                                        {{ $data_pelamar_pendidikan->jurusan }}
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($data_pelamar_pengalaman_kerja == null)
                                                        {{ '-' }}
                                                    @else
                                                        {!! nl2br($data_pelamar_pengalaman_kerja->nama_perusahaan . "\n") !!}
                                                        {{ $data_pelamar_pengalaman_kerja->periode }}
                                                    @endif
                                                </td>
                                                <td class=text-center>
                                                    @if ($data_status_lamaran->status->nama_status == 'review')
                                                        <form method="post"
                                                            action="/admin-dashboard/lowongan/{{ $data_status_lamaran->id_pelamar_lowongan }}/changePosition">
                                                            @csrf

                                                        </form>
                                                        <button type="submit" class="btn btn-primary">Pindahkan
                                                            ke
                                                            Seleksi Berkas</button>
                                                        <button type="button" class="btn btn-danger">Tolak</button>
                                                    @else
                                                    @endif

                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div> --}}



                <div class="tab-content" id="pills-tabContent">
                    @include('dashboard.kelola_kandidat.review_kandidat')

                    @include('dashboard.kelola_kandidat.seleksi_berkas_kandidat')

                    @include('dashboard.kelola_kandidat.reference_check_kandidat')

                    @include('dashboard.kelola_kandidat.assesment_kandidat')

                    @include('dashboard.kelola_kandidat.wawancara_kandidat')

                    @include('dashboard.kelola_kandidat.penawaran_kandidat')

                    @include('dashboard.kelola_kandidat.direkrut_kandidat')

                    @include('dashboard.kelola_kandidat.ditolak_kandidat')

                </div>

            </div>
        @else
            <div class="container justify-content-center col-8 mt-4">
                <div class="alert alert-danger alert-dismissible fade show" role="alert"
                    style="text-align: center">
                    <h3>Belum ada pelamar yang mendaftar</h3>
                    <a href="/admin-dashboard/lowongan" class="btn btn-secondary mt-4" role="button">Kembali ke
                        halaman
                        sebelumnya</a>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

    @endif




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</body>

</html>
<script>
    function hapusData() {
        document.getElementById("formAddScheduleTest").reset();

    }

    // document.addEventListener("DOMContentLoaded", () => {
    //     const rows = document.querySelectorAll("tr[data-href]");
    //     console.log(rows);

    //     rows.forEach(row => {
    //         row.addEventListener("click", () => {
    //             window.location.href = row.dataset.href;
    //         })
    //     });

    // });

    function getData(id) {

        var button_status = document.getElementById('button_status-'+id);
        var value_button_status = button_status.getAttribute('value');

        var id_status_review_page = document.getElementById('id_status_review_page-'+id)
        id_status_review_page.value = value_button_status;

        var id_status_seleksi_page = document.getElementById('id_status_seleksi_page-'+id)
        id_status_seleksi_page.value = value_button_status;
        
        console.log(buttonElement.value);
    }
</script>
