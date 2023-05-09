 <!-- Button trigger modal -->
 {{-- <button type="button" class="btn btn-primary bg-btn border-0" data-bs-toggle="modal" data-bs-target="#editProfil">
     Edit Profil
 </button> --}}

 {{-- @if ($profils) --}}
 {{-- <a href="/profil/create" class="btn btn-primary bg-btn border-0" data-bs-toggle="modal"
         data-bs-target="#editProfil"></i>
         Edit Profil</a> --}}
 {{-- @else --}}

 <a href="/profil-kandidat/users/{{ $user->slug }}/edit" class="btn btn-primary border-0" data-bs-toggle="modal"
     data-bs-target="#editProfil"></i>
     Edit Profil</a>


 <!-- Modal -->
 <div class="modal fade" id="editProfil" tabindex="-1" aria-labelledby="profilLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="profilLabel">Edit Profil</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                     onclick="hapusData()"></button>
             </div>
             <form action="/profil-kandidat/users/{{ $user->slug }}" method="POST" id="formEditProfil"
                 enctype="multipart/form-data">
                 @method('put')
                 <div class="modal-body">
                     @csrf
                     <div class="form-floating">
                         <input type="text" class="form-control mb-4" name="nama_pelamar" id="namaPelamar"
                             placeholder="Nama Anda" value="{{ $user->pelamar->nama_pelamar }}" required>
                         <label for="namaPelamar">Nama Anda</label>
                     </div>

                     <div class="form-floating mb-3">
                         <input type="email" class="form-control" id="email" name="email"
                             placeholder="Masukkan email Anda" value="{{ $user->pelamar->email }}" required>
                         <label for="email">Masukkan email Anda</label>
                     </div>

                     <div class="row g-3 mb-4">
                         <div class="col-md-12">
                             <div class="form-floating">
                                 <input type="text"
                                     class="form-control @error('nomor_telepon')
                                     is-invalid
                                 @enderror"
                                     id="nomorTeleponPelamar" name="telepon_rumah" placeholder="Nomor telepon"
                                     aria-describedby="noHpHelp" value="{{ $user->pelamar->telepon_rumah }}" required>
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
                         <input type="text" class="form-control" id="alamat" name="alamat"
                             placeholder="Masukkan alamat anda" value="{{ $user->pelamar->alamat }}" required>
                         <label for="alamat">Masukkan alamat Anda</label>
                     </div>

                     <div class="d-flex mt-3 mb-2">
                         <label for="date" class="px-2">Masukkan tanggal lahir </label>
                         <input type="date"
                             class="@error('tanggal_lahir')
                             is-invalid
                         @enderror"
                             id="tanggal_lahir" name="tanggal_lahir" value="{{ $user->pelamar->tanggal_lahir }}"
                             required>
                         @error('usia')
                             <div class="invalid-feedback">
                                 {{ $message }}
                             </div>
                         @enderror
                     </div>


                     <div class="d-flex mt-3 mb-2">
                         <label for="jenisKelamin">Jenis Kelamin</label>
                         <select
                             class="form-select mt-3 @error('jenis_kelamin')
                             is-invalid
                         @enderror"
                             id="jenisKelamin" aria-label="Default select example" name="jenis_kelamin">
                             @if (old('jenis_kelamin', $user->pelamar->jenis_kelamin) == 'laki-laki')
                                 <option value="laki-laki" selected>Laki-laki</option>
                             @elseif(old('jenis_kelamin', $user->pelamar->jenis_kelamin) == 'perempuan')
                                 <option value="perempuan" selected>Perempuan</option>
                             @else
                                 <option value="Pria">Pria</option>
                                 <option value="Wanita">Wanita</option>
                             @endif
                         </select>
                         @error('jenis_kelamin')
                             <div class="invalid-feedback">
                                 {{ $message }}
                             </div>
                         @enderror
                     </div>
                     <div class="mt-4">

                         <input
                             class="form-control @error('kewarganegaraan')
                             is-invalid
                         @enderror"
                             list="negara" id="exampleDataList" placeholder="Ketik untuk pilih kewarganegaraan..."
                             name="kebangsaan" id="kebangsaan" required>
                         <datalist id="negara">
                             @foreach ($countries as $country)
                                 @if (old('kebangsaan', $country) == $user->pelamar->kebangsaan)
                                     <option value="{{ $user->pelamar->kebangsaan }}">{{ $user->pelamar->kebangsaan }}
                                     </option>
                                 @else
                                     <option value="{{ $country }}">{{ $country }}</option>
                                 @endif
                             @endforeach
                         </datalist>
                         @error('kebangsaan')
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
