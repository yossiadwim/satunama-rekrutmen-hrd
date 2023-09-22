@csrf

<table class="table mt-4" id="tableKontakDarurat">
    <caption>Dalam keadaan darurat siapakah yang dapat kami hubungi?</caption>
    <thead class="text-center">
        <tr>
            <th scope="col">Nama</th>
            <th scope="col">Hubungan</th>
            <th scope="col">Telepon</th>
            <th scope="col">Alamat</th>
            
        </tr>
    </thead>
    <tbody id="table-body-kontak-darurat">
        {{-- <tr id="table-row-kontak-darurat">
            <td >
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
            </td>
            <td >
                <input type="text" class="form-control" id="hubungan" name="hubungan" placeholder="Hubungan">
            </td>
            <td >
                <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Telepon">
            </td>
            <td >
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
            </td>
        </tr> --}}
    </tbody>
</table>

<div class="col-2">
    <div class="form-floating">
        <input type="number" class="form-control" name="jumlah_kontak_darurat" id="jumlah_kontak_darurat" placeholder="Jumlah Kontak Darurat"
            onchange="addRowTableEmergencyContact()" min="0">
        <label for="jumlah_kontak_darurat">Tambah</label>
    </div>

</div>