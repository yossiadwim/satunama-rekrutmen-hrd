{{-- @dd($datas) --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yayasan SATUNAMA</title>
    <link rel="icon" type="image/png" href="/img/satunama-logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/admin-kelola-lowongan-style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/b3626122b8.js" crossorigin="anonymous"></script>

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
    @elseif (session()->has('success change position'))
        <div class="container justify-content-center col-8">
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center">
                {{ session('success change position') }}
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
            {{-- <div class="container rounded mt-4 fw-bold" style="background-color: #eaeaea">
                <ul class="nav nav-pills nav- mb-3 py-2 px-2 justify-content-center" id="pills-tab" role="tablist">
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
                            type="button" role="tab" aria-controls="pills-tes" aria-selected="false">Tes
                            Tertulis
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
            </div> --}}
            {{-- <div class="container mt-4">
                <div class="tab-pane fade show active" id="pills-review" role="tabpanel"
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



            {{-- <div class="tab-content" id="pills-tabContent">
                    @include('dashboard.kelola_kandidat.review_kandidat')

                    @include('dashboard.kelola_kandidat.seleksi_berkas_kandidat')

                    @include('dashboard.kelola_kandidat.reference_check_kandidat')

                    @include('dashboard.kelola_kandidat.assesment_kandidat')

                    @include('dashboard.kelola_kandidat.wawancara_kandidat')

                    @include('dashboard.kelola_kandidat.penawaran_kandidat')

                    @include('dashboard.kelola_kandidat.direkrut_kandidat')

                    @include('dashboard.kelola_kandidat.ditolak_kandidat')

                </div>

            </div> --}}
            <div class="container mt-5 border-bottom">
                {{-- <form action="/admin-dashboard/lowongan/{{ $lowongan->slug }}/kelola-kandidat" method="GET">
                    @csrf --}}
                <div class="row mt-3 mb-3">
                    <input type="text" value="{{ $lowongan->id }}" id="id_lowongan" hidden>
                    <div class="col-md-2">
                        <label for="">Filter by Applied Date</label>
                        <input type="date" name="date" name="filter_data" class="form-control filter"
                            id="filter_date">
                    </div>
                    <div class="col-md-2">
                        <label for="">Filter by Status</label>
                        <select class="form-select filter" aria-label="Default select example" name="filter_status"
                            id="filter_status">
                            <option value="all">All</option>
                            @foreach ($status as $data_status)
                                <option value="{{ $data_status->id }}">
                                    {{ Str::title($data_status->nama_status) }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="col-md-2 py-4">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>

                </div>
                {{-- </form> --}}
            </div>

            <div class="container mt-4 rounded " id="kandidat_container">
                <div class="row" id="kandidat">
                    @foreach ($datas as $data)
                        <div class="col-sm-3">
                            <div class="card text-center mt-4 mb-3 h-200 shadow-sm" style="width: 18rem;">
                                <div class="card-header" style="background-color: white">
                                    <span class="badge rounded-pill"
                                        style="background-color: #90c291; color: #ffffff ">{{ Str::title($data->statusLamaran[0]->status->nama_status) }}</span>
                                </div>
                                <div class="card-body">
                                    <img class="rounded-circle" height="70px" width="70px"
                                        style="border-radius: 50%; object-fit: cover;"
                                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                                    <h5 class="card-title">{{ $data->pelamar->nama_pelamar }}
                                    </h5>

                                    <p class="card-text mt-1"><i class="fa-solid fa-location-dot"></i>
                                        {{ $data->pelamar->alamat }}</p>
                                    <p>Melamar pada
                                        {{ \Carbon\Carbon::parse($data->tanggal_melamar)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, j F Y ') }}
                                    </p>
                                    <a href="/admin-dashboard/lowongan/detail-pelamar/{{ $data->id_pelamar_lowongan }}"
                                        class="btn" style="background-color: #90c291; outline-color: #90c291">Lihat
                                        Detail </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

</body>

</html>
<script>
    function hapusData() {
        document.getElementById("formAddScheduleTest").reset();
    }

    function getData(id) {

        // var button_status = document.getElementById('button_status-' + id);
        // var value_button_status = button_status.getAttribute('value');

        // var id_status_review_page = document.getElementById('id_status_review_page-' + id)
        // id_status_review_page.value = value_button_status;

        var button_status_seleksi = document.getElementById('button_status_seleksi-' + id);
        var value_button_status_seleksi = button_status_seleksi.getAttribute('value');

        var id_status_seleksi_page = document.getElementById('id_status_seleksi_page-' + id)
        id_status_seleksi_page.value = value_button_status_seleksi;

    }

    // var jobs = JSON.parse("{{ $datas }}".replace(/&quot;/g,'"'));
    //     console.log(jobs);
    // for (let x in jobs) {
    //     console.log(jobs[x]['status_lamaran'][0]["status"]["nama_status"]);
    // }

    $('.filter').on('change', function() {
        var filter_date = $('#filter_date').val();
        var filter_status = $('#filter_status').val();
        // var id_lowongan = $('#id_lowongan').val();

        // filter(filter_date, filter_status, id_lowongan);
        // console.log([filter_date, filter_status]);
        filter(filter_date, filter_status)

    })



    function getDateMonth(tgl_melamar) {

        var list_hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        var list_bulan = {
            'January': 'Januari',
            'February': 'Februari',
            'March': 'Maret',
            'April': 'April',
            'May': 'Mei',
            'June': 'Juni',
            'July': 'Juli',
            'August': 'Agustus',
            'September': 'September',
            'October': 'Oktober',
            'November': 'November',
            'December': 'Desember'
        }

        var tanggal_melamar = new Date(tgl_melamar)
        var bulan = tanggal_melamar.toLocaleString('default', {
            month: 'long'
        })


        var bulan = list_bulan[bulan]
        var hari = list_hari[tanggal_melamar.getDay()]
        var tahun = tanggal_melamar.getFullYear()
        var tanggal = tanggal_melamar.getDate()

        var tanggal_lengkap = hari + ', ' + tanggal + ' ' + bulan + ' ' + tahun
        return tanggal_lengkap;
    }

    function titleCase(string) {
        var sentence = string.toLowerCase().split(" ");
        for (var i = 0; i < sentence.length; i++) {
            sentence[i] = sentence[i][0].toUpperCase() + sentence[i].slice(1);
        }
        return sentence.join(" ");
    }


    function filter(tanggal = "", status = "") {
        var datas = JSON.parse("{{ $datas }}".replace(/&quot;/g, '"'));

        document.getElementById("kandidat").innerHTML = ""
        var dict = {};

        getDateMonth(tanggal)



        if (tanggal != "" || tanggal == "" && status != "") {

            //tanggal tdk sama dengan kosong atau tanggal sama dengan kosong dan status tidak sama dengan kosong

            for (let x in datas) {

                if ((new Date(datas[x]["tanggal_melamar"]).toLocaleDateString() == new Date(tanggal)
                        .toLocaleDateString()) && status == datas[x]['status_lamaran'][0]["status"]["id"]) {
                    dict[x] = {
                        "nama_status": datas[x]['status_lamaran'][0]["status"]["nama_status"],
                        "nama_pelamar": datas[x]["pelamar"]["nama_pelamar"],
                        "alamat": datas[x]["pelamar"]["alamat"],
                        "tanggal_melamar": getDateMonth(datas[x]["tanggal_melamar"]),
                        "id_pelamar_lowongan": datas[x]["id_pelamar_lowongan"]
                    }
                    console.log('5')
                } else if (status == datas[x]['status_lamaran'][0]["status"]["id"]) {
                    dict[x] = {
                        "nama_status": datas[x]['status_lamaran'][0]["status"]["nama_status"],
                        "nama_pelamar": datas[x]["pelamar"]["nama_pelamar"],
                        "alamat": datas[x]["pelamar"]["alamat"],
                        "tanggal_melamar": getDateMonth(datas[x]["tanggal_melamar"]),
                        "id_pelamar_lowongan": datas[x]["id_pelamar_lowongan"]
                    }
                    console.log("6");
                } else if (status == "all") {
                    dict[x] = {
                        "nama_status": datas[x]['status_lamaran'][0]["status"]["nama_status"],
                        "nama_pelamar": datas[x]["pelamar"]["nama_pelamar"],
                        "alamat": datas[x]["pelamar"]["alamat"],
                        "tanggal_melamar": getDateMonth(datas[x]["tanggal_melamar"]),
                        "id_pelamar_lowongan": datas[x]["id_pelamar_lowongan"]
                    }
                    console.log("7");
                } 
                // else if (status == datas[x]['status_lamaran'][0]["status"]["id"] && (new Date(datas[x][
                //             "tanggal_melamar"
                //         ]).toLocaleDateString() != new Date(tanggal)
                //         .toLocaleDateString())) {
                //     dict[x] = {
                //         "message": '<div class="" style="text-align: center">' +
                //             '<div class = "mt-4">' +
                //             '<i class = "fa-solid fa-magnifying-glass fa-2xl" > < /i> ' +
                //             '</div > <div class = " mt-3" >' +
                //         '<h5> Data tidak ditemukan </h5> </div> </div>'
                //     }
                //     console.log("8");
                // }
            }

        }

        for (let x in dict) {

                document.getElementById("kandidat").innerHTML +=
                    `<div class="col-sm-3">
            <div class="card text-center mt-4 mb-3 h-200 shadow-sm" style="width: 18rem;">
                <div class="card-header" style="background-color: white">
                    <span class="badge rounded-pill"
                        style="background-color: #90c291; color: #ffffff ">` + titleCase(dict[x][
                        "nama_status"
                    ]) + `</span>
                </div>
                <div class="card-body">
                    <img class="rounded-circle" height="70px" width="70px"
                        style="border-radius: 50%; object-fit: cover;"
                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    <h5 class="card-title">` + dict[x]["nama_pelamar"] + `
                    </h5>

                    <p class="card-text mt-1"><i class="fa-solid fa-location-dot"></i>
                        ` + dict[x]["alamat"] + `</p>
                    <p>Melamar pada ` + dict[x]["tanggal_melamar"] + `</p>

                    <a href="/admin-dashboard/lowongan/detail-pelamar/` + dict[x]["id_pelamar_lowongan"] + `"
                        class="btn" style="background-color: #90c291; outline-color: #90c291">Lihat
                        Detail </a>
                </div>
            </div>
        </div>`

        }

    }
</script>
