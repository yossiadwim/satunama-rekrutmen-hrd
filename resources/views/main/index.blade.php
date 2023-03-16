<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yayasan SATUNAMA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/main-style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

</head>

<body style="font-family: Poppins">

    @include('partials.navbar')


    @if (count($jobs) > 0)
        <div class="container">
            <div class="card card-container mt-5">
                <h1 class="mt-4">Lowongan Pekerjaan</h1>
                <div class="row mt-4 ">
                    @foreach ($jobs->take(3) as $job)
                        <div class="col-md-4 mb-5">

                            <div class="card bg-card">
                                <a href="/detail-lowongan/{{ $job->id }}" class="text-decoration-none text-dark">
                                    <div class="card-body">
                                        <p class="card-text"><i class="bi bi-briefcase-fill"></i>
                                            {{ $job->nama_lowongan }}
                                        </p>
                                        <p class="card-text"><i class="bi bi-building-fill"></i> Departemen
                                            {{ $job->department->nama_departemen }}</p>
                                        <p class="card-text"><i class="bi bi-person-fill"></i> Kontrak</p>
                                        <br>
                                        <p class="card-text"><i class="bi bi-clock"></i> Dibuat pada
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
        <div class="container">
            <h1 class="mt-5">Belum ada lowongan</h1>
        </div>
        <div class="container">
            <div class="row mt-5">
                @foreach ($departments as $department)
                    <div class="col-md-6 mb-5">
                        <a class="btn d-flex justify-content-between bg-button px-2 py-2" href="#" role="button">
                            Departemen {{ $department->nama_departemen }} <i class="bi bi-chevron-right"></i></a>
                    </div>
                @endforeach
            </div>

        </div>
    @endif




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
