@csrf

<div class="container">

    {{-- <div class="row g-2">
        @for ($i = 0; $i < count($hobbies); $i++)
            <div class="form-check col-4">
                <input class="form-check-input" type="checkbox" value="{{ $hobbies[$i] }}" id="flexCheckDefault"
                    name="hobi[]" id="hobi">
                <label class="form-check-label" for="flexCheckDefault">
                    {{ Str::title($hobbies[$i]) }}
                </label>
            </div>
        @endfor
    </div> --}}
    <div class="mb-3 mt-3 col-6">
        <div class="input-group" id="">
            <textarea class="form-control" placeholder="Masukkan hobi Anda" id="hobi" name="hobi[]"></textarea>
        </div>
        <label for="hobi" class="opacity-50 mx-1" style="font-size: 14px">Jika lebih dari satu, pisahkan
            dengan koma (",")</label>
    </div>
</div>
