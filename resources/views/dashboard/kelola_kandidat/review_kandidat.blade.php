<div class="tab-pane fade show active" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab" tabindex="0">
    <div class="container mt-4 rounded border border-1" id="kandidat_container">
        <div class="row " id="kandidat">
            @if (count($review) > 0)
                <table class="table table-hover">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Nama & Alamat</th>
                            <th scope="col">Email</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Nomor Telepon</th>
                            <th scope="col">Posisi Terakhir</th>
                            <th scope="col">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < count($review); $i++)
                            <tr class="text-center">
                                <th scope="row">{{ $i + 1 }}</th>
                                <td>{{ $review[$i]['pelamar']['nama_pelamar'] }} {!! nl2br('<br>') !!}
                                    {{ $review[$i]['pelamar']['alamat'] }}</td>
                                <td>{{ $review[$i]['pelamar']['email'] }}</td>
                                <td>{!! $review[$i]['pelamar']['jenis_kelamin'] != null ? $review[$i]['pelamar']['jenis_kelamin'] : '-' !!}</td>
                                <td>{{ $review[$i]['pelamar']['telepon_rumah'] != null ? $review[$i]['pelamar']['telepon_rumah'] : '-' }}</td>
                                @if ($review[$i]['pelamar']['pengalaman_kerja'] != null)
                                    @for ($j = 0; $j < count($review[$i]['pelamar']['pengalaman_kerja']); $j++)
                                        <td>{{ $review[$i]['pelamar']['pengalaman_kerja'][$j]['posisi'] }}</td>
                                    @endfor
                                @else
                                    <td>-</td>
                                @endif
                                <td>
                                    <a href="/admin-dashboard/lowongan/detail-pelamar/{{ $review[$i]['pelamar']['user']['slug'] }}"
                                        class="btn fw-semibold" style="background-color: #90c291; outline-color: #90c291"><i class="bi bi-info-circle-fill"></i> Detail </a>
                                        {!! nl2br('<br>') !!}


                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            @else
                <div class="container col-12 mt-4 ">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('img/search.png') }}" alt="" class="">
                    </div>
                    <div class="d-flex justify-content-center">
                        <p class="mt-3 fw-semibold">Tidak ada pelamar ditahap ini</p>
                    </div>

                </div>
            @endif

        </div>

    </div>
</div>


{{-- @foreach ($datas as $data)
                @if ($data->statusLamaran[0]->status->nama_status == 'review')
                    <div class="col-sm-3">
                        <div class="card text-center mt-4 mb-3 h-200 shadow-sm" style="width: 18rem;">
                            <div class="card-header" style="background-color: white">
                                <span class="badge rounded-pill"
                                    style="background-color: #90c291; color: #ffffff ">{{ Str::title($data->statusLamaran[0]->status->nama_status) }}

                                </span>
                            </div>
                            <div class="card-body">
                                <img class="rounded-circle" height="70px" width="70px"
                                    style="border-radius: 50%; object-fit: cover;"
                                    src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                                <h5 class="card-title">{{ $data->pelamar->nama_pelamar }}
                                </h5>

                                <p class="card-text mt-1"><i class="fa-solid fa-location-dot"></i>
                                    {{ $data->pelamar->alamat }}</p>
                                <p>Melamar pada
                                    {{ \Carbon\Carbon::parse($data->tanggal_melamar)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, j F Y ') }}
                                </p>
                                <a href="/admin-dashboard/lowongan/detail-pelamar/{{ $data->pelamar->user->slug }}"
                                    class="btn" style="background-color: #90c291; outline-color: #90c291">Lihat
                                    Detail </a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="container col-12 mt-4 ">
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('img/search.png') }}" alt="" class="">
                        </div>
                        <div class="d-flex justify-content-center">
                            <p class="mt-3 fw-semibold">Tidak ada pelamar ditahap ini</p>
                        </div>

                    </div>
                @endif
                @continue
            @endforeach --}}
