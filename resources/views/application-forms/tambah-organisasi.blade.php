@csrf

<table class="table mt-4" id="tablePengalamanOrganisasi">
    <caption>Sebutkan nama organisasi dimana anda menjadi anggota, atau dahulu pernah menjadi anggota </caption>
    <thead class="text-center">
        <tr>
            <th scope="col">Nama Organisasi</th>
            <th scope="col">Posisi</th>
            
        </tr>
    </thead>
    <tbody id="table-body-organisasi">
        {{-- <tr id="table-row-organisasi">
            <td >
                <input type="text" class="form-control" id="nama_organisasi" name="nama_organisasi" placeholder="Nama Organisasi">
            </td>
            <td >
                <input type="text" class="form-control" id="posisi" name="posisi" placeholder="Posisi">
            </td>
        </tr> --}}
    </tbody>
</table>

<div class="col-2">
    <div class="form-floating">
        <input type="number" class="form-control" name="jumlah_organisasi" id="jumlah_organisasi" placeholder="Jumlah Organisasi"
            onchange="addRowTableOrganization()" min="0">
        <label for="jumlah_organisasi">Tambah</label>
    </div>

</div>