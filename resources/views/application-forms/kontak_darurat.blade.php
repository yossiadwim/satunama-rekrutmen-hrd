@csrf

<table class="table mt-4" id="tableKontakDarurat">
    <caption>Dalam keadaan darurat siapakah yang dapat kami hubungi?</caption>
    <thead class="text-center">
        <tr>
            <th scope="col">Nama</th>
            <th scope="col">Hubungan</th>
            <th scope="col">Telepon</th>
            <th scope="col">Alamat</th>
            <th scope="col"></th>

        </tr>
    </thead>
    <tbody id="table-kontak-darurat">
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
<div class="col-3 mt-4">
    <button type="button" class="btn btn-success" id="add-emergency-contact-row"><i class="fa-solid fa-plus"
            style="color: #ffffff;"></i> Tambah</button>
</div>
