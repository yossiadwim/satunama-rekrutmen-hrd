@csrf

<div class="container">
    <p>Apakah anda memiliki atau pernah mengalami penyakit berikut ini?</p>
    <div class="row g-2 mt-2 mb-4">
        @for ($i = 0; $i < count($illness); $i++)
            <div class="form-check col-3">
                <input class="form-check-input" type="checkbox" value="{{ $illness[$i] }}" id="flexCheckDefault"
                    name="kondisi_kesehatan[]" id="kondisi_kesehatan">
                <label class="form-check-label" for="flexCheckDefault">
                    {{ Str::title($illness[$i]) }}
                </label>
            </div>
        @endfor
    </div>


    <div>
        <label for="basic-url" class="form-label">Adakah penyakit serius lainnya?</label> <br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="adakah_penyakit_serius_lainnya" id="radioYa" value="ya"
                onclick="showHideInputSeriousIll()">
            <label class="form-check-label" for="inlineRadio1">Ya</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="adakah_penyakit_serius_lainnya" id="radioTidak" value="tidak"
                onclick="showHideInputSeriousIll()">
            <label class="form-check-label" for="inlineRadio2">Tidak</label>
        </div>

        <div class="mb-3 mt-3 col-6" id="group_input_penyakit_serius_lainnya" style="display: none">
            <div class="input-group" id="input_penyakit">
                <input type="text" class="form-control" aria-describedby="basic-addon3 basic-addon4" name="nama_penyakit_lainnya" id="nama_penyakit_lainnya"
                    placeholder="Masukkan nama penyakit ">
            </div>
            <label for="input_penyakit" class="opacity-50 mx-3" style="font-size: 14px">Jika lebih dari satu, pisahkan dengan koma (",")</label>
        </div>
        
    </div>


    <br>

    <div>
        <label for="basic-url" class="form-label">Apakah anda pernah mengalami cedera atau operasi?</label> <br>

        <div class=" form-check form-check-inline">
            <input class="form-check-input" type="radio" name="apakah_pernah_mengalami_cedera_operasi" id="radioButtonYa" value="ya" onclick="showHideInputCederaOperation()">
            <label class="form-check-label" for="radioButtonYa">
                Ya
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="apakah_pernah_mengalami_cedera_operasi" id="radioButtonTidak" value="tidak" onclick="showHideInputCederaOperation()">
            <label class="form-check-label" for="radioButtonTidak">
                Tidak
            </label>
        </div>
        <div class="mb-3 mt-3 col-4" id="group_input_pernah_cedera_atau_operasi" style="display: none">
            <div class="input-group" id="input_cedera_operasi">
                <input type="text" class="form-control" aria-describedby="basic-addon3 basic-addon4" name="nama_cedera_atau_operasi"
                    placeholder="Masukkan...">
            </div>
            <label for="input_cedera_operasi" class="opacity-50 mx-3" style="font-size: 14px">Jika lebih dari satu, pisahkan dengan koma (",")</label>

        </div>
    </div>



    <div class="col-2 mb-4 mt-4">
        <label class="form-label">Golongan Darah</label>
        <select class="form-select" aria-label="Default select example" name="golongan_darah" id="golongan_darah">
            <option selected disabled>Pilih</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="AB">AB</option>
            <option value="O">O</option>
        </select>
    </div>
</div>
