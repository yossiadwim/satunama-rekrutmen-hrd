{{-- @dd($datas) --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SATUNAMA | {{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/admin-dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/b3626122b8.js" crossorigin="anonymous"></script>
</head>

<body style="font-family: Poppins">
    @include('partials.navbar')
    @if (session()->has('success change position'))
        <div class="container justify-content-center col-8 mt-2">
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center">
                {{ session('success change position') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <div class="container mt-5">
        <div class="row">
            <div class="">
                <h4 class="fw-bold">{{ $datas->lowongan->nama_lowongan }}</h4>
            </div>
            <div class="card border-light mt-4 mb-4 col-lg-9">
                <div class="card-body">
                    <div class="mt-2">
                        <h4 class="fw-bold">{{ $datas->pelamar->nama_pelamar }} | <span
                                class="badge rounded-pill text-bg-success fw-normal fs-6">{{ Str::title($datas->statusLamaran[0]->status->nama_status) }}</span>
                        </h4>
                        <p>Melamar
                            {{ \Carbon\Carbon::parse($datas->tanggal_melamar)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, j F Y ') }}
                        </p>
                    </div>
                    <div class="row mt-2">
                        @if ($datas->pelamar->telepon_rumah == null)
                            <div class="col-md-6">
                                <label class="labels fw-bold"><i class="fa-solid fa-phone"></i> Nomor
                                    Telepon</label>
                                <p>{{ '-' }}</p>
                            </div>
                        @else
                            <div class="col-md-6">
                                <label class="labels fw-bold"><i class="fa-solid fa-phone"></i> Nomor
                                    Telepon</label>
                                <p>{{ $datas->pelamar->telepon_rumah }}</p>
                            </div>
                        @endif
                        <div class="col-md-6">
                            <label class="labels fw-bold"><i class="fa-solid fa-envelope"></i>
                                Email</label>
                            <p>{{ $datas->pelamar->email }}</p>
                        </div>
                    </div>
                    <div class="row mt-2">

                        @if ($datas->pelamar->alamat == null && $datas->pelamar->tanggal_lahir == null)
                            <div class="col-md-6">
                                <label class="labels fw-bold"><i class="fa-solid fa-location-dot"></i> Alamat</label>
                                <p>{{ '-' }}</p>

                            </div>
                            <div class="col-md-6">
                                <label class="labels fw-bold"><i class="fa-regular fa-calendar-days"></i> Tanggal
                                    Lahir</label>
                                <p>{{ '-' }}</p>
                            </div>
                        @else
                            <div class="col-md-6">
                                <label class="labels fw-bold"><i class="fa-solid fa-location-dot"></i> Alamat</label>
                                <p>{{ $datas->pelamar->alamat }}</p>

                            </div>
                            <div class="col-md-6">
                                <label class="labels fw-bold"><i class="fa-regular fa-calendar-days"></i> Tanggal
                                    Lahir</label>
                                <p>{{ \Carbon\Carbon::parse($datas->pelamar->tanggal_lahir)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('j F Y ') }}
                                </p>
                            </div>
                        @endif
                    </div>

                    <div class="row mt-2">
                        @if ($datas->pelamar->kebangsaan == null)
                            <div class="col-md-6">
                                <label class="labels fw-bold"><i class="fa-solid fa-globe"></i>
                                    Kebangsaan</label>
                                <p>{{ '-' }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="labels fw-bold"><i class="fa-solid fa-user"></i>
                                    Jenis Kelamin</label>
                                <p>{{ '-' }}</p>
                            </div>
                        @else
                            <div class="col-md-6">
                                <label class="labels fw-bold"><i class="fa-solid fa-globe"></i>
                                    Kebangsaan</label>
                                <p>{{ $datas->pelamar->kebangsaan }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="labels fw-bold"><i class="fa-solid fa-user"></i>
                                    Jenis Kelamin</label>
                                <p>{{ $datas->pelamar->jenis_kelamin }}</p>
                            </div>
                        @endif
                    </div>
                    <div class="mt-3 mb-3">
                        @if ($datas->statusLamaran[0]->status->nama_status == 'reference check')
                            <a class="btn btn-primary mt-3"
                                href="/admin-dashboard/lowongan/{{ $datas->id_pelamar_lowongan }}/reference-check"
                                role="button">Lakukan Reference Check</a>
                        @elseif ($datas->statusLamaran[0]->status->nama_status == 'tes')
                            <a class="btn btn-primary mt-3"
                                href="/admin-dashboard/lowongan/{{ $datas->id_pelamar_lowongan }}/assesment"
                                role="button">Jadwalkan Tes</a>
                        @endif
                    </div>
                    <div>
                        <div class="accordion accordion-flush mt-4" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button border-bottom border-2 fw-bold" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#deskripsi" aria-expanded="true"
                                        aria-controls="panelsStayOpen-collapseOne" style="color: #2b8f38">
                                        DESKRIPSI
                                    </button>

                                </h2>
                                <div id="deskripsi" class="accordion-collapse collapse show">
                                    <div class="accordion-body">
                                        {!! $datas->pelamar->deskripsi !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion accordion-flush mt-4" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button border-bottom border-2 fw-bold" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#pengalamanKerja" aria-expanded="true"
                                        aria-controls="panelsStayOpen-collapseOne" style=" color: #2b8f38">
                                        PENGALAMAN KERJA
                                    </button>

                                </h2>
                                <div id="pengalamanKerja" class="accordion-collapse collapse show">
                                    <div class="accordion-body">
                                        @if (in_array($datas->pelamar->id, $arrPengalamanId))
                                            @foreach ($datas->pelamar->pengalamanKerja as $data_pengalaman_kerja)
                                                <div class="border-start px-3 border-4 border-secondary">
                                                    <p class="fw-bold">
                                                        {{ $data_pengalaman_kerja->nama_perusahaan }}
                                                    </p>
                                                    <p>{{ $data_pengalaman_kerja->jabatan }}
                                                    </p>
                                                    <p>{{ $data_pengalaman_kerja->periode }}
                                                    </p>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="d-flex justify-content-center">
                                                <p>Belum ada data yang ditambahkan</p>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion accordion-flush mt-4" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button border-bottom border-2 fw-bold" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#pendidikan" aria-expanded="true"
                                        aria-controls="panelsStayOpen-collapseOne" onclick="changeColor(3)"
                                        style=" color: #2b8f38">
                                        PENDIDIKAN
                                    </button>

                                </h2>
                                <div id="pendidikan" class="accordion-collapse collapse show">
                                    <div class="accordion-body">
                                        @if (in_array($datas->pelamar->id, $arrPendidikanId))
                                            @foreach ($datas->pelamar->pendidikan as $data_status_pendidikan)
                                                <div class="border-start px-3 border-4 border-secondary">
                                                    <p>Jenjang:
                                                        {{ $data_status_pendidikan->jenjang_pendidikan }}
                                                    </p>
                                                    <p>Jurusan:
                                                        {{ $data_status_pendidikan->jurusan }}
                                                    </p>
                                                    <p>IPK: {{ $data_status_pendidikan->ipk }}
                                                    </p>

                                                </div>
                                            @endforeach
                                        @else
                                            <div class="d-flex justify-content-center">
                                                <p>Belum ada data yang ditambahkan</p>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion accordion-flush mt-4 mb-5" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button border-bottom border-2 fw-bold" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#dokumen" aria-expanded="true"
                                        aria-controls="panelsStayOpen-collapseOne" onclick="changeColor(4)"
                                        style="color: #2b8f38">
                                        DOKUMEN
                                    </button>

                                </h2>
                                <div id="dokumen" class="accordion-collapse collapse show">
                                    <div class="accordion-body">
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                @foreach ($datas->dokumenPelamarLowongan as $dd)
                                                    @if ($dd->id_dokumen == 1)
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link active" id="resume-tab"
                                                                data-bs-toggle="tab"
                                                                data-bs-target="#tab-pane-seleksi-{{ $dd->id_dokumen }}"
                                                                type="button" role="tab"
                                                                aria-selected="true">{{ \Illuminate\Support\Str::limit($dd->dokumenPelamar->nama, $limit = 20, '...') }}</button>
                                                        </li>
                                                    @else
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link " id="resume-tab"
                                                                data-bs-toggle="tab"
                                                                data-bs-target="#tab-pane-seleksi-{{ $dd->id_dokumen }}"
                                                                type="button"
                                                                role="tab">{{ \Illuminate\Support\Str::limit($dd->dokumenPelamar->nama, $limit = 20, '...') }}</button>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </nav>
                                        <div class="tab-content" id="nav-tabContent">
                                            @foreach ($datas->dokumenPelamarLowongan as $dd)
                                                @if ($dd->id_dokumen == 1)
                                                    <div class="tab-pane fade show active"
                                                        id="tab-pane-seleksi-{{ $dd->id_dokumen }}" role="tabpanel"
                                                        aria-labelledby="home-tab" tabindex="0">
                                                        <embed
                                                            src="{{ asset('storage/' . $dd->dokumenPelamar->dokumen) }}"
                                                            type="application/pdf" width="100%" height="800px" />
                                                    </div>
                                                @else
                                                    <div class="tab-pane fade"
                                                        id="tab-pane-seleksi-{{ $dd->id_dokumen }}" role="tabpanel"
                                                        aria-labelledby="home-tab" tabindex="0">
                                                        <embed
                                                            src="{{ asset('storage/' . $dd->dokumenPelamar->dokumen) }}"
                                                            type="application/pdf" width="100%" height="800px" />
                                                    </div>
                                                @endif
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card mt-4 mb-4  ms-auto" style="width: 20rem; ">
                    <div class="card-body">
                        <h5 class="card-title">Status Lamaran</h5>
                        <p class="card-text">
                            {{ Str::title($datas->statusLamaran[0]->status->nama_status) }}</p>
                        <hr>
                        <div class="row">
                            <div class="col dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Pindahkan Ke
                                </button>
                                <ul class="dropdown-menu">
                                    @foreach ($status as $stat)
                                        <li>
                                            @if ($datas->statusLamaran[0]->status->nama_status != $stat->nama_status)
                                                <button type="button" class="btn" data-bs-toggle="modal"
                                                    data-bs-target="#id-seleksi-{{ $stat->id }}"
                                                    value="{{ $stat->id }}"
                                                    id="button_status_seleksi-{{ $stat->id }}">{{ Str::title($stat->nama_status) }}</button>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                                @foreach ($status as $stat)
                                    <div class="modal fade" id="id-seleksi-{{ $stat->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                        Apa sudah yakin?</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Pelamar akan dipindahkan ke
                                                    {{ Str::title($stat->nama_status) }}

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form
                                                        action="/admin-dashboard/lowongan/{{ $datas->statusLamaran[0]->id_status_lamaran }}/changePosition"
                                                        method="POST" id="changePosition">
                                                        @csrf
                                                        <input type="date" name="tanggal" id="tanggal"
                                                            value="{{ date('Y-m-d') }}" hidden>
                                                        <input type="text" name="approved_by" id="approved_by"
                                                            value="{{ auth()->user()->id_karyawan }}" hidden>

                                                        <input type="text" name="id_pelamar_lowongan"
                                                            value="{{ $datas->id_pelamar_lowongan }}" hidden>

                                                        <input type="text" name="nama_pelamar" id="nama_pelamar"
                                                            value="{{ $datas->pelamar->nama_pelamar }}" hidden>

                                                        <form action="/sendEmail" method="POST" id="sendEmail">
                                                            @csrf

                                                            <input type="email" name="email" id="email"
                                                                value="{{ $datas->pelamar->email }}" hidden>

                                                            <input type="text" name="status_kandidat"
                                                                id="status_kandidat" value="{{ $stat->nama_status }}"
                                                                hidden>

                                                            <button class="btn btn-primary" type="submit"
                                                                name="id_status"
                                                                id="id_status_seleksi_page-{{ $stat->id }}"
                                                                onclick="getData({{ $stat->id }});">Pindahkan
                                                            </button>

                                                        </form>

                                                    </form>


                                                    {{-- <form action="/sendEmail" method="POST">
                                                        @csrf

                                                        <input type="email" name="email" id="email"
                                                            value="{{ $datas->pelamar->email }}" hidden>

                                                        <input type="text" name="status_kandidat" id="status_kandidat" 
                                                            hidden>

                                                    </form> --}}

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-outline-dark">Tolak</button>
                            </div>
                        </div>

                    </div>


                </div>
                <div class="card mt-4 mb-4" style="width: 20rem; max-height: 400px">
                    <div class="card-header">
                        <h5 class="card-title">Riwayat Aktivitas</h5>
                        <p class="card-text mb-2 text-body-secondary">Menampilkan
                            {{ count($datas->activityLog) }} aktivitas</p>

                    </div>
                    <div class="card-body overflow-auto">

                        @foreach ($datas->activityLog->sortDesc() as $data_activity)
                            <p>- <strong>{!! $datas->statusLamaran[0]->karyawan->nama_karyawan !!}</strong>
                                memproses
                                pelamar ini ke tahap

                                <strong>{{ Str::title($data_activity->status[0]->nama_status) }}</strong>
                                pada
                                {{ \Carbon\Carbon::parse($data_activity->created_at)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, j F Y H:i') }}
                            </p>
                        @endforeach
                    </div>
                </div>



            </div>

        </div>

        {{-- <div class="container mb-4 border rounded ">
            <nav class="mt-4 ">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab"
                        data-bs-target="#detail-pelamar-{{ $datas->pelamar->id }}" type="button" role="tab"
                        aria-controls="nav-profile" aria-selected="false">Detail
                        Pelamar</button>

                    <button class="nav-link " id="nav-home-tab" data-bs-toggle="tab"
                        data-bs-target="#status-lamaran-{{ $datas->statusLamaran[0]->id_status_lamaran }}"
                        type="button" role="tab" aria-controls="nav-home" aria-selected="true">Status
                        Lamaran</button>

                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show" id="status-lamaran-{{ $datas->statusLamaran[0]->id_status_lamaran }}"
                    role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                    <div class="container  d-flex">
                        <div class="card mt-4 mb-4 h-100" style="width: 20rem; ">
                            <div class="card-body">
                                <h5 class="card-title">Status Lamaran</h5>
                                <p class="card-text">
                                    {{ Str::title($datas->statusLamaran[0]->status->nama_status) }}</p>
                                <hr>
                                <div class="row">
                                    <div class="col dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Pindahkan Ke
                                        </button>
                                        <ul class="dropdown-menu">
                                            @foreach ($status as $stat)
                                                <li>
                                                    @if ($datas->statusLamaran[0]->status->nama_status != $stat->nama_status)
                                                        <button type="button" class="btn" data-bs-toggle="modal"
                                                            data-bs-target="#id-seleksi-{{ $stat->id }}"
                                                            value="{{ $stat->id }}"
                                                            id="button_status_seleksi-{{ $stat->id }}">
                                                            {{ Str::title($stat->nama_status) }}
                                                        </button>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                        @foreach ($status as $stat)
                                            <div class="modal fade" id="id-seleksi-{{ $stat->id }}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                Apa sudah yakin?</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Pelamar akan dipindahkan ke
                                                            {{ Str::title($stat->nama_status) }}

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <form
                                                                action="/admin-dashboard/lowongan/{{ $datas->statusLamaran[0]->id_status_lamaran }}/changePosition"
                                                                method="POST">
                                                                @csrf
                                                                <input type="date" name="tanggal" id="tanggal"
                                                                    value="{{ date('Y-m-d') }}" hidden>
                                                                <input type="text" name="approved_by"
                                                                    id="approved_by"
                                                                    value="{{ auth()->user()->id_karyawan }}" hidden>

                                                                <input type="text" name="id_pelamar_lowongan"
                                                                    value="{{ $datas->id_pelamar_lowongan }}" hidden>
                                                                <button class="btn btn-primary" type="submit"
                                                                    name="id_status"
                                                                    id="id_status_seleksi_page-{{ $stat->id }}"
                                                                    onclick="getData({{ $stat->id }})">Pindahkan
                                                                </button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-outline-dark">Tolak</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card mt-4 mb-4 mx-5 " style="width: 20rem; max-height: 400px">
                            <div class="card-header">
                                <h5 class="card-title">Riwayat Aktivitas</h5>
                                <p class="card-text mb-2 text-body-secondary">Menampilkan
                                    {{ count($datas->activityLog) }} aktivitas</p>

                            </div>
                            <div class="card-body overflow-auto">

                                @foreach ($datas->activityLog as $data_activity)
                                    <p>- <strong>{!! $datas->statusLamaran[0]->karyawan->nama_karyawan !!}</strong>
                                        memproses
                                        pelamar ini ke tahap

                                        <strong>{{ Str::title($data_activity->status[0]->nama_status) }}</strong>
                                        pada
                                        {{ \Carbon\Carbon::parse($data_activity->created_at)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, j F Y ') }}
                                    </p>
                                @endforeach
                            </div>
                        </div>

                    </div>

                </div>
                <div class="tab-pane fade show active" id="detail-pelamar-{{ $datas->pelamar->id }}" role="tabpanel"
                    aria-labelledby="nav-profile-tab" tabindex="0">

                    <div class="accordion mt-4" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#deskripsi" aria-expanded="true"
                                    aria-controls="panelsStayOpen-collapseOne">
                                    Deskripsi
                                </button>
                            </h2>
                            <div id="deskripsi" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                    {!! $datas->pelamar->deskripsi !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion mt-4" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#pengalamanKerja" aria-expanded="true"
                                    aria-controls="panelsStayOpen-collapseOne">
                                    PENGALAMAN KERJA
                                </button>

                            </h2>
                            <div id="pengalamanKerja" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                    @if (in_array($datas->pelamar->id, $arrPengalamanId))
                                        @foreach ($datas->pelamar->pengalamanKerja as $data_pengalaman_kerja)
                                            <div class="border-start px-3 border-4 border-secondary">
                                                <p class="fw-bold">
                                                    {{ $data_pengalaman_kerja->nama_perusahaan }}
                                                </p>
                                                <p>{{ $data_pengalaman_kerja->jabatan }}
                                                </p>
                                                <p>{{ $data_pengalaman_kerja->periode }}
                                                </p>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="d-flex justify-content-center">
                                            <p>Belum ada data yang ditambahkan</p>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion mt-4" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#pendidikan" aria-expanded="true"
                                    aria-controls="panelsStayOpen-collapseOne">
                                    PENDIDIKAN
                                </button>

                            </h2>
                            <div id="pendidikan" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                    @if (in_array($datas->pelamar->id, $arrPendidikanId))
                                        @foreach ($datas->pelamar->pendidikan as $data_status_pendidikan)
                                            <div class="border-start px-3 border-4 border-secondary">
                                                <p>Jenjang:
                                                    {{ $data_status_pendidikan->jenjang_pendidikan }}
                                                </p>
                                                <p>Jurusan:
                                                    {{ $data_status_pendidikan->jurusan }}
                                                </p>
                                                <p>IPK: {{ $data_status_pendidikan->ipk }}
                                                </p>

                                            </div>
                                        @endforeach
                                    @else
                                        <div class="d-flex justify-content-center">
                                            <p>Belum ada data yang ditambahkan</p>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion mt-4 mb-5" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#dokumen" aria-expanded="true"
                                    aria-controls="panelsStayOpen-collapseOne">
                                    DOKUMEN
                                </button>

                            </h2>
                            <div id="dokumen" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            @foreach ($datas->dokumenPelamarLowongan as $dd)
                                                @if ($dd->id_dokumen == 1)
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link active" id="resume-tab"
                                                            data-bs-toggle="tab"
                                                            data-bs-target="#tab-pane-seleksi-{{ $dd->id_dokumen }}"
                                                            type="button" role="tab"
                                                            aria-selected="true">{{ \Illuminate\Support\Str::limit($dd->dokumenPelamar->nama, $limit = 30, '...') }}</button>
                                                    </li>
                                                @else
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link " id="resume-tab"
                                                            data-bs-toggle="tab"
                                                            data-bs-target="#tab-pane-seleksi-{{ $dd->id_dokumen }}"
                                                            type="button"
                                                            role="tab">{{ \Illuminate\Support\Str::limit($dd->dokumenPelamar->nama, $limit = 30, '...') }}</button>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        @foreach ($datas->dokumenPelamarLowongan as $dd)
                                            @if ($dd->id_dokumen)
                                                <div class="tab-pane fade show active"
                                                    id="tab-pane-seleksi-{{ $dd->id_dokumen }}" role="tabpanel"
                                                    aria-labelledby="home-tab" tabindex="0">
                                                    <embed
                                                        src="{{ asset('storage/' . $dd->dokumenPelamar->dokumen) }}"
                                                        type="application/pdf" width="100%" height="800px" />
                                                </div>
                                            @else
                                                <div class="tab-pane fade"
                                                    id="tab-pane-seleksi-{{ $dd->id_dokumen }}" role="tabpanel"
                                                    aria-labelledby="home-tab" tabindex="0">
                                                    <embed
                                                        src="{{ asset('storage/' . $dd->dokumenPelamar->dokumen) }}"
                                                        type="application/pdf" width="100%" height="800px" />
                                                </div>
                                            @endif
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div> --}}


    </div>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>

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

        var status_kandidat = document.getElementById('status_kandidat');
        status_kandidat.value = button_status_seleksi.innerHTML;

    }

    // function submit() {
    //     var form1 = document.getElementById("changePosition");
    //     form1.submit();

    //     var form2 = document.getElementById("sendEmail");
    //     form2.submit();

    // }
</script>
