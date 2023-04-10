<div class="md-12">
    <div class="row">
        <div class="col-8">
            <h3 class="fw-bold ">PENGALAMAN KERJA</h3>
        </div>
        @if ($pengalamanKerjaExists)
            <div class="col-4 text-align-right">
                <a href="/profil/{{ $profil->id }}/work-experience" class="btn btn-primary bg-btn border-0"
                    data-bs-toggle="modal" data-bs-target="#pengalamanKerja"><i class="bi bi-plus-circle-fill"></i>
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

                                <div class=" mb-3" hidden>
                                    <input type="text" class="form-control mb-4" name="user_id" id="user_id"
                                        value="{{ $profil->user_id }}">
                                </div>

                                <div class="mb-3" hidden>
                                    <input type="text" class="form-control mb-4" name="profil_id" id="profil_id"
                                        value="{{ $profil->id }}">
                                </div>

                                <div class="mb-3" hidden>
                                    <input type="text" class="form-control mb-4" name="pelamar_id" id="pelamar_id"
                                        value="">
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control mb-4" name="nama_perusahaan"
                                        id="namaPerusahaan" placeholder="Nama perusahaan">
                                    <label for="namaPerusahaan">Nama perusahaan</label>
                                </div>

                                <div class="form-floating">
                                    <input type="text" class="form-control mb-4" name="jabatan" id="posisijabatan"
                                        placeholder="Posisi / jabatan">
                                    <label for="posisijabatan">Posisi / Jabatan</label>
                                </div>

                                <div class="row g-3 mb-4">
                                    <div class="col">
                                        <label for="bulanMulai">Bulan Mulai</label>
                                        <select name="bulan_mulai" class="form-select" id="bulanMulai">
                                            <option disabled selected>Bulan Mulai</option>

                                            @foreach (range(1, 12) as $month)
                                                <option value="{{ $month }}">
                                                    {{ \Carbon\Carbon::create(2000, $month, 1)->translatedFormat('F') }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="tahunMulai">Tahun Mulai</label>
                                        <select name="tahun_mulai" id="tahunMulai" class="form-select">
                                            <option disabled selected>Tahun Mulai</option>
                                            @foreach (range(date('Y') - 123, date('Y')) as $year)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row g-3 mb-4">
                                    <div class="col">
                                        <label for="bulanBerakhir">Bulan Berakhir</label>
                                        <select name="bulan_berakhir" class="form-select" id="bulanBerakhir">
                                            <option disabled selected>Bulan Berakhir</option>
                                            @foreach (range(1, 12) as $month)
                                                <option value="{{ $month }}">
                                                    {{ \Carbon\Carbon::createFromDate(null, $month, 1)->translatedFormat('F') }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="col">
                                        <label for="tahunBerakhir">Tahun Berakhir</label>
                                        <select name="tahun_berakhir" id="tahunBerakhir" class="form-select">
                                            <option disabled selected>Tahun Berakhir</option>
                                            @foreach (range(date('Y') - 123, date('Y')) as $year)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
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
            <a href="/profil/{{ $profil->id }}/work-experience" class="btn btn-primary border-0 mt-5 mb-5"
                data-bs-toggle="modal" data-bs-target="#pengalamanKerja"><i class="bi bi-plus-circle-fill"></i>
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

                                <div class=" mb-3" hidden>
                                    <input type="text" class="form-control mb-4" name="user_id" id="user_id"
                                        value="{{ $profil->user_id }}">
                                </div>

                                <div class="mb-3" hidden>
                                    <input type="text" class="form-control mb-4" name="profil_id" id="profil_id"
                                        value="{{ $profil->id }}">
                                </div>

                                <div class="mb-3" hidden>
                                    <input type="text" class="form-control mb-4" name="pelamar_id"
                                        id="pelamar_id" value="">
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control mb-4" name="nama_perusahaan"
                                        id="namaPerusahaan" placeholder="Nama perusahaan">
                                    <label for="namaPerusahaan">Nama perusahaan</label>
                                </div>

                                <div class="form-floating">
                                    <input type="text" class="form-control mb-4" name="jabatan"
                                        id="posisijabatan" placeholder="Posisi / jabatan">
                                    <label for="posisijabatan">Posisi / Jabatan</label>
                                </div>

                                <div class="row g-3 mb-4">
                                    <div class="col">
                                        <label for="bulanMulai">Bulan Mulai</label>
                                        <select name="bulan_mulai" class="form-select" id="bulanMulai">
                                            <option disabled selected>Bulan Mulai</option>
                                            @foreach (range(1, 12) as $month)
                                                <option value="{{ $month }}">
                                                    {{ \Carbon\Carbon::create(2000, $month, 1)->translatedFormat('F') }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="tahunMulai">Tahun Mulai</label>
                                        <select name="tahun_mulai" id="tahunMulai" class="form-select">
                                            <option disabled selected>Tahun Mulai</option>
                                            @foreach (range(date('Y') - 123, date('Y')) as $year)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row g-3 mb-4">
                                    <div class="col">
                                        <label for="bulanBerakhir">Bulan Berakhir</label>
                                        <select name="bulan_berakhir" class="form-select" id="bulanBerakhir">
                                            <option disabled selected>Bulan Berakhir</option>
                                            @foreach (range(1, 12) as $month)
                                                <option value="{{ $month }}">
                                                    {{ \Carbon\Carbon::createFromDate(null, $month, 1)->translatedFormat('F') }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="col">
                                        <label for="tahunBerakhir">Tahun Berakhir</label>
                                        <select name="tahun_berakhir" id="tahunBerakhir" class="form-select">
                                            <option disabled selected>Tahun Berakhir</option>
                                            @foreach (range(date('Y') - 123, date('Y')) as $year)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
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
                            <p>{{ $pk->jabatan }}</p>
                            <p>{{ \Carbon\Carbon::createFromDate(null, $pk->bulan_mulai, 1)->translatedFormat('F') }}
                                {{ $pk->tahun_mulai }} -
                                {{ \Carbon\Carbon::createFromDate(null, $pk->bulan_berakhir, 1)->translatedFormat('F') }}
                                {{ $pk->tahun_berakhir }}</p>
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
                                        <form method="post" action="/pengalamanKerja/{{ $pk->id }}"
                                            id="formPengalamanKerja">
                                            @method('put')
                                            @csrf
                                            <div class="modal-body">
                                                <p>Tambahkan pengalaman kerja yang Anda miliki</p>

                                                <div class=" mb-3" hidden>
                                                    <input type="text" class="form-control mb-4" name="user_id"
                                                        id="user_id" value="{{ $profil->user_id }}">
                                                </div>

                                                <div class="mb-3" hidden>
                                                    <input type="text" class="form-control mb-4" name="profil_id"
                                                        id="profil_id" value="{{ $profil->id }}">
                                                </div>

                                                <div class="mb-3" hidden>
                                                    <input type="text" class="form-control mb-4" name="pelamar_id"
                                                        id="pelamar_id" value="">
                                                </div>

                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control mb-4"
                                                        name="nama_perusahaan" id="namaPerusahaan"
                                                        placeholder="Nama perusahaan"
                                                        value="{{ old('nama_perusahaan', $pk->nama_perusahaan) }}">
                                                    <label for="namaPerusahaan">Nama perusahaan</label>
                                                </div>

                                                <div class="form-floating">
                                                    <input type="text" class="form-control mb-4" name="jabatan"
                                                        id="posisijabatan" placeholder="Posisi / jabatan"
                                                        value="{{ old('jabatan', $pk->jabatan) }}">
                                                    <label for="posisijabatan">Posisi / Jabatan</label>
                                                </div>

                                                <div class="row g-3 mb-4">
                                                    <div class="col">
                                                        <label for="bulanMulai">Bulan Mulai</label>
                                                        <select name="bulan_mulai" class="form-select"
                                                            id="bulanMulai">
                                                            @foreach (range(1, 12) as $month)
                                                                @if (old('bulan_mulai', $month) == $pk->bulan_mulai)
                                                                    <option value="{{ $pk->bulan_mulai }}" selected>
                                                                        {{ \Carbon\Carbon::create(2000, $month, 1)->translatedFormat('F') }}
                                                                    </option>
                                                                @else
                                                                    <option value="{{ $month }}">
                                                                        {{ \Carbon\Carbon::create(2000, $month, 1)->translatedFormat('F') }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                    <div class="col">
                                                        <label for="tahun_mulai">Tahun Mulai</label>
                                                        <select name="tahun_mulai" id="tahunMulai"
                                                            class="form-select">

                                                            @foreach (range(date('Y') - 100, date('Y')) as $year)
                                                                @if (old('tahun_mulai', $year) == $pk->tahun_mulai)
                                                                    <option value="{{ $pk->tahun_mulai }}" selected>
                                                                        {{ $year }}</option>
                                                                @else
                                                                    <option value="{{ $year }}">
                                                                        {{ $year }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row g-3 mb-4">
                                                    <div class="col">
                                                        <label for="bulan_berakhir">Bulan Berakhir</label>
                                                        <select name="bulan_berakhir" class="form-select"
                                                            id="bulanBerakhir">
                                                            @foreach (range(1, 12) as $month)
                                                                @if (old('bulan_berakhir', $month) == $pk->bulan_berakhir)
                                                                    <option value="{{ $pk->bulan_berakhir }}"
                                                                        selected>
                                                                        {{ \Carbon\Carbon::create(2000, $month, 1)->translatedFormat('F') }}
                                                                    </option>
                                                                @else
                                                                    <option value="{{ $month }}">
                                                                        {{ \Carbon\Carbon::create(2000, $month, 1)->translatedFormat('F') }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>

                                                    </div>

                                                    <div class="col">
                                                        <label for="tahun_berakhir">Tahun Berakhir</label>
                                                        <select name="tahun_berakhir" id="tahunBerakhir"
                                                            class="form-select">
                                                            @foreach (range(date('Y') - 100, date('Y')) as $year)
                                                                @if (old('tahun_mulai', $year) == $pk->tahun_berakhir)
                                                                    <option value="{{ $pk->tahun_berakhir }}"
                                                                        selected>
                                                                        {{ $year }}</option>
                                                                @else
                                                                    <option value="{{ $year }}">
                                                                        {{ $year }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
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
                                                        id="gaji" placeholder="Gaji"
                                                        value="{{ $pk->gaji }}">
                                                    <label for="gaji">Gaji</label>

                                                </div>


                                                <div class="form-floating">
                                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                                        name="alasan_mengundurkan_diri" style="height: 200px">{{ $pk->alasan_mengundurkan_diri }}</textarea>
                                                    <label for="floatingTextarea2">Alasan mengundurkan diri</label>
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
