<div class="md-12">
    <h5 class="fw-bold">Profil Information</h5>
    <h3 class="fw-bold mt-5">TENTANG SAYA </h3>
    <hr class="border border-secondary">
    <div class="col-md-12 mt-5 mb-5 d-flex justify-content-center">
            <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary bg-btn border-0 mt-5 mb-5" data-bs-toggle="modal" data-bs-target="#deskripsiModal">
            <i class="bi bi-plus-circle-fill"></i> Tambahkan deskripsi tentang saya
        </button>
        
        <!-- Modal -->
        <div class="modal fade " id="deskripsiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tentang Saya</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" id="close" aria-label="Close" onclick="hapusData()"></button>
                </div>
                <div class="modal-body">
                    <p>Beritahu tentang diri Anda </p>
                    <form action="" method="" id="formDeskripsiDiri">
                        <input id="deskripsi" type="hidden" name="content">
                        <trix-editor input="deskripsi"></trix-editor>
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