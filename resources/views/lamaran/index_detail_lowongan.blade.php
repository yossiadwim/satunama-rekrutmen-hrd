
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SATUNAMA | Rekrutmen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/login-style.css">
    <link rel="stylesheet" href="/css/detail-lowongan-style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>

<body style="font-family: Poppins">

    @include('partials.navbar')

    <div class="container">
        <h2 class="mt-5 fw-bold">{{ $jobs->nama_lowongan }}</h2>
        <h5 class="mt-4">YAYASAN SATUNAMA</h5>
        <h6 class="mt-4"><i class="bi bi-building"></i>Departemen {{ $departemen->nama_departemen }}</h6>
        <h6 class="mt-4"><i class="bi bi-person-fill"></i> {{ $jobs->tipe_lowongan }}</h6>

        <div class="mt-4">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary bg-btn border-0" data-bs-toggle="modal" data-bs-target="#button-lamar">
                Lamar
            </button>

            <!-- Modal -->
            <div class="modal fade" id="button-lamar" tabindex="-1" aria-labelledby="modal-lamar"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modal-lamar">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <hr class="border-dark border-3" >
        </div>

        <div class="mt-4">
            <article class="justify-content-center">
                {!! $jobs->deskripsi !!}
            </article>
    
        </div>

        

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</body>

</html>
