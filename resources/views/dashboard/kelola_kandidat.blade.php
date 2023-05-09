{{-- @for ($i = 0; $i < count($data); $i++)
    {{ $data[$i]['dokumenPelamarLowongan']-> }}
@endfor --}}

{{-- @foreach ($datas as $data)
   @foreach ($data->pelamar->pengalamanKerja as $dt)
       @foreach ($data->pelamar->pendidikan as $ds)
           {{ $ds->jurusan }}
       @endforeach
   @endforeach
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
        <div class="container mt-4 ">
            <h3 class="fw-bold">{{ $lowongan->nama_lowongan }}</h3>
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
                        data-bs-target="#pills-referensi" type="button" role="tab" aria-controls="pills-referensi"
                        aria-selected="false">Reference Check</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-tes-tab" data-bs-toggle="pill" data-bs-target="#pills-tes"
                        type="button" role="tab" aria-controls="pills-tes" aria-selected="false">Tes Tertulis & Tes
                        Wawancara</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-penawaran-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-penawaran" type="button" role="tab" aria-controls="pills-penawaran"
                        aria-selected="false">Penawaran</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-direkrut-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-direkrut" type="button" role="tab" aria-controls="pills-direkrut"
                        aria-selected="false">Direkrut</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-ditolak-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-ditolak" type="button" role="tab" aria-controls="pills-ditolak"
                        aria-selected="false">Ditolak</button>
                </li>
            </ul>
        </div>

        <div class="container mt-4">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-review" role="tabpanel"
                    aria-labelledby="pills-review-tab" tabindex="0">

                    <div class="container">
                        <div class="row mt-4">
                            <div class="col-3 border-1 border-end border-secondary">
                                <div class="col-12 ">
                                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        @foreach ($datas as $data)
                                            @foreach ($data->statusLamaran as $data_status)
                                                @if ($data_status->status->nama_status == 'review')
                                                    @if ($data->pelamar->id == 1)
                                                        <button class="nav-link active" id="v-pills-home-tab"
                                                            data-bs-toggle="pill"
                                                            data-bs-target="#tab-candidate-{{ $data->pelamar->id }}"
                                                            type="button" role="tab"
                                                            aria-controls="v-pills-home" aria-selected="true">
                                                            <div class="row shadow-sm border px-2 py-2">
                                                                <div class="col-3 ">
                                                                    <img class="rounded-circle" height="70px"
                                                                        width="70px"
                                                                        style="border-radius: 50%; object-fit: cover;"
                                                                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                                                                </div>
                                                                <div class="col-9 ">
                                                                    <p>{{ $data->pelamar->nama_pelamar }}</p>
                                                                    <p>{{ $data->pelamar->alamat }}</p>
                                                                </div>
                                                            </div>
                                                        </button>
                                                    @else
                                                        <button class="nav-link" id="v-pills-home-tab"
                                                            data-bs-toggle="pill"
                                                            data-bs-target="#tab-candidate-{{ $data->pelamar->id }}"
                                                            type="button" role="tab"
                                                            aria-controls="v-pills-home">
                                                            <div class="row shadow-sm border px-2 py-2">
                                                                <div class="col-3 ">
                                                                    <img class="rounded-circle" height="70px"
                                                                        width="70px"
                                                                        style="border-radius: 50%; object-fit: cover;"
                                                                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                                                                </div>
                                                                <div class="col-9 ">
                                                                    <p>{{ $data->pelamar->nama_pelamar }}</p>
                                                                    <p>{{ $data->pelamar->alamat }}</p>
                                                                </div>
                                                            </div>
                                                        </button>
                                                    @endif
                                                @else
                                                    <div>
                                                        <h3>Tidak pelamar di tahap ini</h3>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="tab-content col-9 justify-content-center border border-3"
                                id="v-pills-tabContent">
                                @foreach ($datas as $data)
                                    @foreach ($data->statusLamaran as $data_status)
                                        @if ($data_status->status->nama_status == 'review')
                                            @if ($data->pelamar->id)
                                                <div class="container tab-pane fade"
                                                    id="tab-candidate-{{ $data->pelamar->id }}" role="tabpanel"
                                                    tabindex="0">

                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                                                <img class="rounded-circle " width="150px"
                                                                    src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                                                                <span> </span>
                                    
                                            
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="p-3 py-5">
                                                                <div class="row">
                                                                    @if ($data->pelamar->nama_pelamar == null)
                                                                        <div
                                                                            class="d-flex justify-content-between align-items-center mb-3">
                                                                            <h4 class="text-right fw-bold">
                                                                                {{ $data->pelamar->nama_pelamar }}</h4>
                                                                        </div>
                                                                    @else
                                                                        <div
                                                                            class="d-flex justify-content-between align-items-center mb-3">
                                                                            <h4 class="text-right fw-bold">
                                                                                {{ $data->pelamar->nama_pelamar }}</h4>
                                                                        </div>
                                                                    @endif
    
                                                                </div>
    
                                                                <div class="row mt-2">
                                                                    @if ($data->pelamar->telepon_rumah == null)
                                                                        <div class="col-md-6">
                                                                            <label class="labels fw-bold">Nomor
                                                                                Telepon</label>
                                                                            <p>{{ '-' }}</p>
                                                                        </div>
                                                                    @else
                                                                        <div class="col-md-6">
                                                                            <label class="labels fw-bold">Nomor
                                                                                Telepon</label>
                                                                            <p>{{ $data->pelamar->telepon_rumah }}</p>
                                                                        </div>
                                                                    @endif
                                                                    <div class="col-md-6">
                                                                        <label class="labels fw-bold">Email</label>
                                                                        <p>{{ $data->pelamar->email }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-2">
    
                                                                    @if ($data->pelamar->alamat == null && $data->pelamar->tanggal_lahir == null && $data->pelamar->jenis_kelamin == null)
                                                                        <div class="col-md-6">
                                                                            <label class="labels fw-bold">Alamat</label>
                                                                            <p>{{ '-' }}</p>
    
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label class="labels fw-bold">Tanggal
                                                                                Lahir, Jenis Kelamin</label>
                                                                            <p>{{ '-' }}</p>
                                                                        </div>
                                                                    @else
                                                                        <div class="col-md-6">
                                                                            <label class="labels fw-bold">Alamat</label>
                                                                            <p>{{ $data->pelamar->alamat }}</p>
    
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label class="labels fw-bold">Tanggal
                                                                                Lahir, Jenis Kelamin</label>
                                                                            <p>{{ \Carbon\Carbon::parse($data->pelamar->tanggal_lahir)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('j F Y ') }} ,
                                                                                {{ $data->pelamar->jenis_kelamin }}</p>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                <div class="row mt-2">
                                                                    @if ($data->pelamar->kebangsaan == null)
                                                                        <div class="col-md-6">
                                                                            <label
                                                                                class="labels fw-bold">Kebangsaan</label>
                                                                            <p>{{ '-' }}</p>
                                                                        </div>
                                                                    @else
                                                                        <div class="col-md-6">
                                                                            <label
                                                                                class="labels fw-bold">Kebangsaan</label>
                                                                            <p>{{ $data->pelamar->kebangsaan }}</p>
                                                                        </div>
                                                                    @endif
                                                                </div>
    
                                                            </div>
                                                        </div>
                                                    </div>
                                                    

                                                    <h5>Melamar pada:
                                                        {{ \Carbon\Carbon::parse($data->tanggal_melamar)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, j F Y ') }}
                                                    </h5>

                                                    <div class="mt-5 mb-5">
                                                        <h4>PENGALAMAN KERJA</h4>
                                                        <hr>
                                                        @foreach ($data->pelamar->pengalamanKerja as $data_pengalaman_kerja)
                                                            <div class="border-start px-2 border-4 border-secondary">
                                                                <p class="fw-bold">
                                                                    {{ $data_pengalaman_kerja->nama_perusahaan }}</p>
                                                                <p>{{ $data_pengalaman_kerja->jabatan }}</p>
                                                                <p>{{ $data_pengalaman_kerja->periode }}</p>
                                                            </div>
                                                        @endforeach

                                                    </div>
                                                    <div class="mt-5 mb-5">
                                                        <h4>PENDIDIKAN</h4>
                                                        <hr>

                                                        @foreach ($data->pelamar->pendidikan as $data_status_pendidikan)
                                                            <div class="border-start px-2 border-4 border-secondary">
                                                                <p>Jenjang:
                                                                    {{ $data_status_pendidikan->jenjang_pendidikan }}
                                                                </p>
                                                                <p>Jurusan: {{ $data_status_pendidikan->jurusan }}</p>
                                                                <p>IPK: {{ $data_status_pendidikan->ipk }}</p>

                                                            </div>
                                                        @endforeach

                                                    </div>
                                                    <nav>
                                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                            @foreach ($data->dokumenPelamarLowongan as $dd)
                                                                @if ($dd->id_dokumen == 1)
                                                                    <li class="nav-item" role="presentation">
                                                                        <button class="nav-link active"
                                                                            id="resume-tab" data-bs-toggle="tab"
                                                                            data-bs-target="#tab-pane-{{ $dd->id_dokumen }}"
                                                                            type="button" role="tab"
                                                                            aria-selected="true">{{ \Illuminate\Support\Str::limit($dd->dokumenPelamar->nama, $limit = 30, '...') }}</button>
                                                                    </li>
                                                                @else
                                                                    <li class="nav-item" role="presentation">
                                                                        <button class="nav-link " id="resume-tab"
                                                                            data-bs-toggle="tab"
                                                                            data-bs-target="#tab-pane-{{ $dd->id_dokumen }}"
                                                                            type="button"
                                                                            role="tab">{{ \Illuminate\Support\Str::limit($dd->dokumenPelamar->nama, $limit = 30, '...') }}</button>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </nav>
                                                    <div class="tab-content" id="nav-tabContent">
                                                        @foreach ($data->dokumenPelamarLowongan as $dd)
                                                            @if ($dd->id_dokumen == 1)
                                                                <div class="tab-pane fade show active"
                                                                    id="tab-pane-{{ $dd->id_dokumen }}"
                                                                    role="tabpanel" aria-labelledby="home-tab"
                                                                    tabindex="0">
                                                                    <embed
                                                                        src="{{ asset('storage/' . $dd->dokumenPelamar->dokumen) }}"
                                                                        type="application/pdf" width="100%"
                                                                        height="800px" />
                                                                </div>
                                                            @else
                                                                <div class="tab-pane fade"
                                                                    id="tab-pane-{{ $dd->id_dokumen }}"
                                                                    role="tabpanel" aria-labelledby="home-tab"
                                                                    tabindex="0">
                                                                    <embed
                                                                        src="{{ asset('storage/' . $dd->dokumenPelamar->dokumen) }}"
                                                                        type="application/pdf" width="100%"
                                                                        height="800px" />
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                        <div class="mb-5 mt-5">
                                                            <form method="POST"
                                                                action="/admin-dashboard/lowongan/{{ $lowongan->slug }}/changePosition">
                                                                @csrf
                                                                <input type="hidden" name="closed" value="true">
                                                                <button class="btn btn-primary" type="submit">Ubah
                                                                    posisi</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="container mt-3 tab-pane fade"
                                                    id="tab-candidate-{{ $data->pelamar->id }}" role="tabpanel"
                                                    tabindex="0">
                                                    <h3>{{ $data->pelamar->nama_pelamar }}</h3>
                                                    <p>Alamat: {{ $data->pelamar->alamat }}</p>
                                                    <p>Melamar pada:
                                                        {{ \Carbon\Carbon::parse($data->tanggal_melamar)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, j F Y') }}
                                                    </p>

                                                    <button class="mt-4 mb-4">Approve</button>
                                                    <div class="container mt-4 " style="background: #F1EEEE">
                                                        <nav>
                                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                                @foreach ($data->dokumenPelamarLowongan as $dd)
                                                                    @if ($dd->id_dokumen == 1)
                                                                        <li class="nav-item" role="presentation">
                                                                            <button class="nav-link active"
                                                                                id="resume-tab" data-bs-toggle="tab"
                                                                                data-bs-target="#tab-pane-{{ $dd->id_dokumen }}"
                                                                                type="button" role="tab"
                                                                                aria-selected="true">{{ \Illuminate\Support\Str::limit($dd->dokumenPelamar->nama, $limit = 30, '...') }}</button>
                                                                        </li>
                                                                    @else
                                                                        <li class="nav-item" role="presentation">
                                                                            <button class="nav-link " id="resume-tab"
                                                                                data-bs-toggle="tab"
                                                                                data-bs-target="#tab-pane-{{ $dd->id_dokumen }}"
                                                                                type="button"
                                                                                role="tab">{{ \Illuminate\Support\Str::limit($dd->dokumenPelamar->nama, $limit = 30, '...') }}</button>
                                                                        </li>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </nav>
                                                        <div class="tab-content" id="nav-tabContent">
                                                            @foreach ($data->dokumenPelamarLowongan as $dd)
                                                                @if ($dd->id_dokumen == 1)
                                                                    <div class="tab-pane fade show active"
                                                                        id="tab-pane-{{ $dd->id_dokumen }}"
                                                                        role="tabpanel" aria-labelledby="home-tab"
                                                                        tabindex="0">
                                                                        <embed
                                                                            src="{{ asset('storage/' . $dd->dokumenPelamar->dokumen) }}"
                                                                            type="application/pdf" width="100%"
                                                                            height="800px" />
                                                                    </div>
                                                                @else
                                                                    <div class="tab-pane fade"
                                                                        id="tab-pane-{{ $dd->id_dokumen }}"
                                                                        role="tabpanel" aria-labelledby="home-tab"
                                                                        tabindex="0">
                                                                        <embed
                                                                            src="{{ asset('storage/' . $dd->dokumenPelamar->dokumen) }}"
                                                                            type="application/pdf" width="100%"
                                                                            height="800px" />
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                            <div class="mb-5 mt-5">
                                                                <form method="POST"
                                                                    action="/admin-dashboard/lowongan/{{ $lowongan->slug }}/changePosition">
                                                                    @csrf
                                                                    <input type="hidden" name="closed"
                                                                        value="true">
                                                                    <button class="btn btn-primary"
                                                                        type="submit">Ubah
                                                                        posisi</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @else
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="pills-seleksi" role="tabpanel" aria-labelledby="pills-seleksi-tab"
                    tabindex="0">Seleksi</div>
                <div class="tab-pane fade" id="pills-referensi" role="tabpanel"
                    aria-labelledby="pills-referensi-tab" tabindex="0">Referensi Check</div>
                <div class="tab-pane fade" id="pills-tes" role="tabpanel" aria-labelledby="pills-tes-tab"
                    tabindex="0">Tes Tertulis & Tes Wawancara</div>
                <div class="tab-pane fade" id="pills-penawaran" role="tabpanel"
                    aria-labelledby="pills-penawaran-tab" tabindex="0">Penawaran</div>
                <div class="tab-pane fade" id="pills-direkrut" role="tabpanel" aria-labelledby="pills-direkrut-tab"
                    tabindex="0">Direkrut</div>
                <div class="tab-pane fade" id="pills-ditolak" role="tabpanel" aria-labelledby="pills-ditolak-tab"
                    tabindex="0">Ditolak</div>
            </div>

        </div>
    @endif



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</body>

</html>
