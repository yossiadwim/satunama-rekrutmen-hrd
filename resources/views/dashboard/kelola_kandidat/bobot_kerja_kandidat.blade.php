
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SATUNAMA | {{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b3626122b8.js" crossorigin="anonymous"></script>

</head>

<body style="font-family: Poppins;">

    @include('partials.navbar')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-3 border rounded mx-2">
                <div class="mt-4 text-center">
                    <img class="rounded-circle " width="150px"
                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    <h6 class="mb-3 fw-bold">{{ $data_lowongan[0]->pelamar->nama_pelamar }}</h6>
                    <p>Melamar {{ \Carbon\Carbon::parse($data_lowongan[0]->tanggal_melamar)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, j F Y ') }}
                    </p>
                </div>
            </div>

            <div class="col-8 rounded border">
                <div class="my-3">
                    <h5 class="fw-bold mb-3">{{ $data_lowongan[0]->lowongan->nama_lowongan }}</h5>
                    <h6 class="fw-bold mb-3"><i class="fa-solid fa-building" style="color: #000000;"></i> Departemen
                        {{ $data_lowongan[0]->lowongan->departemen->nama_departemen }}</h6>
                    <p>Beban kerja: </p>
                    <div class="">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col" class="col-3 ">Jenis Analisa</th>
                                    <th scope="col" class="col-7">Analisa Kriteria</th>
                                    <th scope="col" class="col-2">Bobot Analisa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hasil_analisa as $index => $data)
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>{{ Str::title($data->jenisAnalisa->tipeAnalisa->nama_analisa) }}</td>
                                        <td>{{ $data->jenisAnalisa->jenisAnalisaKriteria[0]->jenis_analisa_kriteria }}
                                        </td>
                                        <td class="text-center">{{ $data->poin }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td style="border: none"></td>
                                    <td style="border: none"></td>
                                    <td class="text-end fw-bold" style="border: none;">Total poin</td>
                                    <td class="text-center fw-bold " style="border: none;">{{ $poin[0]->total_poin }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: none"></td>
                                    <td style="border: none"></td>
                                    <td class="text-end fw-bold" style="border: none">Kisaran Gaji</td>
                                    <td class="text-center fw-bold" style="border: none">Rp
                                        {{ number_format($gaji[0]->gaji, 0, ',', '.') }}
                                        {{-- {{ $gaji->gaji }} --}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
<script></script>
