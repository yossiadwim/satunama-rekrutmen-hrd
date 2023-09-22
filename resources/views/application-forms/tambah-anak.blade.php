{{-- <!-- Button trigger modal -->
<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modal_tambah_anak"
    style="background-color: #F25700; color: #ffffff"><i class="fa-solid fa-plus" style="color: #ffffff;"></i>
    Tambahkan Informasi Anak
</button>

<!-- Modal -->
<div class="modal fade" id="modal_tambah_anak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" >
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambahkan Informasi Anak</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="">
                <div class="modal-body " >
                    <div id="tambah_anak" style="max-height: 500px; overflow: auto">
                        <div class="row" >
                            <div class="col-5">
                                <div class="form-floating mt-3 mb-3">
                                    <input type="text" class="form-control" id="nama_anak1" name="nama_anak1"
                                        placeholder="Nama Anak">
                                    <label for="nama_anak1">Nama Anak</label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-floating mt-3 mb-3">
                                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin1"
                                        aria-label="Floating label select example">
                                        <option value="" selected disabled>Pilih</option>
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>

                                    </select>
                                    <label for="floatingSelect">Jenis Kelamin</label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-floating mt-3 mb-3">
                                    <input type="text" class="form-control" id="umur1" name="umur1"
                                        placeholder="Umur">
                                    <label for="umur">Umur</label>
                                </div>
                            </div>
                            <div class="col-3">
                                <button type="button" id="button_tambah_anak" class="btn btn-primary mt-3"><i
                                        class="fa-solid fa-plus" style="color: #ffffff;"></i>
                                    Tambah</button>
                            </div>
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
 
</div> --}}

@csrf

<table class="table mt-4" id="tableAnak">
    <thead class="text-center">
        <tr>
            <th scope="col">Nama Anak</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Umur</th>
        </tr>
    </thead>
    <tbody id="table-body-children">
        {{-- <tr id="table-row-children">
            <td id="col-1"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
            <td id="col-2">
                <input type="text" class="form-control" id="nama_anak" name="nama_anak" placeholder="Nama Anak">
            </td>
            <td id="col-3">
                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin"
                    aria-label="Floating label select example">
                    <option value="" selected disabled>Pilih</option>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>

                </select>
            </td>
            <td id="col-4" class="col-2">
                <input type="number" class="form-control" name="umur" id="umur" placeholder="Umur">
            </td>
        </tr> --}}
    </tbody>
</table>

<div class="col-2">
    <div class="form-floating">
        <input type="number" class="form-control" name="jumlah_anak" id="jumlah_anak" placeholder="Jumlah Anak"
            onchange="addRowTableChildren()" min="0">
        <label for="jumlah_anak">Jumlah Anak</label>
    </div>

</div>

{{-- @push('script-tambah-anak')
    function addRowTableChildren() {

    var jumlah_anak = document.getElementById('jumlah_anak');

    const table_body = document.getElementById('table-body-children');

    table_body.innerHTML = '';

    for (var i = 1; i <= jumlah_anak.value; i++) { var tr=document.createElement("tr"); tr.innerHTML=` <td id="col-2">
        <input type="text" class="form-control" id="nama_anak" name="nama_anak[]" placeholder="Nama Anak">
        </td>
        <td id="col-3">
            <select class="form-select" id="jenis_kelamin" name="select_jenis_kelamin[]"
                aria-label="Floating label select example">
                <option value="" selected disabled>Pilih</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>

            </select>
        </td>
        <td id="col-4" class="col-2">
            <input type="number" class="form-control" name="umur[]" id="umur" placeholder="Umur" min="0">
        </td>
        `
        table_body.appendChild(tr);
        }


        }
    @endpush --}}
