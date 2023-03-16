<div class="md-12">
    <h3 class="fw-bold mt-5">REFERENSI</h3>
    <hr class="border border-secondary">
    <div class="col-md-12 mt-5 mb-5 d-flex justify-content-center">
            <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary bg-btn border-0 mt-5 mb-5" data-bs-toggle="modal" data-bs-target="#referensi">
            <i class="bi bi-plus-circle-fill"></i> Tambahkan referensi
        </button>
        
        <!-- Modal -->
        <div class="modal fade " id="referensi" tabindex="-1" aria-labelledby="referensiLabel" aria-hidden="true">
            <div class="modal-dialog  modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="referensiLabel">Referensi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" id="close" aria-label="Close" onclick="hapusData()"></button>
                </div>
                <div class="modal-body">
                    <p>Tambahkan referensi</p>
                    <form action="" method="" id="formReferensi">
                        
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="namaReferensi" name="namaReferensi" placeholder="Nama">
                            </div>
                        </div>
                        
                        <div class="row g-3 mb-4">
                            <div class="mb-4 mt-4 col-md-5">
                                <input type="text" class="form-control" id="alamatLabel" name="alamat" placeholder="Alamat">
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="nomorTeleponLabel" name="nomorTelepon" placeholder="Nomor telepon" aria-describedby="noHpHelp">
                                <div id="noHpHelp" class="form-text">Contoh. +62812345678</div>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <div>
                                <p>Apakah dari SATUNAMA?</p>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="konfirmasi" id="konfirmasiYa" value="Ya" >
                                <label class="form-check-label" for="konfirmasiYa">
                                  Ya
                                </label>
                              </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="konfirmasi" id="konfirmasiTidak" value="Tidak" >
                                <label class="form-check-label" for="konfirmasiTidak">
                                    Tidak
                                </label>
                            </div>
                        </div>
                        
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <input type="text" class="form-control " id="posisi" name="inputPosisi" placeholder="Posisi" style="display: none">
                            </div>
                        </div>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <input type="text" class="form-control " id="hubungan" name="inputHubungan" placeholder="Hubungan" >
                            </div>
                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-batal" data-bs-dismiss="modal" onclick="hapusData()">Batal</button>
                <button type="button" class="btn btn-primary btn-simpan border-0" >Simpan</button>
                </div>
            </div>
            </div>
        </div>
      </div>
</div>

</div>