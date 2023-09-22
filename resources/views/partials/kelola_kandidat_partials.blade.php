@foreach ($datas as $data)
    <div class="col-sm-3">
        <div class="card text-center mt-4 mb-3 h-200 shadow-sm" style="width: 18rem;">
            <div class="card-header" style="background-color: white">
                <span class="badge rounded-pill"
                    style="background-color: #90c291; color: #ffffff ">{{ Str::title($data->statusLamaran[0]->status->nama_status) }}</span>
            </div>
            <div class="card-body">
                <img class="rounded-circle" height="70px" width="70px" style="border-radius: 50%; object-fit: cover;"
                    src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                <h5 class="card-title">{{ $data->pelamar->nama_pelamar }}
                </h5>

                <p class="card-text mt-1"><i class="fa-solid fa-location-dot"></i>
                    {{ $data->pelamar->alamat }}</p>
                <p>Melamar pada
                    {{ \Carbon\Carbon::parse($data->tanggal_melamar)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, j F Y ') }}
                </p>
                <a href="/admin-dashboard/lowongan/detail-pelamar/{{ $data->id_pelamar_lowongan }}" class="btn"
                    style="background-color: #90c291; outline-color: #90c291">Lihat
                    Detail </a>
            </div>
        </div>
    </div>
@endforeach
