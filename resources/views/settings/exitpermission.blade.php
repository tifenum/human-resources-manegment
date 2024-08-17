@extends('layouts.master')
@section('content')

        {{-- @yield('nav') --}}
		<div class="header">
			<!-- Logo -->
			<div class="header-left">
				<a href="{{ route('home') }}" class="logo" style="position: relative; top: 9px;"> <img src="{{ URL::to('assets/img/photo_defaults.jpg') }}" style="width: 50px; height: 50px; border-radius: 50%; position: relative; top: -9px;" alt=""> </a>
			</div>
			<!-- /Logo -->
			<a id="toggle_btn" href="javascript:void(0);" style="position: relative; top: -3px;">
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
        <h3>{{ now()->format('l, F j, Y') }}</h3>
    </div>
            <a href="{{ route('profile_user') }}" class="nav-link" style="display: flex; align-items: center;">
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
                        <span>Profile Management</span>
                    </li>
                    <li>
                        <a href="{{ route('profile_user') }}" class="{{ request()->routeIs('profile_user') ? 'selecting' : '' }}">
                            <i class="la la-user" style="margin-right: 10px;"></i> 
                            <span>Profile</span>
                        </a>
                    </li>

                    @elseif (Auth::user()->role_name=='Head of department')
                    <li class="menu-title" style="font-size: 16px; padding: 15px 20px; color: #bdc3c7; text-transform: uppercase;">
                        <span>consult demands</span>
                    </li>
                    <li>
                        <a href="{{ route('advance') }}" class="{{ request()->routeIs('advance') ? 'selecting' : '' }}">
                        <i class="la la-money-bill" style="margin-right: 10px;"></i> 
                        <span>advances</span>
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
                    <li class="menu-title" style="font-size: 16px; padding: 15px 20px; color: #bdc3c7; text-transform: uppercase;">
                        <span>Profile Management</span>
                    </li>
                    <li>
                        <a href="{{ route('profile_user') }}" class="{{ request()->routeIs('profile_user') ? 'selecting' : '' }}">
                            <i class="la la-user" style="margin-right: 10px;"></i> 
                            <span>Profile</span>
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
                        <span>Profile Management</span>
                    </li>
                    <li>
                        <a href="{{ route('profile_user') }}" class="{{ request()->routeIs('profile_user') ? 'selecting' : '' }}">
                            <i class="la la-user" style="margin-right: 10px;"></i> 
                            <span>Profile</span>
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

                    <li class="menu-title" style="font-size: 16px; padding: 15px 20px; color: #bdc3c7; text-transform: uppercase;">
                        <span>Profile Management</span>
                    </li>
                    <li>
                        <a href="{{ route('profile_user') }}" class="{{ request()->routeIs('profile_user') ? 'selecting' : '' }}">
                            <i class="la la-user" style="margin-right: 10px;"></i> 
                            <span>Profile</span>
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

                    <li class="menu-title" style="font-size: 16px; padding: 15px 20px; color: #bdc3c7; text-transform: uppercase;">
                        <span>Profile Management</span>
                    </li>
                    <li>
                        <a href="{{ route('profile_user') }}" class="{{ request()->routeIs('profile_user') ? 'selecting' : '' }}">
                            <i class="la la-user" style="margin-right: 10px;"></i> 
                            <span>Profile</span>
                        </a>
                    </li>

                    @endif
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
    .user-img img {
    width: 35px; /* Adjust as needed */
    height: 30px; /* Adjust as needed */
    border-radius: 50%; /* Ensures the image is fully rounded */
    object-fit: cover; /* Maintains aspect ratio while covering the container */
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
                    <h3 class="page-title">Exit Demands <span id="year"></span></h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Exit Demands</li>
                    </ul>
                </div>
                @if (Auth::user()->role_name=='Employee')

                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_exit_demand"><i class="fa fa-plus"></i> Request Exit</a>
                </div>
                @endif

            </div>
        </div>

        <!-- Exit Demand Statistics -->

        <!-- /Exit Demand Statistics -->
        <div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped custom-table mb-0">
                <thead>
                    <tr>
                        <th>Exit Day</th>
                        <th>Department</th>
                        <th>Reason</th>
                        <th>Manager Director</th>
                        <th>Head Department</th>
                        <th>Cheif Staff</th>
                        <th>Status</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
    @foreach($exitdemand as $demand)
    <tr>
        <td>{{ $demand->exit_day }}</td>
        <td>{{ $demand->department }}</td>
        <td class="text-center">
            <button class="btn btn-info btn-sm btn-rounded custom-btn-info" 
                    data-toggle="modal" 
                    data-target="#reasonModal" 
                    data-description="{{ $demand->reason }}">
                View
            </button>
        </td>
        <td class="text-center">
    <div class="action-label">
        <a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
            @if(is_null($demand->status_MD))
                <i class="fa fa-dot-circle-o text-warning"></i> Unchecked
            @elseif($demand->status_MD)
                <i class="fa fa-dot-circle-o text-success"></i> Approved
            @else
                <i class="fa fa-dot-circle-o text-danger"></i> Declined
            @endif
        </a>
    </div>
</td>

        <td class="text-center">
    <div class="action-label">
        <a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
            @if(is_null($demand->status_HD))
                <i class="fa fa-dot-circle-o text-warning"></i> Unchecked
            @elseif($demand->status_HD)
                <i class="fa fa-dot-circle-o text-success"></i> Approved
            @else
                <i class="fa fa-dot-circle-o text-danger"></i> Declined
            @endif
        </a>
    </div>
</td>

        <td class="text-center">
    <div class="action-label">
        <a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
            @if(is_null($demand->status_Ch5))
                <i class="fa fa-dot-circle-o text-warning"></i> Unchecked
            @elseif($demand->status_Ch5)
                <i class="fa fa-dot-circle-o text-success"></i> Approved
            @else
                <i class="fa fa-dot-circle-o text-danger"></i> Declined
            @endif
        </a>
    </div>
</td>

        <td class="text-center">
            <div class="action-label">
                <a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
                    @if($demand->confirmed)
                        <i class="fa fa-dot-circle-o text-success"></i> Approved
                    @else
                        <i class="fa fa-dot-circle-o text-danger"></i> Declined
                    @endif
                </a>
            </div>
        </td>
        <td class="text-right">
        @if($demand->confirmed)
                    <div style="text-align: center; width: 120%;">
            <i class="fa fa-check-circle" aria-hidden="true" style="color: green; font-size: 24px;" title="Accepted"></i>
        </div>
            @elseif(auth()->user()->role_name == 'Employee')
                <a href="#" data-toggle="modal" data-target="#edit_exit_demand" class="action-icon edit-exit-demand"
                   data-id="{{ $demand->id }}"
                   data-exit_day="{{ $demand->exit_day }}"
                   data-department="{{ $demand->department }}"
                   data-description="{{ $demand->reason }}">
                   <i class="fa fa-pencil" aria-hidden="true"></i>
                </a>

                <form action="{{ route('exitdemand.destroy', $demand->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="action-icon" style="border: none; background: none; cursor: pointer;">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </button>
                </form>
            @else
                <form action="{{ route('exitdemand.updateStatus', $demand->id) }}" method="POST" style="display:inline;">
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

        <!-- Reason Modal -->
        <div class="modal fade custom-modal" id="reasonModal" tabindex="-1" role="dialog" aria-labelledby="reasonModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="reasonModalLabel">Description</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <p id="modalDescription">Your description goes here.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary submit-btn" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Exit Demand Modal -->
        <div id="add_exit_demand" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Request Exit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('exitdemand.store') }}">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                            <div class="form-group">
                                <label>Exit Day <span class="text-danger">*</span></label>
                                <input id="exit_day" class="form-control datetimepicker" name="exit_day" type="text" required>
                            </div>

                            <div class="form-group">
                        <label>Department <span class="text-danger">*</span></label>
                        <input class="form-control" name="department" type="text" value="{{ auth()->user()->department }}" disabled>
                        <input type="hidden" name="department" value="{{ auth()->user()->department }}">
                    </div>

                            <div class="form-group">
                                <label>Reason</label>
                                <textarea class="form-control" name="reason" rows="4" placeholder="Add a reason"></textarea>
                            </div>

                            <div class="submit-section text-center">
                                <button type="submit" class="btn btn-primary submit-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Exit Demand Modal -->
        <div class="modal custom-modal fade" id="edit_exit_demand" tabindex="-1" role="dialog" aria-labelledby="editExitDemandModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editExitDemandModalLabel">Edit Exit Demand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit_exit_demand_form" method="POST" action="">
                    @csrf
                    @method('PUT')
                    
                    <input type="hidden" name="id" id="edit_id">

                    <div class="form-group">
                        <label>Exit Day <span class="text-danger">*</span></label>
                        <input id="edit_exit_day" class="form-control datetimepicker" name="exit_day" type="text" required>
                    </div>

                    <div class="form-group">
                        <label>Department <span class="text-danger">*</span></label>
                        <input class="form-control" name="department" type="text" value="{{ auth()->user()->department }}" disabled>
                        <input type="hidden" name="department" value="{{ auth()->user()->department }}">
                    </div>
                    <div class="form-group">
                        <label>Reason<span class="text-danger">*</span></label>
                        <textarea id="edit_reason" class="form-control" name="reason" rows="4" placeholder="Add a reason"></textarea>
                    </div>

                    <div class="submit-section text-center">
                        <button type="submit" class="btn btn-primary submit-btn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    </div>
</div>
<style>

.table-responsive {
    overflow-x: auto;
}

.table {
    width: 100%;
    table-layout: fixed; /* Ensures table cells take up equal width */
    border-collapse: collapse; /* Ensures borders are collapsed into a single border */
}

.table th, .table td {
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap; /* Prevents text wrapping */
    padding: 8px; /* Add padding for better spacing */
}

.table th {
    background-color: #f8f9fa; /* Background color for header */
}

.table th:nth-child(1), .table td:nth-child(1) {
    width: 150px; /* Adjusted width */
}

.table th:nth-child(2), .table td:nth-child(2) {
    width: 150px; /* Adjusted width */
}

.table th:nth-child(3), .table td:nth-child(3) {
    width: 100px; /* Adjusted width */
}

.table th:nth-child(4), .table td:nth-child(4) {
    width: 170px; /* Adjusted width */
}

.table th:nth-child(5), .table td:nth-child(5) {
    width: 170px; /* Adjusted width */
}

.table th:nth-child(6), .table td:nth-child(6) {
    width: 150px; /* Adjusted width */
}

.table th:nth-child(7), .table td:nth-child(7) {
    width: 120px; /* Adjusted width */
}

.table th:nth-child(8), .table td:nth-child(8) {
    width: 100px; /* Adjusted width */
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
    max-width: 200px; /* Adjusted to fit content */
    word-wrap: break-word; /* Allows breaking long words */
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
.user-img img {
    width: 35px; /* Adjust as needed */
    height: 30px; /* Adjust as needed */
    border-radius: 50%; /* Ensures the image is fully rounded */
    object-fit: cover; /* Maintains aspect ratio while covering the container */
}

</style>
<script>
$(document).ready(function() {
    $('#edit_exit_demand').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var id = button.data('id'); // Extract info from data-* attributes

        // Construct the action URL dynamically
        var actionUrl = '/exit_demand/update/' + id;

        var modal = $(this);
        modal.find('form').attr('action', actionUrl); // Set the action URL
        modal.find('#edit_id').val(id);

        // Set other form fields
        modal.find('#edit_exit_day').val(button.data('exit_day'));
        modal.find('#edit_department').val(button.data('department'));
        modal.find('#edit_reason').val(button.data('description')); // Ensure consistency here
    });

    // On form submit, convert the date to the correct format
    $('#edit_exit_demand_form').on('submit', function(event) {
        var exitDayInput = $('#edit_exit_day');
        var exitDay = exitDayInput.val(); // Get the value from the input
        var formattedDate = moment(exitDay, 'DD-MM-YYYY').format('YYYY-MM-DD'); // Convert to 'YYYY-MM-DD'
        
        // Set the formatted date to the hidden input field
        exitDayInput.val(formattedDate);
    });

    $('#reasonModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var description = button.data('description');
        
        var modal = $(this);
        modal.find('#modalDescription').text(description);
    });
});
</script>



@endsection
