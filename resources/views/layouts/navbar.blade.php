<?php
$languages = [
    'en' => 'Eng',
    'fr' => 'Fr'
]
?>

<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
        <h1 style="font-size: 26px; padding: 16px; text-align: center;">{{config('app.name')}}</h1>
        <ul class="navbar-nav">
            <li class="nav-item dropdown nav-profile">
                <h5>{{ Auth::user()->user_name}}</h5><br>&nbsp;&nbsp;
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('assets/images/profile/mann.png')}}" alt="user">
                </a>
                <div class="dropdown-menu" aria-labelledby="profileDropdown">
                    <div class="dropdown-header d-flex flex-column align-items-center">
                        <div class="figure mb-3">
                            <img src="{{ asset('assets/images/profile/mann.png')}}" alt="">
                        </div>
                        <div class="info text-center">
                            <p class="name font-weight-bold mb-0">{{ Auth::user()->user_name }}</p>
                            <p class="email text-muted mb-3">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <div class="dropdown-body">
                        <ul class="profile-nav p-0 pt-3">
                            <li class="nav-item">
                                <a href="{{ route('authenticate.pass_change') }}" class="nav-link">
                                    <i data-feather="edit"></i>
                                    <span>Change Password</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('authenticate.logout') }}"
                                   onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                    <i data-feather="log-out"></i>
                                    <span>Log Out</span>
                                    <form id="logout-form" action="{{ route('authenticate.logout') }}" method="POST"
                                          class="d-none">
                                        @csrf
                                    </form>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <x-form action="/change-language">
                    <select name="lang" onchange="this.form.submit()">
                        @foreach($languages as $key=>$lang)
                            <option value="{{$key}}"
                                    @if($key == app()->getLocale()) selected="selected" @endif>
                                {{$lang}}</option>
                        @endforeach
                    </select>
                </x-form>
            </li>
        </ul>
    </div>
</nav>
<div class="user_sumery">
    <div class="col-md-2 col-sm-4">
        <div class="card">
            <h5 class="card-header">{{__('user-type')}}</h5>
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text"></p>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-4">
        <div class="card">
            <h5 class="card-header">{{__('school-name')}}</h5>
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text"></p>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-4">
        <div class="card">
            <h5 class="card-header">{{__('date-and-day')}}</h5>
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text"></p>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-4">
        <div class="card">
            <h5 class="card-header">{{__('messages')}}</h5>
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text"></p>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-4">
        <div class="card">
            <h5 class="card-header">{{__('availability')}}</h5>
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text"></p>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-4">
        <div class="card">
            <h5 class="card-header">{{__('login-duration')}}</h5>
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text"></p>
            </div>
        </div>
    </div>
</div>
