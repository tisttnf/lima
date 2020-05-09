<!-- LEFT SIDEBAR -->
<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="{{ url('/') }}" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>                
                @if(Auth::user()->role == 'Project Owner')
                    @include('roles.po')
                @elseif(Auth::user()->role == 'Dosen')
                    @include('roles.dosen')
                @elseif(Auth::user()->role == 'Asisten Dosen')
                    @include('roles.asdos')
                @elseif(Auth::user()->role == 'Mahasiswa')
                    @include('roles.mahasiswa')
                @else
                    @include('roles.admin')
                @endif
            </ul>
        </nav>
    </div>
</div>
<!-- END LEFT SIDEBAR -->