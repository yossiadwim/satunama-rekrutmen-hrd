<nav class="navbar navbar-expand-lg bg-custom border shadow-sm">
    <div class="container ">
        <a class="navbar-brand" href="/main"></a>
        {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> --}}
        <div class="collapse navbar-collapse" id="navbarNav">
            <img class="" src="{{ asset('img/satunama-logo.png') }}" alt="logo" width="70" height="70">

            @can('admin')
                <ul class="navbar-nav mx-5">
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="/admin-dashboard/lowongan">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="/admin-dashboard/">Kelola kandidat</a>
                    </li>
                </ul>
            @elsecan('user')
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="/lowongan-kerja">Lowongan Kerja</a>
                    </li>
                </ul>
            @endcan

            <ul class="navbar-nav ms-auto mx-5">
                @auth
                    <div class="dropdown-center">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fw-bold" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->username }}
                            </a>

                            @can('user')
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item mb-2" href="/profil-kandidat/users/{{ $user->slug }}"><i
                                                class="fa-solid fa-circle-user"></i>
                                            Profil</a></li>
                                    <li><a class="dropdown-item mb-2"
                                            href="/profil-kandidat/users/{{ $user->slug }}/lamaran-saya"><i
                                                class="fa-solid fa-file-lines"></i>
                                            Lamaran Saya</a></li>
                                    <li><a class="dropdown-item mb-2" href="/profil-kandidat/users/{{ $user->slug }}/pengaturan-akun"><i class="fa-solid fa-gear"></i>
                                            Pengaturan Akun</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form action="/logout" method="post">
                                            @csrf
                                            <input type="text" name="id_karyawan" id="id_karyawan" value="{{ $user->id_karyawan }}" hidden>
                                            <input type="text" name="id_pelamar" id="id_pelamar" value="{{ $user->id_pelamar }}" hidden>
                                            
                                            <button type="submit" class="dropdown-item"><i
                                                    class="fa-solid fa-right-from-bracket" style="color: #000000;"></i>
                                                Keluar</button>
                                        </form>

                                    </li>
                                </ul>
                            @elsecan('admin')
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <li><a class="dropdown-item mb-2" href="/pengaturan"><i class="fa-solid fa-gear" style="color: #000000;"></i>
                                            Pengaturan Akun</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form action="/logout" method="post">
                                            @csrf
                                            <input type="text" name="id_karyawan" id="id_karyawan" value="{{ $user == null? '' : $user->id_karyawan }}" hidden>
                                            <input type="text" name="id_pelamar" id="id_pelamar" value="{{  $user == null? '' : $user->pelamar }}" hidden>

                                            <button type="submit" class="dropdown-item"><i
                                                class="fa-solid fa-right-from-bracket" style="color: #000000;"></i>
                                                Keluar</button>
                                        </form>

                                    </li>
                                </ul>
                            @endcan

                        </li>
                    </div>
                @else
                    <li class="nav-item">
                        <a href="/login" class="nav-link">
                            <i class="fa-solid fa-right-to-bracket"></i>
                            Login
                        </a>
                    </li>
                @endauth
            </ul>

        </div>
    </div>
</nav>
