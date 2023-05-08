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
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle " width="150px"
                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    {{-- <span class="font-weight-bold">{{ auth()->user()->name }}</span>
                    <span class="text-black-50">{{ auth()->user()->email }}</span> --}}
                    <span> </span>

                    @include('profil.post-profile.edit-profil')

                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="row mt-2">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Yossia Dwi Mahardika</h4>


                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels fw-bold">Nomor Telepon</label>
                            <p>+6281273422807</p>
                            {{-- <input type="text" class="form-control" placeholder="first name" value=""> --}}
                        </div>
                        <div class="col-md-6">
                            <label class="labels fw-bold">Email</label>
                            <p>{{ auth()->user()->email }}</p>
                            {{-- <input type="text" class="form-control" placeholder="first name" value=""> --}}
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels fw-bold">Lokasi</label>
                            <p>Yogyakarta, Indonesia</p>
                            {{-- <input type="text" class="form-control" value="" placeholder="surname"> --}}
                        </div>
                        <div class="col-md-6">
                            <label class="labels fw-bold">Usia, Jenis Kelamin</label>
                            <p>21, Laki-laki</p>
                            {{-- <input type="text" class="form-control" placeholder="first name" value=""> --}}
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels fw-bold">Status Kependudukan</label>
                            <p>Pelajar/Mahasiswa</p>
                            {{-- <input type="text" class="form-control" value="" placeholder="surname"> --}}
                        </div>
                        <div class="col-md-6">
                            <label class="labels fw-bold">Kewarganegaraan</label>
                            <p>Indonesia</p>
                            {{-- <input type="text" class="form-control" placeholder="first name" value=""> --}}
                        </div>
                    </div>


                </div>
            </div>
            <div class="container  mt-4">

                @include('profil.post-profile.deskripsi')
                @include('profil.post-profile.pengalamanKerja')
                @include('profil.post-profile.pendidikan')
                @include('profil.post-profile.referensi')



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


    var inputPosisi = document.getElementById("posisi");
    var option1 = document.getElementById("konfirmasiYa");
    var option2 = document.getElementById("konfirmasiTidak");

    option1.addEventListener("change", function() {
        if (option1.checked) {
            inputPosisi.style.display = "block";
        }

    });

    option2.addEventListener("change", function() {
        if (option2.checked) {
            inputPosisi.style.display = "none";
        }

    });




    var confirm = document.getElementById("konfirmasi")

    confirm.addEventListener("change", function() {
        console.log(confirm.checked)
        if (confirm.checked) {
            document.getElementById("bulanBerakhir").disabled = true;
            document.getElementById("bulanBerakhir").value = ""

            document.getElementById("tahunBerakhir").disabled = true;
            document.getElementById("tahunBerakhir").value = ""
        } else {
            document.getElementById("bulanBerakhir").disabled = false;
            document.getElementById("tahunBerakhir").disabled = false;
        }
    })

    $('#provinsi').on('change', function(e) {
        console.log(this.value);
        e.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
            },
            type: 'GET',
            url: "{{ url('/profil/fetch_kabupaten') }}",
            data: {
                id_provinsi: this.value
            },
            dataType: 'json',
            success: function(data) {
                $('#kabupaten').html("");

                data.forEach(function(kabupaten) {


                    // $('#kabupaten').html('<option value"='+kabupaten.id_kabupaten+'">'+kabupaten.nama_kabupaten+'</option>')

                    $('#kabupaten').append($('<option>', {
                        class: 'kabupaten-list',
                        value: kabupaten.id_kabupaten,
                        text: kabupaten.nama_kabupaten
                    }));

                })

            },
            error: function(xhr, status, error) {
                console.log('eror');
            }
        });

    })
</script>
