 <!-- Button trigger modal -->
 {{-- <button type="button" class="btn btn-primary bg-btn border-0" data-bs-toggle="modal" data-bs-target="#editProfil">
     Edit Profil
 </button> --}}

 {{-- @if ($profils) --}}
 {{-- <a href="/profil/create" class="btn btn-primary bg-btn border-0" data-bs-toggle="modal"
         data-bs-target="#editProfil"></i>
         Edit Profil</a> --}}
 {{-- @else --}}
 <a href="/profil/{{ $profil->id }}/edit" class="btn btn-primary border-0" data-bs-toggle="modal"
     data-bs-target="#editProfil"></i>
     Edit Profil</a>
 {{-- @endif --}}

 <!-- Modal -->
 <div class="modal fade" id="editProfil" tabindex="-1" aria-labelledby="profilLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="profilLabel">Edit Profil</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                     onclick="hapusData()"></button>
             </div>
             <form action="/profil/{{ $profil->id }}" method="POST" id="formEditProfil"
                 enctype="multipart/form-data">
                 @method('put')
                 <div class="modal-body">
                     @csrf
                     <div class="form-floating">
                         <input type="text" class="form-control mb-4" name="nama" id="namaPelamar"
                             placeholder="Nama Anda" value="{{ old('nama', $profil->nama) }}" required>
                         <label for="namaPelamar">Nama Anda</label>
                     </div>

                     <div class="row g-3 mb-4">
                         <div class="col-md-12">
                             <div class="form-floating">
                                 <input type="text"
                                     class="form-control @error('nomor_telepon')
                                     is-invalid
                                 @enderror"
                                     id="nomorTeleponPelamar" name="nomor_telepon" placeholder="Nomor telepon"
                                     aria-describedby="noHpHelp"
                                     value="{{ old('nomor_telepon', $profil->nomor_telepon) }}" required>
                                 @error('nomor_telepon')
                                     <div class="invalid-feedback">
                                         {{ $message }}
                                     </div>
                                 @enderror
                                 <label for="nomorTeleponPelamar">Masukkan nomor telepon. Contoh +62812345678</label>
                             </div>

                         </div>
                     </div>
                     <div class="form-floating mb-3">
                         <input type="email" class="form-control" id="email" name="email"
                             placeholder="Masukkan email Anda" value="{{ old('email', $profil->email) }}" required>
                         <label for="email">Masukkan email Anda</label>
                     </div>

                     <div class="row g-3 mb-4 mt-3">
                         <div class="col">
                             <label for="provinsi">Provinsi</label>
                             <select name="provinsi"
                                 class="form-select @error('provinsi')
                                 is-invalid
                             @enderror"
                                 id="provinsi">

                                 @foreach ($provinsi as $p)
                                     @if (old('provinsi', $profil->provinsi) == $p->id_provinsi)
                                         <option value="{{ $p->id_provinsi }}" selected>{{ $p->nama_provinsi }}</option>
                                     @else
                                         <option value="{{ $p->id_provinsi }}">{{ $p->nama_provinsi }}</option>
                                     @endif
                                 @endforeach
                             </select>
                             @error('provinsi')
                                 <div class="invalid-feedback">
                                     {{ $message }}
                                 </div>
                             @enderror
                         </div>
                         <div class="col">
                             <label for="kabupaten">Kabupaten</label>
                             <select name="kabupaten" id="kabupaten"
                                 class="form-select @error('kabupaten')
                                 is-invalid
                             @enderror">
                                 <option disabled selected>Kabupaten/Kota</option>
                             </select>
                             @error('kabupaten')
                                 <div class="invalid-feedback">
                                     {{ $message }}
                                 </div>
                             @enderror
                         </div>
                     </div>

                     <div class="d-flex mt-3 mb-2">
                         <label for="date" class="px-2">Masukkan tanggal lahir </label>
                         <input type="date"
                             class="@error('usia')
                             is-invalid
                         @enderror"
                             id="usia" name="usia" value="{{ old('usia', $profil->usia) }}" required>
                         @error('usia')
                             <div class="invalid-feedback">
                                 {{ $message }}
                             </div>
                         @enderror
                     </div>


                     <div class="col-md-5 mt-3">
                         <label for="jenisKelamin">Jenis Kelamin</label>
                         <select
                             class="form-select mt-3 @error('jenis_kelamin')
                             is-invalid
                         @enderror"
                             id="jenisKelamin" aria-label="Default select example" name="jenis_kelamin">
                             @if (old('jenis_kelamin', $profil->jenis_kelamin) == 'laki-laki')
                                 <option value="laki-laki">Laki-laki</option>
                             @elseif(old('jenis_kelamin', $profil->jenis_kelamin) == 'perempuan')
                                 <option value="perempuan">Perempuan</option>
                             @endif
                         </select>
                         @error('jenis_kelamina')
                             <div class="invalid-feedback">
                                 {{ $message }}
                             </div>
                         @enderror
                     </div>
                     <div class="mt-4">
                         <label for="kewarganegaraan">Kewarganegaraan</label>
                         <input
                             class="form-control @error('kewarganegaraan')
                             is-invalid
                         @enderror"
                             list="negara" id="exampleDataList" placeholder="Pilih kewarganegaraan..."
                             name="kewarganegaraan" id="kewarganegaraan" required>
                         <datalist id="negara">
                             @foreach ($allCountries as $country)
                                 <option value="{{ $country->name->common }}">
                             @endforeach
                         </datalist>
                         @error('kewarganegaraan')
                             <div class="invalid-feedback">
                                 {{ $message }}
                             </div>
                         @enderror
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                         onclick="hapusData()">Close</button>
                     <button class="btn btn-primary" type="submit">Simpan</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
