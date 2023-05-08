<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yayasan SATUNAMA</title>
    <link rel="icon" type="image/x-icon" href="/img/atunama-logo.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/admin-dashboard-style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

</head>

<body style="font-family: Poppins">

    @include('partials.navbar')

    <div class="container d-flex border-bottom border-secondary">


        <div class="mt-5 mb-2">
            <h4>Daftar Lowongan</h4>
        </div>

        <div class="mt-5 mb-2 px-5">
            <a href="/admin-dashboard/create" class="btn btn-primary bg-btn border-0" role="button"
                id="button-create-lowongan" onclick="click()">
                <i class="bi bi-plus-circle-fill"></i> Buat Lowongan Kerja</a>
        </div>



    </div>

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="container">
        <div class="row mt-4">
            <div class="col-2 border-end border-secondary">
                <div class="d-flex flex-column mb-3">
                    <div class="p-2">
                        <div class="row mt-3">
                            <div class="col col-md-5">
                                <p>Aktif</p>
                            </div>
                            <div class="col col-md-2 border border-secondary rounded" style="background-color: rgba(217, 217, 217, 1)">
                                <p>{{ count($jobs) }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="row mt-3">
                            <div class="col col-md-5">
                                <p>Tutup</p>
                            </div>
                            <div class="col col-md-2 border border-secondary rounded" style="background-color: rgba(217, 217, 217, 1)">
                                <p>0</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10 justify-content-center">

                @if (count($jobs) > 0)

                    <div class="mt-2">
                        <h3>{{ count($jobs) }} Lowongan Aktif</h3>
                    </div> <br>

                    <div class="container mb-5">
                        <div class="row">
                            @foreach ($jobs as $job)
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
                                                        {{ $job->department->nama_departemen }}</p>
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
                                                    <button type="button" class="btn btn-secondary dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        Kelola Lowongan
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="/admin-dashboard/{{ $job->slug }}/edit">Edit
                                                                Lowongan</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Tutup
                                                                Lowongan</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="col-md-3">
                                                    <a class="btn btn-secondary" href="/admin-kelola-kandidat/{{ $job->slug }}" role="button">Kelola
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
                    <p>Tidak ada lowongan yang dipublikasikan. <a href="/buat-lowongan" class="text-dark"> Mulai
                            posting
                            lowongan</a></p>
                @endif


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
