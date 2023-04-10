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
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/admin-dashboard-style.css">
    <link rel="stylesheet" href="/css/admin-kelola-lowongan-style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

</head>

<body>
    @include('partials.navbar')

    <div class="container mt-4 ">
        <h3 class="fw-bold">Lowongan: {{ $jobs->nama_lowongan }}</h3>
    </div>

    <div class="container rounded mt-4 fw-bold" style="background-color: #EAEAEA">
        <ul class="nav nav-pills mb-3 py-2 px-2 justify-content-center" id="pills-tab" role="tablist">
            <li class="nav-item px-4" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                    type="button" role="tab" aria-controls="pills-home" aria-selected="true">Review</button>
            </li>
            <li class="nav-item  px-4" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                    type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Seleksi
                    Berkas</button>
            </li>
            <li class="nav-item  px-4" role="presentation">
                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
                    type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Reference
                    Check</button>
            </li>
            <li class="nav-item  px-4" role="presentation">
                <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled"
                    type="button" role="tab" aria-controls="pills-disabled" aria-selected="false">Tes Tertulis &
                    Tes Wawancara</button>
            </li>
            <li class="nav-item  px-4" role="presentation">
                <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled"
                    type="button" role="tab" aria-controls="pills-disabled"
                    aria-selected="false">Penawaran</button>
            </li>
            <li class="nav-item  px-4" role="presentation">
                <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled"
                    type="button" role="tab" aria-controls="pills-disabled" aria-selected="false">Direkrut</button>
            </li>
            <li class="nav-item  px-4" role="presentation">
                <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled"
                    type="button" role="tab" aria-controls="pills-disabled"
                    aria-selected="false">Ditolak</button>
            </li>
        </ul>

    </div>
    <div class="container mt-4">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                tabindex="0">
                <div class="container ">
                    <div class="row mt-4">
                        <div class="col-3 border-1 border-end border-secondary">
                            <div class="col-12 ">
                                <a href="#" class="text-decoration-none text-dark">
                                    <div class="row shadow-sm mb-2 border px-2 py-2">
                                        <div class="col-3 ">
                                            <img src="/img/satunama-logo.png" class="rounded-circle"
                                                alt="Cinque Terre" height="70px" width="70px">
                                        </div>
                                        <div class="col-9 ">
                                            <p>Yossia Dwi Mahardika</p>
                                            <p>Yogyakarta, Indonesia</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-9 justify-content-center border border-3">
                            <div class="container mt-3">
                                <h3>Yossia Dwi Mahardika</h3>
                                <p>Yogyakarta, Indonesia</p>
                                <p>Mendaftar 10 Februari 2023</p>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-secondary dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Pindah posisi
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Review</a></li>
                                        <li><a class="dropdown-item" href="#">Seleksi Berkas</a></li>
                                        <li><a class="dropdown-item" href="#">Reference Check</a></li>
                                        <li><a class="dropdown-item" href="#">Tes Tertulis & Wawancara</a></li>
                                        <li><a class="dropdown-item" href="#">Penawaran</a></li>
                                        <li><a class="dropdown-item" href="#">Direkrut</a></li>
                                        <li><a class="dropdown-item" href="#">Ditolak</a></li>
                                    </ul>
                                </div>
                                <div class="container mt-4 " style="background: #F1EEEE">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="resume-tab" data-bs-toggle="tab"
                                                data-bs-target="#resume-tab-pane" type="button" role="tab"
                                                aria-controls="home-tab-pane" aria-selected="true">Resume/CV</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                                data-bs-target="#profile-tab-pane" type="button" role="tab"
                                                aria-controls="profile-tab-pane" aria-selected="false">Tinjauan
                                                Profil</button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="resume-tab-pane" role="tabpanel"
                                            aria-labelledby="home-tab" tabindex="0">
                                            <embed src="{{ asset('storage/document/YossiaDwiMahardika-CV.pdf') }}"
                                                type="application/pdf" width="100%" height="800px" />
                                        </div>
                                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel"
                                            aria-labelledby="profile-tab" tabindex="0">
                                            Tinjauan Profil
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>




                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                tabindex="0">
                <div class="container ">
                    <div class="row mt-4">
                        <div class="col-3 border-1 border-end border-secondary">
                            <div class="col-12 ">
                                <a href="#" class="text-decoration-none text-dark">
                                    <div class="row shadow-sm mb-2 border px-2 py-2">
                                        <div class="col-3 ">
                                            <img src="/img/satunama-logo.png" class="rounded-circle"
                                                alt="Cinque Terre" height="70px" width="70px">
                                        </div>
                                        <div class="col-9 ">
                                            <p>Yossia Dwi Mahardika</p>
                                            <p>Yogyakarta, Indonesia</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-9 justify-content-center border border-3">
                            <div class="container mt-3">
                                <h3>Yossia Dwi Mahardika</h3>
                                <p>Yogyakarta, Indonesia</p>
                                <p>Mendaftar 10 Februari 2023</p>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-secondary dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Pindah posisi
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Review</a></li>
                                        <li><a class="dropdown-item" href="#">Seleksi Berkas</a></li>
                                        <li><a class="dropdown-item" href="#">Reference Check</a></li>
                                        <li><a class="dropdown-item" href="#">Tes Tertulis & Wawancara</a></li>
                                        <li><a class="dropdown-item" href="#">Penawaran</a></li>
                                        <li><a class="dropdown-item" href="#">Rirekrut</a></li>
                                        <li><a class="dropdown-item" href="#">Ditolak</a></li>
                                    </ul>
                                </div>
                                <div class="container mt-4 " style="background: #F1EEEE">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                                data-bs-target="#home-tab-pane" type="button" role="tab"
                                                aria-controls="home-tab-pane" aria-selected="true">Resume/CV</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                                data-bs-target="#profile-tab-pane" type="button" role="tab"
                                                aria-controls="profile-tab-pane" aria-selected="false">Tinjauan
                                                Profil</button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                            aria-labelledby="home-tab" tabindex="0">
                                            <embed src="{{ asset('storage/document/YossiaDwiMahardika-CV.pdf') }}"
                                                type="application/pdf" width="100%" height="800px" />
                                        </div>
                                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel"
                                            aria-labelledby="profile-tab" tabindex="0">
                                            Tinjauan Profil
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                tabindex="0">Halaman reference check</div>
            <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab"
                tabindex="0">Tes Tertulis & Tes Wawancara</div>
            <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab"
                tabindex="0">Penawaran</div>
            <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab"
                tabindex="0">Direkrut</div>
            <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab"
                tabindex="0">Ditolak</div>
        </div>
    </div>

    {{-- <div class="container mt-4">
        <h3>Lowongan: {{ $job->nama_lowongan }}</h3>
    </div>
    <div class="container border-0 border-secondary rounded mt-4 fw-bold " style="background: #EAEAEA">
        <div class="row text-center ">
            <div class="col ">
                <p>Review</p>
            </div>
            <div class="col ">
                <p>Seleksi Berkas</p>
            </div>
            <div class="col ">
                <p>Reference Check</p>
            </div>
            <div class="col ">
                <p>Tes Tertulis & Wawancara</p>
            </div>
            <div class="col ">
                <p>Penawaran</p>
            </div>
            <div class="col ">
                <p>Direkrut</p>
            </div>
            <div class="col ">
                <p>Ditolak</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-4">
            <div class="col-3 border-end border-secondary">
                <div class="col-12 ">
                    <a href="#" class="text-decoration-none text-dark">
                        <div class="row shadow-sm mb-2 border">
                            <div class="col-3 ">
                                <img src="/img/satunama-logo.png" class="rounded-circle" alt="Cinque Terre"
                                    height="70px" width="70px">
                            </div>
                            <div class="col-9 ">
                                <p>Yossia Dwi Mahardika</p>
                                <p>Yogyakarta, Indonesia</p>
                            </div>
                        </div>
                    </a>
                    <div class="row shadow-sm mb-2 border">
                        <div class="col-3 ">
                            <img src="/img/satunama-logo.png" class="rounded-circle" alt="Cinque Terre" height="70px"
                                width="70px">
                        </div>
                        <div class="col-9 ">
                            <p>Yossia Dwi Mahardika</p>
                            <p>Yogyakarta, Indonesia</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9 justify-content-center">
                <div class="container border">
                    <h3>Yossia Dwi Mahardika</h3>
                    <p>Yogyakarta, Indonesia</p>
                    <p>Mendaftar 10 Februari 2023</p>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Pindah posisi
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Review</a></li>
                            <li><a class="dropdown-item" href="#">Seleksi Berkas</a></li>
                            <li><a class="dropdown-item" href="#">Reference Check</a></li>
                            <li><a class="dropdown-item" href="#">Tes Tertulis & Wawancara</a></li>
                            <li><a class="dropdown-item" href="#">Penawaran</a></li>
                            <li><a class="dropdown-item" href="#">Rirekrut</a></li>
                            <li><a class="dropdown-item" href="#">Ditolak</a></li>
                        </ul>
                    </div>
                    <div class="container mt-4 " style="background: #F1EEEE">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home-tab-pane" type="button" role="tab"
                                    aria-controls="home-tab-pane" aria-selected="true">Resume/CV</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#profile-tab-pane" type="button" role="tab"
                                    aria-controls="profile-tab-pane" aria-selected="false">Tinjauan Profil</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">
                                <embed src="{{ asset('storage/document/YossiaDwiMahardika-CV.pdf') }}"
                                    type="application/pdf" width="100%" height="800px" />
                            </div>
                            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel"
                                aria-labelledby="profile-tab" tabindex="0">
                                Tinjauan Profil
                            </div>
                        </div>
                    </div>
                </div>

            </div>




        </div>
    </div> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</body>

</html>
