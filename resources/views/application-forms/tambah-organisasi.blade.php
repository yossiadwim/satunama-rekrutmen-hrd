<!-- Button trigger modal -->
<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modal-tambah-organisasi"
    style="background-color: #F25700; color: #ffffff"><i class="fa-solid fa-plus" style="color: #ffffff;"></i>
    Tambahkan Pengalaman Organisasi
</button>

<!-- Modal -->
<div class="modal fade" id="modal-tambah-organisasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambahkan Organisasi yang Sudah Diikuti
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="">
                <div class="modal-body ">
                    <div id="tambah_pengalaman_organisasi" style="max-height: 500px; overflow: auto">

                        <div class="form-floating mt-3 mb-3">
                            <input type="text" class="form-control" id="nama_organisasi1" name="nama_organisasi1"
                                placeholder="Nama Organisasi">
                            <label for="nama_organisasi1">Nama Organisasi</label>
                        </div>


                        <div class="form-floating mt-3 mb-3">
                            <input type="text" class="form-control" id="posisi1" name="posisi1"
                                placeholder="Posisi">
                            <label for="posisi1">Posisi</label>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-floating mt-3 mb-3">
                                    <select class="form-select" id="tahun_mulai1" name="tahun_mulai1"
                                        aria-label="Floating label select example">
                                        <option value="" selected disabled>Pilih</option>
                                        @foreach (range(date('Y'), date('Y') - 73) as $year)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endforeach

                                    </select>
                                    <label for="tahun_mulai1">Tahun Mulai</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating mt-3 mb-3">
                                    <select class="form-select" id="tahun_akhir1" name="tahun_akhir1"
                                        aria-label="Floating label select example">
                                        <option value="" selected disabled>Pilih</option>
                                        @foreach (range(date('Y'), date('Y') - 73) as $year)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endforeach

                                    </select>
                                    <label for="tahun_akhir1">Tahun Berakhir</label>
                                </div>
                            </div>
                        </div>

                        <div>
                            <button type="button" id="button_tambah_organisasi" class="btn btn-primary mt-3"><i
                                    class="fa-solid fa-plus" style="color: #ffffff;"></i>
                                Tambah</button>
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
