<div class="md-12 mt-5">
    <div class="row">
        <div class="col-8">
            <h3 class="fw-bold ">PENDIDIKAN</h3>
        </div>
        @if ($pendidikanExists)
            <div class="col-4">
                <a href="/profil/{{ $profil->id }}/edit" class="btn bg-btn btn-primary border-0" data-bs-toggle="modal"
                    data-bs-target="#pendidikan"><i class="bi bi-plus-circle-fill"></i> Tambahkan pendidikan</a>
            </div>

            <!-- Modal -->
            <div class="modal fade " id="pendidikan" tabindex="-1" aria-labelledby="pendidikanLabel"
                aria-hidden="true">
                <div class="modal-dialog  modal-lg">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="pendidikanLabel">Pendidikan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" id="close"
                                aria-label="Close" onclick="hapusData()"></button>
                        </div>
                        <form action="/pendidikan" method="post" id="formPendidikan" enctype="multipart/form-data">
                            <div class="modal-body">
                                <p>Beritahu kami pendidikan yang pernah Anda tempuh</p>
                                @csrf
                                <div class="mb-4 mt-4 col-6" hidden>
                                    <input type="text" class="form-control" id="namaInstansiLabel" name="user_id"
                                        placeholder="Nama Instansi" value="{{ $profil->user_id }}">
                                </div>
                                <div class="mb-4 mt-4 col-6" hidden>
                                    <input type="text" class="form-control" id="namaInstansiLabel" name="profil_id"
                                        placeholder="Nama Instansi" value="{{ $profil->id }}">
                                </div>
                                <div class="mb-4 mt-4 col-6" hidden>
                                    <input type="text" class="form-control" id="namaInstansiLabel" name="pelamar_id"
                                        placeholder="Nama Instansi" value="">
                                </div>
                                <div class="row g-3 mb-4">
                                    <div class="col-md-6">
                                        <label for="jenjangPendidikan">Pilih Jenjang Pendidikan</label>
                                        <select class="form-select" aria-label="Default select example"
                                            id="jenjangPendidikan" name="jenjang_pendidikan">
                                            <option selected disabled>Pilih Jenjang Pendidikan</option>
                                            <option value="SD">SD (Sekolah Dasar)</option>
                                            <option value="SMP">SMP (Sekolah Menengah Pertama)</option>
                                            <option value="SMA">SMA (Sekolah Menengah Atas)</option>
                                            <option value="SMK">SMK (Sekolah Menengah Kejuruan)</option>
                                            <option value="Universitas">Universitas</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-4 mt-4 col-6">
                                    <label for="namaInstansiLabel">Nama Instansi</label>
                                    <input type="text" class="form-control" id="namaInstansiLabel"
                                        name="nama_instansi" placeholder="Nama Instansi">
                                </div>
                                {{-- <div class="mb-4 mt-4">
                                <label for="alamatLabel">Alamat</label>
                                <input type="text" class="form-control" id="alamatLabel" name="alamat"
                                    placeholder="Alamat">
                            </div> --}}
                                <div class="col-md-3">
                                    <label for="tahunSelesai">Tahun Selesai</label>
                                    <select name="tahun_selesai" id="tahunSelesai" class="form-select">
                                        <option disabled selected>Tahun Selesai</option>
                                        @foreach (range(date('Y') - 123, date('Y')) as $year)
                                            <option value="{{ $year }}"> {{ $year }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <div class="col-md-6">
                                <div class="mb-3 mt-4">
                                    <label for="formFileMultiple" class="form-label">Masukkan lampiran</label>
                                    <input class="form-control" type="file" id="formFileMultiple" multiple>
                                </div>
                            </div> --}}

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

        @if (!$pendidikanExists)
            <!-- Button trigger modal -->
            <a href="/profil/{{ $profil->id }}/edit" class="btn btn-primary border-0" data-bs-toggle="modal"
                data-bs-target="#pendidikan"><i class="bi bi-plus-circle-fill"></i> Tambahkan pendidikan</a>

            <!-- Modal -->
            <div class="modal fade " id="pendidikan" tabindex="-1" aria-labelledby="pendidikanLabel"
                aria-hidden="true">
                <div class="modal-dialog  modal-lg">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="pendidikanLabel">Pendidikan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" id="close"
                                aria-label="Close" onclick="hapusData()"></button>
                        </div>
                        <form action="/pendidikan" method="post" id="formPendidikan" enctype="multipart/form-data">
                            <div class="modal-body">
                                <p>Beritahu kami pendidikan yang pernah Anda tempuh</p>
                                @csrf
                                <div class="mb-4 mt-4 col-6" hidden>
                                    <input type="text" class="form-control" id="namaInstansiLabel" name="user_id"
                                        placeholder="Nama Instansi" value="{{ $profil->user_id }}">
                                </div>
                                <div class="mb-4 mt-4 col-6" hidden>
                                    <input type="text" class="form-control" id="namaInstansiLabel"
                                        name="profil_id" placeholder="Nama Instansi" value="{{ $profil->id }}">
                                </div>
                                <div class="mb-4 mt-4 col-6" hidden>
                                    <input type="text" class="form-control" id="namaInstansiLabel"
                                        name="pelamar_id" placeholder="Nama Instansi" value="">
                                </div>
                                <div class="row g-3 mb-4">
                                    <div class="col-md-6">
                                        <label for="jenjangPendidikan">Pilih Jenjang Pendidikan</label>
                                        <select class="form-select" aria-label="Default select example"
                                            id="jenjangPendidikan" name="jenjang_pendidikan">
                                            <option selected disabled>Pilih Jenjang Pendidikan</option>
                                            <option value="SD">SD (Sekolah Dasar)</option>
                                            <option value="SMP">SMP (Sekolah Menengah Pertama)</option>
                                            <option value="SMA">SMA (Sekolah Menengah Atas)</option>
                                            <option value="SMK">SMK (Sekolah Menengah Kejuruan)</option>
                                            <option value="Universitas">Universitas</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-4 mt-4 col-6">
                                    <label for="namaInstansiLabel">Nama Instansi</label>
                                    <input type="text" class="form-control" id="namaInstansiLabel"
                                        name="nama_instansi" placeholder="Nama Instansi">
                                </div>
                                {{-- <div class="mb-4 mt-4">
                                <label for="alamatLabel">Alamat</label>
                                <input type="text" class="form-control" id="alamatLabel" name="alamat"
                                    placeholder="Alamat">
                            </div> --}}
                                <div class="col-md-3">
                                    <label for="tahunSelesai">Tahun Selesai</label>
                                    <select name="tahun_selesai" id="tahunSelesai" class="form-select">
                                        <option disabled selected>Tahun Selesai</option>
                                        @foreach (range(date('Y') - 123, date('Y')) as $year)
                                            <option value="{{ $year }}"> {{ $year }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <div class="col-md-6">
                                <div class="mb-3 mt-4">
                                    <label for="formFileMultiple" class="form-label">Masukkan lampiran</label>
                                    <input class="form-control" type="file" id="formFileMultiple" multiple>
                                </div>
                            </div> --}}

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
                @foreach ($pendidikans as $pendidikan)
                    <div class="row border-secondary border-3 border-start mb-2">
                        <div class="col">
                            <p class="fs-4 fw-bold">{{ $pendidikan->nama_instansi }}</p>
                            <p>Jenjang {{ $pendidikan->jenjang_pendidikan }}</p>
                            <p>Tahun selesai {{ $pendidikan->tahun_selesai }}</p>

                        </div>
                        <div class="col">
                            <div>
                                <a href="/pendidikan/{{ $pendidikan->id }}/edit"
                                    class="btn btn-primary border-0 mt-5 mb-5" data-bs-toggle="modal"
                                    data-bs-target="#pendidikan-{{ $pendidikan->id }}"><i
                                        class="bi bi-pencil-fill"></i>
                                    Edit</a>

                                <a href="/pendidikan/{{ $pendidikan->id }}" class="btn btn-danger border-0 mt-5 mb-5"
                                    data-bs-toggle="modal" data-bs-target="#hapusPendidikan{{ $pendidikan->id }}"><i
                                        class="bi bi-trash3-fill"></i>
                                    Hapus</a>
                            </div>
                            <div class="modal fade " id="pendidikan-{{ $pendidikan->id }}" tabindex="-1"
                                aria-labelledby="pendidikanLabel" aria-hidden="true">
                                <div class="modal-dialog  modal-lg">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="pendidikanLabel">Pendidikan</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                id="close" aria-label="Close" onclick="hapusData()"></button>
                                        </div>
                                        <form action="/pendidikan/{{ $pendidikan->id }}" method="post" id="formPendidikan"
                                            enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <p>Beritahu kami pendidikan yang pernah Anda tempuh</p>
                                                @method('put')
                                                @csrf
                                                <div class="mb-4 mt-4 col-6" hidden>
                                                    <input type="text" class="form-control" id="namaInstansiLabel"
                                                        name="user_id" value="{{ $profil->user_id }}">
                                                </div>
                                                <div class="mb-4 mt-4 col-6" hidden>
                                                    <input type="text" class="form-control" id="namaInstansiLabel"
                                                        name="profil_id" value="{{ $profil->id }}">
                                                </div>
                                                <div class="mb-4 mt-4 col-6" hidden>
                                                    <input type="text" class="form-control" id="namaInstansiLabel"
                                                        name="pelamar_id" value="">
                                                </div>
                                                <div class="row g-3 mb-4">
                                                    <div class="col-md-6">
                                                        <label for="jenjangPendidikan">Pilih Jenjang Pendidikan</label>
                                                        <select class="form-select"
                                                            aria-label="Default select example" id="jenjangPendidikan"
                                                            name="jenjang_pendidikan">
                                                            @if (old('jenjang_pendidikan', $pendidikan->jenjang_pendidikan) == 'SD')
                                                                <option value="SD" selected>SD (Sekolah Dasar)
                                                                </option>
                                                                <option value="SMP">SMP (Sekolah Menengah Pertama)
                                                                </option>
                                                                <option value="SMA">SMA (Sekolah Menengah Atas)
                                                                </option>
                                                                <option value="SMK">SMK (Sekolah Menengah Kejuruan)
                                                                </option>
                                                                <option value="Universitas">Universitas</option>
                                                            @elseif (old('jenjang_pendidikan', $pendidikan->jenjang_pendidikan) == 'SMP')
                                                                <option value="SD" >SD (Sekolah Dasar)
                                                                </option>
                                                                <option value="SMP" selected>SMP (Sekolah Menengah Pertama)
                                                                </option>
                                                                <option value="SMA">SMA (Sekolah Menengah Atas)
                                                                </option>
                                                                <option value="SMK">SMK (Sekolah Menengah Kejuruan)
                                                                </option>
                                                                <option value="Universitas">Universitas</option>
                                                            @elseif (old('jenjang_pendidikan', $pendidikan->jenjang_pendidikan) == 'SMA')
                                                                <option value="SD">SD (Sekolah Dasar)
                                                                </option>
                                                                <option value="SMP" >SMP (Sekolah Menengah
                                                                    Pertama)
                                                                </option>
                                                                <option value="SMA" selected>SMA (Sekolah Menengah Atas)
                                                                </option>
                                                                <option value="SMK">SMK (Sekolah Menengah Kejuruan)
                                                                </option>
                                                                <option value="Universitas">Universitas</option>
                                                            @elseif (old('jenjang_pendidikan', $pendidikan->jenjang_pendidikan) == 'SMK')
                                                                <option value="SD">SD (Sekolah Dasar)
                                                                </option>
                                                                <option value="SMP">SMP (Sekolah Menengah Pertama)
                                                                </option>
                                                                <option value="SMA" >SMA (Sekolah Menengah
                                                                    Atas)
                                                                </option>
                                                                <option value="SMK" selected>SMK (Sekolah Menengah Kejuruan)
                                                                </option>
                                                                <option value="Universitas">Universitas</option>
                                                            @elseif (old('jenjang_pendidikan', $pendidikan->jenjang_pendidikan) == 'Universitas')
                                                                <option value="SD">SD (Sekolah Dasar)
                                                                </option>
                                                                <option value="SMP">SMP (Sekolah Menengah Pertama)
                                                                </option>
                                                                <option value="SMA">SMA (Sekolah Menengah Atas)
                                                                </option>
                                                                <option value="SMK">SMK (Sekolah Menengah Kejuruan)
                                                                </option>
                                                                <option value="Universitas" selected>Universitas
                                                                </option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="mb-4 mt-4 col-6">
                                                    <label for="namaInstansiLabel">Nama Instansi</label>
                                                    <input type="text" class="form-control" id="namaInstansiLabel"
                                                        name="nama_instansi" placeholder="Nama Instansi"
                                                        value="{{ old('nama_instansi', $pendidikan->nama_instansi) }}">
                                                </div>
                                                {{-- <div class="mb-4 mt-4">
                                <label for="alamatLabel">Alamat</label>
                                <input type="text" class="form-control" id="alamatLabel" name="alamat"
                                    placeholder="Alamat">
                            </div> --}}
                                                <div class="col-md-3">
                                                    <label for="tahunSelesai">Tahun Selesai</label>
                                                    <select name="tahun_selesai" id="tahunSelesai"
                                                        class="form-select">
                                                        @foreach (range(date('Y') - 100, date('Y')) as $year)
                                                            @if (old('tahun_mulai', $year) == $pendidikan->tahun_selesai)
                                                                <option value="{{ $pendidikan->tahun_selesai }}"
                                                                    selected>
                                                                    {{ $year }}</option>
                                                            @else
                                                                <option value="{{ $year }}">
                                                                    {{ $year }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                {{-- <div class="col-md-6">
                                <div class="mb-3 mt-4">
                                    <label for="formFileMultiple" class="form-label">Masukkan lampiran</label>
                                    <input class="form-control" type="file" id="formFileMultiple" multiple>
                                </div>
                            </div> --}}

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
                            <div class="modal fade" id="hapusPendidikan{{ $pendidikan->id }}" tabindex="-1"
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
                                            <form action="/pendidikan/{{ $pendidikan->id }}" method="post">
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
