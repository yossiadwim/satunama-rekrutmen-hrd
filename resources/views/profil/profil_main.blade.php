{{-- @dd($users ) --}}
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
    <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <script src="https://kit.fontawesome.com/b3626122b8.js" crossorigin="anonymous"></script>


    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
    <title>Yayasan SATUNAMA</title>
</head>

<body style="font-family: Poppins">
    @include('partials.navbar')

    <div class="container border border-light">
        <div class="row mt-3">
            <div class="col-md-3">
                <div class="d-flex flex-column align-items-center  p-3 py-5">
                    <img class="rounded-circle " width="150px"
                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    <span> </span>

                    @include('profil.post-profile.edit-profil')

                </div>
            </div>
            <div class="col-md-8">
                <div class="p-3 py-5">
                    @foreach ($pelamars as $pelamar)
                        <h4 class="fw-bold mb-4">{{ $pelamar->nama_pelamar }}</h4>
                        <div class="row mt-2">
                            @if ($pelamar->telepon_rumah == null)
                                <div class="col-md-6">
                                    <label class="labels fw-bold"><i class="fa-solid fa-phone"></i> Nomor
                                        Telepon</label>
                                    <p>{{ '-' }}</p>
                                </div>
                            @else
                                <div class="col-md-6">
                                    <label class="labels fw-bold"><i class="fa-solid fa-phone"></i> Nomor
                                        Telepon</label>
                                    <p>{{ $pelamar->telepon_rumah }}</p>
                                </div>
                            @endif
                            <div class="col-md-6">
                                <label class="labels fw-bold"><i class="fa-solid fa-envelope"></i>
                                    Email</label>
                                <p>{{ $pelamar->email }}</p>
                            </div>
                        </div>
                        <div class="row mt-2">

                            @if ($pelamar->alamat == null && $pelamar->tanggal_lahir == null)
                                <div class="col-md-6">
                                    <label class="labels fw-bold"><i class="fa-solid fa-location-dot"></i>
                                        Alamat</label>
                                    <p>{{ '-' }}</p>

                                </div>
                                <div class="col-md-6">
                                    <label class="labels fw-bold"><i class="fa-regular fa-calendar-days"></i>
                                        Tanggal
                                        Lahir</label>
                                    <p>{{ '-' }}</p>
                                </div>
                            @else
                                <div class="col-md-6">
                                    <label class="labels fw-bold"><i class="fa-solid fa-location-dot"></i>
                                        Alamat</label>
                                    <p>{{ $pelamar->alamat }}</p>

                                </div>
                                <div class="col-md-6">
                                    <label class="labels fw-bold"><i class="fa-regular fa-calendar-days"></i>
                                        Tanggal
                                        Lahir</label>
                                    <p>{{ \Carbon\Carbon::parse($pelamar->tanggal_lahir)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('j F Y ') }}
                                    </p>
                                </div>
                            @endif
                        </div>

                        <div class="row mt-2">
                            @if ($pelamar->kebangsaan == null)
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
                                    <p>{{ $pelamar->kebangsaan }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label class="labels fw-bold"><i class="fa-solid fa-user"></i>
                                        Jenis Kelamin</label>
                                    <p>{{ $pelamar->jenis_kelamin }}</p>
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
                @include('profil.post-profile.referensi')
            </div>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
            </script>
            <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>

        </div>
</body>

</html>

<script>
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
        toastr.options.timeOut = 30; // How long the toast will display without user interaction
        toastr.options.extendedTimeOut = 60;
    @elseif (Session::has('success add description'))
        toastr.success("{{ Session::get('success add description') }}")
        toastr.options.timeOut = 30; // How long the toast will display without user interaction
        toastr.options.extendedTimeOut = 60;
    @elseif (Session::has('success add work experience'))
        toastr.success("{{ Session::get('success add work experience') }}")
        toastr.options.timeOut = 30; // How long the toast will display without user interaction
        toastr.options.extendedTimeOut = 60;
    @elseif (Session::has('success update work experience'))
        toastr.success("{{ Session::get('success update work experience') }}")
        toastr.options.timeOut = 30; // How long the toast will display without user interaction
        toastr.options.extendedTimeOut = 60;
    @elseif (Session::has('success delete work experience'))
        toastr.success("{{ Session::get('success delete work experience') }}")
        toastr.options.timeOut = 30; // How long the toast will display without user interaction
        toastr.options.extendedTimeOut = 60;
    @elseif (Session::has('success add education'))
        toastr.success("{{ Session::get('success add education') }}")
        toastr.options.timeOut = 30; // How long the toast will display without user interaction
        toastr.options.extendedTimeOut = 60;
    @elseif (Session::has('success update education'))
        toastr.success("{{ Session::get('success update education') }}")
        toastr.options.timeOut = 30; // How long the toast will display without user interaction
        toastr.options.extendedTimeOut = 60;
    @elseif (Session::has('success delete education'))
        toastr.success("{{ Session::get('success delete education') }}")
        toastr.options.timeOut = 30; // How long the toast will display without user interaction
        toastr.options.extendedTimeOut = 60;
    @elseif (Session::has('success add reference'))
        toastr.success("{{ Session::get('success add reference') }}")
        toastr.options.timeOut = 30; // How long the toast will display without user interaction
        toastr.options.extendedTimeOut = 60;
    @elseif (Session::has('success update reference'))
        toastr.success("{{ Session::get('success update reference') }}")
        toastr.options.timeOut = 30; // How long the toast will display without user interaction
        toastr.options.extendedTimeOut = 60;
    @elseif (Session::has('success delete reference'))
        toastr.success("{{ Session::get('success delete reference') }}")
        toastr.options.timeOut = 30; // How long the toast will display without user interaction
        toastr.options.extendedTimeOut = 60;
    @endif

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


    var confirm = document.getElementById("konfirmasi")

    confirm.addEventListener("change", function() {
        if (confirm.checked) {
            confirm.value = "true"
        } else {
            confirm.value = "false"
        }
    })

    var button_check_reference = document.getElementById('button-check-reference');

    button_check_reference.addEventListener("click", function() {
        if (button_check_reference.checked) {
            document.getElementById('div-posisi').hidden = false;

        } else {
            document.getElementById('div-posisi').hidden = true;
        }
    })
    // confirm.addEventListener("change", function() {

    //     if (confirm.checked) {
    //         document.getElementById("tahun_selesai").disabled = true;
    //         document.getElementById("tahun_selesai").value = ""
    //     } else {
    //         document.getElementById("tahun_selesai").disabled = false;
    //     }
    // })

    var jenjang_pendidikan = document.getElementById('jenjangPendidikan')
    jenjang_pendidikan.addEventListener("click", function() {
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
