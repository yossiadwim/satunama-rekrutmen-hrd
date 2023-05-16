<div class="tab-pane fade show active" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab" tabindex="0">
    <div class="container">
        <div class="row mt-4">
            <div class="col-3 border-1 border-end border-secondary">
                <div class="col-12 ">
                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        @foreach ($datas as $data)
                            @foreach ($data->statusLamaran as $data_status)
                                @if ($data_status->status->nama_status == 'review')
                                    @if ($data->pelamar->id == 1)
                                        <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                                            data-bs-target="#tab-candidate-review-{{ $data_status->status->slug }}-{{ $data->pelamar->id }}"
                                            type="button" role="tab" aria-controls="v-pills-home"
                                            aria-selected="true">
                                            <div class="row shadow-sm border px-2 py-2">
                                                <div class="col-3 ">
                                                    <img class="rounded-circle" height="70px" width="70px"
                                                        style="border-radius: 50%; object-fit: cover;"
                                                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                                                </div>
                                                {{-- <div class="col-9 ">
                                                    <p>{{ $data->pelamar->nama_pelamar }}</p>
                                                    <p><span class="badge rounded-pill text-bg-info">{{ $data_status->status->nama_status }}</span></p>
                                                    <p>{{ $data->pelamar->alamat }}</p>
                                                </div> --}}
                                            </div>
                                        </button>
                                    @else
                                        <button class="nav-link" id="v-pills-home-tab" data-bs-toggle="pill"
                                            data-bs-target="#tab-candidate-review-{{ $data_status->status->slug }}-{{ $data->pelamar->id }}"
                                            type="button" role="tab" aria-controls="v-pills-home">
                                            <div class="row shadow-sm border px-2 py-2">
                                                <div class="col-3 ">
                                                    <img class="rounded-circle" height="70px" width="70px"
                                                        style="border-radius: 50%; object-fit: cover;"
                                                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                                                </div>
                                                <div class="col-9">
                                                    <p>{{ $data->pelamar->nama_pelamar }}</p>
                                                    {{-- <p><span class="badge rounded-pill text-bg-info">{{ Str::title($data_status->status->nama_status) }}</span></p> --}}
                                                    <p>{{ $data->pelamar->alamat }}</p>
                                                </div>
                                            </div>
                                        </button>
                                    @endif
                                @else
                                    <div>
                                        <h3>Tidak Ada Pelamar Pada Tahap Ini</h3>
                                    </div>
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
                                id="tab-candidate-review-{{ $data_status->status->slug }}-{{ $data->pelamar->id }}"
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
                                                        </h4>
                                                    </div>
                                                @endif

                                            </div>

                                            <div class="row mt-2">
                                                @if ($data->pelamar->telepon_rumah == null)
                                                    <div class="col-md-6">
                                                        <label class="labels fw-bold">Nomor
                                                            Telepon</label>
                                                        <p>{{ '-' }}</p>
                                                    </div>
                                                @else
                                                    <div class="col-md-6">
                                                        <label class="labels fw-bold">Nomor
                                                            Telepon</label>
                                                        <p>{{ $data->pelamar->telepon_rumah }}</p>
                                                    </div>
                                                @endif
                                                <div class="col-md-6">
                                                    <label class="labels fw-bold">Email</label>
                                                    <p>{{ $data->pelamar->email }}</p>
                                                </div>
                                            </div>
                                            <div class="row mt-2">

                                                @if ($data->pelamar->alamat == null && $data->pelamar->tanggal_lahir == null && $data->pelamar->jenis_kelamin == null)
                                                    <div class="col-md-6">
                                                        <label class="labels fw-bold">Alamat</label>
                                                        <p>{{ '-' }}</p>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="labels fw-bold">Tanggal
                                                            Lahir, Jenis Kelamin</label>
                                                        <p>{{ '-' }}</p>
                                                    </div>
                                                @else
                                                    <div class="col-md-6">
                                                        <label class="labels fw-bold">Alamat</label>
                                                        <p>{{ $data->pelamar->alamat }}</p>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="labels fw-bold">Tanggal
                                                            Lahir, Jenis Kelamin</label>
                                                        <p>{{ \Carbon\Carbon::parse($data->pelamar->tanggal_lahir)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('j F Y ') }}
                                                            ,
                                                            {{ $data->pelamar->jenis_kelamin }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="row mt-2">
                                                @if ($data->pelamar->kebangsaan == null)
                                                    <div class="col-md-6">
                                                        <label class="labels fw-bold">Kebangsaan</label>
                                                        <p>{{ '-' }}</p>
                                                    </div>
                                                @else
                                                    <div class="col-md-6">
                                                        <label class="labels fw-bold">Kebangsaan</label>
                                                        <p>{{ $data->pelamar->kebangsaan }}</p>
                                                    </div>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <h5>Melamar pada:
                                    {{ \Carbon\Carbon::parse($data->tanggal_melamar)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, j F Y ') }}
                                </h5>

                                <div class="mt-3 mb-5">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab"
                                                data-bs-target="#detail-pelamar-review-{{ $data_status->id_status_lamaran }}"
                                                type="button" role="tab" aria-controls="nav-profile"
                                                aria-selected="false">Detail
                                                Pelamar</button>

                                            <button class="nav-link " id="nav-home-tab" data-bs-toggle="tab"
                                                data-bs-target="#status-lamaran-review-{{ $data_status->id_status_lamaran }}"
                                                type="button" role="tab" aria-controls="nav-home"
                                                aria-selected="true">Status Lamaran</button>

                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show "
                                            id="status-lamaran-review-{{ $data_status->id_status_lamaran }}"
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
                                                                                    data-bs-target="#id-review-{{ $stat->id }}"
                                                                                    value="{{ $stat->id }}"
                                                                                    id="button_status-{{ $stat->id }}">
                                                                                    {{ Str::title($stat->nama_status) }}
                                                                                </button>
                                                                            @endif



                                                                        </li>
                                                                    @endforeach

                                                                </ul>
                                                                @foreach ($status as $stat)
                                                                    <div class="modal fade"
                                                                        id="id-review-{{ $stat->id }}"
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
                                                                                        {{-- <input type="text"
                                                                                            name="id_status"
                                                                                            value="{{ $data_status->status->id }}"
                                                                                            hidden> --}}

                                                                                        <button class="btn btn-primary"
                                                                                            type="submit"
                                                                                            name="id_status"
                                                                                            id="id_status_review_page-{{ $stat->id }}"
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
                                                    <div class="card mt-4" style="width: 18rem;">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Riwayat Aktivitas</h5>
                                                            <p class="card-text mb-2 text-body-secondary">Menampilkan
                                                                {{ count($data->activityLog) }} aktivitas</p>
                                                            <hr>

                                                            @foreach ($data->activityLog as $data_activity)
                                                                {{-- {{ $data_activity }} --}}
                                                                <p>- <strong>{!! $data_status->karyawan->nama_karyawan !!}</strong>
                                                                    memproses
                                                                    pelamar ini ke tahap
                                                                    {{-- <strong>{!! Str::title($data_status->status->nama_status) !!}</strong> --}}
                                                                    <strong>{{ Str::title($data_activity->status[0]->nama_status) }}</strong>
                                                                    Pada
                                                                    {{ \Carbon\Carbon::parse($data_activity->created_at)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, j F Y ') }}
                                                                </p>
                                                            @endforeach

                                                            {{-- @foreach ($data->statusLamaran as $data_status)
                                                                @foreach ($data_status->activityLog as $data_activity)
                                                                    <p>- <strong>{!! $data_activity->karyawan->nama_karyawan !!}</strong>
                                                                        memproses
                                                                        pelamar ini ke tahap
                                                                        <strong>{!! Str::title($data_activity->status->nama_status) !!}</strong>
                                                                    </p>
                                                                @endforeach
                                                            @endforeach --}}

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>



                                        </div>
                                        <div class="tab-pane fade show active"
                                            id="detail-pelamar-review-{{ $data_status->id_status_lamaran }}"
                                            role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">

                                            <div class="accordion mt-4" id="accordionPanelsStayOpenExample">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button fw-bold" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#jadwaltes"
                                                            aria-expanded="true"
                                                            aria-controls="panelsStayOpen-collapseOne">
                                                            JADWAL TES
                                                        </button>

                                                    </h2>
                                                    <div id="jadwaltes" class="accordion-collapse collapse show">
                                                        @if ($data->tesTertulis == null)
                                                            <div class="accordion-body">
                                                                <button type="button" class="btn btn-primary mt-3"
                                                                    data-bs-toggle="modal" data-bs-target="#addTest">
                                                                    Tambah Jadwal Tes
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="addTest" tabindex="-1"
                                                                    aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h1 class="modal-title fs-5"
                                                                                    id="exampleModalLabel">
                                                                                    Jadwal
                                                                                    Tes Tertulis</h1>
                                                                                <button type="button"
                                                                                    class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                            </div>
                                                                            <form
                                                                                action="/admin-dashboard/lowongan/addScheduleTest"
                                                                                method="POST"
                                                                                id="formAddScheduleTest">
                                                                                @csrf
                                                                                <div class="modal-body">
                                                                                    <div class="col-9">
                                                                                        <label for="nama_pelamar"
                                                                                            class="form-label">Nama
                                                                                            Pelamar</label>
                                                                                        <select
                                                                                            class="form-select mb-3"
                                                                                            aria-label="Default select example"
                                                                                            id="nama_pelamar"
                                                                                            name="nama_pelamar">
                                                                                            <option selected disabled>
                                                                                                Pilih
                                                                                                Nama
                                                                                                Pelamar</option>
                                                                                            @foreach ($datas as $data)
                                                                                                <option
                                                                                                    value="{{ old($data->pelamar->nama_pelamar) }}">
                                                                                                    {{ $data->pelamar->nama_pelamar }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-9">
                                                                                        <div class="mb-3">
                                                                                            <label for="tanggal_tes"
                                                                                                class="form-label">Tanggal
                                                                                                Tes</label>
                                                                                            <input type="date"
                                                                                                class="form-control"
                                                                                                id="tanggal_tes"
                                                                                                placeholder="Tanggal Tes"
                                                                                                name="tanggal_tes"
                                                                                                value="{{ old('tanggal_tes') }}">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-9">
                                                                                        <div class="mb-3">
                                                                                            <label for="waktu_mulai"
                                                                                                class="form-label">Waktu
                                                                                                Mulai</label>
                                                                                            <input type="time"
                                                                                                class="form-control"
                                                                                                id="waktu_mulai"
                                                                                                placeholder="Waktu Mulai"
                                                                                                name="waktu_mulai"
                                                                                                value="{{ old('waktu_mulai') }}">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-9">
                                                                                        <div class="mb-3">
                                                                                            <label for="waktu_selesai"
                                                                                                class="form-label">Waktu
                                                                                                Selesai</label>
                                                                                            <input type="time"
                                                                                                class="form-control"
                                                                                                id="waktu_selesai"
                                                                                                placeholder="Waktu Selesai"
                                                                                                name="waktu_selesai"
                                                                                                value="{{ old('waktu_selesai') }}">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-9" hidden>
                                                                                        <div class="mb-3">
                                                                                            <label
                                                                                                for="id_pelamar_lowongan"
                                                                                                class="form-label">id_pelamar_lowongan</label>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                id="id_pelamar_lowongan"
                                                                                                placeholder="id pelamar lowongan"
                                                                                                name="id_pelamar_lowongan">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-bs-dismiss="modal"
                                                                                        onclick="hapusData()">Close</button>
                                                                                    <button type="submit"
                                                                                        class="btn btn-primary">Save
                                                                                        changes</button>
                                                                                </div>

                                                                            </form>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="mt-3">
                                                                <table class="table table-borderless table-responsive">
                                                                    <thead class="">
                                                                        <tr>
                                                                            <th scope="col" class="text-center">
                                                                                Nama
                                                                            </th>
                                                                            <th scope="col" class="text-center">
                                                                                Tanggal
                                                                                Tes
                                                                            </th>
                                                                            <th scope="col" class="text-center">
                                                                                Waktu
                                                                            </th>
                                                                            <th scope="col" class="text-center">Tim
                                                                                Seleksi
                                                                            </th>
                                                                            <th scope="col">Tindakan</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($datas as $data)
                                                                            <tr>
                                                                                <td class="text-center">
                                                                                    {{ $data->tesTertulis->nama_pelamar }}
                                                                                </td>
                                                                                <td class="text-center">
                                                                                    {{ \Carbon\Carbon::parse($data->tesTertulis->tanggal_tes)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('j F Y') }}
                                                                                </td>
                                                                                <td class="text-center">
                                                                                    {{ $data->tesTertulis->waktu_mulai }}
                                                                                    -
                                                                                    {{ $data->tesTertulis->waktu_selesai }}
                                                                                </td>
                                                                                <td></td>
                                                                                <td>

                                                                                    <!-- Button trigger modal -->
                                                                                    <button type="button"
                                                                                        class="btn btn-primary"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#edit-schedule-{{ $data->tesTertulis->id_tes_tertulis }}">
                                                                                        <i
                                                                                            class="bi bi-pencil-fill"></i>
                                                                                        Edit
                                                                                    </button>

                                                                                    <!-- Modal -->
                                                                                    <div class="modal fade"
                                                                                        id="edit-schedule-{{ $data->tesTertulis->id_tes_tertulis }}"
                                                                                        tabindex="-1"
                                                                                        aria-labelledby="exampleModalLabel"
                                                                                        aria-hidden="true">
                                                                                        <div class="modal-dialog">
                                                                                            <div class="modal-content">
                                                                                                <div
                                                                                                    class="modal-header">
                                                                                                    <h1 class="modal-title fs-5"
                                                                                                        id="exampleModalLabel">
                                                                                                        Jadwal
                                                                                                        Tes
                                                                                                        Tertulis
                                                                                                    </h1>
                                                                                                    <button
                                                                                                        type="button"
                                                                                                        class="btn-close"
                                                                                                        data-bs-dismiss="modal"
                                                                                                        aria-label="Close"></button>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="modal-body">
                                                                                                    <form
                                                                                                        action="/admin-dashboard/tesTertulis/edit-schedule/{{ $data->tesTertulis->id_tes_tertulis }}"
                                                                                                        method="POST"
                                                                                                        id="formEditScheduleTest">
                                                                                                        @method('PUT')
                                                                                                        @csrf
                                                                                                        <div
                                                                                                            class="modal-body">
                                                                                                            <div
                                                                                                                class="col-9">
                                                                                                                <label
                                                                                                                    for="nama_pelamar"
                                                                                                                    class="form-label">Nama
                                                                                                                    Pelamar</label>
                                                                                                                <select
                                                                                                                    class="form-select mb-3"
                                                                                                                    aria-label="Default select example"
                                                                                                                    id="nama_pelamar"
                                                                                                                    name="nama_pelamar">
                                                                                                                    <option
                                                                                                                        selected
                                                                                                                        disabled>
                                                                                                                        Pilih
                                                                                                                        Nama
                                                                                                                        Pelamar
                                                                                                                    </option>
                                                                                                                    @foreach ($datas as $data)
                                                                                                                        <option
                                                                                                                            value="{{ old('nama_pelamar', $data->pelamar->nama_pelamar) }}">
                                                                                                                            {{ $data->pelamar->nama_pelamar }}
                                                                                                                        </option>
                                                                                                                    @endforeach
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="col-9">
                                                                                                                <div
                                                                                                                    class="mb-3">
                                                                                                                    <label
                                                                                                                        for="tanggal_tes"
                                                                                                                        class="form-label">Tanggal
                                                                                                                        Tes</label>
                                                                                                                    <input
                                                                                                                        type="date"
                                                                                                                        class="form-control"
                                                                                                                        id="tanggal_tes"
                                                                                                                        placeholder="Tanggal Tes"
                                                                                                                        name="tanggal_tes"
                                                                                                                        value="{{ $data->tesTertulis->tanggal_tes }}">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="col-9">
                                                                                                                <div
                                                                                                                    class="mb-3">
                                                                                                                    <label
                                                                                                                        for="waktu_mulai"
                                                                                                                        class="form-label">Waktu
                                                                                                                        Mulai</label>
                                                                                                                    <input
                                                                                                                        type="time"
                                                                                                                        class="form-control"
                                                                                                                        id="waktu_mulai"
                                                                                                                        placeholder="Waktu Mulai"
                                                                                                                        name="waktu_mulai"
                                                                                                                        value="{{ $data->tesTertulis->waktu_mulai }}">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="col-9">
                                                                                                                <div
                                                                                                                    class="mb-3">
                                                                                                                    <label
                                                                                                                        for="waktu_selesai"
                                                                                                                        class="form-label">Waktu
                                                                                                                        Selesai</label>
                                                                                                                    <input
                                                                                                                        type="time"
                                                                                                                        class="form-control"
                                                                                                                        id="waktu_selesai"
                                                                                                                        placeholder="Waktu Selesai"
                                                                                                                        name="waktu_selesai"
                                                                                                                        value="{{ $data->tesTertulis->waktu_selesai }}">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-9"
                                                                                                                hidden>
                                                                                                                <div
                                                                                                                    class="mb-3">
                                                                                                                    <label
                                                                                                                        for="id_pelamar_lowongan"
                                                                                                                        class="form-label">id_pelamar_lowongan</label>
                                                                                                                    <input
                                                                                                                        type="text"
                                                                                                                        class="form-control"
                                                                                                                        id="id_pelamar_lowongan"
                                                                                                                        placeholder="id pelamar lowongan"
                                                                                                                        name="id_pelamar_lowongan"
                                                                                                                        value="{{ $data->tesTertulis->id_pelamar_lowongan }}">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="modal-footer">
                                                                                                            <button
                                                                                                                type="button"
                                                                                                                class="btn btn-secondary"
                                                                                                                data-bs-dismiss="modal"
                                                                                                                onclick="hapusData()">Keluar</button>
                                                                                                            <button
                                                                                                                type="submit"
                                                                                                                class="btn btn-primary">Simpan
                                                                                                            </button>
                                                                                                        </div>

                                                                                                    </form>
                                                                                                </div>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <a href=""
                                                                                        class="btn btn-danger border-0"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#"><i
                                                                                            class="bi bi-trash3-fill"></i>
                                                                                        Hapus</a>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>

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
                                                                                    data-bs-target="#tab-pane-{{ $dd->id_dokumen }}"
                                                                                    type="button" role="tab"
                                                                                    aria-selected="true">{{ \Illuminate\Support\Str::limit($dd->dokumenPelamar->nama, $limit = 30, '...') }}</button>
                                                                            </li>
                                                                        @else
                                                                            <li class="nav-item" role="presentation">
                                                                                <button class="nav-link "
                                                                                    id="resume-tab"
                                                                                    data-bs-toggle="tab"
                                                                                    data-bs-target="#tab-pane-{{ $dd->id_dokumen }}"
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
                                                                            id="tab-pane-{{ $dd->id_dokumen }}"
                                                                            role="tabpanel" aria-labelledby="home-tab"
                                                                            tabindex="0">
                                                                            <embed
                                                                                src="{{ asset('storage/' . $dd->dokumenPelamar->dokumen) }}"
                                                                                type="application/pdf" width="100%"
                                                                                height="800px" />
                                                                        </div>
                                                                    @else
                                                                        <div class="tab-pane fade"
                                                                            id="tab-pane-{{ $dd->id_dokumen }}"
                                                                            role="tabpanel" aria-labelledby="home-tab"
                                                                            tabindex="0">
                                                                            <embed
                                                                                src="{{ asset('storage/' . $dd->dokumenPelamar->dokumen) }}"
                                                                                type="application/pdf" width="100%"
                                                                                height="800px" />
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                                {{-- <div class="mb-5 mt-5">
                                                            <form method="POST"
                                                                action="/admin-dashboard/lowongan/{{ $lowongan->slug }}/changePosition">
                                                                @csrf
                                                                <input type="hidden" name="closed"
                                                                    value="true">
                                                                <button class="btn btn-primary"
                                                                    type="submit">Ubah
                                                                    posisi</button>
                                                            </form>
                                                        </div> --}}
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
                                id="tab-candidate-review-{{ $data->pelamar->id }}" role="tabpanel" tabindex="0">
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
                                                            data-bs-target="#tab-pane-{{ $dd->id_dokumen }}"
                                                            type="button" role="tab"
                                                            aria-selected="true">{{ \Illuminate\Support\Str::limit($dd->dokumenPelamar->nama, $limit = 30, '...') }}</button>
                                                    </li>
                                                @else
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link " id="resume-tab"
                                                            data-bs-toggle="tab"
                                                            data-bs-target="#tab-pane-{{ $dd->id_dokumen }}"
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
                                                    id="tab-pane-{{ $dd->id_dokumen }}" role="tabpanel"
                                                    aria-labelledby="home-tab" tabindex="0">
                                                    <embed
                                                        src="{{ asset('storage/' . $dd->dokumenPelamar->dokumen) }}"
                                                        type="application/pdf" width="100%" height="800px" />
                                                </div>
                                            @else
                                                <div class="tab-pane fade" id="tab-pane-{{ $dd->id_dokumen }}"
                                                    role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                                    <embed
                                                        src="{{ asset('storage/' . $dd->dokumenPelamar->dokumen) }}"
                                                        type="application/pdf" width="100%" height="800px" />
                                                </div>
                                            @endif
                                        @endforeach
                                        {{-- <div class="mb-5 mt-5">
                                    <form method="POST"
                                        action="/admin-dashboard/lowongan/{{ $lowongan->slug }}/changePosition">
                                        @csrf
                                        <input type="hidden" name="closed" value="true">
                                        <button class="btn btn-primary" type="submit">Ubah
                                            posisi</button>
                                    </form>
                                </div> --}}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>

</div>
