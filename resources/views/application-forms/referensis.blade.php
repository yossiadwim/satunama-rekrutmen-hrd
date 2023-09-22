@csrf

@if ($referensiExists)
    <table class="table table-bordered mt-4" id="tableReferensi">
        <thead class="text-center">
            <tr>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Telepon</th>
                <th scope="col">Email</th>
                <th scope="col">Hubungan</th>
            </tr>
        </thead>
        <tbody id="table-body-referensi">
            @foreach ($referensis as $ref)
                @if ($ref->posisi_referensi == null)
                    <tr id="table-row-referensi">
                        <td>
                            <input type="text" class="form-control" id="nama_referensi" name="nama_referensi"
                                placeholder="Nama Referensi"
                                value="{{ old('nama_referensi', $ref->nama_referensi) == null ? '' : $ref->nama_referensi }}"
                                disabled>

                        </td>
                        <td>
                            <input type="text" class="form-control" id="alamat_referensi" name="alamat_referensi"
                                placeholder="Posisi"
                                value="{{ old('alamat_referensi', $ref->alamat_referensi) == null ? '' : $ref->alamat_referensi }}"
                                disabled>
                        </td>
                        <td>
                            <input type="text" class="form-control" id="telepon_referensi" name="telepon_referensi"
                                placeholder="Telepon"
                                value="{{ old('telepon_referensi', $ref->telepon_referensi) == null ? '' : $ref->telepon_referensi }}"
                                disabled>
                        </td>
                        <td>
                            <input type="text" class="form-control" id="email_referensi" name="email_referensi"
                                placeholder="Email"
                                value="{{ old('email_referensi', $ref->email_referensi) == null ? '' : $ref->email_referensi }}"
                                disabled>
                        </td>
                        <td>
                            <input type="text" class="form-control" id="hubungan_referensi" name="hubungan_referensi"
                                placeholder="Hubungan"
                                value="{{ old('telepon_referensi', $ref->hubungan_referensi) == null ? '' : $ref->hubungan_referensi }}"
                                disabled>
                        </td>
                    </tr>
                @endif
            @endforeach

        </tbody>
        <tbody id="table-body-referensi-2">
            <tr id="table-row-referensi-2">

            </tr>
        </tbody>
    </table>

    <div class="col-2">
        <div class="form-floating">
            <input type="number" class="form-control" name="jumlah_referensi" id="jumlah_referensi"
                placeholder="Jumlah Referensi" onchange="addRowTableReferences()" min="0">
            <label for="jumlah_referensi">Tambah</label>
        </div>

    </div>

    <div class="mt-5 mb-5">
        <div class="mt-4 mb-4 mx-2">
            <p>Relasi Atau Teman, Jika Ada, Yang Bekerja Di Yayasan SATUNAMA</p>
        </div>
        <div class="">
            <table class="table  mt-4" id="tableReferensi">
                <thead class="text-center">
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telepon</th>
                        <th scope="col">Posisi</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Hubungan</th>
                    </tr>
                </thead>
                <tbody id="table-body-referensi-satunama">
                    @foreach ($referensis as $ref)
                        @if ($ref->posisi_referensi != null)
                            <tr id="table-row-referensi">
                                <td>
                                    <input type="text" class="form-control" id="nama_referensi" name="nama_referensi"
                                        placeholder="Nama Referensi"
                                        value="{{ old('nama_referensi', $ref->nama_referensi) == null ? '' : $ref->nama_referensi }}"
                                        disabled>

                                </td>
                                <td>
                                    <input type="text" class="form-control" id="email_referensi"
                                        name="email_referensi" placeholder="Posisi"
                                        value="{{ old('email_referensi', $ref->email_referensi) == null ? '' : $ref->email_referensi }}"
                                        disabled>
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="telepon_referensi"
                                        name="telepon_referensi" placeholder="Posisi"
                                        value="{{ old('telepon_referensi', $ref->telepon_referensi) == null ? '' : $ref->telepon_referensi }}"
                                        disabled>
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="posisi_referensi"
                                        name="posisi_referensi" placeholder="Posisi"
                                        value="{{ old('posisi_referensi', $ref->posisi_referensi) == null ? '' : $ref->posisi_referensi }}"
                                        disabled>
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="alamat_referensi"
                                        name="alamat_referensi" placeholder="Posisi"
                                        value="{{ old('alamat_referensi', $ref->alamat_referensi) == null ? '' : $ref->alamat_referensi }}"
                                        disabled>
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="hubungan_referensi"
                                        name="hubungan_referensi" placeholder="Hubungan"
                                        value="{{ old('telepon_referensi', $ref->hubungan_referensi) == null ? '' : $ref->hubungan_referensi }}"
                                        disabled>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
                <tbody id="table-body-referensi-satunama-2">
                    <tr id="table-row-riwayat-pekerjaan-2">

                    </tr>
                </tbody>
            </table>
            <div class="col-2">
                <div class="form-floating">
                    <input type="number" class="form-control" name="jumlah_referensi_di_satunama"
                        id="jumlah_referensi_di_satunama" placeholder="Jumlah Referensi"
                        onchange="addRowTableReferencesinSatunama()" min="0">
                    <label for="jumlah_referensi_di_satunama">Tambah</label>
                </div>

            </div>
        </div>
    </div>
@else
    <table class="table mt-4" id="tableReferensi">
        <thead class="text-center">
            <tr>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Telepon</th>
                <th scope="col">Email</th>
                <th scope="col">Hubungan</th>
            </tr>
        </thead>
        <tbody id="table-body-referensi-2">
            {{-- <tr id="table-row-referensi-2">

        </tr> --}}
        </tbody>
    </table>
    <div class="col-2">
        <div class="form-floating">
            <input type="number" class="form-control" name="jumlah_referensi" id="jumlah_referensi"
                placeholder="Jumlah Referensi" onchange="addRowTableReferences()" min="0">
            <label for="jumlah_referensi">Tambah</label>
        </div>
    </div>

    <div class="mt-5 mb-4 mx-2">
        <p>Relasi Atau Teman, Jika Ada, Yang Bekerja Di Yayasan SATUNAMA</p>
    </div>
    <div class="">
        <table class="table mt-4" id="tableReferensi">
            <thead class="text-center">
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telepon</th>
                    <th scope="col">Posisi</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Hubungan</th>
                </tr>
            </thead>
            <tbody id="table-body-referensi-satunama-2">
                {{-- <tr id="table-row-riwayat-pekerjaan-2">

                </tr> --}}
            </tbody>
        </table>
    </div>
    <div class="col-2">
        <div class="form-floating">
            <input type="number" class="form-control" name="jumlah_referensi_di_satunama"
                id="jumlah_referensi_di_satunama" placeholder="Jumlah Referensi"
                onchange="addRowTableReferencesinSatunama()" min="0">
            <label for="jumlah_referensi_di_satunama">Tambah</label>
        </div>

    </div>
@endif
