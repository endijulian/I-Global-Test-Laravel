<nav class="sidebar-nav">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="nav-icon icon-speedometer"></i> Dashboard
            </a>
        </li>

        <li class="nav-title">Master Data</li>

        @if (Auth::user()->level_id == 1)
            <li class="nav-item">
                <a class="nav-link" href="{{route('user.index')}}">
                    <i class="cil-user"></i> Data User
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('departement.index')}}">
                    <i class=" cil-building"></i> Data Departemen
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('proyek.index')}}">
                    <i class=" cil-industry"></i> Data Proyek
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{route('karyawan.index')}}">
                    <i class="cil-user-plus"></i> Data Karyawan
                </a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{route('departement.index')}}">
                    <i class=" cil-building"></i> Data Departemen
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('proyek.index')}}">
                    <i class=" cil-industry"></i> Data Proyek
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{route('karyawan.index')}}">
                    <i class="cil-user-plus"></i> Data Karyawan
                </a>
            </li>
        @endif
        
        

        {{--  <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="nav-icon icon-settings"></i> Pengaturan
            </a>
            <ul class="nav-dropdown-items">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="nav-icon icon-puzzle"></i> Produk
                    </a>
                </li>
            </ul>
        </li>  --}}
    </ul>
</nav>