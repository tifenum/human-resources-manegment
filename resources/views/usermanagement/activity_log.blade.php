@extends('layouts.master')
@section('content')
{{-- @yield('nav') --}}
		<div class="header">
			<!-- Logo -->
			<div class="header-left">
				<a href="{{ route('home') }}" class="logo" style="position: relative; top: 0px;"> <img src="{{ URL::to('assets/img/logo.png') }}" width="40" height="40" alt=""> </a>
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

				<li class="nav-item dropdown has-arrow main-drop">
					<a href="#" class="nav-link">
						<span class="user-img">
						<img src="{{ asset('images/profile/' . Auth::user()->image) }}" alt="{{ Auth::user()->name }}">
						</span></span>
						<span>{{ Auth::user()->name }}</span>
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="{{ route('profile_user') }}">My Profile</a>
						<a class="dropdown-item" href="{{ route('company/settings/page') }}">Settings</a>
						<a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
					</div>
				</li>
			</ul>

		</div>
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                @if (Auth::user()->role_name == 'Admin')
                    <li class="menu-title" style="font-size: 16px; padding: 15px 20px; color: #bdc3c7; text-transform: uppercase;">
                        <span>Authentication</span>
                    </li>
                    
                    <li>
                        <a href="{{ route('userManagement') }}" class="{{ request()->routeIs('userManagement') ? 'selecting' : '' }}">
                            <i class="la la-user-secret" style="margin-right: 10px;"></i> 
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
                            <i class="la la-sign-in" style="margin-right: 10px;"></i> 
                            <span>Activity User</span>
                        </a>
                    </li>
                @endif
                <li>
                        <a href="{{ route('forget-password') }}" class="{{ request()->routeIs('forget-password') ? 'selecting' : '' }}">
                            <i class="la la-key" style="margin-right: 10px;"></i> 
                            <span>forget password</span>
                        </a>
                    </li>
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
    .user-img img {
    width: 35px; /* Adjust as needed */
    height: 30px; /* Adjust as needed */
    border-radius: 50%; /* Ensures the image is fully rounded */
    object-fit: cover; /* Maintains aspect ratio while covering the container */
}
    .sidebar-menu a.selecting i {
        color: #ecf0f1; /* Match icon color with text */
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
                        <h3 class="page-title">Activity User</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Activity User</li>
                        </ul>
                    </div>
                </div>
            </div>
			<!-- /Page Header -->

            <!-- /Search Filter -->
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Description</th>
                                    <th>Date Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($activityLog as $key => $item)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->date_time }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
    </div>
@endsection


