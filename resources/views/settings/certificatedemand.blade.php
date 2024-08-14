@extends('layouts.master')
@section('content')


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
@section('content')
<!-- Sidebar -->
{!! Toastr::message() !!}
<!-- Page Wrapper -->
<div class="page-wrapper">
    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Certificates <span id="year"></span></h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Certificates</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_certificate"><i class="fa fa-plus"></i> Request Certificate</a>
                </div>
            </div>
        </div>

        <!-- Certificate Statistics -->
        <div class="row">
            <!-- Add any certificate-specific statistics here -->
        </div>
        <!-- /Certificate Statistics -->

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Issued For</th>
                                <th>Salary</th>
                                <th>discription</th>
                                <th>Department</th>
                                <th>Status</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
    @foreach($certificates as $certificate)
    <tr>      
        <td>{{ $certificate->type }}</td>
        <td>{{ $certificate->issued_for }}</td>
        <td>{{ $certificate->salary }}</td>
        <td>                                  
            <button href="#" data-toggle="modal" data-target="#view_certificate" class="view-certificate btn btn-info btn-sm btn-rounded custom-btn-info"
                data-id="{{ $certificate->id }}"
                data-type="{{ $certificate->type }}"
                data-issued_for="{{ $certificate->issued_for }}"
                data-salary="{{ $certificate->salary }}"
                data-department="{{ $certificate->department }}"
                data-description="{{ $certificate->description }}">
                View
            </button>
        </td>
        <td>{{ $certificate->department }}</td>
        <td class="text-center">
            <div class="action-label">
                <a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
                    @if($certificate->confirmed)
                        <i class="fa fa-dot-circle-o text-success"></i> Approved
                    @else
                        <i class="fa fa-dot-circle-o text-danger"></i> Declined
                    @endif
                </a>
            </div>
        </td>

        <td class="text-center">
    @if($certificate->confirmed)
        <a href="{{ route('certificate.generateCertificate', $certificate->id) }}" class="btn btn-primary btn-sm btn-rounded" target="_blank">
            See Certificate
        </a>
    @endif
</td>

        <td class="text-right">
            @if(auth()->user()->role_name == 'Employee')
                <a href="#" data-toggle="modal" data-target="#edit_certificate" class="action-icon edit-certificate"
                   data-id="{{ $certificate->id }}"
                   data-type="{{ $certificate->type }}"
                   data-issued_for="{{ $certificate->issued_for }}"
                   data-salary="{{ $certificate->salary }}"
                   data-department="{{ $certificate->department }}"
                   data-description="{{ $certificate->description }}">
                   <i class="fa fa-pencil" aria-hidden="true"></i>
                </a>
                <form action="{{ route('certificate.destroy', $certificate->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="action-icon" style="border: none; background: none; cursor: pointer;">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </button>
                </form>
            @else
            <form action="{{ route('certificate.updateStatus', $certificate->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('PATCH')
    <button type="submit" name="status" value="approve" class="action-icon" style="border: none; background: none; cursor: pointer;">
        <i class="fa fa-check" aria-hidden="true"></i>
    </button>
    <button type="submit" name="status" value="decline" class="action-icon" style="border: none; background: none; cursor: pointer;">
        <i class="fa fa-times" aria-hidden="true"></i>
    </button>
</form>
    
            @endif
        </td>
    </tr>
    @endforeach
</tbody>

                    </table>
                </div>
            </div>
        </div>

        <!-- View Certificate Modal -->
        <div class="modal fade custom-modal" id="view_certificate" tabindex="-1" role="dialog" aria-labelledby="viewCertificateModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewCertificateModalLabel">Certificate Description</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <p id="certificateDescription">Your description goes here.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary submit-btn" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Certificate Modal -->
        <div id="add_certificate" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Request Certificate</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('certificate.store') }}">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                            <div class="form-group">
                                <label>Type <span class="text-danger">*</span></label>
                                <input class="form-control" name="type" type="text" required>
                            </div>

                            <div class="form-group">
                                <label>Issued For <span class="text-danger">*</span></label>
                                <input class="form-control" name="issued_for" type="text" required>
                            </div>

                            <div class="form-group">
                                <label>Salary <span class="text-danger">*</span></label>
                                <input class="form-control" name="salary" type="number" step="0.01" required>
                            </div>

                            <div class="form-group">
                                <label>Department <span class="text-danger">*</span></label>
                                <input class="form-control" name="department" type="text" required>
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" rows="4" placeholder="Add a description"></textarea>
                            </div>

                            <div class="submit-section text-center">
                                <button type="submit" class="btn btn-primary submit-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Certificate Modal -->
        <div id="edit_certificate" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Certificate</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="editCertificateForm" action="">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                            <input type="hidden" id="editCertificateId" name="certificate_id">

                            <div class="form-group">
                                <label>Type <span class="text-danger">*</span></label>
                                <input class="form-control" id="editCertificateType" name="type" type="text" required>
                            </div>

                            <div class="form-group">
                                <label>Issued For <span class="text-danger">*</span></label>
                                <input class="form-control" id="editCertificateIssuedFor" name="issued_for" type="text" required>
                            </div>

                            <div class="form-group">
                                <label>Salary <span class="text-danger">*</span></label>
                                <input class="form-control" id="editCertificateSalary" name="salary" type="number" step="0.01" required>
                            </div>

                            <div class="form-group">
                                <label>Department <span class="text-danger">*</span></label>
                                <input class="form-control" id="editCertificateDepartment" name="department" type="text" required>
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" id="editCertificateDescription" name="description" rows="4" placeholder="Add a description"></textarea>
                            </div>

                            <div class="submit-section text-center">
                                <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->
</div>
<!-- /Page Wrapper -->
<script>
    $(document).ready(function() {
        // View Certificate
        $('.view-certificate').on('click', function() {
            var id = $(this).data('id');
            var type = $(this).data('type');
            var issued_for = $(this).data('issued_for');
            var salary = $(this).data('salary');
            var department = $(this).data('department');
            var description = $(this).data('description');

            $('#certificateDescription').text(description);
            $('#view_certificate').modal('show');
        });

        // Edit Certificate
// Edit Certificate
$('#edit_certificate').on('show.bs.modal', function(event) {
    const button = $(event.relatedTarget);
    const id = button.data('id');
    const type = button.data('type');
    const issuedFor = button.data('issued_for');
    const salary = button.data('salary');
    const department = button.data('department');
    const description = button.data('description');

    const modal = $(this);
    modal.find('#editCertificateId').val(id);
    modal.find('#editCertificateType').val(type);
    modal.find('#editCertificateIssuedFor').val(issuedFor);
    modal.find('#editCertificateSalary').val(salary);
    modal.find('#editCertificateDepartment').val(department);
    modal.find('#editCertificateDescription').val(description);

    // Set the form action URL dynamically
    const formAction = `/certificate/${id}`;
    modal.find('#editCertificateForm').attr('action', formAction);
});

    });

</script>
<style>

.table-responsive {
    overflow-x: auto;
}

.table {
    width: 100%;
    table-layout: fixed; /* Ensures table cells take up equal width */
}

.table th, .table td {
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap; /* Prevents text wrapping */
}

.table th:nth-child(1), .table td:nth-child(2) { /* For Date Wish */
    width: 100px;
}
.table th:nth-child(2), .table td:nth-child(3) { /* For Date Wish */
    width: 100px;
}
.table th:nth-child(3), .table td:nth-child(4) { /* For Date Wish */
    width: 100px;
}
.table th:nth-child(4), .table td:nth-child(5) { /* For Date Wish */
    width: 100px;
}

.table th:nth-child(5), .table td:nth-child(6) { /* For Description */
    width: 100px; /* Increase for longer descriptions */
}
.table th:nth-child(6), .table td:nth-child(7) { /* For Description */
    width: 100px; /* Increase for longer descriptions */
}
.table th:nth-child(7), .table td:nth-child(8) { /* For Description */
    width: 100x; /* Increase for longer descriptions */
}
.table th:nth-child(8), .table td:nth-child(9) { /* For Description */
    width: 100x; /* Increase for longer descriptions */
}
.action-icon {
    color: #333; /* Adjust color as needed */
    font-size: 20px; /* Adjust size as needed */
    text-decoration: none;
}

.action-icon:hover {
    color: #007bff; /* Change color on hover */
}

.ml-2 {
    margin-left: 0.5rem; /* Adjust spacing between icons */
}

.table td {
    max-width: 400px; /* Increase if needed */
}

.custom-btn-info {
  background-color: #f43b48; /* Button background color */
  border-color: #f43b48; /* Button border color */
  color: white; /* Text color */
}

.custom-btn-info:hover,
.custom-btn-info:focus,
.custom-btn-info:active {
  background-color: #e03a44; /* Darker color for hover and focus */
  border-color: #e03a44; /* Border color for hover and focus */
  color: white; /* Text color on hover and focus */
  box-shadow: none; /* Remove any box shadow */
}

.custom-btn-info:active {
  background-color: #d93a3e; /* Even darker color for active state */
  border-color: #d93a3e; /* Border color for active state */
}

</style>    
@endsection
