<!-- Button trigger modal -->
<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modal_tambah_anak"
    style="background-color: #F25700; color: #ffffff"><i class="fa-solid fa-plus" style="color: #ffffff;"></i>
    Tambahkan Informasi Anak
</button>

<!-- Modal -->
<div class="modal fade" id="modal_tambah_anak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" >
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambahkan Informasi Anak</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="">
                <div class="modal-body " >
                    <div id="tambah_anak" style="max-height: 500px; overflow: auto">
                        <div class="row" >
                            <div class="col-5">
                                <div class="form-floating mt-3 mb-3">
                                    <input type="text" class="form-control" id="nama_anak1" name="nama_anak1"
                                        placeholder="Nama Anak">
                                    <label for="nama_anak1">Nama Anak</label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-floating mt-3 mb-3">
                                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin1"
                                        aria-label="Floating label select example">
                                        <option value="" selected disabled>Pilih</option>
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>

                                    </select>
                                    <label for="floatingSelect">Jenis Kelamin</label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-floating mt-3 mb-3">
                                    <input type="text" class="form-control" id="umur1" name="umur1"
                                        placeholder="Umur">
                                    <label for="umur">Umur</label>
                                </div>
                            </div>
                            <div class="col-3">
                                <button type="button" id="button_tambah_anak" class="btn btn-primary mt-3"><i
                                        class="fa-solid fa-plus" style="color: #ffffff;"></i>
                                    Tambah</button>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>

        </div>
    </div>
 
</div>
