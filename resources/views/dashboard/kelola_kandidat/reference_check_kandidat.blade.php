<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/admin-dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/b3626122b8.js" crossorigin="anonymous"></script>
</head>

<body style="font-family: Poppins">
    @include('partials.navbar')
    <div class="container mt-5">
        <div class="row">
            <div class="col ">
                <h4 class="fw-bold">{{ $datas->lowongan->nama_lowongan }}</h4>
            </div>
            <div class="card mt-4 mb-4">
                <div class="card-body">
                    <div class="mt-2">
                        <h4 class="fw-bold">{{ $datas->pelamar->nama_pelamar }} | <span
                                class="badge rounded-pill text-bg-info">{{ Str::title($datas->statusLamaran[0]->status->nama_status) }}</span>
                        </h4>
                        <p>Melamar
                            {{ \Carbon\Carbon::parse($datas->created_at)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, j F Y ') }}
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

                </div>
                <div class="accordion mt-4 mb-4 col-12" id="accordionPanelsStayOpenExample">
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
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Perusahaan</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Nomor Telepon</th>
                                            <th scope="col">Jabatan</th>
                                            <th scope="col">Lama Kerja</th>
                                            <th scope="col">Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datas->pelamar->pengalamanKerja as $key => $data)
                                            <tr class="text-center">
                                                <th scope="row">{{ $key + 1 }}</th>
                                                <td>{{ $data->nama_perusahaan }}</td>
                                                <td>{{ $data->email == null ? '-' : $data->email }}</td>
                                                <td>{{ $data->telepon == null ? '-' : $data->telepon }}</td>
                                                <td>{{ $data->jabatan }}</td>
                                                <td>{{ $data->periode }}</td>
                                                {{-- <td><button type="button" class="btn btn-primary"><i class="bi bi-envelope"></i> Kirim Email</button></td> --}}
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#sendEmail-{{ $data->id_pengalaman_kerja }}">
                                                        <i class="fa-solid fa-envelope"></i> Kirim Email
                                                    </button>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @foreach ($datas->pelamar->pengalamanKerja as $data_pengalaman_kerja)
                                    <!-- Modal -->
                                    <div class="modal fade"
                                        id="sendEmail-{{ $data_pengalaman_kerja->id_pengalaman_kerja }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                        Email Reference Check</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row justify-content-center">
                                                        <div class="col-md-8">
                                                            <div class="card">
                                                                <div class="card-header"></div>

                                                                <div class="card-body">
                                                                    @if (session('success'))
                                                                        <div class="alert alert-success"
                                                                            role="alert">
                                                                            {{ session('success') }}
                                                                        </div>
                                                                    @endif

                                                                    <form method="POST" action="">
                                                                        @csrf

                                                                        <div class="form-group">
                                                                            <label for="recipient"></label>
                                                                            <input id="recipient" type="email"
                                                                                class="form-control @error('recipient') is-invalid @enderror"
                                                                                name="recipient" value=""
                                                                                required autocomplete="recipient"
                                                                                autofocus>

                                                                            @error('recipient')
                                                                                <span class="invalid-feedback"
                                                                                    role="alert">
                                                                                    <strong></strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="subject"></label>
                                                                            <input id="subject" type="text"
                                                                                class="form-control @error('subject') is-invalid @enderror"
                                                                                name="subject" value="" required
                                                                                autocomplete="subject">

                                                                            @error('subject')
                                                                                <span class="invalid-feedback"
                                                                                    role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="message"></label>
                                                                            <textarea id="message" class="form-control @error('message') is-invalid @enderror" name="message" required></textarea>

                                                                            @error('message')
                                                                                <span class="invalid-feedback"
                                                                                    role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>

                                                                        <button type="submit"
                                                                            class="btn btn-primary">

                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                {{-- <p class="fw-bold">
                                                {{ $data_pengalaman_kerja->nama_perusahaan }}
                                            </p>
                                            <p>{{ $data_pengalaman_kerja->jabatan }}
                                            </p>
                                            <p>{{ $data_pengalaman_kerja->periode }}
                                            </p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

    </div>
    </div>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
