
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yayasan SATUNAMA</title>
    <link rel="icon" type="image/x-icon" href="/img/atunama-logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/admin-dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

</head>

<body style="font-family: Poppins">

    @include('partials.navbar')

    @if (session()->has('success add'))
        <div class="container justify-content-center col-8">
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center">
                {{ session('success add') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @elseif (session()->has('success closed'))
        <div class="container justify-content-center col-8">
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center">
                {{ session('success closed') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @elseif (session()->has('success edit'))
        <div class="container justify-content-center col-8">
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center">
                {{ session('success edit') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="container d-flex border-bottom border-secondary">
        <div class="mt-5 mb-2">
            <h4>Daftar Lowongan</h4>
        </div>
        <div class="mt-5 mb-4 px-5">
            <a href="/admin-dashboard/lowongan/create" class="btn btn-primary border-0" role="button"
                id="button-create-lowongan" onclick="click()" style="background-color: #F25700">
                <i class="bi bi-plus-circle-fill mx-1"></i> Buat Lowongan Kerja</a>
        </div>
    </div>

    <div class="container">
        <div class="row mt-4">
            <div class="col-2 border-end border-secondary">
                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link btn-bg active mb-3" id="v-pills-aktif-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-aktif" type="button" role="tab" aria-controls="v-pills-home"
                        aria-selected="true">Aktif</button>
                    <button class="nav-link btn-bg " id="v-pills-tutup-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-tutup" type="button" role="tab" aria-controls="v-pills-profile"
                        aria-selected="false">Tutup</button>
                </div>
            </div>
            <div class="col-10 justify-content-center">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-aktif" role="tabpanel"
                        aria-labelledby="v-pills-home-tab" tabindex="0">
                        @if (count($jobsOpen) > 0)
                            <div class="mt-2">
                                <h3 class="">{{ count($jobsOpen) }} Lowongan Aktif</h3>
                            </div> <br>
                            <div class="container mb-5">
                                <div class="row">
                                    @foreach ($jobsOpen as $job)
                                        <div class="col-md-12">
                                            <div class="card shadow-sm mb-4">
                                                <div class="card-body">
                                                    <h5 class="card-text">
                                                        {{ $job->nama_lowongan }}
                                                    </h5>
                                                    <div class="row mt-4">
                                                        <div class="col-md-6">
                                                            <p class="card-text"><i class="bi bi-building-fill"></i>
                                                                Departemen
                                                                {{ $job->nama_departemen }}</p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <p class="card-text"><i class="bi bi-person-fill"></i>
                                                                {{ $job->tipe_lowongan }}
                                                            </p>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-4 mt-4">
                                                        <p class="card-text"><i class="bi bi-calendar-fill"></i>
                                                            Dibuat pada {{ $job->created_at->toDateString() }}
                                                        </p>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col border-end border-secondary">
                                                            <p>Dilihat oleh 0</p>

                                                        </div>
                                                        <div class="col border-end border-secondary">
                                                            <p>Pending 0</p>
                                                        </div>
                                                        <div class="col border-end border-secondary">
                                                            <p>Terpilih 0</p>
                                                        </div>
                                                        <div class="col border-end border-secondary">
                                                            <p>Wawancara 0</p>
                                                        </div>
                                                        <div class="col border-end border-secondary">
                                                            <p>Penawaran 0</p>
                                                        </div>
                                                        <div class="col">
                                                            <p>Diterima 0</p>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-4">
                                                        <div class="btn-group col-md-3" role="group">
                                                            <button type="button"
                                                                class="btn btn-secondary dropdown-toggle"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                Kelola Lowongan
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item"
                                                                        href="/admin-dashboard/lowongan/{{ $job->slug }}/edit">Edit
                                                                        Lowongan</a>
                                                                </li>

                                                                <li>
                                                                    <button type="button" class="btn"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#exampleModal">
                                                                        Tutup Lowongan
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5"
                                                                            id="exampleModalLabel">Konfirmasi
                                                                        </h1>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Apakah sudah yakin ingin menutup lowongan?
                                                                        </p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>

                                                                        <form method="POST"
                                                                            action="/admin-dashboard/lowongan/{{ $job->slug }}/closeJobs">
                                                                            @csrf
                                                                            <input type="hidden" name="closed"
                                                                                value="true">
                                                                            <button class="btn btn-primary"
                                                                                type="submit">Tutup
                                                                                Lowongan</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <a class="btn btn-secondary"
                                                                href="/admin-dashboard/lowongan/{{ $job->slug }}/kelola-kandidat"
                                                                role="button">Kelola
                                                                Kandidat</a>
                                                        </div>
                                                    </div>

                                                    <div class="mt-4">
                                                        <p class="card-text"><i class="bi bi-clock"></i>
                                                            {{ $job->created_at->diffForHumans() }},
                                                            Diperbarui {{ $job->updated_at->diffForHumans() }}</p>
                                                        <p class="card-text"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <p class="" style="text-align: center">Tidak ada lowongan yang dibuka. <a
                                    href="/admin-dashboard/jobs/create" class="text-dark"> Mulai
                                    posting
                                    lowongan</a></p>
                        @endif
                    </div>
                </div>
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show" id="v-pills-tutup" role="tabpanel"
                        aria-labelledby="v-pills-home-tab" tabindex="0">
                        @if (count($jobsClose) > 0)
                            <div class="mt-2">
                                <h3 class="">{{ count($jobsClose) }} Lowongan Tutup</h3>
                            </div> <br>
                            <div class="container mb-5">
                                <div class="row">
                                    @foreach ($jobsClose as $job)
                                        <div class="col-md-12">
                                            <div class="card shadow-sm mb-4">
                                                <div class="card-body">
                                                    <h5 class="card-text">
                                                        {{ $job->nama_lowongan }}
                                                    </h5>
                                                    <div class="row mt-4">
                                                        <div class="col-md-6">
                                                            <p class="card-text"><i class="bi bi-building-fill"></i>
                                                                Departemen
                                                                {{ $job->nama_departemen }}</p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <p class="card-text"><i class="bi bi-person-fill"></i>
                                                                {{ $job->tipe_lowongan }}
                                                            </p>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-4 mt-4">
                                                        <p class="card-text"><i class="bi bi-calendar-fill"></i>
                                                            Dibuat pada {{ $job->created_at->toDateString() }}
                                                        </p>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col border-end border-secondary">
                                                            <p>Dilihat oleh 0</p>

                                                        </div>
                                                        <div class="col border-end border-secondary">
                                                            <p>Pending 0</p>
                                                        </div>
                                                        <div class="col border-end border-secondary">
                                                            <p>Terpilih 0</p>
                                                        </div>
                                                        <div class="col border-end border-secondary">
                                                            <p>Wawancara 0</p>
                                                        </div>
                                                        <div class="col border-end border-secondary">
                                                            <p>Penawaran 0</p>
                                                        </div>
                                                        <div class="col">
                                                            <p>Diterima 0</p>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-4">

                                                        <div class="col-md-3">
                                                            <a class="btn btn-secondary"
                                                                href="/admin-dashboard/lowongan/{{ $job->slug }}/kelola-kandidat"
                                                                role="button">Kelola
                                                                Kandidat</a>
                                                        </div>
                                                    </div>

                                                    <div class="mt-4">
                                                        <p class="card-text"><i class="bi bi-clock"></i>
                                                            {{ $job->created_at->diffForHumans() }},
                                                            Diperbarui {{ $job->updated_at->diffForHUmans() }}</p>
                                                        <p class="card-text"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <p class="" style="text-align: center">Tidak ada lowongan yang tutup.</p>
                        @endif
                    </div>
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
    var val = document.getElementById('button-create-lowongan')
    val.addEventListener('click', function() {
        var val = document.getElementById('button-create-lowongan')
        console.log(val)
    })
</script>
