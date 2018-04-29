Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{ asset('images/user.png') }}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->username }}</div>
            <div class="email">Hak Akses : {{ Auth::user()->hak_akses }}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a onclick="keluar()"><i class="material-icons">input</i>Keluar</a></li>
                </ul>
                <form id="form-keluar" action="{{ route('logout') }}" method="post">
                    @csrf
                </form>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li @if(strpos(url()->current(), route('home')) !== false) class="active" @endif>
                <a href="{{ route('home') }}">
                    <i class="material-icons">home</i>
                    <span>Dasbor</span>
                </a>
            </li>
            @if(Auth::user()->hak_akses == 'Purchasing')
            <li @if(strpos(url()->current(), route('user')) !== false) class="active" @endif>
                <a href="{{ route('user') }}">
                    <i class="material-icons">accessibility</i>
                    <span>User</span>
                </a>
            </li>
            <li @if(strpos(url()->current(), route('supplier')) !== false) class="active" @endif>
                <a href="{{ route('supplier') }}">
                    <i class="material-icons">group</i>
                    <span>Supplier</span>
                </a>
            </li>
            @endif
            @if(Auth::user()->hak_akses == 'Purchasing')
            <li @if(strpos(url()->current(), route('material')) !== false) class="active" @endif>
                <a href="{{ route('material') }}">
                    <i class="material-icons">extension</i>
                    <span>Material</span>
                </a>
            </li>
            <li @if(strpos(url()->current(), route('p_material')) !== false) class="active" @endif>
                <a href="{{ route('p_material') }}">
                    <i class="material-icons">markunread_mailbox</i>
                    <span>Penerimaan Material</span>
                </a>
            </li>
            @endif
            @if(Auth::user()->hak_akses == 'Accounting')
            <li @if(strpos(url()->current(), route('perkiraan')) !== false) class="active" @endif>
                <a href="{{ route('perkiraan') }}">
                    <i class="material-icons">flight_land</i>
                    <span>Perkiraan</span>
                </a>
            </li>
            @endif
            {{-- <li @if(strpos(url()->current(), route('jurnal')) !== false) class="active" @endif>
                <a href="{{ route('jurnal') }}">
                    <i class="material-icons">gavel</i>
                    <span>Jurnal</span>
                </a>
            </li> --}}
            @if(Auth::user()->hak_akses == 'Purchasing')
            <li @if(strpos(url()->current(), route('po')) !== false) class="active" @endif>
                <a href="{{ route('po') }}">
                    <i class="material-icons">receipt</i>
                    <span>Purchase Order</span>
                </a>
            </li>
            @endif
            <li @if(strpos(url()->current(), route('pembayaran')) !== false) class="active" @endif>
                <a href="{{ route('pembayaran') }}">
                    <i class="material-icons">money</i>
                    <span>Pembayaran</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; {{ date('Y') }} <a href="javascript:void(0);">{{ config('app.name') }}</a>.
        </div>
        <div class="version">
            <b>Version: </b> 1.0.4
        </div>
    </div>
    <!-- #Footer -->
</aside>
<!-- #END# Left Sidebar