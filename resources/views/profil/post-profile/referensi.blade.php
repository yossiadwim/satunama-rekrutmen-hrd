<div class="md-12">
    <h3 class="fw-bold mt-5">REFERENSI</h3>
    <hr class="border border-secondary">
    <div class="col-md-12 mt-5 mb-5 d-flex justify-content-center">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary bg-btn border-0 mt-5 mb-5" data-bs-toggle="modal"
            data-bs-target="#referensi">
            <i class="bi bi-plus-circle-fill"></i> Tambahkan referensi
        </button>

        <!-- Modal -->
        <div class="modal fade " id="referensi" tabindex="-1" aria-labelledby="referensiLabel" aria-hidden="true">
            <div class="modal-dialog  modal-lg">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="referensiLabel">Referensi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" id="close"
                            aria-label="Close" onclick="hapusData()"></button>
                    </div>
                    <form action="/referensi" method="post" id="formReferensi">
                        @csrf
                        <div class="modal-body">
                            <p>Tambahkan referensi</p>

                            <div class="form-floating col-md-6">
                                <input type="text" class="form-control" id="namaReferensi" name="nama"
                                    placeholder="Nama">
                                <label for="namaReferensi">Nama Referensi</label>
                            </div>

                            <div class="form-floating mb-4 mt-4 col-md-6">
                                <input type="text" class="form-control" id="alamatLabel" name="alamat"
                                    placeholder="Alamat">
                                <label for="namaReferensi">Alamat</label>
                            </div>

                            <div class="form-floating col-md-6">
                                <input type="text" class="form-control" id="nomorTeleponLabel" name="nomor_telepon"
                                    placeholder="Nomor telepon" aria-describedby="noHpHelp">
                                <label for="nomorTeleponLabel">Nomor Telepon</label>
                                <div id="noHpHelp" class="form-text">Contoh. +62812345678</div>
                            </div>


                            <div class="mb-4">
                                <div class="mt-4">
                                    <p>Apakah dari SATUNAMA?</p>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="konfirmasi" id="konfirmasiYa"
                                        value="Ya">
                                    <label class="form-check-label" for="konfirmasiYa">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="konfirmasi"
                                        id="konfirmasiTidak" value="Tidak">
                                    <label class="form-check-label" for="konfirmasiTidak">
                                        Tidak
                                    </label>
                                </div>
                            </div>


                            <div class="form-floating col-md-6">
                                <input type="text" class="form-control " id="posisi" name="inputPosisi"
                                    placeholder="Posisi" style="display: none">
                                <label for="posisi">Posisi</label>
                            </div>


                            <div class="form-floating col-md-6">
                                <input type="text" class="form-control " id="hubungan" name="hubungan"
                                    placeholder="Hubungan">
                                <label for="hubungan">Hubungan</label>
                            </div>



                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-batal" data-bs-dismiss="modal"
                                onclick="hapusData()">Batal</button>
                            <button type="button" class="btn btn-primary btn-simpan border-0">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
