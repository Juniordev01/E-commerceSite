<style>
    .user_profile_image {
        border-radius: 20%;
        border: 12px gray;
        width: 40px;
        height: 40px;
    }
    .default
    {
        border-radius: 20%;
        border: 12px gray;
    }
</style>
<nav class="navbar navbar-expand-lg main-navbar sticky">
    <div class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
                        collapse-btn">
                    <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                    <i data-feather="maximize"></i>
                </a></li>
            {{-- <li>
                <form class="form-inline mr-auto">
                    <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                            data-width="200">
                        <button class="btn" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </li> --}}
        </ul>
    </div>
    <ul class="navbar-nav navbar-right">
        {{-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
                <span class="badge headerBadge1">
                    6 </span> </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                <div class="dropdown-header">
                    Messages
                    <div class="float-right">
                        <a href="#">Mark All As Read</a>
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-message">
                    <a href="#" class="dropdown-item"> <span
                            class="dropdown-item-avatar
                                text-white"> <img alt="image"
                                src="{{ asset('/Admin/img/users/user-1.png') }}" class="rounded-circle">
                        </span> <span class="dropdown-item-desc"> <span class="message-user">John
                                Deo</span>
                            <span class="time messege-text">Please check your mail !!</span>
                            <span class="time">2 Min Ago</span>
                        </span>
                    </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                            <img alt="image" src="{{ asset('/Admin/img/users/user-2.png') }}"
                                class="rounded-circle')}}">
                        </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                                Smith</span> <span class="time messege-text">Request for leave
                                application</span>
                            <span class="time">5 Min Ago</span>
                        </span>
                    </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                            <img alt="image" src="{{ asset('/Admin/img/users/user-5.png') }}"
                                class="rounded-circle')}}">
                        </span> <span class="dropdown-item-desc"> <span class="message-user">Jacob
                                Ryan</span> <span class="time messege-text">Your payment invoice is
                                generated.</span> <span class="time">12 Min Ago</span>
                        </span>
                    </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                            <img alt="image" src="{{ asset('/Admin/img/users/user-4.png') }}"
                                class="rounded-circle')}}">
                        </span> <span class="dropdown-item-desc"> <span class="message-user">Lina
                                Smith</span> <span class="time messege-text">hii John, I have upload
                                doc
                                related to task.</span> <span class="time">30
                                Min Ago</span>
                        </span>
                    </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                            <img alt="image" src="{{ asset('/Admin/img/users/user-3.png') }}"
                                class="rounded-circle')}}">
                        </span> <span class="dropdown-item-desc"> <span class="message-user">Jalpa
                                Joshi</span> <span class="time messege-text">Please do as specify.
                                Let me
                                know if you have any query.</span> <span class="time">1
                                Days Ago</span>
                        </span>
                    </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                            <img alt="image" src="{{ asset('/Admin/img/users/user-2.png') }}  "
                                class="rounded-circle')}}s">
                        </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                                Smith</span> <span class="time messege-text">Client Requirements</span>
                            <span class="time">2 Days Ago</span>
                        </span>
                    </a>
                </div>
                <div class="dropdown-footer text-center">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li> --}}
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                class="nav-link nav-link-lg message-toggle"><i data-feather="bell" class="bell"></i>
                <span class="badge headerBadge1">
                    
                    {{ auth()->user()->unReadnotifications->count() }} </span> </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                <div class="dropdown-header">
                    Messages
                    <div class="float-right">
                        <a href="#">Mark All As Read</a>
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-icons">
                    @foreach (auth()->user()->unReadnotifications as $notifation)
                        <a href="{{url('mark_as_read',$notifation->id)}}" class="dropdown-item dropdown-item-unread"> <span
                                class="dropdown-item-icon bg-primary text-white"> <i
                                    class="fas
                                fa-code"></i>
                            </span>
                            <span class="dropdown-item-desc"> {{ $notifation->data['name'] }}
                                <span class="time">{{ $notifation['created_at'] }}</span>
                            </span>
                            </span>
                        </a>
                    @endforeach
                </div>
                <div class="dropdown-footer text-center">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li>
        {{-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                class="nav-link notification-toggle nav-link-lg"><i data-feather="bell" class="bell"></i>
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                <div class="dropdown-header">
                    Notifications
                    <div class="float-right">
                        <a href="#">Mark All As Read</a>
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-icons">
                    @foreach (auth()->user()->notifications as $notifation)
                        <a href="#" class="dropdown-item dropdown-item-unread"> <span
                                class="dropdown-item-icon bg-primary text-white"> <i
                                    class="fas
                                fa-code"></i>
                            </span> <span class="dropdown-item-desc"> {{ $notifation->data['name'] }}<span
                                    class="time">{{ $notifation['created_at'] }}</span>
                            </span>
                        </a>
                    @endforeach
                </div>
                <div class="dropdown-footer text-center">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li> --}}
        {{-- @isset($profile) --}}
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                {{-- {{$profile}} --}}
                @isset($profile->Image)
                @if ($profile->Image)
                    <img alt="image" src="{{ 'public/uploads/profile/' .$profile->Image }}"
                        class="user_profile_image">
                        @endisset
                @else
                    <img src="{{ asset('Admin/profile/user.png') }}" class="border default" />
                @endif

                {{-- <img alt="image" src="{{ asset('Admin/profile/user.png') }}" class="user_profile_image border">   --}}
                <span class="d-sm-none d-lg-inline-block"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
                {{-- <div class="dropdown-title">M.Talha</div> --}}
                <div class="dropdown-title">
                    @if ($profile)
                        {{ $profile->Full_name }}
                    @else
                        Muaaz Ali
                    @endif
                </div>

                {{-- <div class="dropdown-title">{{$profile->Full_name}}</div> --}}
                <a href="{{ url('user_profile') }}" class="dropdown-item has-icon"> <i
                        class="far
                        fa-user"></i> Profile
                </a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                    Activities
                </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                    Settings
                </a>
                <div class="dropdown-divider"></div>
                {{-- <a href="auth-login.html" class="dropdown-item has-icon text-danger"> <i
                    class="fas fa-sign-out-alt"></i>
                Logout
            </a> --}}
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>

        </li>
        {{-- @endisset --}}
    </ul>
</nav>
