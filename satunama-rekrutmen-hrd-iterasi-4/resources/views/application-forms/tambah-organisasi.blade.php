@csrf

<table class="table mt-4" id="tablePengalamanOrganisasi">
    <caption>Sebutkan nama organisasi dimana anda menjadi anggota, atau dahulu pernah menjadi anggota </caption>
    <thead class="text-center">
        <tr>
            <th scope="col">Nama Organisasi</th>
            <th scope="col">Posisi</th>
            <th scope="col"></th>

        </tr>
    </thead>
    <tbody id="tableOrganisasi">
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

<div class="col-3 mt-4">
    <button type="button" class="btn btn-success" id="add-organization-row"><i class="fa-solid fa-plus"
            style="color: #ffffff;"></i> Tambah</button>
</div>
