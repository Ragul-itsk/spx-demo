<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        {{-- <div>
            <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div> --}}
        <div>
            <h4 class="logo-text">SikanderPlayx</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        @can('Dashboard')
            <li>
                <a href="{{ route('dashboard') }}">
                    <div class="parent-icon">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
        @endcan

        @can('User')
            <li>
                <a href="#" class="has-arrow">
                    <div class="parent-icon"><i class="fa-regular fa-user"></i></div>
                    <div class="menu-title">Players</div>
                </a>
                <ul>
                    @can('All User')
                        <li>
                            <a href="{{ route('UserRegister.index') }}">
                                <i class="bx bx-right-arrow-alt"></i>All Player
                            </a>
                        </li>
                    @endcan
                    @can('Upload Player')
                    <li>
                        <a href="{{ route('player-files') }}">
                            <i class="bx bx-right-arrow-alt"></i>Upload Player
                        </a>
                    </li>
                @endcan 
                </ul>
            </li>
        @endcan
        @can('Payments')
            <li>
                <a href="#" class="has-arrow">
                    <div class="parent-icon"><i class="fa-regular fa-credit-card"></i></div>
                    <div class="menu-title">Payments</div>
                </a>
                <ul>
                    {{-- @can('All Payment')
                        <li>
                            <a href="{{ route('payment.index') }}">
                                <i class="bx bx-right-arrow-alt"></i>All Payments
                            </a>
                        </li>
                    @endcan --}}
                    @can('All Deposit')
                        <li>
                            <a href="{{ route('deposit.index') }}">
                                <i class="bx bx-right-arrow-alt"></i>All Deposit
                            </a>
                        </li>
                    @endcan
                    @can('All Withdraw')
                        <li>
                            <a href="{{ route('withdraw.index') }}">
                                <i class="bx bx-right-arrow-alt"></i>All Withdraw
                            </a>
                        </li>
                    @endcan

                </ul>
            </li>
        @endcan

        @can('Report')
            <li>
                <a href="#" class="has-arrow">
                    <div class="parent-icon"><i class="fa-regular fa-flag"></i></div>
                    <div class="menu-title">Reports</div>
                </a>
                <ul>
                    @can('User Report')
                        <li>
                            <a href="{{ route('deposit.report') }}">
                                <i class="bx bx-right-arrow-alt"></i>Deposit
                            </a>
                        </li>
                    @endcan
                    @can('Payment Report')
                        <li>
                            <a href="{{ route('withdraw.report') }}">
                                <i class="bx bx-right-arrow-alt"></i>Withdraw
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
