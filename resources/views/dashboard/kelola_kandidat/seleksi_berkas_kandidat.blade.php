<div class="tab-pane fade" id="pills-seleksi-berkas" role="tabpanel" aria-labelledby="pills-seleksi-tab" tabindex="0">
    {{-- <div class="container">
        <div class="row mt-4">
            <div class="col-3 border-1 border-end border-secondary">
                <div class="col-12 ">
                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        @foreach ($datas as $data)
                            @foreach ($data->statusLamaran as $data_status)

                                @if ($data->pelamar->id == 1)
                                    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#tab-candidate-seleksi-{{ $data_status->status->slug }}-{{ $data->pelamar->id }}"
                                        type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                        <div class="row shadow-sm border px-2 py-2">
                                            <div class="col-3 ">
                                                <img class="rounded-circle" height="70px" width="70px"
                                                    style="border-radius: 50%; object-fit: cover;"
                                                    src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                                            </div>

                                        </div>
                                    </button>
                                @else
                                    <button class="nav-link" id="v-pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#tab-candidate-seleksi-{{ $data_status->status->slug }}-{{ $data->pelamar->id }}"
                                        type="button" role="tab" aria-controls="v-pills-home">
                                        <div class="row shadow-sm border px-2 py-2">
                                            <div class="col-3 ">
                                                <img class="rounded-circle" height="70px" width="70px"
                                                    style="border-radius: 50%; object-fit: cover;"
                                                    src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                                            </div>
                                            <div class="col-9">
                                                <p>{{ $data->pelamar->nama_pelamar }}</p>
                                                <p>{{ $data->pelamar->alamat }}</p>
                                            </div>
                                        </div>
                                    </button>
                                @endif
             
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="tab-content col-9 justify-content-center border border-3" id="v-pills-tabContent">
                @foreach ($datas as $data)
                    @foreach ($data->statusLamaran as $data_status)
                        @if ($data->pelamar->id)
                            <div class="container tab-pane fade"
                                id="tab-candidate-seleksi-{{ $data_status->status->slug }}-{{ $data->pelamar->id }}"
                                role="tabpanel" tabindex="0">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                            <img class="rounded-circle " width="150px"
                                                src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                                            <span> </span>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="p-3 py-5">
                                            <div class="row">
                                                @if ($data->pelamar->nama_pelamar == null)
                                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                                        <h4 class="text-right fw-bold">
                                                            {{ $data->pelamar->nama_pelamar }}
                                                        </h4>
                                                    </div>
                                                @else
                                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                                        <h4 class="text-right fw-bold">
                                                            {{ $data->pelamar->nama_pelamar }} |
                                                            <span
                                                                class="badge text-bg-info">{{ Str::title($data_status->status->nama_status) }}</span>
                                                            @if ($data_status->status->nama_status == 'reference check')
                                                                <a class="btn btn-secondary mt-3"
                                                                    href="/admin-dashboard/lowongan/{{ $data->id_pelamar_lowongan }}/reference-check"
                                                                    role="button">Lakukan Reference Check</a>
                                                            @endif
                                                        </h4>
                                                    </div>
                                                @endif

                                            </div>

                                            <div class="row mt-2">
                                                @if ($data->pelamar->telepon_rumah == null)
                                                    <div class="col-md-6">
                                                        <label class="labels fw-bold"><i class="fa-solid fa-phone"></i> Nomor
                                                            Telepon</label>
                                                        <p>{{ '-' }}</p>
                                                    </div>
                                                @else
                                                    <div class="col-md-6">
                                                        <label class="labels fw-bold"><i class="fa-solid fa-phone"></i> Nomor
                                                            Telepon</label>
                                                        <p>{{ $data->pelamar->telepon_rumah }}</p>
                                                    </div>
                                                @endif
                                                <div class="col-md-6">
                                                    <label class="labels fw-bold"><i class="fa-solid fa-envelope"></i>
                                                        Email</label>
                                                    <p>{{ $data->pelamar->email }}</p>
                                                </div>
                                            </div>
                                            <div class="row mt-2">

                                                @if ($data->pelamar->alamat == null && $data->pelamar->tanggal_lahir == null)
                                                    <div class="col-md-6">
                                                        <label class="labels fw-bold"><i
                                                                class="fa-solid fa-location-dot"></i> Alamat</label>
                                                        <p>{{ '-' }}</p>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="labels fw-bold"><i
                                                                class="fa-regular fa-calendar-days"></i> Tanggal
                                                            Lahir</label>
                                                        <p>{{ '-' }}</p>
                                                    </div>
                                                @else
                                                    <div class="col-md-6">
                                                        <label class="labels fw-bold"><i
                                                                class="fa-solid fa-location-dot"></i> Alamat</label>
                                                        <p>{{ $data->pelamar->alamat }}</p>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="labels fw-bold"><i
                                                                class="fa-regular fa-calendar-days"></i> Tanggal
                                                            Lahir</label>
                                                        <p>{{ \Carbon\Carbon::parse($data->pelamar->tanggal_lahir)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('j F Y ') }}
                                                        </p>
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="row mt-2">
                                                @if ($data->pelamar->kebangsaan == null)
                                                    <div class="col-md-6">
                                                        <label class="labels fw-bold"><i class="fa-solid fa-globe"></i>
                                                            Kebangsaan</label>
                                                        <p>{{ '-' }}</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="labels fw-bold"><i class="fa-solid fa-user"></i>
                                                            Jenis Kelamin</label>
                                                        <p>{{ '-' }}</p>
                                                    </div>
                                                @else
                                                    <div class="col-md-6">
                                                        <label class="labels fw-bold"><i class="fa-solid fa-globe"></i>
                                                            Kebangsaan</label>
                                                        <p>{{ $data->pelamar->kebangsaan }}</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="labels fw-bold"><i class="fa-solid fa-user"></i>
                                                            Jenis Kelamin</label>
                                                        <p>{{ $data->pelamar->jenis_kelamin }}</p>
                                                    </div>
                                                @endif
                                            </div>



                                        </div>
                                    </div>
                                </div>

                                @if ($data_status->status->nama_status == 'tes')
                                    <div class="mb-3">
                                        <a class="btn btn-secondary mt-3"
                                            href="/admin-dashboard/lowongan/{{ $data->id_pelamar_lowongan }}/assesment"
                                            role="button">Jadwalkan Tes Kandidat</a>
                                    </div>
                                @endif

                                <h5>Melamar pada:
                                    {{ \Carbon\Carbon::parse($data->tanggal_melamar)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, j F Y ') }}
                                </h5>

                                <div class="mt-3 mb-5">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab"
                                                data-bs-target="#detail-pelamar-seleksi-{{ $data_status->id_status_lamaran }}"
                                                type="button" role="tab" aria-controls="nav-profile"
                                                aria-selected="false">Detail
                                                Pelamar</button>

                                            <button class="nav-link " id="nav-home-tab" data-bs-toggle="tab"
                                                data-bs-target="#status-lamaran-seleksi-{{ $data_status->id_status_lamaran }}"
                                                type="button" role="tab" aria-controls="nav-home"
                                                aria-selected="true">Status Lamaran</button>

                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show"
                                            id="status-lamaran-seleksi-{{ $data_status->id_status_lamaran }}"
                                            role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                                            <div class="row">
                                                <div class="col-5 card mt-4" style="width: 18rem;">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Status Lamaran</h5>
                                                        <p class="card-text">
                                                            {{ Str::title($data_status->status->nama_status) }}</p>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col dropdown">
                                                                <button class="btn btn-secondary dropdown-toggle"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    Pindahkan Ke
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    @foreach ($status as $stat)
                                                                        <li>
                                                                            @if ($data_status->status->nama_status != $stat->nama_status)
                                                                                <button type="button" class="btn"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#id-seleksi-{{ $stat->id }}"
                                                                                    value="{{ $stat->id }}"
                                                                                    id="button_status_seleksi-{{ $stat->id }}">
                                                                                    {{ Str::title($stat->nama_status) }}
                                                                                </button>
                                                                            @endif
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                @foreach ($status as $stat)
                                                                    <div class="modal fade"
                                                                        id="id-seleksi-{{ $stat->id }}"
                                                                        tabindex="-1"
                                                                        aria-labelledby="exampleModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h1 class="modal-title fs-5"
                                                                                        id="exampleModalLabel">
                                                                                        Apa sudah yakin?</h1>
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    Pelamar akan dipindahkan ke
                                                                                    {{ Str::title($stat->nama_status) }}

                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-danger"
                                                                                        data-bs-dismiss="modal">Batal</button>
                                                                                    <form
                                                                                        action="/admin-dashboard/lowongan/{{ $data_status->id_status_lamaran }}/changePosition"
                                                                                        method="POST">
                                                                                        @csrf
                                                                                        <input type="date"
                                                                                            name="tanggal"
                                                                                            id="tanggal"
                                                                                            value="{{ date('Y-m-d') }}"
                                                                                            hidden>
                                                                                        <input type="text"
                                                                                            name="approved_by"
                                                                                            id="approved_by"
                                                                                            value="{{ auth()->user()->id_karyawan }}"
                                                                                            hidden>

                                                                                        <input type="text"
                                                                                            name="id_pelamar_lowongan"
                                                                                            value="{{ $data->id_pelamar_lowongan }}"
                                                                                            hidden>
                                                                                        <button class="btn btn-primary"
                                                                                            type="submit"
                                                                                            name="id_status"
                                                                                            id="id_status_seleksi_page-{{ $stat->id }}"
                                                                                            onclick="getData({{ $stat->id }})">Pindahkan


                                                                                        </button>
                                                                                    </form>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach

                                                            </div>
                                                            <div class="col">
                                                                <button type="button"
                                                                    class="btn btn-outline-dark">Tolak</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-7">
                                                    <div class="card mt-4 overflow-auto" style="width: 18rem;">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Riwayat Aktivitas</h5>
                                                            <p class="card-text mb-2 text-body-secondary">Menampilkan
                                                                {{ count($data->activityLog) }} aktivitas</p>
                                                            <hr>
                                                            @foreach ($data->activityLog as $data_activity)
                                                    
                                                                <p>- <strong>{!! $data_status->karyawan->nama_karyawan !!}</strong>
                                                                    memproses
                                                                    pelamar ini ke tahap
                                                                   
                                                                    <strong>{{ Str::title($data_activity->status[0]->nama_status) }}</strong>
                                                                    Pada
                                                                    {{ \Carbon\Carbon::parse($data_activity->created_at)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, j F Y ') }}
                                                                </p>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane fade show active"
                                            id="detail-pelamar-seleksi-{{ $data_status->id_status_lamaran }}"
                                            role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">


                                            <div class="accordion mt-4" id="accordionPanelsStayOpenExample">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button fw-bold" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#pengalamanKerja" aria-expanded="true"
                                                            aria-controls="panelsStayOpen-collapseOne">
                                                            PENGALAMAN KERJA
                                                        </button>

                                                    </h2>
                                                    <div id="pengalamanKerja"
                                                        class="accordion-collapse collapse show">
                                                        <div class="accordion-body">
                                                            @if (in_array($data->pelamar->id, $arrPengalamanId))
                                                                @foreach ($data->pelamar->pengalamanKerja as $data_pengalaman_kerja)
                                                                    <div
                                                                        class="border-start px-3 border-4 border-secondary">
                                                                        <p class="fw-bold">
                                                                            {{ $data_pengalaman_kerja->nama_perusahaan }}
                                                                        </p>
                                                                        <p>{{ $data_pengalaman_kerja->jabatan }}
                                                                        </p>
                                                                        <p>{{ $data_pengalaman_kerja->periode }}
                                                                        </p>
                                                                    </div>
                                                                @endforeach
                                                            @else
                                                                <div class="d-flex justify-content-center">
                                                                    <p>Belum ada data yang ditambahkan</p>
                                                                </div>
                                                            @endif
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion mt-4" id="accordionPanelsStayOpenExample">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button fw-bold" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#pendidikan"
                                                            aria-expanded="true"
                                                            aria-controls="panelsStayOpen-collapseOne">
                                                            PENDIDIKAN
                                                        </button>

                                                    </h2>
                                                    <div id="pendidikan" class="accordion-collapse collapse show">
                                                        <div class="accordion-body">
                                                            @if (in_array($data->pelamar->id, $arrPendidikanId))
                                                                @foreach ($data->pelamar->pendidikan as $data_status_pendidikan)
                                                                    <div
                                                                        class="border-start px-3 border-4 border-secondary">
                                                                        <p>Jenjang:
                                                                            {{ $data_status_pendidikan->jenjang_pendidikan }}
                                                                        </p>
                                                                        <p>Jurusan:
                                                                            {{ $data_status_pendidikan->jurusan }}
                                                                        </p>
                                                                        <p>IPK: {{ $data_status_pendidikan->ipk }}
                                                                        </p>

                                                                    </div>
                                                                @endforeach
                                                            @else
                                                                <div class="d-flex justify-content-center">
                                                                    <p>Belum ada data yang ditambahkan</p>
                                                                </div>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion mt-4 mb-5" id="accordionPanelsStayOpenExample">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button fw-bold" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#dokumen"
                                                            aria-expanded="true"
                                                            aria-controls="panelsStayOpen-collapseOne">
                                                            DOKUMEN
                                                        </button>

                                                    </h2>
                                                    <div id="dokumen" class="accordion-collapse collapse show">
                                                        <div class="accordion-body">
                                                            <nav>
                                                                <div class="nav nav-tabs" id="nav-tab"
                                                                    role="tablist">
                                                                    @foreach ($data->dokumenPelamarLowongan as $dd)
                                                                        @if ($dd->id_dokumen == 1)
                                                                            <li class="nav-item" role="presentation">
                                                                                <button class="nav-link active"
                                                                                    id="resume-tab"
                                                                                    data-bs-toggle="tab"
                                                                                    data-bs-target="#tab-pane-seleksi-{{ $dd->id_dokumen }}"
                                                                                    type="button" role="tab"
                                                                                    aria-selected="true">{{ \Illuminate\Support\Str::limit($dd->dokumenPelamar->nama, $limit = 30, '...') }}</button>
                                                                            </li>
                                                                        @else
                                                                            <li class="nav-item" role="presentation">
                                                                                <button class="nav-link "
                                                                                    id="resume-tab"
                                                                                    data-bs-toggle="tab"
                                                                                    data-bs-target="#tab-pane-seleksi-{{ $dd->id_dokumen }}"
                                                                                    type="button"
                                                                                    role="tab">{{ \Illuminate\Support\Str::limit($dd->dokumenPelamar->nama, $limit = 30, '...') }}</button>
                                                                            </li>
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                            </nav>
                                                            <div class="tab-content" id="nav-tabContent">
                                                                @foreach ($data->dokumenPelamarLowongan as $dd)
                                                                    @if ($dd->id_dokumen == 1)
                                                                        <div class="tab-pane fade show active"
                                                                            id="tab-pane-seleksi-{{ $dd->id_dokumen }}"
                                                                            role="tabpanel" aria-labelledby="home-tab"
                                                                            tabindex="0">
                                                                            <embed
                                                                                src="{{ asset('storage/' . $dd->dokumenPelamar->dokumen) }}"
                                                                                type="application/pdf" width="100%"
                                                                                height="800px" />
                                                                        </div>
                                                                    @else
                                                                        <div class="tab-pane fade"
                                                                            id="tab-pane-seleksi-{{ $dd->id_dokumen }}"
                                                                            role="tabpanel" aria-labelledby="home-tab"
                                                                            tabindex="0">
                                                                            <embed
                                                                                src="{{ asset('storage/' . $dd->dokumenPelamar->dokumen) }}"
                                                                                type="application/pdf" width="100%"
                                                                                height="800px" />
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                          
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                            </div>
                        @else
                            <div class="container mt-3 tab-pane fade"
                                id="tab-candidate-seleksi-{{ $data_status->status->slug }}-{{ $data->pelamar->id }}"
                                role="tabpanel" tabindex="0">
                                <h3>{{ $data->pelamar->nama_pelamar }}</h3>
                                <p>Alamat: {{ $data->pelamar->alamat }}</p>
                                <p>Melamar pada:
                                    {{ \Carbon\Carbon::parse($data->tanggal_melamar)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, j F Y') }}
                                </p>

                                <button class="mt-4 mb-4">Approve</button>
                                <div class="container mt-4 " style="background: #F1EEEE">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            @foreach ($data->dokumenPelamarLowongan as $dd)
                                                @if ($dd->id_dokumen == 1)
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link active" id="resume-tab"
                                                            data-bs-toggle="tab"
                                                            data-bs-target="#tab-pane-seleksi-{{ $dd->id_dokumen }}"
                                                            type="button" role="tab"
                                                            aria-selected="true">{{ \Illuminate\Support\Str::limit($dd->dokumenPelamar->nama, $limit = 30, '...') }}</button>
                                                    </li>
                                                @else
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link " id="resume-tab"
                                                            data-bs-toggle="tab"
                                                            data-bs-target="#tab-pane-seleksi-{{ $dd->id_dokumen }}"
                                                            type="button"
                                                            role="tab">{{ \Illuminate\Support\Str::limit($dd->dokumenPelamar->nama, $limit = 30, '...') }}</button>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        @foreach ($data->dokumenPelamarLowongan as $dd)
                                            @if ($dd->id_dokumen == 1)
                                                <div class="tab-pane fade show active"
                                                    id="tab-pane-seleksi-{{ $dd->id_dokumen }}" role="tabpanel"
                                                    aria-labelledby="home-tab" tabindex="0">
                                                    <embed
                                                        src="{{ asset('storage/' . $dd->dokumenPelamar->dokumen) }}"
                                                        type="application/pdf" width="100%" height="800px" />
                                                </div>
                                            @else
                                                <div class="tab-pane fade"
                                                    id="tab-pane-seleksi-{{ $dd->id_dokumen }}" role="tabpanel"
                                                    aria-labelledby="home-tab" tabindex="0">
                                                    <embed
                                                        src="{{ asset('storage/' . $dd->dokumenPelamar->dokumen) }}"
                                                        type="application/pdf" width="100%" height="800px" />
                                                </div>
                                            @endif
                                        @endforeach
                     
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    </div> --}}
    <div class="container mt-4 rounded border border-1" id="kandidat_container">
        <div class="row justify-content-center" id="kandidat">
            @if (count($seleksi_berkas) > 0)
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
                        @for ($i = 0; $i < count($seleksi_berkas); $i++)
                            <tr class="text-center">
                                <th scope="row">{{ $i + 1 }}</th>
                                <td>{{ $seleksi_berkas[$i]['pelamar']['nama_pelamar'] }} {!! nl2br('<br>') !!}
                                    {{ $seleksi_berkas[$i]['pelamar']['alamat'] }}</td>
                                <td>{{ $seleksi_berkas[$i]['pelamar']['email'] }}</td>
                                <td>{{ $seleksi_berkas[$i]['pelamar']['jenis_kelamin'] }}</td>
                                <td>{{ $seleksi_berkas[$i]['pelamar']['telepon_rumah'] }}</td>
                                @if ($seleksi_berkas[$i]['pelamar']['pengalaman_kerja'] != null)
                                    @for ($j = 0; $j < count($seleksi_berkas[$i]['pelamar']['pengalaman_kerja']); $j++)
                                        <td>{{ $seleksi_berkas[$i]['pelamar']['pengalaman_kerja'][$j]['posisi'] }}</td>
                                    @endfor
                                @else
                                    <td>-</td>
                                @endif
                                <td>
                                    <a href="/admin-dashboard/lowongan/detail-pelamar/{{ $seleksi_berkas[$i]['pelamar']['user']['slug'] }}"
                                        class="btn fw-semibold"
                                        style="background-color: #90c291; outline-color: #90c291"><i
                                            class="bi bi-info-circle"></i> Detail </a>
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
            {{-- <table class="table table-hover">
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
                    @foreach ($datas as $key => $data)
                        <tr class="text-center">
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $data->pelamar->nama_pelamar }}</td>
                            <td>{{ $data->pelamar->email == null ? '-' : $data->pelamar->email }}</td>
                            <td>{{ $data->pelamar->jenis_kelamin == null ? '-' : $data->pelamar->jenis_kelamin }}
                            </td>
                            <td>{{ $data->pelamar->telepon_rumah == null ? '-' : $data->pelamar->telepon_rumah }}
                            </td>
                            @if (in_array($data->pelamar->id, $arrPengalamanId))
                                @foreach ($data->pelamar->pengalamanKerja as $dtpk)
                                    <td>{{ $dtpk->posisi }}
                                    </td>
                                @endforeach
                            @else
                                <td>-</td>
                            @endif
                            <td><a href="/admin-dashboard/lowongan/detail-pelamar/{{ $data->pelamar->user->slug }}"
                                    class="btn fw-semibold" style="background-color: #90c291; outline-color: #90c291"><i
                                        class="bi bi-info-circle-fill"></i>
                                    Lihat Detail </a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table> --}}
            {{-- @foreach ($datas as $data)
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
            @endforeach --}}
        </div>

    </div>
</div>
