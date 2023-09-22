<div class="md-12">
    <h2 class="fw-bold">PROFIL INFORMATION</h2>
    <h3 class="fw-bold mt-5">TENTANG SAYA </h3>
    <hr class="border border-secondary">
    <div class="col-md-12 mt-5 mb-5  ">
        <!-- Button trigger modal -->
        @if ($user->pelamar->deskripsi == null)
            <a href="/profil-kandidat/users/{{ $user->slug }}/description" class="btn btn-primary border-0 mt-5 mb-5"
                data-bs-toggle="modal" data-bs-target="#deskripsiModal"><i class="bi bi-plus-circle-fill"></i>
                Tambahkan deskripsi tentang Anda</a>

            <!-- Modal -->
            <div class="modal fade " id="deskripsiModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog  modal-lg">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tentang Saya</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" id="close"
                                aria-label="Close" onclick="hapusData()"></button>
                        </div>
                        <form action="/profil-kandidat/users/{{ $user->slug }}/description" method="post" id="formDeskripsiDiri">
                            @csrf
                            <div class="modal-body">
                                <p>Beritahu tentang diri Anda </p>
                                <input id="deskripsi" type="hidden" name="deskripsi">
                                <trix-editor input="deskripsi"></trix-editor>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-batal" data-bs-dismiss="modal"
                                    onclick="hapusData()">Batal</button>
                                <button type="submit" class="btn btn-primary btn-simpan border-0">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-10">
                    <article style="text-align: justify">
                        {!! $user->pelamar->deskripsi !!}
                    </article>
                </div>
                <div class="col-2">
                    <a href="/profil-kandidat/users/{{ $user->slug }}/description" class="btn btn-primary border-0 mt-5 mb-5"
                        data-bs-toggle="modal" data-bs-target="#deskripsiModal"><i class="bi bi-pencil-fill"></i>
                        Edit</a>

                    <!-- Modal -->
                    <div class="modal fade " id="deskripsiModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog  modal-lg">
                            <div class="modal-content ">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tentang Saya</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" id="close"
                                        aria-label="Close" onclick="hapusData()"></button>
                                </div>
                                <form action="/profil-kandidat/users/{{ $user->slug }}/description" method="post"
                                    id="formDeskripsiDiri">
                                    @csrf
                                    <div class="modal-body">
                                        <p>Beritahu tentang diri Anda </p>
                                        <input id="deskripsi" type="hidden" name="deskripsi">
                                        <trix-editor input="deskripsi">{!! $user->pelamar->deskripsi !!}</trix-editor>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" >Hapus</button>
                                        <button type="button" class="btn btn-secondary btn-batal"
                                            data-bs-dismiss="modal" onclick="hapusData()">Batal</button>
                                        <button type="submit"
                                            class="btn btn-primary btn-simpan border-0">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
