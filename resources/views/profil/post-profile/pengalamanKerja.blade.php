<div class="md-12">
    <h3 class="fw-bold ">PENGALAMAN KERJA</h3>
    <hr class="border border-secondary">
    <div class="col-md-12 mt-5 mb-5 d-flex justify-content-center">
            <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary bg-btn border-0 mt-5 mb-5" data-bs-toggle="modal" data-bs-target="#pengalamanKerja">
            <i class="bi bi-plus-circle-fill"></i> Tambahkan pengalaman kerja
        </button>
        
        <!-- Modal -->
        <div class="modal fade " id="pengalamanKerja" tabindex="-1" aria-labelledby="pengalamanKerjaLabel" aria-hidden="true">
            <div class="modal-dialog  ">
            <div class="modal-content ">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="pengalamanKerjaLabel">Pengalaman Kerja</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" ID="close" aria-label="Close" onclick="hapusData()"></button>
                </div>
                <div class="modal-body">
                    <p>Tambahkan pengalaman kerja yang Anda miliki</p>
                    <form action="" method="" id="formPengalamanKerja">
                        
                        <input type="text" class="form-control mb-4" name="namaPerusahaan" id="namaPerusahaan" placeholder="Nama peruasahaan">
                        <input type="text" class="form-control mb-4" name="posisijabatan" id="posisijabatan" placeholder="Posisi / jabatan">

                        <div class="row g-3 mb-4">
                            <div class="col">
                                <select name="bulan" class="form-select" id="bulanMulai">
                                    <option disabled selected>Bulan Mulai</option>
                                    @foreach (range(1, 12) as $month)
                                        <option value="{{ $month }}">{{ \Carbon\Carbon::createFromDate(null, $month, 1)->format('F') }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                
                                <select name="tahun" id="tahunMulai" class="form-select">
                                    <option disabled selected>Tahun Mulai</option>
                                    @foreach (range(date('Y')-123, date('Y')) as $year)
                                      <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row g-3 mb-4">
                            <div class="col">
                          
                                <select name="bulan" class="form-select" id="bulanBerakhir" >
                                    <option disabled selected>Bulan Berakhir</option>
                                    @foreach (range(1, 12) as $month)
                                        <option value="{{ $month }}">{{ \Carbon\Carbon::createFromDate(null, $month, 1)->format('F') }}</option>
                                    @endforeach
                                </select>
                                
                            </div>

                            <div class="col">
                                <select name="tahun" id="tahunBerakhir" class="form-select">
                                    <option disabled selected>Tahun Berakhir</option>
                                    @foreach (range(date('Y')-123, date('Y')) as $year)
                                      <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" value="masih bekerja" id="konfirmasi" >
                            <label class="form-check-label" for="konfirmasi">
                                Saya masih bekerja di perusahaan ini
                            </label>
                        </div>

                        <input type="text" class="form-control mb-4" name="gaji" id="gaji" placeholder="Gaji">

                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Alasan mengundurkan diri</label>
                          </div>

                    </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="hapusData()">Close</button>
                <button type="button" class="btn btn-primary btn-simpan border-0">Save changes</button>
                </div>
            </div>
            </div>
        </div>
    </div>