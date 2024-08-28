    @extends('layouts.master')
    @section('content')


    {{-- @yield('nav') --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('assets/img/photo_defaults.jpg') }}">

            <div class="header">
                <!-- Logo -->
                <div class="header-left">
                    <a href="{{ route('home') }}" class="logo" style="position: relative; top: 3px;"> <img src="{{ URL::to('assets/img/photo_defaults.jpg') }}" style="width: 50px; height: 50px; border-radius: 50%; position: relative; top: -4px;" alt=""> </a>
                </div>
                <!-- /Logo -->
                <a id="toggle_btn" href="javascript:void(0);" style="position: relative; top: -2px;">
                    <span class="bar-icon"><span></span><span></span><span></span></span>
                </a>
                <!-- Header Title -->
                <div class="page-title-box">
                    <h3>{{ Auth::user()->role_name }}</h3>
                </div>
                <!-- /Header Title -->

                <!-- Header Menu -->
                <ul class="nav user-menu">

                <ul class="nav user-menu" style="align-items: center;">
            <li class="nav-item">
            <div class="page-title-box">
        </div>
                <a href="{{ route('home') }}" class="nav-link" style="display: flex; align-items: center;">
                    <span class="user-img" style="margin-right: 10px;">
                        <img src="{{ asset('images/profile/' . Auth::user()->image) }}" alt="{{ Auth::user()->name }}" style="width: 40px; height: 40px; border-radius: 50%;">
                    </span>
                    <span style="font-size: 18px;">{{ Auth::user()->name }}</span>
                </a>
            </li>

            <!-- Logout Button -->
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="btn" style="margin-left: 20px; font-size: 18px;">Logout</a>
            </li>
                </ul>


            </div>
            <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                @if (Auth::user()->role_name=='Admin')
                    <li class="menu-title" style="font-size: 16px; padding: 15px 20px; color: #bdc3c7; text-transform: uppercase;">
                        <span>Management</span>
                    </li>
                    
                    <li>
                        <a href="{{ route('userManagement') }}" class="{{ request()->routeIs('userManagement') ? 'selecting' : '' }}">
                            <i class="la la-users" style="margin-right: 10px;"></i> 
                            <span>All Users</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{ route('activity/log') }}" class="{{ request()->routeIs('activity/log') ? 'selecting' : '' }}">
                            <i class="la la-list-alt" style="margin-right: 10px;"></i> 
                            <span>Activity Log</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{ route('activity/login/logout') }}" class="{{ request()->routeIs('activity/login/logout') ? 'selecting' : '' }}">
                            <i class="la la-sign-in-alt" style="margin-right: 10px;"></i> 
                            <span>Activity User</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('forget-password') }}" class="{{ request()->routeIs('forget-password') ? 'selecting' : '' }}">
                            <i class="la la-key" style="margin-right: 10px;"></i> 
                            <span>forget password</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="{{ request()->routeIs('forget-password') ? 'selecting' : '' }}">
                            <i class="la la-sign-out" style="margin-right: 10px;"></i> 
                            <span>Logout</span>
                        </a>
                    </li>
                    @elseif (Auth::user()->role_name=='Employee')
                    <li class="menu-title" style="font-size: 16px; padding: 15px 20px; color: #bdc3c7; text-transform: uppercase;">
                        <span>request demands</span>
                    </li>
                    <li>
                        <a href="{{ route('advance') }}" class="{{ request()->routeIs('advance') ? 'selecting' : '' }}">
                        <i class="la la-money-bill" style="margin-right: 10px;"></i> 
                        <span>advances</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('holiday.index') }}" class="{{ request()->routeIs('holidays') ? 'selecting' : '' }}">
                            <i class="la la-grin-stars" style="margin-right: 10px;"></i> 
                            <span>holiday</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('exits_demands') }}" class="{{ request()->routeIs('exits_demands') ? 'selecting' : '' }}">
                            <i class="la la-door-open" style="margin-right: 10px;"></i> 
                            <span>Exit permission</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('delays') }}" class="{{ request()->routeIs('delays') ? 'selecting' : '' }}">
                            <i class="la la-clock" style="margin-right: 10px;"></i> 
                            <span>delay permission</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('certificates') }}" class="{{ request()->routeIs('certificates') ? 'selecting' : '' }}">
                            <i class="la la-certificate" style="margin-right: 10px;"></i> 
                            <span>Certificate</span>
                        </a>
                    </li>
                    <li class="menu-title" style="font-size: 16px; padding: 15px 20px; color: #bdc3c7; text-transform: uppercase;">
                        <span>profile managment</span>
                    </li>
                    <li>
                        <a href="{{ route('profile_user') }}" class="{{ request()->routeIs('profile_user') ? 'selecting' : '' }}">
                            <i class="la la-user" style="margin-right: 10px;"></i> 
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('forget-password') }}" class="{{ request()->routeIs('forget-password') ? 'selecting' : '' }}">
                            <i class="la la-key" style="margin-right: 10px;"></i> 
                            <span>forget password</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="{{ request()->routeIs('forget-password') ? 'selecting' : '' }}">
                            <i class="la la-sign-out" style="margin-right: 10px;"></i> 
                            <span>Logout</span>
                        </a>
                    </li>
                    @elseif (Auth::user()->role_name=='Head of department')
                    <li class="menu-title" style="font-size: 16px; padding: 15px 20px; color: #bdc3c7; text-transform: uppercase;">
                        <span>request demands</span>
                    </li>
                    <li>
                        <a href="{{ route('advance') }}" class="{{ request()->routeIs('advance') ? 'selecting' : '' }}">
                        <i class="la la-money-bill" style="margin-right: 10px;"></i> 
                        <span>advances</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('holiday.index') }}" class="{{ request()->routeIs('holidays') ? 'selecting' : '' }}">
                            <i class="la la-grin-stars" style="margin-right: 10px;"></i> 
                            <span>holiday</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('exits_demands') }}" class="{{ request()->routeIs('exits_demands') ? 'selecting' : '' }}">
                            <i class="la la-door-open" style="margin-right: 10px;"></i> 
                            <span>Exit permission</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('delays') }}" class="{{ request()->routeIs('delays') ? 'selecting' : '' }}">
                            <i class="la la-clock" style="margin-right: 10px;"></i> 
                            <span>delay permission</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('certificates') }}" class="{{ request()->routeIs('certificates') ? 'selecting' : '' }}">
                            <i class="la la-certificate" style="margin-right: 10px;"></i> 
                            <span>Certificate</span>
                        </a>
                    </li>
                    <li class="menu-title" style="font-size: 16px; padding: 15px 20px; color: #bdc3c7; text-transform: uppercase;">
                        <span>consult demands</span>
                    </li>
                    <li>
                        <a href="{{ route('advance2') }}" class="{{ request()->routeIs('advance2') ? 'selecting' : '' }}">
                        <i class="la la-money-bill" style="margin-right: 10px;"></i> 
                        <span>advances</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('exits_demands2') }}" class="{{ request()->routeIs('exits_demands2') ? 'selecting' : '' }}">
                        <i class="la la-door-open" style="margin-right: 10px;"></i> 
                        <span>Exit permission</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('delays2') }}" class="{{ request()->routeIs('delays2') ? 'selecting' : '' }}">
                        <i class="la la-clock" style="margin-right: 10px;"></i> 
                        <span>delay permission</span>
                        </a>
                    </li>
                    @if (Auth::user()->department=='HR')
                    <li class="menu-title" style="font-size: 16px; padding: 15px 20px; color: #bdc3c7; text-transform: uppercase;">
                        <span>human resources</span>
                    </li>
                    <li>
                        <a href="{{ route('userManagement') }}" class="{{ request()->routeIs('userManagement') ? 'selecting' : '' }}">
                            <i class="la la-users" style="margin-right: 10px;"></i> 
                            <span>All Users</span>
                        </a>
                    </li>
                    @endif
                    <li class="menu-title" style="font-size: 16px; padding: 15px 20px; color: #bdc3c7; text-transform: uppercase;">
                        <span>Profile Management</span>
                    </li>
                    <li>
                        <a href="{{ route('profile_user') }}" class="{{ request()->routeIs('profile_user') ? 'selecting' : '' }}">
                            <i class="la la-user" style="margin-right: 10px;"></i> 
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('forget-password') }}" class="{{ request()->routeIs('forget-password') ? 'selecting' : '' }}">
                            <i class="la la-key" style="margin-right: 10px;"></i> 
                            <span>forget password</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="{{ request()->routeIs('forget-password') ? 'selecting' : '' }}">
                            <i class="la la-sign-out" style="margin-right: 10px;"></i> 
                            <span>Logout</span>
                        </a>
                    </li>
                    @elseif (Auth::user()->role_name=='Chief of staff')
                    <li class="menu-title" style="font-size: 16px; padding: 15px 20px; color: #bdc3c7; text-transform: uppercase;">
                        <span>request demands</span>
                    </li>
                    <li>
                        <a href="{{ route('advance') }}" class="{{ request()->routeIs('advance') ? 'selecting' : '' }}">
                        <i class="la la-money-bill" style="margin-right: 10px;"></i> 
                        <span>advances</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('holiday.index') }}" class="{{ request()->routeIs('holidays') ? 'selecting' : '' }}">
                            <i class="la la-grin-stars" style="margin-right: 10px;"></i> 
                            <span>holiday</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('exits_demands') }}" class="{{ request()->routeIs('exits_demands') ? 'selecting' : '' }}">
                            <i class="la la-door-open" style="margin-right: 10px;"></i> 
                            <span>Exit permission</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('delays') }}" class="{{ request()->routeIs('delays') ? 'selecting' : '' }}">
                            <i class="la la-clock" style="margin-right: 10px;"></i> 
                            <span>delay permission</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('certificates') }}" class="{{ request()->routeIs('certificates') ? 'selecting' : '' }}">
                            <i class="la la-certificate" style="margin-right: 10px;"></i> 
                            <span>Certificate</span>
                        </a>
                    </li>
                    <li class="menu-title" style="font-size: 16px; padding: 15px 20px; color: #bdc3c7; text-transform: uppercase;">
                    <span>consult demands</span>
                    </li>
                    <li>
                        <a href="{{ route('advance2') }}" class="{{ request()->routeIs('advance2') ? 'selecting' : '' }}">
                        <i class="la la-money-bill" style="margin-right: 10px;"></i> 
                        <span>advances</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('delays2') }}" class="{{ request()->routeIs('delays2') ? 'selecting' : '' }}">
                        <i class="la la-clock" style="margin-right: 10px;"></i> 
                        <span>delay permission</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('certificates2') }}" class="{{ request()->routeIs('certificates2') ? 'selecting' : '' }}">
                        <i class="la la-certificate" style="margin-right: 10px;"></i> 
                        <span>Certificate</span>
                        </a>
                    </li>
                    
                    @if (Auth::user()->department=='HR')
                    <li class="menu-title" style="font-size: 16px; padding: 15px 20px; color: #bdc3c7; text-transform: uppercase;">
                        <span>human resources</span>
                    </li>
                    <li>
                        <a href="{{ route('userManagement') }}" class="{{ request()->routeIs('userManagement') ? 'selecting' : '' }}">
                            <i class="la la-users" style="margin-right: 10px;"></i> 
                            <span>All Users</span>
                        </a>
                    </li>
                    @endif
                    <li class="menu-title" style="font-size: 16px; padding: 15px 20px; color: #bdc3c7; text-transform: uppercase;">
                        <span>Profile Management</span>
                    </li>
                    <li>
                        <a href="{{ route('profile_user') }}" class="{{ request()->routeIs('profile_user') ? 'selecting' : '' }}">
                            <i class="la la-user" style="margin-right: 10px;"></i> 
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('forget-password') }}" class="{{ request()->routeIs('forget-password') ? 'selecting' : '' }}">
                            <i class="la la-key" style="margin-right: 10px;"></i> 
                            <span>forget password</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="{{ request()->routeIs('forget-password') ? 'selecting' : '' }}">
                            <i class="la la-sign-out" style="margin-right: 10px;"></i> 
                            <span>Logout</span>
                        </a>
                    </li>
                    @elseif (Auth::user()->role_name=='Financial director')
                    <li class="menu-title" style="font-size: 16px; padding: 15px 20px; color: #bdc3c7; text-transform: uppercase;">
                        <span>request demands</span>
                    </li>
                    <li>
                        <a href="{{ route('advance') }}" class="{{ request()->routeIs('advance') ? 'selecting' : '' }}">
                        <i class="la la-money-bill" style="margin-right: 10px;"></i> 
                        <span>advances</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('holiday.index') }}" class="{{ request()->routeIs('holidays') ? 'selecting' : '' }}">
                            <i class="la la-grin-stars" style="margin-right: 10px;"></i> 
                            <span>holiday</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('exits_demands') }}" class="{{ request()->routeIs('exits_demands') ? 'selecting' : '' }}">
                            <i class="la la-door-open" style="margin-right: 10px;"></i> 
                            <span>Exit permission</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('delays') }}" class="{{ request()->routeIs('delays') ? 'selecting' : '' }}">
                            <i class="la la-clock" style="margin-right: 10px;"></i> 
                            <span>delay permission</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('certificates') }}" class="{{ request()->routeIs('certificates') ? 'selecting' : '' }}">
                            <i class="la la-certificate" style="margin-right: 10px;"></i> 
                            <span>Certificate</span>
                        </a>
                    </li>
                    <li class="menu-title" style="font-size: 16px; padding: 15px 20px; color: #bdc3c7; text-transform: uppercase;">
                    <span>consult demands</span>
                    </li>
                    <li>
                        <a href="{{ route('advance2') }}" class="{{ request()->routeIs('advance2') ? 'selecting' : '' }}">
                        <i class="la la-money-bill" style="margin-right: 10px;"></i> 
                        <span>advances</span>
                        </a>
                    </li>
                    @if (Auth::user()->department=='HR')
                    <li class="menu-title" style="font-size: 16px; padding: 15px 20px; color: #bdc3c7; text-transform: uppercase;">
                        <span>human resources</span>
                    </li>
                    <li>
                        <a href="{{ route('userManagement') }}" class="{{ request()->routeIs('userManagement') ? 'selecting' : '' }}">
                            <i class="la la-users" style="margin-right: 10px;"></i> 
                            <span>All Users</span>
                        </a>
                    </li>
                    @endif
                    <li class="menu-title" style="font-size: 16px; padding: 15px 20px; color: #bdc3c7; text-transform: uppercase;">
                        <span>Profile Management</span>
                    </li>
                    <li>
                        <a href="{{ route('profile_user') }}" class="{{ request()->routeIs('profile_user') ? 'selecting' : '' }}">
                            <i class="la la-user" style="margin-right: 10px;"></i> 
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('forget-password') }}" class="{{ request()->routeIs('forget-password') ? 'selecting' : '' }}">
                            <i class="la la-key" style="margin-right: 10px;"></i> 
                            <span>forget password</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="{{ request()->routeIs('forget-password') ? 'selecting' : '' }}">
                            <i class="la la-sign-out" style="margin-right: 10px;"></i> 
                            <span>Logout</span>
                        </a>
                    </li>
                    @elseif (Auth::user()->role_name=='Manager director')
                    <li class="menu-title" style="font-size: 16px; padding: 15px 20px; color: #bdc3c7; text-transform: uppercase;">
                        <span>request demands</span>
                    </li>
                    <li>
                        <a href="{{ route('advance') }}" class="{{ request()->routeIs('advance') ? 'selecting' : '' }}">
                        <i class="la la-money-bill" style="margin-right: 10px;"></i> 
                        <span>advances</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('holiday.index') }}" class="{{ request()->routeIs('holidays') ? 'selecting' : '' }}">
                            <i class="la la-grin-stars" style="margin-right: 10px;"></i> 
                            <span>holiday</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('exits_demands') }}" class="{{ request()->routeIs('exits_demands') ? 'selecting' : '' }}">
                            <i class="la la-door-open" style="margin-right: 10px;"></i> 
                            <span>Exit permission</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('delays') }}" class="{{ request()->routeIs('delays') ? 'selecting' : '' }}">
                            <i class="la la-clock" style="margin-right: 10px;"></i> 
                            <span>delay permission</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('certificates') }}" class="{{ request()->routeIs('certificates') ? 'selecting' : '' }}">
                            <i class="la la-certificate" style="margin-right: 10px;"></i> 
                            <span>Certificate</span>
                        </a>
                    </li>
                    <li class="menu-title" style="font-size: 16px; padding: 15px 20px; color: #bdc3c7; text-transform: uppercase;">
                    <span>consult demands</span>
                    </li>
                    <li>
                        <a href="{{ route('advance2') }}" class="{{ request()->routeIs('advance2') ? 'selecting' : '' }}">
                        <i class="la la-money-bill" style="margin-right: 10px;"></i> 
                        <span>advances</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('holiday.index2') }}" class="{{ request()->routeIs('holidays2') ? 'selecting' : '' }}">
                        <i class="la la-grin-stars" style="margin-right: 10px;"></i> 
                        <span>holiday</span>
                        </a>
                    </li>
                    @if (Auth::user()->department=='HR')
                    <li class="menu-title" style="font-size: 16px; padding: 15px 20px; color: #bdc3c7; text-transform: uppercase;">
                        <span>human resources</span>
                    </li>
                    <li>
                        <a href="{{ route('userManagement') }}" class="{{ request()->routeIs('userManagement') ? 'selecting' : '' }}">
                            <i class="la la-users" style="margin-right: 10px;"></i> 
                            <span>All Users</span>
                        </a>
                    </li>
                    @endif
                    <li class="menu-title" style="font-size: 16px; padding: 15px 20px; color: #bdc3c7; text-transform: uppercase;">
                        <span>profile mangment</span>
                    </li>
                    <li>
                        <a href="{{ route('profile_user') }}" class="{{ request()->routeIs('profile_user') ? 'selecting' : '' }}">
                            <i class="la la-user" style="margin-right: 10px;"></i> 
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('forget-password') }}" class="{{ request()->routeIs('forget-password') ? 'selecting' : '' }}">
                            <i class="la la-key" style="margin-right: 10px;"></i> 
                            <span>forget password</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="{{ request()->routeIs('forget-password') ? 'selecting' : '' }}">
                            <i class="la la-sign-out" style="margin-right: 10px;"></i> 
                            <span>Logout</span>
                        </a>
                    </li>


                    
                    
                    @endif

                </ul>
            </div>
        </div>
    </div>

        <style>
        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            color: #ecf0f1;
            font-size: 15px;
            text-decoration: none; /* Remove underline */
            border-radius: 8px; /* More curvy corners */
            transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition */
            margin: 5px 0; /* Space between menu items */
        }

        .sidebar-menu a:hover {
            background-color: #2c3e50; /* Slightly different color on hover */
            color: #ecf0f1; /* Light text color on hover */
        }

        .sidebar-menu a.selecting {
            background-color: #34495e; /* Dark background color for selection */
            color: #ecf0f1; /* Light text color */
            font-weight: bold; /* Bold text for emphasis */
            border-radius: 8px; /* Match rounded corners for selection */
        }

        .sidebar-menu a.selecting i {
            color: #ecf0f1; /* Match icon color with text */
        }
        /* Add this to your CSS file or inside a <style> block */
    .profile-image {
        width: 50px; /* Adjust to your preferred size */
        height: 38px; /* Adjust to your preferred size */
        border-radius: 50%; /* Makes the image circular */
        object-fit: cover; /* Ensures the image covers the entire container */
        overflow: hidden; /* Hides any overflow */
    }
    .user-img img {
        width: 35px; /* Adjust as needed */
        height: 30px; /* Adjust as needed */
        border-radius: 50%; /* Ensures the image is fully rounded */
        object-fit: cover; /* Maintains aspect ratio while covering the container */
    }
    </style>


        <!-- /Sidebar -->

        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <!-- Page Content -->
            <div class="content container-fluid">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">User Management</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">User</li>
                            </ul>
                        </div>
                        <button type="button" class="btn add-btn" data-toggle="modal" data-target="#manageDepartmentsModal">
    <i class="fa fa-cogs"></i> Manage Departments
</button>

                        <div class="col-auto float-right ml-auto">
                            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_user"><i class="fa fa-plus"></i> Add User</a>
                        </div>
                        @php
                        $setting = \App\Models\Setting::where('key', 'REGISTRATION_LINK_VISIBLE')->first();
                        $isRegistrationVisible = $setting ? (int)$setting->value : 1;
                    @endphp

                    <form method="POST" action="{{ route('admin.toggleRegistrationLink') }}">
    @csrf
    <button type="submit" class="btn add-btn">
        <i class="fa {{ $isRegistrationVisible ? 'fa-lock' : 'fa-unlock' }}"></i>
        {{ $isRegistrationVisible ? 'Deactivate Registration Link' : 'Activate Registration Link' }}
    </button>
</form>


                    </div>
                </div>
                <!-- /Page Header -->

                <!-- Search Filter -->
                <form action="{{ route('search/user/list') }}" method="POST">
                    @csrf
                    <div class="row filter-row">
                        <div class="col-sm-6 col-md-4">  
                            <div class="form-group form-focus">
                                <input type="text" class="form-control floating" id="name" name="name">
                                <label class="focus-label">User Name</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">  
                            <div class="form-group form-focus">
                                <input type="text" class="form-control floating" id="name" name="role_name">
                                <label class="focus-label">Role Name</label>
                            </div>
                        </div>
                        <!-- <div class="col-sm-6 col-md-3"> 
                            <div class="form-group form-focus">
                                <input type="text" class="form-control floating" id="name" name="status">
                                <label class="focus-label">Status</label>
                            </div>
                        </div> -->
                        <div class="col-sm-6 col-md-4">  
                            <button type="sumit" class="btn btn-success btn-block"> Search </button>  
                        </div>
                    </div>
                </form>     
                <!-- /Search Filter -->
                {{-- message --}}
                {!! Toastr::message() !!}
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>User ID</th>
                                        <th>Email</th>
                                        <th>department</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
    @foreach ($result as $key => $user)
    <tr @if($user->checked == false) style="background-color: #ffe0e0;" @endif>
        <td>
            <span hidden class="image">{{ $user->image }}</span>
            <h2 class="table-avatar">
                <a href="{{ url('/userManagement') }}" class="avatar">
                    <img src="{{ asset('images/profile/'.$user->image) }}" alt="{{ $user->name }}" class="profile-image">
                </a>
                <a href="{{ url('/userManagement') }}" class="name">{{ $user->name }}
                    @if($user->checked == false)
                        <span class="badge badge-danger" title="Unchecked User"><i class="fa fa-exclamation-circle"></i></span>
                    @endif
                </a>
            </h2>
        </td>
        <td hidden class="ids">{{ $user->id }}</td>
        <td class="id">{{ $user->rec_id }}</td>
        <td class="email">{{ $user->email }}</td>
        <td class="position">{{ $user->department }}</td>
        <td class="phone_number">{{ $user->phone }}</td>
        <td>
            @if ($user->role_name=='Admin')
                <span class="badge bg-inverse-danger role_name">{{ $user->role_name }}</span>
            @elseif ($user->role_name=='Employee')
                <span class="badge bg-inverse-dark role_name">{{ $user->role_name }}</span>
            @else
                <span class="badge bg-inverse-info role_name">{{ $user->role_name }}</span>
            @endif
        </td>
        <td>
            <div class="dropdown action-label">
                @if ($user->status=='Active')
                    <a class="btn btn-white btn-sm btn-rounded" href="#" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-dot-circle-o text-success"></i>
                        <span class="statuss">{{ $user->status }}</span>
                    </a>
                @elseif ($user->status=='Inactive')
                    <a class="btn btn-white btn-sm btn-rounded" href="#" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-dot-circle-o text-danger"></i>
                        <span class="statuss">{{ $user->status }}</span>
                    </a>
                @endif
            </div>
        </td>
        <td class="text-right">
            <div class="dropdown dropdown-action">
                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="material-icons">more_vert</i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item userUpdate" data-toggle="modal" data-id="{{ $user->id }}" data-target="#edit_user"
                        data-name="{{ $user->name }}"
                        data-email="{{ $user->email }}"
                        data-role_name="{{ $user->role_name }}"
                        data-salary="{{ $user->salary }}"
                        data-phone_number="{{ $user->phone }}"
                        data-department="{{ $user->department }}"
                        data-entry_date="{{ $user->entry_date }}"
                        data-image="{{ $user->image }}"
                        data-status="{{ $user->status }}"
                        data-position="{{ $user->position }}">
                        <i class="fa fa-pencil m-r-5"></i> Edit
                    </a>
                    <a class="dropdown-item userDelete" href="#" data-toggle="modal" ata-id="{{ $user->id }}" data-target="#delete_user">
                        <i class="fa fa-trash-o m-r-5"></i> Delete
                    </a>
                </div>
            </div>
        </td>
    </tr>
    @endforeach
</tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->
            

            <!-- Add User Modal -->
            <div id="add_user" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add New User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('user/add/save') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row"> 
                                    <div class="col-sm-6"> 
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input class="form-control @error('name') is-invalid @enderror" type="text" id="" name="name" value="{{ old('name') }}" placeholder="Enter Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6"> 
                                        <label>Emaill Address</label>
                                        <input class="form-control" type="email" id="" name="email" placeholder="Enter Email">
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-sm-6"> 
                                        <label>Role Name</label>
                                        <select class="select" name="role_name" id="role_name">
                                            <option selected disabled> --Select --</option>
                                            @foreach ($role_name as $role )
                                            <option value="{{ $role->role_type }}">{{ $role->role_type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6"> 
                                        <label>Salary</label>
                                        <!-- <input class="form-control" type="number" id="" name="salary" placeholder="Enter salary"> -->
                                        <input type="number" step="0.01" id="" class="form-control @error('salary') is-invalid @enderror" name="salary" placeholder="Enter Your Salary">
                                        @error('salary')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label>Salary</label>
                                    <input type="number" step="0.01" class="form-control @error('salary') is-invalid @enderror" name="salary" placeholder="Enter Your Salary">
                                    @error('salary')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> -->
                                <br>
                                <div class="row"> 
                                    <div class="col-sm-6"> 
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input class="form-control" type="tel" id="" name="phone" placeholder="Enter Phone">
                                        </div>
                                    </div>
                                    <div class="col-sm-6"> 
                                        <label>Department</label>
                                        <select class="select" name="department" id="department">
                                            <option selected disabled> --Select --</option>
                                            @foreach ($department as $departments )
                                            <option value="{{ $departments->department }}">{{ $departments->department }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-6">
        <label>Status</label>
        <select class="select" name="status" id="status">
            <option selected disabled> --Select --</option>
            @foreach ($status_user as $status )
            <option value="{{ $status->type_name }}">{{ $status->type_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Photo</label>
                                    <div class="d-flex align-items-center">
                                        <!-- File input with adjusted width -->
                                        <div class="custom-file" style="flex: 0 0 80%;">
                                            <input type="file" class="custom-file-input" id="profile_image" name="image" onchange="previewImage(event)">
                                            <label class="custom-file-label" for="profile_image">Choose a picture</label>
                                        </div>

                                        <!-- Image preview -->
                                        <div class="profile-img-preview ml-3">
                                            <img id="profileImagePreview" src="#" alt="Profile Image Preview" class="img-thumbnail rounded-circle" style="max-width: 50px; display: none; width: 50px; height: 50px;">
                                        </div>
                                    </div>
                                </div>
                            </div>


    </div>

                                <br>
                                <div class="row"> 
                                    <div class="col-sm-6"> 
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" placeholder="Enter Password">
                                        </div>
                                    </div>
                                    <div class="col-sm-6"> 
                                        <label>Position</label>
                                        <input type="text" class="form-control" name="position" placeholder="assign position">

                                    </div>
                                    <!-- <div class="col-sm-6"> 
                                        <label>Repeat Password</label>
                                        <input type="password" class="form-control" name="password_confirmation" placeholder="Choose Repeat Password">
                                    </div> -->
                                </div>

                                <!-- <div class="col-sm-6"> 
                                        <label>Position</label>
                                        <input type="text" class="form-control" name="position" placeholder="assign position">

                                    </div> -->
                                <div class="submit-section">
                                    <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal custom-modal fade" id="manageDepartmentsModal" tabindex="-1" role="dialog" aria-labelledby="manageDepartmentsModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="manageDepartmentsModalLabel">Manage Departments</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Add New Department Form -->
                            <form id="addDepartmentForm" method="POST" action="{{ route('departments.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="newDepartment">Add a New Department</label>
                                    <input type="text" id="newDepartment" name="department" class="form-control" placeholder="New Department">
                                </div>
                                <button type="submit" class="btn btn-primary">Add Department</button>
                            </form>

                            <hr>

                            <!-- List of Departments -->
<!-- List of Departments -->
<h6>Current Departments</h6>
<ul class="list-group" id="departmentsList">
    @foreach ($department as $departments) <!-- Loop through each department -->
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $departments->department }} <!-- Access the department name -->
            <form action="{{ route('departments.destroy', $departments->id) }}" method="POST"> <!-- Access the department ID -->
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">
                    <i class="fa fa-trash"></i>
                </button>
            </form>
        </li>
    @endforeach
</ul>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add User Modal -->
            <div id="edit_user" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="rec_id" id="e_id" value="">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="e_name" value="" placeholder="Enter Name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email Address</label>
                                <input class="form-control" type="email" name="email" id="e_email" placeholder="Enter Email"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Role Name</label>
                                <select class="form-control select" name="role_name" id="e_role_name">
                                    <option disabled selected>{{ old('role_name', $user->role_name ?? '--Select--') }}</option>
                                    @foreach ($role_name as $role)
                                        <option value="{{ $role->role_type }}" {{ old('role_name', $user->role_name) == $role->role_type ? 'selected' : '' }}>
                                            {{ $role->role_type }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Salary</label>
                                <input class="form-control" type="number" name="salary" id="e_salary" placeholder="Enter Salary">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" type="tel" name="phone" id="e_phone_number" placeholder="Enter Phone">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Department</label>
                                <select class="form-control select" name="department" id="e_department">
                                    <option disabled selected>{{ old('department', $user->department ?? '--Select--') }}</option>
                                    @foreach ($department as $departments)
                                        <option value="{{ $departments->department }}" {{ old('department', $user->department) == $departments->department ? 'selected' : '' }}>
                                            {{ $departments->department }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control select" name="status" id="e_status">
                                    <option disabled selected>{{ old('status', $user->status ?? '--Select--') }}</option>
                                    @foreach ($status_user as $status)
                                        <option value="{{ $status->type_name }}" {{ old('status', $user->status) == $status->type_name ? 'selected' : '' }}>
                                            {{ $status->type_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Photo</label>
                                <div class="d-flex align-items-center">
                                    <div class="custom-file" style="max-width: 300px;">
                                        <input type="file" class="custom-file-input" id="e_image_file" name="image" onchange="previewImage1(event)">
                                        <label class="custom-file-label" for="e_image_file">Choose a picture</label>
                                    </div>
                                    <div class="profile-img-preview ml-3">
                                        <img id="profileImagePreview1" src="http://127.0.0.1:8000/images/profile/photo_defaults.jpg" alt="Profile Image Preview" class="img-thumbnail rounded-circle" style="max-width: 50px; width: 50px; height: 50px;">
                                    </div>
                                </div>
                                <input type="hidden" name="hidden_image" id="e_image" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Position</label>
                                <input class="form-control" type="text" name="position" id="e_position" placeholder="Enter Position">
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

        
            <!-- Delete User Modal -->
            <div class="modal custom-modal fade" id="delete_user" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Delete User</h3>
                                <p>Are you sure want to delete?</p>
                            </div>
                            <div class="modal-btn delete-action">
                                <form action="{{ route('user/delete') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" class="e_id" value="">
                                    <input type="hidden" name="avatar" class="e_avatar" value="">
                                    <div class="row">
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-primary continue-btn submit-btn">Delete</button>
                                        </div>
                                        <div class="col-6">
                                            <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Delete User Modal -->
        </div>
        <!-- /Page Wrapper -->
        @section('script')
        {{-- update js --}}
        <script>
    $(document).on('click', '.userUpdate', function() {
        var userId = $(this).data('id');
        var fullName = $(this).data('name');
        var email = $(this).data('email');
        var phone = $(this).data('phone_number');
        var salary = $(this).data('salary');
        var roleName = $(this).data('role_name');
        var department = $(this).data('department');
        var status = $(this).data('status');
        var image = $(this).data('image'); // This is the image filename
        var position = $(this).data('position');
        $('#e_id').val(userId);
        $('#e_name').val(fullName);
        $('#e_email').val(email);
        $('#e_phone_number').val(phone);
        $('#e_salary').val(salary);
        $('#e_position').val(position)
        // Set the selected value in dropdowns
        $('#e_role_name option').each(function() {
            if ($(this).val() === roleName) {
                $(this).attr('selected', 'selected');
            } else {
                $(this).removeAttr('selected');
            }
        });

        $('#e_department option').each(function() {
            if ($(this).val() === department) {
                $(this).attr('selected', 'selected');
            } else {
                $(this).removeAttr('selected');
            }
        });

        $('#e_status option').each(function() {
            if ($(this).val() === status) {
                $(this).attr('selected', 'selected');
            } else {
                $(this).removeAttr('selected');
            }
        });
        // Set the image preview URL
        var imageUrl = image ? 'http://127.0.0.1:8000/images/profile/' + image : 'http://127.0.0.1:8000/images/profile/photo_defaults.jpg';
        $('#profileImagePreview1').attr('src', imageUrl).show();
        $('#e_image').val(image || '');
    });

        </script>

        {{-- delete js --}}
        <script>
            $(document).on('click','.userDelete',function()
            {
                var _this = $(this).parents('tr');
                $('.e_id').val(_this.find('.ids').text());
                $('.e_avatar').val(_this.find('.image').text());
            });
            function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('profileImagePreview');
            output.src = reader.result;  // Update src to the selected image
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
    function previewImage1(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('profileImagePreview1');
            output.src = reader.result;  // Update src to the selected image
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
        </script>
        @endsection

    @endsection