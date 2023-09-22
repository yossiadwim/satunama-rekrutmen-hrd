@csrf

@if ($pengalamanKerjaExists)
    <table class="table mt-4" id="tableRiwayatPendidikan">
        <thead class="text-center">
            <tr>
                <th scope="col">Nama Perusahaan</th>
                <th scope="col">Posisi</th>
                <th scope="col">Periode</th>
                <th scope="col">Gaji</th>
                <th scope="col">Alasan Mengundurkan Diri</th>


            </tr>
        </thead>
        <tbody id="table-body-riwayat-pekerjaan">
            @foreach ($pengalamanKerja as $pk)
                <tr id="table-row-riwayat-pekerjaan">
                    <td>
                        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan"
                            placeholder="Nama Perusahaan"
                            value="{{ old('nama_perusahaan', $pk->nama_perusahaan) == null ? '' : $pk->nama_perusahaan }}"
                            disabled>

                    </td>
                    <td>
                        <input type="text" class="form-control" id="posisi" name="posisi" placeholder="Posisi"
                            value="{{ old('posisi', $pk->posisi) == null ? '' : $pk->posisi }}" disabled>
                    </td>
                    <td>
                        <input type="text" class="form-control" id="periode" name="periode" placeholder="Periode"
                            value="{{ old('periode', $pk->periode) == null ? '' : $pk->periode }}" disabled>
                    </td>
                    <td>
                        <input type="text" class="form-control" id="gaji" name="gaji" placeholder="Gaji"
                            value=" @currency($pk->gaji)" disabled>
                    </td>
                    <td>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="alasan_mengundurkan_diri"
                                style="height: 200px" disabled>{{ $pk->alasan_mengundurkan_diri }}</textarea>
                            <label for="floatingTextarea2">Alasan mengundurkan diri</label>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
        <tbody id="table-body-riwayat-pekerjaan-2">
            <tr id="table-row-riwayat-pekerjaan-2">

            </tr>
        </tbody>
    </table>

    <div class="col-2">
        <div class="form-floating">
            <input type="number" class="form-control" name="jumlah_riwayat_pekerjaan" id="jumlah_riwayat_pekerjaan"
                placeholder="Jumlah Riwayat Pekerjaan" onchange="addRowTableWorkExperience()" min="0">
            <label for="jumlah_riwayat_pekerjaan">Tambah</label>
        </div>

    </div>
@else
<tr id="table-row-riwayat-pekerjaan">
    {{-- <td>
        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan"
            placeholder="Nama Perusahaan"
            >

    </td>
    <td>
        <input type="text" class="form-control" id="posisi" name="posisi" placeholder="Posisi"
            >
    </td>
    <td>
        <input type="text" class="form-control" id="periode" name="periode" placeholder="Periode"
          >
    </td>
    <td>
        <input type="text" class="form-control" id="gaji" name="gaji" placeholder="Gaji"
            >
    </td>
    <td>
        <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="alasan_mengundurkan_diri"
                style="height: 200px"></textarea>
            <label for="floatingTextarea2">Alasan mengundurkan diri</label>
        </div>
    </td> --}}
</tr>
@endif
