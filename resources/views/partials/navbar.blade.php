<nav class="navbar navbar-expand-lg bg-custom">
    <img src="{{ asset('img/satunama-logo.png') }}" alt="logo" width="70" height="70">
    <div class="container ">
        <a class="navbar-brand" href="/main">Rekrutmen</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="/main">Lowongan Kerja</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mx-5">
                @auth
                    <div class="dropdown-center" >
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item mb-2" href="/profil"><i class="bi bi-person-circle"></i></i>
                                        Profil</a></li>
                                <li><a class="dropdown-item mb-2" href="/lamaran_saya"><i class="bi bi-file-text-fill"></i>
                                        Lamaran Saya</a></li>
                                <li><a class="dropdown-item mb-2" href="/pengaturan"><i class="bi bi-gear-fill"></i></i>
                                        Pengaturan Akun</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="/logout" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                                            Keluar</button>
                                    </form>

                                </li>
                            </ul>
                        </li>
                    </div>
                    
                @else
                    <li class="nav-item">
                        <a href="/login" class="nav-link">
                            <i class="bi bi-box-arrow-in-right"></i>
                            Login
                        </a>
                    </li>
                @endauth
            </ul>

        </div>
    </div>
</nav>
