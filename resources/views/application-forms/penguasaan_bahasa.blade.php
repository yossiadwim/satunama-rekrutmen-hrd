@csrf

<div class="col-6">
    <table class="table mt-4" id="tablePenguasaanBahasa">
        <thead class="text-center">
            <tr>
                <th scope="col">Bahasa</th>
                <th scope="col">Tingkatan Penguasaan</th>

            </tr>
        </thead>
        <tbody id="table-body-penguasaan-bahasa">

        </tbody>
    </table>
</div>

<div class="col-2">
    <div class="form-floating">
        <input type="number" class="form-control" name="jumlah_tingkat_penguasaan_bahasa"
            id="jumlah_tingkat_penguasaan_bahasa" placeholder="Jumlah Tingkat Penguatan Bahasa"
            onchange="addRowTableProficiencyLanguage()" min="0">
        <label for="jumlah_tingkat_penguasaan_bahasa">Tambah</label>
    </div>

</div>
