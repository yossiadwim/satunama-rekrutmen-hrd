@csrf

<table class="table mt-4" id="tablePelatihan">
    <thead class="text-center">
        <tr>
            <th scope="col">Subjek</th>
            <th scope="col">Tahun</th>
            <th scope="col">Nama Mentor</th>
        </tr>
    </thead>
    <tbody id="table-body-pelatihan">

    </tbody>
</table>

<div class="col-2">
    <div class="form-floating">
        <input type="number" class="form-control" name="jumlah_pelatihan" id="jumlah_pelatihan"
            placeholder="Jumlah Pelatihan" onchange="addRowTableTraining()" min="0">
        <label for="jumlah_pelatihan">Jumlah Pelatihan</label>
    </div>

</div>
