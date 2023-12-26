<link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" />

<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>
            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item mobile-search-icon">
                        <a class="nav-link" href="#"> <i class='bx bx-search'></i>
                        </a>
                    </li>
                    <li class="nav-item ">
                        @can('Users Icon')
                            <a href="{{ route('UserRegister.create') }}" title="Create Player">
                                <div class="header-icon">
                                    <div class="icon">P<span class="icon-symbol">+</span></div>
                                </div>
                            </a>
                        @endcan
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        @can('Users Icon')
                            <a href="{{ route('deposit.create') }}">
                                <div class="header-icon">
                                    <div class="icon">D<span class="icon-symbol">+</span></div>
                                </div>
                            @endcan
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        @can('Users Icon')
                            <a href="{{ route('withdraw.create') }}">
                                <div class="header-icon">
                                    <div class="icon">W<span class="icon-symbol">+</span></div>
                                </div>
                            @endcan
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        <a href="{{ route('master.setting') }}"><i class="bx bx-cog f-22"></i></a>
                    </li>
                    @can('Pending Deposit')
                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link" href="{{ route('deposit.pending') }}" role="button" aria-expanded="false">
                                <div class="header-icon">
                                    <div class="icon">D<span class="icon-symbol"></span></div>
                                </div>
                                @php
                                    $count = App\Models\deposit::where('status', 'On Process')->count();
                                    $bankerPending = App\Models\deposit::where('banker_status', 'Pending')->count();
                                    $adminPending = App\Models\deposit::where('admin_status', 'Pending')->count();
                                @endphp
                                @if (Gate::check('CC DPending') && Gate::check('CC WPending'))
                                    @if ($count != 0)
                                        <span class="alert-count">
                                            {{ $count }}
                                        </span>
                                    @endif
                                @else
                                    @can('Deposit Banker Enable')
                                        @if ($bankerPending != 0)
                                            <span class="alert-count">
                                                {{ $bankerPending }}
                                            </span>
                                        @endif
                                    @endcan
                                    @can('Deposit Admin Enable')
                                        @if ($adminPending != 0)
                                            <span class="alert-count">
                                                {{ $adminPending }}
                                            </span>
                                        @endif
                                    @endcan
                                @endif
                            </a>
                        </li>
                    @endcan
                    @can('Pending Withdraw')
                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link" href="{{ route('withdraw.pending') }}" role="button" aria-expanded="false">
                                <div class="header-icon">
                                    <div class="icon">W<span class="icon-symbol"></span></div>
                                </div>
                                @php
                                    $count = App\Models\Withdraw::where('status', 'On Process')->count();
                                    $bankerPending = App\Models\Withdraw::where('banker_status', 'Pending')->count();
                                    $adminPending = App\Models\Withdraw::where('admin_status', 'Pending')->count();
                                @endphp


                                @if (Gate::check('CC DPending') && Gate::check('CC WPending'))
                                    @if ($count != 0)
                                        <span class="alert-count">
                                            {{ $count }}
                                        </span>
                                    @endif
                                @else
                                    @can('Withdraw Banker Enable')
                                        @if ($bankerPending != 0)
                                            <span class="alert-count">
                                                {{ $bankerPending }}
                                            </span>
                                        @endif
                                    @endcan
                                    @can('Withdraw Admin Enable')
                                        @if ($adminPending != 0)
                                            <span class="alert-count">
                                                {{ $adminPending }}
                                            </span>
                                        @endif
                                    @endcan
                                @endif

                                {{-- <span class="alert-count">
                                    @php
                                        $count = App\Models\Withdraw::where('banker_status', 'Pending')->count();
                                    @endphp
                                    {{ $count }}
                                </span> --}}
                            </a>
                        </li>
                    @endcan
                    @if (Gate::check('CC DPending') || Gate::check('CC WPending'))
                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="header-icon">
                                    <div class="icon">C<span class="icon-symbol"></span></div>
                                </div>
                                @php
                                    $dcount = App\Models\deposit::where('status', 'Completed')
                                        ->where('isInformed', 0)
                                        ->count();
                                    $wcount = App\Models\Withdraw::where('status', 'Completed')
                                        ->where('isInformed', 0)
                                        ->count();
                                    $count = $dcount + $wcount;
                                @endphp
                                @if (Gate::check('CC DPending') && Gate::check('CC WPending'))
                                    @if ($count != 0)
                                        <span class="alert-count-green">
                                            {{ $count }}
                                        </span>
                                    @endif
                                @else
                                    @can('CC DPending')
                                        @if ($dcount != 0)
                                            <span class="alert-count-green">
                                                {{ $dcount }}
                                            </span>
                                        @endif
                                    @endcan
                                    @can('CC WPending')
                                        @if ($wcount != 0)
                                            <span class="alert-count-green">
                                                {{ $wcount }}
                                            </span>
                                        @endif
                                    @endcan
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="row row-cols-3 g-3 p-3">
                                    @can('CC DPending')
                                        <div class="col text-center">
                                            <div class="app-box mx-auto">
                                                <a href="{{ route('deposit.pendingcc') }}" role="button"
                                                    aria-expanded="false">

                                                    <div class="header-icon">
                                                        <div class="icon">D<span class="icon-symbol"></span></div>
                                                    </div>

                                                    @php
                                                        $count = App\Models\Deposit::where('status', 'Completed')
                                                            ->where('isInformed', 0)
                                                            ->count();
                                                    @endphp
                                                    @if ($count != 0)
                                                        <span class="alert-count-green-deposit">
                                                            {{ $count }}
                                                        </span>
                                                    @endif

                                                </a>
                                            </div>
                                            <div class="app-title">Deposit</div>
                                        </div>
                                    @endcan
                                    @can('CC WPending')
                                        <div class="col text-center">
                                            <div class="app-box mx-auto">
                                                <a href="{{ route('withdraw.pendingcc') }}" role="button"
                                                    aria-expanded="false">

                                                    <div class="header-icon">
                                                        <div class="icon">W<span class="icon-symbol"></span></div>
                                                    </div>
                                                    
                                                        @php
                                                            $count = App\Models\Withdraw::where('status', 'Completed')
                                                                ->where('isInformed', 0)
                                                                ->count();
                                                        @endphp
                                                        @if ($count != 0)
                                                        <span class="alert-count-green-withdraw">
                                                            {{ $count }}
                                                        </span>
                                                    @endif
                                                </a>

                                            </div>
                                            <div class="app-title">Withdraw</div>
                                        </div>
                                    @endcan


                                </div>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>

            <div class="user-box dropdown">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="assets/images/avatars/images.jfif" class="user-img" alt="user avatar">
                    <div class="user-info ps-3">
                        <p class="user-name mb-0">{{ auth()->user()->name ?? '' }}
                            <br>
                            @auth
                                <span class="user-role">{{ auth()->user()->roles[0]->name }}</span>
                            @endauth
                        </p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ route('logout') }}"><i
                                class="bx bx-log-out-circle"></i><span>Logout</span></a>
                    </li>
                </ul>
            </div>

        </nav>
    </div>
</header>
