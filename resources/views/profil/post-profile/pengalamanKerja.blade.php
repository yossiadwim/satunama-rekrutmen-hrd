<div class="md-12">
    <div class="row">
        <div class="col-8">
            <h3 class="fw-bold ">PENGALAMAN KERJA</h3>
        </div>
        @if ($pengalamanKerjaExists)
            <div class="col-4 text-align-right">
                <a href="/profil-kandidat/users/{{ $user->slug }}/work-experience"
                    class="btn btn-primary bg-btn border-0" data-bs-toggle="modal" data-bs-target="#pengalamanKerja"><i
                        class="bi bi-plus-circle-fill"></i>
                    Tambahkan pengalaman kerja</a>
            </div>
            <div class="modal fade " id="pengalamanKerja" tabindex="-1" aria-labelledby="pengalamanKerjaLabel"
                aria-hidden="true">
                <div class="modal-dialog  ">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="pengalamanKerjaLabel">Pengalaman Kerja</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" ID="close"
                                aria-label="Close" onclick="hapusData()"></button>
                        </div>
                        <form method="post" action="/pengalamanKerja" id="formPengalamanKerja">
                            @csrf
                            <div class="modal-body">
                                <p>Tambahkan pengalaman kerja yang Anda miliki</p>

                                <div class="mb-3" hidden>
                                    <input type="text" class="form-control mb-4" name="id_pelamar" id="id_pelamar"
                                        value="">
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control mb-4" name="nama_perusahaan"
                                        id="namaPerusahaan" placeholder="Nama perusahaan">
                                    <label for="namaPerusahaan">Nama perusahaan</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control mb-4" name="posisi" id="posisi"
                                        placeholder="Posisi / jabatan">
                                    <label for="posisijabatan">Posisi / Jabatan</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control mb-4" name="periode" id="periode"
                                        placeholder="periode">
                                    <label for="periode">Periode. Contoh: 2020 - 2021</label>
                                </div>

                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" value="false" id="konfirmasi"
                                        name="masih_bekerja">
                                    <label class="form-check-label" for="konfirmasi">
                                        Saya masih bekerja di perusahaan ini
                                    </label>
                                </div>

                                <div class="form-floating">
                                    <input type="text" class="form-control mb-4" name="gaji" id="gaji"
                                        placeholder="Gaji">
                                    <label for="gaji">Gaji</label>

                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="alasan_mengundurkan_diri"
                                        style="height: 200px"></textarea>
                                    <label for="floatingTextarea2">Alasan mengundurkan diri</label>
                                </div>
                                <div class="form-floating" hidden>
                                    <input type="text" class="form-control mb-4" name="id_pelamar" id="id_pelamar"
                                        placeholder="id_pelamar" value="{{ $user->pelamar->id }}">
                                    <label for="id_pelamar">id_pelamar</label>

                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                    onclick="hapusData()">Close</button>
                                <button type="submit" class="btn btn-primary btn-simpan border-0">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <hr class="border border-secondary">
    <div class="col-md-12 mt-5 mb-1 d-flex justify-content-center">

        @if (!$pengalamanKerjaExists)
            <a href="/profil-kandidat/users/{{ $user->slug }}/work-experience"
                class="btn btn-primary border-0 mt-5 mb-5" data-bs-toggle="modal" data-bs-target="#pengalamanKerja"><i
                    class="bi bi-plus-circle-fill"></i>
                Tambahkan pengalaman kerja</a>

            <!-- Modal -->
            <div class="modal fade " id="pengalamanKerja" tabindex="-1" aria-labelledby="pengalamanKerjaLabel"
                aria-hidden="true">
                <div class="modal-dialog  ">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="pengalamanKerjaLabel">Pengalaman Kerja</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" ID="close"
                                aria-label="Close" onclick="hapusData()"></button>
                        </div>
                        <form method="post" action="/pengalamanKerja" id="formPengalamanKerja">
                            @csrf
                            <div class="modal-body">
                                <p>Tambahkan pengalaman kerja yang Anda miliki</p>

                                <div class="mb-3" hidden>
                                    <input type="text" class="form-control mb-4" name="id_pelamar"
                                        id="id_pelamar" value="">
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control mb-4" name="nama_perusahaan"
                                        id="namaPerusahaan" placeholder="Nama perusahaan">
                                    <label for="namaPerusahaan">Nama perusahaan</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control mb-4" name="posisi"
                                        id="posisijabatan" placeholder="Posisi / jabatan">
                                    <label for="posisijabatan">Posisi / Jabatan</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control mb-4" name="periode" id="periode"
                                        placeholder="periode">
                                    <label for="periode">Periode. Contoh: 2020 - 2021</label>
                                </div>

                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" value="false" id="konfirmasi"
                                        name="masih_bekerja">
                                    <label class="form-check-label" for="konfirmasi">
                                        Saya masih bekerja di perusahaan ini
                                    </label>
                                </div>

                                <div class="form-floating">
                                    <input type="text" class="form-control mb-4" name="gaji" id="gaji"
                                        placeholder="Gaji">
                                    <label for="gaji">Gaji</label>

                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                        name="alasan_mengundurkan_diri" style="height: 200px"></textarea>
                                    <label for="floatingTextarea2">Alasan mengundurkan diri</label>
                                </div>
                                <div class="form-floating" hidden>
                                    <input type="text" class="form-control mb-4" name="id_pelamar"
                                        id="id_pelamar" placeholder="id_pelamar" value="{{ $user->pelamar->id }}">
                                    <label for="id_pelamar">id_pelamar</label>

                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                    onclick="hapusData()">Close</button>
                                <button type="submit" class="btn btn-primary btn-simpan border-0">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="container">
                @foreach ($pengalamanKerja as $pk)
                    <div class="row border-secondary border-3 border-start mb-2">
                        <div class="col">
                            <p class="fs-4 fw-bold">{{ $pk->nama_perusahaan }}</p>
                            <p>{{ $pk->posisi }}</p>
                            <p>{{ $pk->periode }}</p>
                        </div>
                        <div class="col">
                            <div>
                                <a href="/pengalamanKerja/{{ $pk->id }}/edit"
                                    class="btn btn-primary border-0 mt-5 mb-5" data-bs-toggle="modal"
                                    data-bs-target="#pengalamanKerja-{{ $pk->id }}"><i
                                        class="bi bi-pencil-fill"></i>
                                    Edit</a>

                                <a href="/pengalamanKerja/{{ $pk->id }}"
                                    class="btn btn-danger border-0 mt-5 mb-5" data-bs-toggle="modal"
                                    data-bs-target="#hapusPengalamanKerja{{ $pk->id }}"><i
                                        class="bi bi-trash3-fill"></i>
                                    Hapus</a>
                            </div>
                            <div class="modal fade " id="pengalamanKerja-{{ $pk->id }}" tabindex="-1"
                                aria-labelledby="pengalamanKerjaLabel" aria-hidden="true">
                                <div class="modal-dialog  ">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="pengalamanKerjaLabel">Pengalaman Kerja
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                ID="close" aria-label="Close" onclick="hapusData()"></button>
                                        </div>
                                        <form method="post"
                                            action="/pengalamanKerja/{{ $pk->id }}"
                                            id="formPengalamanKerja">
                                            @method('put')
                                            @csrf
                                            <div class="modal-body">
                                                <p>Tambahkan pengalaman kerja yang Anda miliki</p>

                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control mb-4"
                                                        name="nama_perusahaan" id="namaPerusahaan"
                                                        placeholder="Nama perusahaan" value="{{ $pk->nama_perusahaan }}">
                                                    <label for="namaPerusahaan">Nama perusahaan</label>
                                                </div>

                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control mb-4" name="posisi"
                                                        id="posisijabatan" placeholder="Posisi / jabatan" value="{{ $pk->posisi }}">
                                                    <label for="posisijabatan">Posisi / Jabatan</label>
                                                </div>

                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control mb-4" name="periode"
                                                        id="periode" placeholder="periode" value="{{ $pk->periode }}">
                                                    <label for="periode">Periode. Contoh: 2020 - 2021</label>
                                                </div>

                                                <div class="form-check mb-4">
                                                    <input class="form-check-input" type="checkbox" value="false"
                                                        id="konfirmasi" name="masih_bekerja">
                                                    <label class="form-check-label" for="konfirmasi">
                                                        Saya masih bekerja di perusahaan ini
                                                    </label>
                                                </div>

                                                <div class="form-floating">
                                                    <input type="text" class="form-control mb-4" name="gaji"
                                                        id="gaji" placeholder="Gaji" value="{{ $pk->gaji }}">
                                                    <label for="gaji">Gaji</label>

                                                </div>
                                                <div class="form-floating">
                                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                                        name="alasan_mengundurkan_diri" style="height: 200px">{{ $pk->alasan_mengundurkan_diri }}</textarea>
                                                    <label for="floatingTextarea2">Alasan mengundurkan diri</label>
                                                </div>
                                                <div class="form-floating" hidden>
                                                    <input type="text" class="form-control mb-4" name="id_pelamar"
                                                        id="id_pelamar" placeholder="id_pelamar"
                                                        value="{{ $user->pelamar->id }}">
                                                    <label for="id_pelamar">id_pelamar</label>

                                                </div>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal" onclick="hapusData()">Close</button>
                                                <button type="submit"
                                                    class="btn btn-primary btn-simpan border-0">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="hapusPengalamanKerja{{ $pk->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <form action="/pengalamanKerja/{{ $pk->id }}" method="post">
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
