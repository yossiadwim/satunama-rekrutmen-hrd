@csrf

@if ($pendidikanExists)
    <table class="table mt-4" id="tableRiwayatPendidikan">
        <thead class="text-center">
            <tr>
                <th scope="col">Jenjang</th>
                <th scope="col">Nama Sekolah/Universitas</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Tahun Selesai</th>
                <th scope="col">Indeks Prestasi Kumulatif (IPK)</th>
                <th scope="col"></th>


            </tr>
        </thead>
        <tbody id="table-body-riwayat-pendidikan">
            @foreach ($pendidikans as $pendidikan)
                <tr id="table-row-riwayat-pendidikan">
                    <td>
                        <div class="">
                            <select class="form-select" aria-label="Default select example" id="jenjangPendidikan"
                                name="jenjang_pendidikan[]" disabled>
                                @if (old('jenjang_pendidikan', $pendidikan->jenjang_pendidikan) == 'SD')
                                    <option value="SD" selected>SD (Sekolah Dasar)
                                    </option>
                                    <option value="SMP">SMP (Sekolah Menengah Pertama)
                                    </option>
                                    <option value="SMA">SMA (Sekolah Menengah Atas)
                                    </option>
                                    <option value="SMK">SMK (Sekolah Menengah Kejuruan)
                                    </option>
                                    <option value="D3">D3
                                    </option>
                                    <option value="D4">D4
                                    </option>
                                    <option value="S1">S1
                                    </option>
                                    <option value="S2">S2
                                    </option>
                                    <option value="S3">S3
                                    </option>
                                @elseif (old('jenjang_pendidikan', $pendidikan->jenjang_pendidikan) == 'SMP')
                                    <option value="SD">SD (Sekolah Dasar)
                                    </option>
                                    <option value="SMP" selected>SMP (Sekolah Menengah Pertama)
                                    </option>
                                    <option value="SMA">SMA (Sekolah Menengah Atas)
                                    </option>
                                    <option value="SMK">SMK (Sekolah Menengah Kejuruan)
                                    </option>
                                    <option value="D3">D3
                                    </option>
                                    <option value="D4">D4
                                    </option>
                                    <option value="S1">S1
                                    </option>
                                    <option value="S2">S2
                                    </option>
                                    <option value="S3">S3
                                    </option>
                                @elseif (old('jenjang_pendidikan', $pendidikan->jenjang_pendidikan) == 'SMA')
                                    <option value="SD">SD (Sekolah Dasar)
                                    </option>
                                    <option value="SMP">SMP (Sekolah Menengah Pertama)
                                    </option>
                                    <option value="SMA" selected>SMA (Sekolah Menengah Atas)
                                    </option>
                                    <option value="SMK">SMK (Sekolah Menengah Kejuruan)
                                    </option>
                                    <option value="D3">D3</option>
                                    <option value="D4">D4
                                    </option>
                                    <option value="S1">S1
                                    </option>
                                    <option value="S2">S2
                                    </option>
                                    <option value="S3">S3
                                    </option>
                                @elseif (old('jenjang_pendidikan', $pendidikan->jenjang_pendidikan) == 'SMK')
                                    <option value="SD">SD (Sekolah Dasar)
                                    </option>
                                    <option value="SMP">SMP (Sekolah Menengah Pertama)
                                    </option>
                                    <option value="SMA">SMA (Sekolah Menengah Atas)
                                    </option>
                                    <option value="SMK" selected>SMK (Sekolah Menengah Kejuruan)
                                    </option>
                                    <option value="D3">D3
                                    </option>
                                    <option value="D4">D4
                                    </option>
                                    <option value="S1">S1
                                    </option>
                                    <option value="S2">S2
                                    </option>
                                    <option value="S3">S3
                                    </option>
                                @elseif (old('jenjang_pendidikan', $pendidikan->jenjang_pendidikan) == 'D3')
                                    <option value="SD">SD (Sekolah Dasar)
                                    </option>
                                    <option value="SMP">SMP
                                    </option>
                                    <option value="SMA">SMA
                                    </option>
                                    <option value="SMK">SMK
                                    </option>
                                    <option value="D3" selected>D3
                                    </option>
                                    <option value="D4">D4
                                    </option>
                                    <option value="S1">S1
                                    </option>
                                    <option value="S2">S2
                                    </option>
                                    <option value="S3">S3
                                    </option>
                                @elseif (old('jenjang_pendidikan', $pendidikan->jenjang_pendidikan) == 'D4')
                                    <option value="SD">SD (Sekolah Dasar)
                                    </option>
                                    <option value="SMP">SMP
                                    </option>
                                    <option value="SMA">SMA
                                    </option>
                                    <option value="SMK">SMK
                                    </option>
                                    <option value="D3">D3
                                    </option>
                                    <option value="D4" selected>D4
                                    </option>
                                    <option value="S1">S1
                                    </option>
                                    <option value="S2">S2
                                    </option>
                                    <option value="S3">S3
                                    </option>
                                @elseif (old('jenjang_pendidikan', $pendidikan->jenjang_pendidikan) == 'S1')
                                    <option value="SD">SD (Sekolah Dasar)
                                    </option>
                                    <option value="SMP">SMP
                                    </option>
                                    <option value="SMA">SMA
                                    </option>
                                    <option value="SMK">SMK
                                    </option>
                                    <option value="D3">D3
                                    </option>
                                    <option value="D4">D4
                                    </option>
                                    <option value="S1" selected>S1
                                    </option>
                                    <option value="S2">S2
                                    </option>
                                    <option value="S3">S3
                                    </option>
                                @elseif (old('jenjang_pendidikan', $pendidikan->jenjang_pendidikan) == 'S2')
                                    <option value="SD">SD (Sekolah Dasar)
                                    </option>
                                    <option value="SMP">SMP
                                    </option>
                                    <option value="SMA">SMA
                                    </option>
                                    <option value="SMK">SMK
                                    </option>
                                    <option value="D3">D3
                                    </option>
                                    <option value="D4">D4
                                    </option>
                                    <option value="S1">S1
                                    </option>
                                    <option value="S2" selected>S2
                                    </option>
                                    <option value="S3">S3
                                    </option>
                                @elseif (old('jenjang_pendidikan', $pendidikan->jenjang_pendidikan) == 'S3')
                                    <option value="SD">SD (Sekolah Dasar)
                                    </option>
                                    <option value="SMP">SMP
                                    </option>
                                    <option value="SMA">SMA
                                    </option>
                                    <option value="SMK">SMK
                                    </option>
                                    <option value="D3">D3
                                    </option>
                                    <option value="D4">D4
                                    </option>
                                    <option value="S1">S1
                                    </option>
                                    <option value="S2">S2
                                    </option>
                                    <option value="S3" selected>S3
                                    </option>
                                @endif
                            </select>
                        </div>
                    </td>
                    <td>
                        <input type="text" class="form-control" id="nama_institusi" name="nama_institusi[]"
                            placeholder="Nama Sekolah/Universitas"
                            value="{{ old('jenjang_pendidikan', $pendidikan->nama_institusi) == null ? '' : $pendidikan->nama_institusi }}"
                            disabled>
                    </td>
                    <td>
                        <input type="text" class="form-control" id="jurusan" name="jurusan[]"
                            placeholder="Jurusan"
                            value="{{ old('jenjang_pendidikan', $pendidikan->jurusan) == null ? '' : $pendidikan->jurusan }}"
                            disabled>
                    </td>
                    <td>
                        <input type="text" class="form-control" id="tahun_lulus" name="tahun_lulus[]"
                            placeholder="Tahun Selesai"
                            value="{{ old('jenjang_pendidikan', $pendidikan->tahun_lulus) == null ? '' : $pendidikan->tahun_lulus }}"
                            disabled>
                    </td>
                    <td>
                        <input type="text" class="form-control" id="ipk" name="ipk[]"
                            placeholder="Indeks Prestasi Kumulatif (IPK)"
                            value="{{ old('jenjang_pendidikan', $pendidikan->ipk) == null ? '' : $pendidikan->ipk }}"
                            disabled>
                    </td>
                </tr>
            @endforeach

        </tbody>
        <tbody id="table-riwayat-pendidikan-2">

        </tbody>
    </table>

    <div class="col-3 mt-4">
        <button type="button" class="btn btn-success" id="add-education-row"><i class="fa-solid fa-plus"
                style="color: #ffffff;"></i> Tambah</button>
    </div>
@else
    <table class="table mt-4" id="tableRiwayatPendidikan">
        <thead class="text-center">
            <tr>
                <th scope="col">Jenjang</th>
                <th scope="col">Nama Sekolah/Universitas</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Tahun Selesai</th>
                <th scope="col">Indeks Prestasi Kumulatif (IPK)</th>
                <th scope="col"></th>


            </tr>
        </thead>
        <tbody id="table-body-riwayat-pendidikan">
            {{-- <tr id="table-row-riwayat-pendidikan">
                <td>
                    <div class="">
                        <select class="form-select" aria-label="Default select example" id="jenjangPendidikan"
                            name="jenjang_pendidikan[]" disabled>
                            <option value="SD" selected>SD (Sekolah Dasar)
                            </option>
                            <option value="SMP">SMP
                            </option>
                            <option value="SMA">SMA
                            </option>
                            <option value="SMK">SMK (Sekolah Menengah Kejuruan)
                            </option>
                            <option value="D3">D3
                            </option>
                            <option value="D4">D4
                            </option>
                            <option value="S1">S1
                            </option>
                            <option value="S2">S2
                            </option>
                            <option value="S3">S3
                            </option>

                        </select>
                    </div>
                </td>
                <td>
                    <input type="text" class="form-control" id="nama_institusi" name="nama_institusi[]"
                        placeholder="Nama Sekolah/Universitas">
                </td>
                <td>
                    <input type="text" class="form-control" id="jurusan" name="jurusan[]"
                        placeholder="Jurusan">
                </td>
                <td>
                    <input type="text" class="form-control" id="tahun_lulus" name="tahun_lulus[]"
                        placeholder="Tahun Selesai">
                </td>
                <td>
                    <input type="text" class="form-control" id="ipk" name="ipk[]"
                        placeholder="Indeks Prestasi Kumulatif (IPK)">
                </td>
                <td>
                    <button type="button" class="btn btn-success" id="add-education-row"><i
                            class="fa-solid fa-plus" style="color: #ffffff;"></i> Tambah</button>

                </td>
            </tr> --}}
    </table>
    <div class="col-3 mt-4">
        <button type="button" class="btn btn-success" id="add-education-row"><i class="fa-solid fa-plus"
                style="color: #ffffff;"></i> Tambah</button>
    </div>
@endif

