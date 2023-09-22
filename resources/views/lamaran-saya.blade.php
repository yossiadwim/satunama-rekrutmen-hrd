
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

    @if (session()->has('success send application form'))
        <div class="container justify-content-center col-8 mt-3">
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center">
                {{ session('success send application form') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="container">
        <div class="row mt-4">
            <div class="col-9 ">
                <div class="mt-5 ">
                    <h5 class="fw-bold">{{ $datas[0]->lowongan->nama_lowongan }}</h5>
                    <p>Yayasan SATUNAMA - Yogyakarta, Indonesia</p>
                    <p><span class="badge rounded-pill text-bg-info">Tahap
                            {{ Str::title($datas[0]->statusLamaran[0]->status->nama_status) }}</span>
                        @if ($datas[0]->lowongan->closed != true)
                            - Lowongan Dibuka
                        @else
                            - Lowongan Ditutup
                        @endif
                    </p>
                </div>
                @if ($datas[0]->statusLamaran[0]->status->slug == 'reference-check')
                    <div class="mt-4">
                        <a href="/profil-kandidat/users/{{ $user->slug }}/application-form"
                            style="text-decoration: none; color: blue"><i class="fa-solid fa-up-right-from-square"></i>
                            Isi Application Form</a>
                    </div>
                @endif
    
                <div class="accordion accordion-flush mt-5" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed border-bottom border-2 fw-bold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne" style="color: #2b8f38">
                                TRACKING STATUS LAMARAN
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <table class="table table-borderless " id="table">
                                    <tbody>
                                        @foreach ($datas[0]->activityLog->sortdesc() as $data_activity)
                                            @if ($loop->first)
                                                <tr class="table-active fw-bold" style="color: blue">
                                                    <td> <i class="fa-solid fa-square-full fa-2xs"></i>
                                                        {{ \Carbon\Carbon::parse($data_activity->created_at)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, j F Y H:i ') }}
                                                    </td>
                                                    <td>Proses lamaran sudah sampai tahap
                                                        {{ $data_activity->status[0]->nama_status }}</td>
                                                </tr>
                                                @continue
                                            @endif
                                            <tr>
                                                <td> <i class="fa-solid fa-square-full fa-2xs"
                                                        style="color: #c3c1c1;"></i>
                                                    {{ \Carbon\Carbon::parse($data_activity->created_at)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, j F Y H:i ') }}
                                                </td>
                                                <td>Proses lamaran sudah sampai tahap
                                                    {{ $data_activity->status[0]->nama_status }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="accordion accordion-flush mt-4 mb-5" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed border-bottom border-2 fw-bold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#dokumen" aria-expanded="false"
                                aria-controls="flush-collapseOne" style="color: #2b8f38">
                                DOKUMEN
                            </button>
                        </h2>
                        <div id="dokumen" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        @foreach ($datas as $data)
                                            @foreach ($data->dokumenPelamarLowongan as $dd)
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
                                                        <button class="nav-link " id="resume-tab" data-bs-toggle="tab"
                                                            data-bs-target="#tab-pane-seleksi-{{ $dd->id_dokumen }}"
                                                            type="button"
                                                            role="tab">{{ \Illuminate\Support\Str::limit($dd->dokumenPelamar->nama, $limit = 30, '...') }}</button>
                                                    </li>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    @foreach ($datas as $data)
                                        @foreach ($data->dokumenPelamarLowongan as $dd)
                                            @if ($dd->id_dokumen == 1)
                                                <div class="tab-pane fade show active"
                                                    id="tab-pane-seleksi-{{ $dd->id_dokumen }}" role="tabpanel"
                                                    aria-labelledby="home-tab" tabindex="0">
                                                    <embed src="{{ asset('storage/' . $dd->dokumenPelamar->dokumen) }}"
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
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-3">
                <div class="mt-5">
                    <h5 class="fw-bold">Rincian Pekerjaan</h5>
                </div>
                <div>
                    <p><i class="fa-solid fa-building"></i> {{ $datas[0]->lowongan->departemen->nama_departemen }}
                    </p>
                    <p><i class="fa-solid fa-hourglass-start"></i> {{ $datas[0]->lowongan->tipe_lowongan }}</p>
                    <p><a href="/lowongan-kerja/{{ $datas[0]->lowongan->slug }}/detail"
                            style="text-decoration: none; color: blue"><i
                                class="fa-solid fa-up-right-from-square"></i>
                            Lihat detail lowongan</a></p>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
<script>
    document.getElementById('readMore').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('table-hidden').style.display = 'table-row';
        this.style.display = 'none';
    });
</script>
