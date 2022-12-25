<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('owner.order.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                        {{ __('Booking') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('owner.capsters.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-user-plus"></i>
                    <p>
                        {{ __('Table') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('owner.facilities.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-thumbtack"></i>
                    <p>
                        {{ __('Facility') }}
                    </p>
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('owner.cafe.edit') }}" class="nav-link">
                    <i class="nav-icon fas fa-cogs"></i>
                    <p>
                        {{ __('Cafe') }}
                    </p>
                </a>
            </li>

            {{-- <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-address-card"></i>
                    <p>
                        {{ __('About us') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle nav-icon"></i>
                    <p>
                        Two-level menu
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Child menu</p>
                        </a>
                    </li>
                </ul>
            </li> --}}
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
