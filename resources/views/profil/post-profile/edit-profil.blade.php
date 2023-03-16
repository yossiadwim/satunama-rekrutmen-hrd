 <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary bg-btn border-0" data-bs-toggle="modal" data-bs-target="#editProfil">
     Edit Profil
 </button>

 <!-- Modal -->
 <div class="modal fade" id="editProfil" tabindex="-1" aria-labelledby="profilLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="profilLabel">Edit Profil</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                     onclick="hapusData()"></button>
             </div>
             <div class="modal-body">
                 <form action="" method="" id="formEditProfil">
                     <div class="form-floating">
                         <input type="text" class="form-control mb-4" name="nama" id="namaPelamar"
                             placeholder="Nama Anda">
                         <label for="namaPelamar">Nama Anda</label>
                     </div>

                     <div class="row g-3 mb-4">
                         <div class="col-md-6">
                             <div class="form-floating">
                                 <input type="text" class="form-control" id="nomorTeleponPelamar" name="nomorTelepon"
                                     placeholder="Nomor telepon" aria-describedby="noHpHelp">
                                 <label for="nomorTeleponPelamar">Masukkan nomor telepon. Contoh +62812345678</label>
                                 {{-- <div id="noHpHelp" class="form-text">Contoh. +62812345678</div> --}}
                             </div>

                         </div>
                     </div>
                     <div class="form-floating mb-3">
                         <input type="email" class="form-control" id="email" name="email"
                             placeholder="Masukkan email Anda" value="{{ auth()->user()->email }}">
                         <label for="email">Masukkan email Andac</label>

                     </div>

                     <div class="row g-3 mb-4 mt-3">
                         <div class="col">
                             <select name="provinsi" class="form-select" id="provinsi">
                                 <option disabled selected>Provinsi</option>
                                 @foreach ($provinsi as $p)
                                     <option value="{{ $p->id_provinsi }}">{{ $p->nama_provinsi }}</option>
                                 @endforeach
                             </select>
                         </div>
                         <div class="col">

                             <select name="kabupaten" id="kabupaten" class="form-select">

                                 <option disabled selected>Kabupaten/Kota</option>
                                 {{-- @foreach ($kabupaten as $k)
                              <option value="{{ $k->id_kabupaten }}">{{ $k->nama_kabupaten }}</option>
                            @endforeach --}}
                             </select>
                         </div>
                     </div>

                     <div class="d-flex mt-3 mb-2">
                         <label for="date" class="px-2">Masukkan tanggal lahir </label>
                         <input type="date" class="" id="tanggalLahir">
                     </div>


                     <div class="col-md-5 mt-3">
                         <select class="form-select mt-3" id="jenisKelamin" aria-label="Default select example">
                             <option selected disabled>Jenis Kelamin</option>
                             <option value="laki-laki">Laki-laki</option>
                             <option value="perempuan">Perempuan</option>
                         </select>
                     </div>



                     <div class="mt-4">

                         <input class="form-control" list="negara" id="exampleDataList"
                             placeholder="Pilih kewarganegaraan...">
                         <datalist id="negara">
                             @foreach ($allCountries as $country)
                                 <option value="{{ $country->name->common }}">
                             @endforeach

                         </datalist>
                     </div>



                 </form>

             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                     onclick="hapusData()">Close</button>
                 <button type="button" class="btn btn-primary" onclick="saved()">Save changes</button>
             </div>
         </div>
     </div>
 </div>
