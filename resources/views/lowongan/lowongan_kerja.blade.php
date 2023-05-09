{{-- @dd($departemens) --}}
{{-- @dd($jobs) --}}
{{-- @dd($profils) --}}

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

</head>

<body style="font-family: Poppins; background-color:#f6fff6">

    @include('partials.navbar')

    <h1 class="mt-4 fs-1 fw-bold" style="text-align:center;">Lowongan Pekerjaan</h1>

    <div class="container mt-5 col-4">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari lowongan..." name="search">
            <button class="btn" type="button" id="button-addon2"
                style="background-color: #379237; color: white">Cari</button>
        </div>
    </div>

    <div class="container mt-3">
        <p class="text-center">
            <button class="btn btn-primary border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"
                style="background-color: #379237">
                Filter Departemen <i class="bi bi-chevron-down"></i>
            </button>
        </p>
        <div class="collapse" id="collapseExample">
            <div class="container border rounded shadow-sm" style="background-color: #ffff">
                <div class="row mt-4">
                    @foreach ($departemens as $departemen)
                        <div class="col-6 mb-4">
                            <button type="button" class="btn btn-primary text-dark border-secondary col-12"
                                style="background-color:#eaeaea">
                                {{ $departemen->nama_departemen }} <span
                                    class="badge text-bg-secondary">{{ $departemen->total_lowongan }}</span>
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>


        </div>
    </div>

    @if (count($lowongans) > 0)
        <div class="container">
            <div class="card card-container mt-4 border-0">
                <h4>Lowongan yang masih dibuka</h4>
                <div class="row mt-4 ">
                    @foreach ($lowonganOpen->take(3) as $job)
                        <div class="col-md-4 mb-5">
                            <div class="card bg-card shadow-sm border">
                                <a href="/lowongan-kerja/{{ $job->slug }}/detail"
                                    class="text-decoration-none text-dark">
                                    <div class="card-body">
                                        <p class="card-text fw-bold fs-5" style="color: #379237"><i
                                                class="bi bi-briefcase-fill"></i>
                                            {{ $job->nama_lowongan }}
                                        </p>
                                        <p class="card-text"><i class="bi bi-building-fill"></i> Departemen
                                            {{ $job->nama_departemen }}</p>
                                        <p class="card-text"><i class="bi bi-person-fill"></i> {{ $job->tipe_lowongan }}
                                        </p>
                                        <br>
                                        <p class="card-text" style="font-size: 14px; color: #63686E"><i
                                                class="bi bi-clock"></i> Dibuka pada
                                            {{ $job->created_at->toDateString() }},
                                            {{ $job->created_at->diffForHumans() }}</p>
                                        <p class="card-text"></p>
                                    </div>
                            </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="container">
            <div class="card card-container mt-4 border-0">
                <h4>Lowongan yang sudah ditutup</h4>
                <div class="row mt-4 ">
                    @foreach ($lowonganClosed as $job)
                        <div class="col-md-4 mb-5">
                            <div class="card bg-card shadow-sm border">
                                <a href="/lowongan-kerja/{{ $job->slug }}/detail"
                                    class="text-decoration-none text-dark">
                                    <div class="card-body">
                                        <p class="card-text fw-bold fs-5" style="color: #379237"><i
                                                class="bi bi-briefcase-fill"></i>
                                            {{ $job->nama_lowongan }}
                                        </p>
                                        <p class="card-text"><i class="bi bi-building-fill"></i> Departemen
                                            {{ $job->nama_departemen }}</p>
                                        <p class="card-text"><i class="bi bi-person-fill"></i>
                                            {{ $job->tipe_lowongan }}
                                        </p>
                                        <br>
                                        <p class="card-text" style="font-size: 14px; color: #63686E"><i
                                                class="bi bi-clock"></i> Ditutup pada
                                            {{ $job->created_at->toDateString() }},
                                            {{ $job->created_at->diffForHumans() }}</p>
                                        <p class="card-text"></p>
                                    </div>
                            </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
    @endif




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
