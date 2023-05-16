<div class="tab-pane fade" id="pills-tes" role="tabpanel" aria-labelledby="pills-tes-tab" tabindex="0">
    <div class="container border">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#addTest">
            Tambah Jadwal Tes
        </button>

        <!-- Modal -->
        <div class="modal fade" id="addTest" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Jadwal Tes Tertulis
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/admin-dashboard/lowongan/addScheduleTest" method="POST" id="formAddScheduleTest">
                        @csrf
                        <div class="modal-body">
                            <div class="col-9">
                                <label for="nama_pelamar" class="form-label">Nama Pelamar</label>
                                <select class="form-select mb-3" aria-label="Default select example" id="nama_pelamar"
                                    name="nama_pelamar">
                                    <option selected disabled>Pilih Nama Pelamar</option>
                                    @foreach ($datas as $data)
                                        <option value="{{ old($data->pelamar->nama_pelamar) }}">
                                            {{ $data->pelamar->nama_pelamar }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-9">
                                <div class="mb-3">
                                    <label for="tanggal_tes" class="form-label">Tanggal
                                        Tes</label>
                                    <input type="date" class="form-control" id="tanggal_tes"
                                        placeholder="Tanggal Tes" name="tanggal_tes" value="{{ old('tanggal_tes') }}">
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="mb-3">
                                    <label for="waktu_mulai" class="form-label">Waktu
                                        Mulai</label>
                                    <input type="time" class="form-control" id="waktu_mulai"
                                        placeholder="Waktu Mulai" name="waktu_mulai" value="{{ old('waktu_mulai') }}">
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="mb-3">
                                    <label for="waktu_selesai" class="form-label">Waktu
                                        Selesai</label>
                                    <input type="time" class="form-control" id="waktu_selesai"
                                        placeholder="Waktu Selesai" name="waktu_selesai"
                                        value="{{ old('waktu_selesai') }}">
                                </div>
                            </div>
                            <div class="col-9" hidden>
                                <div class="mb-3">
                                    <label for="id_pelamar_lowongan" class="form-label">id_pelamar_lowongan</label>
                                    <input type="text" class="form-control" id="id_pelamar_lowongan"
                                        placeholder="id pelamar lowongan" name="id_pelamar_lowongan">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                onclick="hapusData()">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <div class="mt-3">
            <table class="table table-borderless table-responsive">
                <thead class="">
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">Nama</th>
                        <th scope="col" class="text-center">Tanggal Tes</th>
                        <th scope="col" class="text-center">Waktu</th>
                        <th scope="col" class="text-center">Tim Seleksi</th>
                        <th scope="col">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        <tr>
                            <th scope="row" class="text-center">1</th>
                            <td class="text-center">{{ $data->tesTertulis->nama_pelamar }}</td>
                            <td class="text-center">
                                {{ \Carbon\Carbon::parse($data->tesTertulis->tanggal_tes)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('j F Y') }}
                            </td>
                            <td class="text-center">{{ $data->tesTertulis->waktu_mulai }} -
                                {{ $data->tesTertulis->waktu_selesai }}</td>
                            <td></td>
                            <td>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#edit-schedule-{{ $data->tesTertulis->id_tes_tertulis }}">
                                    <i class="bi bi-pencil-fill"></i>
                                    Edit
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="edit-schedule-{{ $data->tesTertulis->id_tes_tertulis }}"
                                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                    Jadwal Tes Tertulis</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form
                                                    action="/admin-dashboard/tesTertulis/edit-schedule/{{ $data->tesTertulis->id_tes_tertulis }}"
                                                    method="POST" id="formEditScheduleTest">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="col-9">
                                                            <label for="nama_pelamar" class="form-label">Nama
                                                                Pelamar</label>
                                                            <select class="form-select mb-3"
                                                                aria-label="Default select example" id="nama_pelamar"
                                                                name="nama_pelamar">
                                                                <option selected disabled>Pilih Nama
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
                                                        <div class="col-9">
                                                            <div class="mb-3">
                                                                <label for="tanggal_tes" class="form-label">Tanggal
                                                                    Tes</label>
                                                                <input type="date" class="form-control"
                                                                    id="tanggal_tes" placeholder="Tanggal Tes"
                                                                    name="tanggal_tes"
                                                                    value="{{ $data->tesTertulis->tanggal_tes }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-9">
                                                            <div class="mb-3">
                                                                <label for="waktu_mulai" class="form-label">Waktu
                                                                    Mulai</label>
                                                                <input type="time" class="form-control"
                                                                    id="waktu_mulai" placeholder="Waktu Mulai"
                                                                    name="waktu_mulai"
                                                                    value="{{ $data->tesTertulis->waktu_mulai }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-9">
                                                            <div class="mb-3">
                                                                <label for="waktu_selesai" class="form-label">Waktu
                                                                    Selesai</label>
                                                                <input type="time" class="form-control"
                                                                    id="waktu_selesai" placeholder="Waktu Selesai"
                                                                    name="waktu_selesai"
                                                                    value="{{ $data->tesTertulis->waktu_selesai }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-9" hidden>
                                                            <div class="mb-3">
                                                                <label for="id_pelamar_lowongan"
                                                                    class="form-label">id_pelamar_lowongan</label>
                                                                <input type="text" class="form-control"
                                                                    id="id_pelamar_lowongan"
                                                                    placeholder="id pelamar lowongan"
                                                                    name="id_pelamar_lowongan"
                                                                    value="{{ $data->tesTertulis->id_pelamar_lowongan }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal"
                                                            onclick="hapusData()">Keluar</button>
                                                        <button type="submit" class="btn btn-primary">Simpan
                                                        </button>
                                                    </div>

                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <a href="" class="btn btn-danger border-0" data-bs-toggle="modal"
                                    data-bs-target="#"><i class="bi bi-trash3-fill"></i>
                                    Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</div>
