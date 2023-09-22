@csrf

<div class="container">
    <div class="row g-2">
        @for ($i = 0; $i < count($hobbies); $i++)
            <div class="form-check col-4">
                <input class="form-check-input" type="checkbox" value="{{ $hobbies[$i] }}" id="flexCheckDefault"
                    name="hobi[]" id="hobi">
                <label class="form-check-label" for="flexCheckDefault">
                    {{ Str::title($hobbies[$i]) }}
                </label>
            </div>
        @endfor


    </div>
</div>
