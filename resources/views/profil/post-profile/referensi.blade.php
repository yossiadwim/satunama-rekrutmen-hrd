<div class="md-12 mt-5">
    <div class="row">
        <div class="col-8">
            <h3 class="fw-bold ">REFERENSI</h3>
        </div>
        @if ($referensiExists)
            <div class="col-4">
                <a href="/profil-kandidat/users/{{ $user->slug }}/education" class="btn bg-btn btn-primary border-0"
                    data-bs-toggle="modal" data-bs-target="#pendidikan"><i class="bi bi-plus-circle-fill"></i> Tambahkan
                    Referensi</a>
            </div>

            <!-- Modal -->
            <div class="modal fade " id="pendidikan" tabindex="-1" aria-labelledby="pendidikanLabel"
                aria-hidden="true">
                <div class="modal-dialog  modal-lg">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="pendidikanLabel">Referensi</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" id="close"
                                aria-label="Close" onclick="hapusData()"></button>
                        </div>
                        <form action="/pendidikan" method="post" id="formPendidikan" enctype="multipart/form-data">
                            <div class="modal-body">
                                <p>Tambahkan referensi Anda dalam mendaftar</p>
                                @csrf

                                <div class="form-floating mb-4 mt-4 col-6">
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        placeholder="nama">

                                    <label for="nama">Nama</label>
                                </div>

                                <div class="form-floating mb-4 mt-4 col-6">
                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                        placeholder="alamat">

                                    <label for="alamat">Alamat</label>
                                </div>
                                <div class="form-floating mb-4 mt-4 col-6">
                                    <input type="text" class="form-control" id="telepon" name="telepon"
                                        placeholder="telepon">

                                    <label for="telepon">Telepon</label>
                                </div>
                                <div class="form-floating mb-4 mt-4 col-6">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="email">

                                    <label for="email">Email</label>
                                </div>

                                <div class="form-floating mb-4 mt-4 col-6">
                                    <input type="text" class="form-control" id="hubungan" name="hubungan"
                                        placeholder="hubungan">

                                    <label for="hubungan">Hubungan</label>
                                </div>

                                <div class="form-floating mb-4 mt-4 col-6">
                                    <input type="text" class="form-control" id="posisi" name="posisi"
                                        placeholder="posisi">

                                    <label for="posisi">Posisi</label>
                                </div>

                                <div class="form-floating mb-4 mt-4 col-6" hidden>
                                    <input type="text" class="form-control" id="id_pelamar" name="id_pelamar"
                                        placeholder="id_pelamar" value="{{ $user->id_pelamar }}">

                                    <label for="id_pelamar">id_pelamar</label>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-batal" data-bs-dismiss="modal"
                                    onclick="hapusData()">Batal</button>
                                <button type="submit" class="btn btn-primary btn-simpan border-0">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <hr class="border border-secondary">
    <div class="col-md-12 mt-5 mb-5 d-flex justify-content-center">

        @if (!$referensiExists)
            <!-- Button trigger modal -->
            <a href="/profil-kandidat/users/{{ $user->slug }}/reference" class="btn btn-primary border-0"
                data-bs-toggle="modal" data-bs-target="#reference"><i class="bi bi-plus-circle-fill"></i> Tambahkan
                Referensi</a>

            <!-- Modal -->
            <div class="modal fade " id="reference" tabindex="-1" aria-labelledby="refernceLabel" aria-hidden="true">
                <div class="modal-dialog  modal-md">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="referenceLabel">Referensi</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" id="close"
                                aria-label="Close" onclick="hapusData()"></button>
                        </div>
                        <form action="/referensi" method="post" id="formPendidikan" enctype="multipart/form-data">
                            <div class="modal-body">
                                <p>Tambahkan referensi yang Anda gunakan dalam melamar</p>
                                @csrf

                                <div class="form-floating mb-4 mt-4 col-12">
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        placeholder="nama">

                                    <label for="nama">Nama</label>
                                </div>

                                <div class="form-floating mb-4 mt-4 col-12">
                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                        placeholder="alamat">

                                    <label for="alamat">Alamat</label>
                                </div>
                                <div class="form-floating mb-4 mt-4 col-12">
                                    <input type="text" class="form-control" id="telepon" name="telepon"
                                        placeholder="telepon">

                                    <label for="telepon">Telepon</label>
                                </div>
                                <div class="form-floating mb-4 mt-4 col-12">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="email">

                                    <label for="email">Email</label>
                                </div>

                                <div class="form-floating mb-4 mt-4 col-12">
                                    <input type="text" class="form-control" id="hubungan" name="hubungan"
                                        placeholder="hubungan">

                                    <label for="hubungan">Hubungan</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="button-check-reference">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Apakah dari SATUNAMA?
                                    </label>
                                </div>

                                <div class="form-floating mb-4 mt-4 col-12" id="div-posisi" hidden>
                                    <input type="text" class="form-control" id="posisi" name="posisi"
                                        placeholder="posisi" >

                                    <label for="posisi">Posisi</label>
                                </div>

                                <div class="form-floating mb-4 mt-4 col-6" hidden>
                                    <input type="text" class="form-control" id="id_pelamar" name="id_pelamar"
                                        placeholder="id_pelamar" value="{{ $user->id_pelamar }}">

                                    <label for="id_pelamar">id_pelamar</label>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-batal" data-bs-dismiss="modal"
                                    onclick="hapusData()">Batal</button>
                                <button type="submit" class="btn btn-primary btn-simpan border-0">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @else
            <div class="container">
                @foreach ($referensis as $referensi)
                    <div class="row border-secondary border-3 border-start mb-2">
                        <div class="col">

                            <p>Nama: {{ $referensi->nama }}</p>
                            <p>Alamat: {{ $referensi->alamat }}</p>
                            <p>Telepon: {{ $referensi->telepon }}</p>
                            <p>Email: {{ $referensi->email }}</p>
                            <p>Hubungan: {{ $referensi->hubungan }}</p>
                            <p>Posisi: {{ $referensi->posisi }}</p>

                        </div>
                        <div class="col">
                            <div>
                                <a href="/referensi/{{ $referensi->id_referensi }}/edit"
                                    class="btn btn-primary border-0 mt-5 mb-5" data-bs-toggle="modal"
                                    data-bs-target="#referensi-{{ $referensi->id_referensi }}"><i
                                        class="bi bi-pencil-fill"></i>
                                    Edit</a>

                                <a href="/referensi/{{ $referensi->id_referensi }}" class="btn btn-danger border-0 mt-5 mb-5"
                                    data-bs-toggle="modal"
                                    data-bs-target="#hapusReferensi{{ $referensi->id_referensi }}"><i
                                        class="bi bi-trash3-fill"></i>
                                    Hapus</a>
                            </div>
                            <div class="modal fade " id="referensi-{{ $referensi->id_referensi }}" tabindex="-1"
                                aria-labelledby="referensiLabel" aria-hidden="true">
                                <div class="modal-dialog  modal-md">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="referensiLabel">Referensi</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                id="close" aria-label="Close" onclick="hapusData()"></button>
                                        </div>
                                        <form action="/referensi/{{ $referensi->id_referensi }}" method="POST"
                                            id="formReferensi" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <p>Tambahkan referensi yang Anda gunakan dalam melamar</p>
                                                <div class="form-floating mb-4 mt-4 col-12">
                                                    <input type="text" class="form-control" id="nama" name="nama"
                                                        placeholder="nama" value="{{ old('nama', $referensi->nama) }}">
                
                                                    <label for="nama">Nama</label>
                                                </div>
                
                                                <div class="form-floating mb-4 mt-4 col-12">
                                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                                        placeholder="alamat" value="{{ old('alamat',$referensi->alamat) }}">
                
                                                    <label for="alamat">Alamat</label>
                                                </div>
                                                <div class="form-floating mb-4 mt-4 col-12">
                                                    <input type="text" class="form-control" id="telepon" name="telepon"
                                                        placeholder="telepon" value="{{ old('telepon', $referensi->telepon) }}">
                
                                                    <label for="telepon">Telepon</label>
                                                </div>
                                                <div class="form-floating mb-4 mt-4 col-12">
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        placeholder="email" value="{{ old('email', $referensi->email) }}">
                
                                                    <label for="email">Email</label>
                                                </div>
                
                                                <div class="form-floating mb-4 mt-4 col-12">
                                                    <input type="text" class="form-control" id="hubungan" name="hubungan"
                                                        placeholder="hubungan" value="{{ old('hubungan', $referensi->hubungan) }}">
                
                                                    <label for="hubungan">Hubungan</label>
                                                </div>
                
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="button-check-reference">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Apakah dari SATUNAMA?
                                                    </label>
                                                </div>
                
                                                <div class="form-floating mb-4 mt-4 col-12" id="div-posisi" hidden>
                                                    <input type="text" class="form-control" id="posisi" name="posisi"
                                                        placeholder="posisi" value="{{ old('posisi', $referensi->posisi) }}">
                
                                                    <label for="posisi">Posisi</label>
                                                </div>
                
                                                <div class="form-floating mb-4 mt-4 col-6" hidden>
                                                    <input type="text" class="form-control" id="id_pelamar" name="id_pelamar"
                                                        placeholder="id_pelamar" value="{{ $user->id_pelamar }}">
                
                                                    <label for="id_pelamar">id_pelamar</label>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-batal"
                                                    data-bs-dismiss="modal" onclick="hapusData()">Batal</button>
                                                <button type="submit"
                                                    class="btn btn-primary btn-simpan border-0">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="hapusReferensi{{ $referensi->id_referensi }}"
                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Informasi ini akan dihapus. Yakin ingin menghapusnya?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <form action="/referensi/{{ $referensi->id_referensi }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-primary">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
