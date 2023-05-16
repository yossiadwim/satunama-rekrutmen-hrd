{{-- @dd($pelamars) --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/profil-style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>


    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
    <title>Yayasan SATUNAMA</title>
</head>

<body style="font-family: Poppins">
    @include('partials.navbar')
    @if (session()->has('success'))
        <div class="container justify-content-center col-8">
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @elseif (session()->has('success add description'))
        <div class="container justify-content-center col-8">
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center">
                {{ session('success add description') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @elseif (session()->has('success add work experience'))
        <div class="container justify-content-center col-8">
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center">
                {{ session('success add work experience') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @elseif (session()->has('success update work experience'))
        <div class="container justify-content-center col-8">
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center">
                {{ session('success update work experience') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @elseif (session()->has('success delete work experience'))
        <div class="container justify-content-center col-8">
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center">
                {{ session('success delete work experience') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @elseif (session()->has('success add education'))
        <div class="container justify-content-center col-8">
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center">
                {{ session('success add education') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @elseif (session()->has('success update education'))
        <div class="container justify-content-center col-8">
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center">
                {{ session('success update education') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @elseif (session()->has('success delete education'))
        <div class="container justify-content-center col-8">
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center">
                {{ session('success delete education') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    {{-- @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif --}}
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle " width="150px"
                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    <span> </span>

                    @include('profil.post-profile.edit-profil')

                </div>
            </div>
            <div class="col-md-8">
                <div class="p-3 py-5">
                    @foreach ($pelamars as $pelamar)
                        <div class="row mt-2">
                            @if ($pelamar->nama_pelamar == null)
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right fw-bold">{{ $pelamar->nama_pelamar }}</h4>
                                </div>
                            @else
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right fw-bold">{{ $pelamar->nama_pelamar }}</h4>
                                </div>
                            @endif

                        </div>

                        <div class="row mt-2">
                            @if ($pelamar->telepon_rumah == null)
                                <div class="col-md-6">
                                    <label class="labels fw-bold">Nomor Telepon</label>
                                    <p>{{ '-' }}</p>
                                </div>
                            @else
                                <div class="col-md-6">
                                    <label class="labels fw-bold">Nomor Telepon</label>
                                    <p>{{ $pelamar->telepon_rumah }}</p>
                                </div>
                            @endif
                            <div class="col-md-6">
                                <label class="labels fw-bold">Email</label>
                                <p>{{ $pelamar->email }}</p>
                            </div>
                        </div>
                        <div class="row mt-2">

                            @if (
                                $pelamar->alamat == null &&
                                    $pelamar->tanggal_lahir == null &&
                                    $pelamar->jenis_kelamin == null)
                                <div class="col-md-6">
                                    <label class="labels fw-bold">Alamat</label>
                                    <p>{{ '-' }}</p>

                                </div>
                                <div class="col-md-6">
                                    <label class="labels fw-bold">Tanggal Lahir, Jenis Kelamin</label>
                                    <p>{{ '-' }}</p>
                                </div>
                            @else
                                <div class="col-md-6">
                                    <label class="labels fw-bold">Alamat</label>
                                    <p>{{ $pelamar->alamat }}</p>

                                </div>
                                <div class="col-md-6">
                                    <label class="labels fw-bold">Tanggal Lahir, Jenis Kelamin</label>
                                    <p>{{ $pelamar->tanggal_lahir }} , {{ $pelamar->jenis_kelamin }}</p>
                                </div>
                            @endif
                        </div>
                        <div class="row mt-2">
                            @if ($pelamar->kebangsaan == null)
                                <div class="col-md-6">
                                    <label class="labels fw-bold">Kebangsaan</label>
                                    <p>{{ '-' }}</p>
                                </div>
                            @else
                                <div class="col-md-6">
                                    <label class="labels fw-bold">Kebangsaan</label>
                                    <p>{{ $pelamar->kebangsaan }}</p>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>


            <div class="container mt-4">
                @include('profil.post-profile.deskripsi')
                @include('profil.post-profile.pengalamanKerja')
                @include('profil.post-profile.pendidikan')
                {{-- @include('profil.post-profile.referensi') --}}
            </div>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
            </script>
            <script src="https://code.jquery.com/jquery-3.6.3.min.js"
                integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
            {{-- JQuery --}}
            <script src="https://code.jquery.com/jquery-3.6.3.min.js"
                integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

</body>

</html>

<script>
    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    });

    function hapusData() {
        document.getElementById("formDeskripsiDiri").reset();
        document.getElementById("formPengalamanKerja").reset();
        document.getElementById("formPendidikan").reset();
        document.getElementById("formReferensi").reset();
        document.getElementById("formEditProfil").reset();
        $('#kabupaten').html("");
        $('#kabupaten').append($('<option>', {
            class: 'kabupaten-list',
            value: "",
            text: "Kabupaten/Kota"
        }));

    }



    function limitYear() {
        var tahun = document.getElementById("tahunBerakhir").value
    }


    // var inputPosisi = document.getElementById("posisi");
    // var option1 = document.getElementById("konfirmasiYa");
    // var option2 = document.getElementById("konfirmasiTidak");

    // option1.addEventListener("change", function() {
    //     if (option1.checked) {
    //         inputPosisi.style.display = "block";
    //     }

    // });

    // option2.addEventListener("change", function() {
    //     if (option2.checked) {
    //         inputPosisi.style.display = "none";
    //     }

    // });


    var confirm = document.getElementById("konfirmasi")

    confirm.addEventListener("change", function() {
        if (confirm.checked) {
            confirm.value = "true"
        } else {
            confirm.value = "false"
        }
    })

    confirm.addEventListener("change", function() {
        console.log(confirm.checked)
        if (confirm.checked) {
            document.getElementById("tahun_selesai").disabled = true;
            document.getElementById("tahun_selesai").value = ""
        } else {
            document.getElementById("tahun_selesai").disabled = false;
        }
    })

    var jenjang_pendidikan = document.getElementById('jenjangPendidikan')
    jenjang_pendidikan.addEventListener("click", function(){
        console.log(jenjang_pendidikan.checked)
        
    })

    // $('#provinsi').on('change', function(e) {
    //     console.log(this.value);
    //     e.preventDefault();
    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
    //         },
    //         type: 'GET',
    //         url: "{{ url('/profil/fetch_kabupaten') }}",
    //         data: {
    //             id_provinsi: this.value
    //         },
    //         dataType: 'json',
    //         success: function(data) {
    //             $('#kabupaten').html("");

    //             data.forEach(function(kabupaten) {


    //                 // $('#kabupaten').html('<option value"='+kabupaten.id_kabupaten+'">'+kabupaten.nama_kabupaten+'</option>')

    //                 $('#kabupaten').append($('<option>', {
    //                     class: 'kabupaten-list',
    //                     value: kabupaten.id_kabupaten,
    //                     text: kabupaten.nama_kabupaten
    //                 }));

    //             })

    //         },
    //         error: function(xhr, status, error) {
    //             console.log('eror');
    //         }
    //     });

    
</script>
