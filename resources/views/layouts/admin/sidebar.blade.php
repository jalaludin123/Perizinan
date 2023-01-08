<div class="sidebar pe-4 pb-3">
    <nav class="navbar">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h5><i class="fa fa-user-edit me-2"></i>{{ $appSetting->name_website }}</h5>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('darkpan-1.0.0/') }}/img/user.jpg" alt=""
                    style="width: 40px; height: 40px;">
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                <span>
                    @if (Auth::user()->role == 1)
                        Kabid
                    @else
                        Admin
                    @endif
                </span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ url('admin/dashboard') }}" class="nav-item nav-link"><i
                    class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            @if (Auth::user()->role == 1)
                <a href="{{ url('admin/user') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Users</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                            class="fas fa-list-ul me-2"></i>Report</a>
                    <div class="dropdown-menu border-0 mx-3" style="background: rgb(17, 1, 190);">
                        <a href="{{ url('admin/terverifikasi') }}" class="nav-item nav-link"><i class="fas fa-circle"
                                style="background: none;font-size:10px"></i>Terverifikasi</a>
                        <a href="{{ url('admin/tidakTerverifikasi') }}" class="nav-item nav-link"><i
                                class="fas fa-circle" style="background: none;font-size:10px"></i>Belum
                            Terverifikasi</a>
                    </div>
                </div>
            @elseif (Auth::user()->role == 2)
                <a href="{{ url('admin/viewUser') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Users</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                            class="fas fa-clipboard-list me-2"></i>Master Data</a>
                    <div class="dropdown-menu border-0 mx-3" style="background: rgb(17, 1, 190);">
                        <a href="{{ url('admin/skala-usaha') }}" class="nav-item nav-link"><i class="fas fa-circle"
                                style="background: none;font-size:10px"></i>Skala
                            Usaha</a>
                        <a href="{{ url('admin/jenis-usaha') }}" class="nav-item nav-link"><i class="fas fa-circle"
                                style="background: none;font-size:10px"></i>Jenis
                            Usaha</a>
                        <a href="{{ url('admin/jenis-badan-usaha') }}" class="nav-item nav-link"><i
                                class="fas fa-circle" style="background: none;font-size:10px"></i>Jenis Pelaku Usaha</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                            class="far fa-file-alt me-2"></i>KBLI</a>
                    <div class="dropdown-menu border-0 mx-3" style="background: rgb(17, 1, 190);">
                        <a href="{{ url('admin/kbli1') }}" class="nav-item nav-link"><i class="fas fa-circle"
                                style="background: none;font-size:10px"></i>Golongan 1</a>
                        <a href="{{ url('admin/kbli2') }}" class="nav-item nav-link"><i class="fas fa-circle"
                                style="background: none;font-size:10px"></i>Golongan 2</a>
                        <a href="{{ url('admin/kbli3') }}" class="nav-item nav-link"><i class="fas fa-circle"
                                style="background: none;font-size:10px"></i>Golongan 3</a>
                        <a href="{{ url('admin/kbli4') }}" class="nav-item nav-link"><i class="fas fa-circle"
                                style="background: none;font-size:10px"></i>Golongan 4</a>
                        <a href="{{ url('admin/kbli5') }}" class="nav-item nav-link"><i class="fas fa-circle"
                                style="background: none;font-size:10px"></i>Golongan 5</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                            class="fas fa-list-ul me-2"></i>Report</a>
                    <div class="dropdown-menu border-0 mx-3" style="background: rgb(17, 1, 190);">
                        <a href="{{ url('admin/terverifikasi') }}" class="nav-item nav-link"><i class="fas fa-circle"
                                style="background: none;font-size:10px"></i>Terverifikasi</a>
                        <a href="{{ url('admin/tidakTerverifikasi') }}" class="nav-item nav-link"><i
                                class="fas fa-circle" style="background: none;font-size:10px"></i>Belum
                            Terverifikasi</a>
                    </div>
                </div>
                <a href="{{ url('admin/panduan') }}" class="nav-item nav-link"><i
                        class="fas fa-file-pdf me-2"></i>Informasi</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                            class="fas fa-list-ul me-2"></i>Settings</a>
                    <div class="dropdown-menu border-0 mx-3" style="background: rgb(17, 1, 190);">
                        <a href="{{ url('admin/slide') }}" class="nav-item nav-link"><i class="fas fa-circle"
                                style="background: none;font-size:10px"></i>Slide</a>
                        <a href="{{ url('admin/setting') }}" class="nav-item nav-link"><i class="fas fa-circle"
                                style="background: none;font-size:10px"></i>Setting</a>
                    </div>
                </div>
            @endif
        </div>
    </nav>
</div>
