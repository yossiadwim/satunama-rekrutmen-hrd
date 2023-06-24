<!-- Button trigger modal -->
<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modal_tambah_anggota_keluarga"
    style="background-color: #F25700; color: #ffffff"><i class="fa-solid fa-plus" style="color: #ffffff;"></i>
    Tambah Informasi Anggota Keluarga
</button>

<!-- Modal -->
<div class="modal fade" id="modal_tambah_anggota_keluarga" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambahkan Anggota Keluarga</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <select class="form-select" id="hubungan" name="hubungan"
                        aria-label="Floating label select example">
                        <option value="" selected disabled>Pilih</option>
                        <option value="Ayah">Ayah</option>
                        <option value="Ibu">Ibu</option>
                        <option value="Family">Family1</option>
                        <option value="Family">Family2</option>
                        <option value="Family">Family3</option>
                        <option value="Family">Family4</option>
                        <option value="Family">Family5</option>

                    </select>
                    <label for="floatingSelect">Hubungan</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                    <label for="nama">Nama</label>
                </div>

                <div class="form-floating mb-3">
                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin1"
                        aria-label="Floating label select example">
                        <option value="" selected disabled>Pilih</option>
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>

                    </select>
                    <label for="floatingSelect">Jenis Kelamin</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="umur" name="umur1" placeholder="Umur">
                    <label for="umur">Umur</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" aria-label="Default select example" id="jenjangPendidikan"
                        name="jenjang_pendidikan" onchange="click()">
                        <option selected disabled>Pilih Jenjang Pendidikan</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="SMK">SMK</option>
                        <option value="D3">D3</option>
                        <option value="D4">D4</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                    </select>
                    <label for="floatingSelect">Pendidikan Terakhir</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan">
                    <label for="pekerjaan">Pekerjaan</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="perusahaan" name="perusahaan"
                        placeholder="perusahaan">
                    <label for="Perusahaan">Perusahaan/Instansi</label>
                </div>
                <hr class="border border-dark border-2 opcacity-50">
                <button type="button" id="button_tambah_anggota" onclick="addFormAnggota()" class="btn btn-primary"><i
                        class="fa-solid fa-plus" style="color: #ffffff;"></i>
                    Tambah</button>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
