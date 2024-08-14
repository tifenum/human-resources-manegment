@extends('layouts.master')
@section('content')
<link rel="stylesheet" href="{{ URL::to('assets/css/toastr.min.css') }}">
	<script src="{{ URL::to('assets/js/toastr_jquery.min.js') }}"></script>
	<script src="{{ URL::to('assets/js/toastr.min.js') }}"></script>
	<!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                @if (Auth::user()->role_name=='Admin')
                    <li class="menu-title" style="font-size: 16px; padding: 15px 20px; color: #bdc3c7; text-transform: uppercase;">
                        <span>Authentication</span>
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
                    @elseif (Auth::user()->role_name=='Employee')
                    <li class="menu-title" style="font-size: 16px; padding: 15px 20px; color: #bdc3c7; text-transform: uppercase;">
                        <span>request demands</span>
                    </li>
                    <!-- <li class="menu-title"> <span>main</span> </li> -->
                    <li>
                        <a href="{{ route('all/employee/card') }}" class="{{ request()->routeIs('all/employee/card') ? 'selecting' : '' }}">
                            <i class="la la-money-bill" style="margin-right: 10px;"></i> 
                            <span>advances</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('company/settings/page1') }}" class="{{ request()->routeIs('company/settings/page1') ? 'selecting' : '' }}">
                            <i class="la la-grin-stars" style="margin-right: 10px;"></i> 
                            <span>holiday</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('company/settings/page2') }}" class="{{ request()->routeIs('company/settings/page2') ? 'selecting' : '' }}">
                            <i class="la la-door-open" style="margin-right: 10px;"></i> 
                            <span>Exit permission</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('company/settings/page3') }}" class="{{ request()->routeIs('company/settings/page3') ? 'selecting' : '' }}">
                            <i class="la la-clock" style="margin-right: 10px;"></i> 
                            <span>delay permission</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('company/settings/page4') }}" class="{{ request()->routeIs('company/settings/page4') ? 'selecting' : '' }}">
                            <i class="la la-certificate" style="margin-right: 10px;"></i> 
                            <span>Certificate</span>
                        </a>
                    </li>
                    <li class="menu-title" style="font-size: 16px; padding: 15px 20px; color: #bdc3c7; text-transform: uppercase;">
                        <span>Profile Management</span>
                    </li>
                    <li>
                        <a href="{{ route('profile_user') }}" class="{{ request()->routeIs('profile_user') ? 'selecting' : '' }}">
                            <i class="la la-user" style="margin-right: 10px;"></i> 
                            <span>Profile</span>
                        </a>
                    </li>
                    <!-- <li class="submenu">
                        <a href="#">
                            <i class="la la-files-o"></i>
                            <span> Demands </span> 
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a href="{{ route('all/employee/card') }}">advances</a></li>
                            <li><a href="{{ route('company/settings/page1') }}">holiday</a></li>
                            <li><a href="{{ route('company/settings/page2') }}">Epermission</a></li>
                            <li><a href="{{ route('company/settings/page3') }}">Dpermission</a></li>
                            <li><a href="{{ route('company/settings/page4') }}">certificate</a></li>
                        </ul>
                    </li>
                    <li class="menu-title"> <span>Pages</span> </li>
                    <li class="submenu"> <a href="#"><i class="la la-user"></i>
                        <span> Profile </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('profile_user') }}"> Employee Profile </a></li>
                        </ul>
                    </li> -->
                    @elseif (Auth::user()->role_name=='Head of department')
                    <li class="menu-title" style="font-size: 16px; padding: 15px 20px; color: #bdc3c7; text-transform: uppercase;">
                        <span>consult demands</span>
                    </li>
                    <!-- <li class="menu-title"> <span>main</span> </li> -->
                    <li>
                        <a href="{{ route('all/employee/card') }}" class="{{ request()->routeIs('all/employee/card') ? 'selecting' : '' }}">
                            <i class="la la-user-secret" style="margin-right: 10px;"></i> 
                            <span>advances</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('company/settings/page2') }}" class="{{ request()->routeIs('company/settings/page2') ? 'selecting' : '' }}">
                            <i class="la la-user-secret" style="margin-right: 10px;"></i> 
                            <span>Exit permission</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('company/settings/page3') }}" class="{{ request()->routeIs('company/settings/page3') ? 'selecting' : '' }}">
                            <i class="la la-user-secret" style="margin-right: 10px;"></i> 
                            <span>delay permission</span>
                        </a>
                    </li>
                    <li class="menu-title" style="font-size: 16px; padding: 15px 20px; color: #bdc3c7; text-transform: uppercase;">
                        <span>Profile Management</span>
                    </li>
                    <li>
                        <a href="{{ route('profile_user') }}" class="{{ request()->routeIs('profile_user') ? 'selecting' : '' }}">
                            <i class="la la-user-secret" style="margin-right: 10px;"></i> 
                            <span>Profile</span>
                        </a>
                    </li>
                    <!-- <li class="menu-title"> <span>main</span> </li>
                    <li class="submenu">
                        <a href="#">
                            <i class="la la-files-o"></i>
                            <span>advances demands Demands </span> 
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a href="{{ route('all/employee/card') }}">advances</a></li>
                            <li><a href="{{ route('company/settings/page1') }}">holiday</a></li>
                            <li><a href="{{ route('company/settings/page2') }}">Epermission</a></li>
                            <li><a href="{{ route('company/settings/page3') }}">Dpermission</a></li>
                            <li><a href="{{ route('company/settings/page4') }}">certificate</a></li>

                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#">
                            <i class="la la-files-o"></i>
                            <span> consult retard demands </span> 
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a href="{{ route('all/employee/card') }}">advances</a></li>
                            <li><a href="{{ route('company/settings/page1') }}">holiday</a></li>
                            <li><a href="{{ route('company/settings/page2') }}">Epermission</a></li>
                            <li><a href="{{ route('company/settings/page3') }}">Dpermission</a></li>
                            <li><a href="{{ route('company/settings/page4') }}">certificate</a></li>

                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#">
                            <i class="la la-files-o"></i>
                            <span> consult permission de sortie </span> 
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a href="{{ route('all/employee/card') }}">advances</a></li>
                            <li><a href="{{ route('company/settings/page1') }}">holiday</a></li>
                            <li><a href="{{ route('company/settings/page2') }}">Epermission</a></li>
                            <li><a href="{{ route('company/settings/page3') }}">Dpermission</a></li>
                            <li><a href="{{ route('company/settings/page4') }}">certificate</a></li>

                        </ul>
                    </li>
                    <li class="menu-title"> <span>Pages</span> </li>
                    <li class="submenu"> <a href="#"><i class="la la-user"></i>
                        <span> Profile </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('profile_user') }}"> Employee Profile </a></li>
                        </ul>
                    </li> -->
                    @elseif (Auth::user()->role_name=='Chief of staff')
                    <li class="menu-title" style="font-size: 16px; padding: 15px 20px; color: #bdc3c7; text-transform: uppercase;">
                        <span>request demands</span>
                    </li>
                    <!-- <li class="menu-title"> <span>main</span> </li> -->
                    <li>
                        <a href="{{ route('all/employee/card') }}" class="{{ request()->routeIs('all/employee/card') ? 'selecting' : '' }}">
                            <i class="la la-user-secret" style="margin-right: 10px;"></i> 
                            <span>advances</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('company/settings/page3') }}" class="{{ request()->routeIs('company/settings/page3') ? 'selecting' : '' }}">
                            <i class="la la-user-secret" style="margin-right: 10px;"></i> 
                            <span>delay permission</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('company/settings/page4') }}" class="{{ request()->routeIs('company/settings/page4') ? 'selecting' : '' }}">
                            <i class="la la-user-secret" style="margin-right: 10px;"></i> 
                            <span>Certificate</span>
                        </a>
                    </li>
                    <li class="menu-title" style="font-size: 16px; padding: 15px 20px; color: #bdc3c7; text-transform: uppercase;">
                        <span>Profile Management</span>
                    </li>
                    <li>
                        <a href="{{ route('profile_user') }}" class="{{ request()->routeIs('profile_user') ? 'selecting' : '' }}">
                            <i class="la la-user-secret" style="margin-right: 10px;"></i> 
                            <span>Profile</span>
                        </a>
                    </li>
                    <!-- <li class="menu-title"> <span>main</span> </li>
                    <li class="submenu">
                        <a href="#">
                            <i class="la la-files-o"></i>
                            <span> consult certificates </span> 
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a href="{{ route('all/employee/card') }}">advances</a></li>
                            <li><a href="{{ route('company/settings/page1') }}">holiday</a></li>
                            <li><a href="{{ route('company/settings/page2') }}">Epermission</a></li>
                            <li><a href="{{ route('company/settings/page3') }}">Dpermission</a></li>
                            <li><a href="{{ route('company/settings/page4') }}">certificate</a></li>

                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#">
                            <i class="la la-files-o"></i>
                            <span> consult retard demands</span> 
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a href="{{ route('all/employee/card') }}">advances</a></li>
                            <li><a href="{{ route('company/settings/page1') }}">holiday</a></li>
                            <li><a href="{{ route('company/settings/page2') }}">Epermission</a></li>
                            <li><a href="{{ route('company/settings/page3') }}">Dpermission</a></li>
                            <li><a href="{{ route('company/settings/page4') }}">certificate</a></li>

                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#">
                            <i class="la la-files-o"></i>
                            <span> consult advances demands </span> 
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a href="{{ route('all/employee/card') }}">advances</a></li>
                            <li><a href="{{ route('company/settings/page1') }}">holiday</a></li>
                            <li><a href="{{ route('company/settings/page2') }}">Epermission</a></li>
                            <li><a href="{{ route('company/settings/page3') }}">Dpermission</a></li>
                            <li><a href="{{ route('company/settings/page4') }}">certificate</a></li>

                        </ul>
                    </li>
                    <li class="menu-title"> <span>Pages</span> </li>
                    <li class="submenu"> <a href="#"><i class="la la-user"></i>
                        <span> Profile </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('profile_user') }}"> Employee Profile </a></li>
                        </ul>
                    </li> -->
                    @elseif (Auth::user()->role_name=='Financial director')
                    <li class="menu-title" style="font-size: 16px; padding: 15px 20px; color: #bdc3c7; text-transform: uppercase;">
                        <span>request demands</span>
                    </li>
                    <!-- <li class="menu-title"> <span>main</span> </li> -->
                    <li>
                        <a href="{{ route('all/employee/card') }}" class="{{ request()->routeIs('all/employee/card') ? 'selecting' : '' }}">
                            <i class="la la-user-secret" style="margin-right: 10px;"></i> 
                            <span>advances</span>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="{{ route('company/settings/page1') }}" class="{{ request()->routeIs('company/settings/page1') ? 'selecting' : '' }}">
                            <i class="la la-user-secret" style="margin-right: 10px;"></i> 
                            <span>holiday</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('company/settings/page2') }}" class="{{ request()->routeIs('company/settings/page2') ? 'selecting' : '' }}">
                            <i class="la la-user-secret" style="margin-right: 10px;"></i> 
                            <span>Exit permission</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('company/settings/page3') }}" class="{{ request()->routeIs('company/settings/page3') ? 'selecting' : '' }}">
                            <i class="la la-user-secret" style="margin-right: 10px;"></i> 
                            <span>delay permission</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('company/settings/page4') }}" class="{{ request()->routeIs('company/settings/page4') ? 'selecting' : '' }}">
                            <i class="la la-user-secret" style="margin-right: 10px;"></i> 
                            <span>Certificate</span>
                        </a>
                    </li> -->
                    <li class="menu-title" style="font-size: 16px; padding: 15px 20px; color: #bdc3c7; text-transform: uppercase;">
                        <span>Profile Management</span>
                    </li>
                    <li>
                        <a href="{{ route('profile_user') }}" class="{{ request()->routeIs('profile_user') ? 'selecting' : '' }}">
                            <i class="la la-user-secret" style="margin-right: 10px;"></i> 
                            <span>Profile</span>
                        </a>
                    </li>
                    <!-- <li class="menu-title"> <span>main</span> </li>
                    <li class="submenu">
                        <a href="#">
                            <i class="la la-files-o"></i>
                            <span>consult advance demands</span> 
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a href="{{ route('all/employee/card') }}">advances</a></li>
                            <li><a href="{{ route('company/settings/page1') }}">holiday</a></li>
                            <li><a href="{{ route('company/settings/page2') }}">Epermission</a></li>
                            <li><a href="{{ route('company/settings/page3') }}">Dpermission</a></li>
                            <li><a href="{{ route('company/settings/page4') }}">certificate</a></li>

                        </ul>
                    </li>
                    <li class="menu-title"> <span>Pages</span> </li>
                    <li class="submenu"> <a href="#"><i class="la la-user"></i>
                        <span> Profile </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('profile_user') }}"> Employee Profile </a></li>
                        </ul>
                    </li> -->
                    @elseif (Auth::user()->role_name=='Manager director')
                    <li class="menu-title" style="font-size: 16px; padding: 15px 20px; color: #bdc3c7; text-transform: uppercase;">
                        <span>request demands</span>
                    </li>
                    <!-- <li class="menu-title"> <span>main</span> </li> -->
                    <li>
                        <a href="{{ route('all/employee/card') }}" class="{{ request()->routeIs('all/employee/card') ? 'selecting' : '' }}">
                            <i class="la la-user-secret" style="margin-right: 10px;"></i> 
                            <span>advances</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('company/settings/page1') }}" class="{{ request()->routeIs('company/settings/page1') ? 'selecting' : '' }}">
                            <i class="la la-user-secret" style="margin-right: 10px;"></i> 
                            <span>holiday</span>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="{{ route('company/settings/page2') }}" class="{{ request()->routeIs('company/settings/page2') ? 'selecting' : '' }}">
                            <i class="la la-user-secret" style="margin-right: 10px;"></i> 
                            <span>Exit permission</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('company/settings/page3') }}" class="{{ request()->routeIs('company/settings/page3') ? 'selecting' : '' }}">
                            <i class="la la-user-secret" style="margin-right: 10px;"></i> 
                            <span>delay permission</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('company/settings/page4') }}" class="{{ request()->routeIs('company/settings/page4') ? 'selecting' : '' }}">
                            <i class="la la-user-secret" style="margin-right: 10px;"></i> 
                            <span>Certificate</span>
                        </a>
                    </li> -->
                    <li class="menu-title" style="font-size: 16px; padding: 15px 20px; color: #bdc3c7; text-transform: uppercase;">
                        <span>Profile Management</span>
                    </li>
                    <li>
                        <a href="{{ route('profile_user') }}" class="{{ request()->routeIs('profile_user') ? 'selecting' : '' }}">
                            <i class="la la-user-secret" style="margin-right: 10px;"></i> 
                            <span>Profile</span>
                        </a>
                    </li>
                    <!-- <li class="menu-title"> <span>main</span> </li>
                    <li class="submenu">
                        <a href="#">
                            <i class="la la-files-o"></i>
                            <span>consult advances Demands </span> 
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a href="{{ route('all/employee/card') }}">advances</a></li>
                            <li><a href="{{ route('company/settings/page1') }}">holiday</a></li>
                            <li><a href="{{ route('company/settings/page2') }}">Epermission</a></li>
                            <li><a href="{{ route('company/settings/page3') }}">Dpermission</a></li>
                            <li><a href="{{ route('company/settings/page4') }}">certificate</a></li>

                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#">
                            <i class="la la-files-o"></i>
                            <span> consult conges demands </span> 
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a href="{{ route('all/employee/card') }}">advances</a></li>
                            <li><a href="{{ route('company/settings/page1') }}">holiday</a></li>
                            <li><a href="{{ route('company/settings/page2') }}">Epermission</a></li>
                            <li><a href="{{ route('company/settings/page3') }}">Dpermission</a></li>
                            <li><a href="{{ route('company/settings/page4') }}">certificate</a></li>

                        </ul>
                    </li>
                    <li class="menu-title"> <span>Pages</span> </li>
                    <li class="submenu"> <a href="#"><i class="la la-user"></i>
                        <span> Profile </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('profile_user') }}"> Employee Profile </a></li>
                        </ul> -->
                    <!-- </li> -->
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
	<!-- /Sidebar -->
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
</style>
	<!-- /Sidebar -->
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Profile</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ul>
                    </div>
                </div>
            </div>

                <div class="card mb-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile-view">
                                    <div class="profile-img-wrap">
                                        <div class="profile-img">
                                            <a href="#">
                                            <img src="{{ asset('images/profile/' . Auth::user()->image) }}" alt="{{ Auth::user()->name }}">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="profile-basic">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="profile-info-left">
                                                    <h3 class="user-name m-t-0 mb-0">{{ Auth::user()->name }}</h3>

                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <ul class="personal-info">
                                                <li>
                                                        <div class="title">Matricule:</div>
                                                        <div class="text"><a href="">{{ Auth::user()->rec_id }}</a></div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Phone:</div>
                                                        <div class="text"><a href="">{{ Auth::user()->phone }}</a></div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Email:</div>
                                                        <div class="text"><a href="">{{ Auth::user()->email }}</a></div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Department:</div>
                                                        <div class="text"><a href="">{{ Auth::user()->department }}</a></div>
                                                    </li>
                                                    <li>
                                                        <div class="title">role:</div>
                                                        <div class="text"><a href="">{{ Auth::user()->role_name }}</a></div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Status:</div>
                                                        <div class="text"><a href="">{{ Auth::user()->status }}</a></div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Salary:</div>
                                                        <div class="text"><a href="">{{ Auth::user()->salary }} TND</a></div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Entry Date:</div>
                                                        <div class="text"><a href="">{{ Auth::user()->entry_date->format('d-m-Y') }}</a></div>
                                                    </li>
                                                    </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<!-- Modal -->
<div id="profile_info" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('updateProfile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="profile_image">Profile Image:</label>
                                <input type="file" class="form-control-file" id="profile_image" name="image">
                            </div>
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone:</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone }}" required>
                            </div>
                            <div class="form-group">
                                <label for="department">Department:</label>
                                <input type="text" class="form-control" id="department" name="department" value="{{ Auth::user()->department }}" required>
                            </div>
                            <div class="form-group">
                                <label for="entry_date">Entry Date:</label>
                                <input type="text" class="form-control" id="entry_date" name="entry_date" value="{{ Auth::user()->entry_date->format('d-m-Y') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="salary">Salary:</label>
                                <input type="text" class="form-control" id="salary" name="salary" value="{{ Auth::user()->salary }}" required>
                            </div>
                            <div class="form-group">
                                <label for="salary">Status:</label>
                                <input type="text" class="form-control" id="status" name="status" value="{{ Auth::user()->status }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="salary">role:</label>
                                <input type="text" class="form-control" id="role" name="role" value="{{ Auth::user()->role_name }}" readonly>
                            </div>
                            <!-- Fields for status and role are not included in the form for editing -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
