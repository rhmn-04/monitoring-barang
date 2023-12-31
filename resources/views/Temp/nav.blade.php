<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

    <div class="container-fluid">

        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">

            <li class="nav-item dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                    <div class="avatar-sm">

                        <img src="{{ asset('storage/photos/'.Auth::user()->photo) }}" alt="..." class="avatar-img rounded-circle">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                        <li>
                            <div class="user-box">
                                <div class="avatar-lg"><img src="{{ asset('storage/photos/'.Auth::user()->photo) }}"alt="image profile" class="avatar-img rounded"></div>
                                <div class="u-text">
                                    <h4>{{Auth::user()->name}}</h4>
                                    <p class="text-muted">{{Auth::user()->email}}</p>
                                    <a href="{{ route('profile.index') }}" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                                </div>
                            </div>
                        </li>
                        <li>


                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{url('logout')}}" method="get">Logout</a>
                        </li>
                    </div>
                </ul>
            </li>
        </ul>
    </div>
</nav>
