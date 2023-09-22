@csrf

<div class="container">
    <div class="row g-2 mt-2 mb-4">
        @for ($i = 0; $i < count($computer_skills); $i++)
            <div class="form-check col-2">
                <input class="form-check-input" type="checkbox" value="{{ $computer_skills[$i] }}" id="flexCheckDefault"
                    name="nama_kemampuan[]" id="keahlian_komputer">
                <label class="form-check-label" for="flexCheckDefault">
                    {{ Str::title($computer_skills[$i]) }}
                </label>
            </div>
        @endfor
    </div>
    <div class="row g-2 mt-2 mb-4">
        <div class="mt-4 mb-4 mx-2">
            <h3 class="fw-bold">Software</h3>
        </div>
        @for ($i = 0; $i < count($software); $i++)
            <div class="form-check col-2">
                <input class="form-check-input" type="checkbox" value="{{ $software[$i] }}" id="flexCheckDefault"
                    name="software[]" id="software">
                <label class="form-check-label" for="flexCheckDefault">
                    {{ Str::title($software[$i]) }}
                </label>
            </div>
        @endfor
    </div>
    <div class="form-check col-2">
        <input class="form-check-input" type="checkbox" id="flexCheckDefault" id="lainnya">
        <label class="form-check-label" for="flexCheckDefault">
            Lainnya
        </label>
    </div>
</div>
