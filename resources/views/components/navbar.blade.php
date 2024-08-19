        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Degastudio</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link {{request()->is('dashboard') ? 'active' : '' }}" aria-current="page" href="#!">Beranda</a></li>
                        @if (Auth::user()->hasRole('user'))
                        <li class="nav-item"><a class="nav-link {{request()->is('pesan') ? 'active' : '' }}" href="{{route('pesan')}}">Pesan</a></li>
                        @endif
                        @if (Auth::user()->hasRole('admin'))
                        <li class="nav-item"><a class="nav-link {{request()->is('paket') ? 'active' : '' }}" href="{{route('paket')}}">Daftar Paket</a></li>
                        <li class="nav-item"><a class="nav-link {{request()->is('pesanan') ? 'active' : '' }}" href="{{route('daftar.pesanan')}}">Daftar Pesanan</a></li>
                        @endif
                    </ul>
                    <ul class="navbar-nav mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @if (Auth::user()->hasRole('user'))
                                <li><a class="dropdown-item" href="{{route('pesan')}}">Pemesanan</a></li>
                                    <li><a class="dropdown-item" href="{{route('riwayat')}}">Riwayat Pesan</a></li>
                                @endif
                                @if (Auth::user()->hasRole('admin'))
                                    <li><a class="dropdown-item" href="{{route('paket')}}">Paket</a></li>
                                    <li><a class="dropdown-item" href="{{route('add-paket')}}">Tambah Paket</a></li>
                                    <li><hr class="dropdown-divider" /></li>
                                    <li><a class="dropdown-item" href="{{route('daftar.pesanan')}}">Daftar Pesanan</a></li>
                                @endif
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="{{route('profile.edit')}}">Pengaturan</a></li>
                                <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                            </ul>
                        </li>
                    </ul>

                    {{-- <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            {{ Auth::user()->name }}
                            <i class="bi-person-fill me-1"></i>
                            {{-- <span class="badge bg-dark text-white ms-1 rounded-pill">0</span> --}}
                        {{-- </button>
                    </form> --}}
                </div>
            </div>
        </nav>
