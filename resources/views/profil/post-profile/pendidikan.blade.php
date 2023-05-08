<div class="md-12">
    <h3 class="fw-bold mt-5">PENDIDIKAN</h3>
    <hr class="border border-secondary">
    <div class="col-md-12 mt-5 mb-5 d-flex justify-content-center">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary bg-btn border-0 mt-5 mb-5" data-bs-toggle="modal"
            data-bs-target="#pendidikan">
            <i class="bi bi-plus-circle-fill"></i> Tambahkan pendidikan
        </button>

        <!-- Modal -->
        <div class="modal fade " id="pendidikan" tabindex="-1" aria-labelledby="pendidikanLabel" aria-hidden="true">
            <div class="modal-dialog  modal-lg">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="pendidikanLabel">Pendidikan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" id="close"
                            aria-label="Close" onclick="hapusData()"></button>
                    </div>
                    <div class="modal-body">
                        <p>Beritahu kami pendidikan yang pernah Anda tempuh</p>
                        <form action="" method="" id="formPendidikan">

                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <select class="form-select" aria-label="Default select example"
                                        id="jenjangPendidikan">
                                        <option selected disabled>Pilih Jenjang Pendidikan</option>
                                        <option value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA">SMA</option>
                                        <option value="Universitas">Universitas</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-4 mt-4">
                                <input type="text" class="form-control" id="namaInstansiLabel" name="namaInstansi"
                                    placeholder="Nama Instansi">
                            </div>
                            <div class="mb-4 mt-4">
                                <input type="text" class="form-control" id="alamatLabel" name="alamat"
                                    placeholder="Alamat">
                            </div>
                            <div class="col-md-3">
                                <select name="tahunSelesai" id="tahunSelesai" class="form-select">
                                    <option disabled selected>Tahun Selesai</option>
                                    @foreach (range(date('Y') - 123, date('Y')) as $year)
                                        <option value="{{ $year }}"> {{ $year }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 mt-4">
                                    <label for="formFileMultiple" class="form-label">Masukkan lampiran</label>
                                    <input class="form-control" type="file" id="formFileMultiple" multiple>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-batal" data-bs-dismiss="modal"
                            onclick="hapusData()">Batal</button>
                        <button type="button" class="btn btn-primary btn-simpan border-0">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
