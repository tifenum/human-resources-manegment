
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
    <style>
    .sidebar-menu a {
        display: flex;
        align-items: center;
        padding: 10px 20px;
        color: #ecf0f1;
        font-size: 15px;
        text-decoration: none; 
        border-radius: 8px;
        transition: background-color 0.3s ease, color 0.3s ease;
        margin: 5px 0;
    }

    .sidebar-menu a:hover {
        background-color: #2c3e50; 
        color: #ecf0f1; 
    }

    .sidebar-menu a.selecting {
        background-color: #34495e; 
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
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Advances <span id="year"></span></h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">Home</a></li>
                            <li class="breadcrumb-item active">Advances</li>
                        </ul>
                    </div>
                    @if (Auth::user()->role_name=='Employee')

                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_advance"><i class="fa fa-plus"></i> Request Advance</a>
                    </div>
                    @endif
                </div>
            </div>



            <div class="row">
            <div class="col-md-12">
    <div class="table-responsive">
        <table class="table table-striped custom-table mb-0">
            <thead>
                <tr>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Reason</th>
                    <th>Chief</th>
                    <th>Depatment Head</th>
                    <th>Finatial Director</th>
                    <th>Manager Director</th>
                    <th>Status</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($advances as $advance)
                <tr>
                    <td>{{ $advance->amount }} dt</td>
                    <td>{{ $advance->date_wish }}</td>
                    <td class="text-center">
    <button class="btn btn-info btn-sm btn-rounded custom-btn-info" data-toggle="modal" data-target="#reasonModal" data-description="{{ $advance->description }}">
        View
    </button>
</td>
                    <td class="text-center">
    <div class="action-label">
        <a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
            @if(is_null($advance->chief_staff_status))
                <i class="fa fa-dot-circle-o text-warning"></i> Unchecked
            @elseif($advance->chief_staff_status)
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
            @if(is_null($advance->head_department_status))
                <i class="fa fa-dot-circle-o text-warning"></i> Unchecked
            @elseif($advance->head_department_status)
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
            @if(is_null($advance->financial_director_status))
                <i class="fa fa-dot-circle-o text-warning"></i> Unchecked
            @elseif($advance->financial_director_status)
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
            @if(is_null($advance->manager_director_status))
                <i class="fa fa-dot-circle-o text-warning"></i> Unchecked
            @elseif($advance->manager_director_status)
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
                                @if($advance->accepted)
                                    <i class="fa fa-dot-circle-o text-success"></i> Approved
                                @else
                                    <i class="fa fa-dot-circle-o text-danger"></i> Declined
                                @endif
                            </a>
                        </div>
                    </td>
                    <td class="text-right">
                    @if($advance->accepted)
                    <div style="text-align: center; width: 120%;">
            <i class="fa fa-check-circle" aria-hidden="true" style="color: green; font-size: 24px;" title="Accepted"></i>
        </div>
                        @elseif(auth()->user()->role_name == 'Employee')
                        <a href="#" data-toggle="modal" data-target="#edit_advance" class="action-icon edit-advance"
                           data-id="{{ $advance->id }}"
                           data-amount="{{ $advance->amount }}"
                           data-date_wish="{{ $advance->date_wish }}"
                           data-department="{{ $advance->department }}"
                           data-description="{{ $advance->description }}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <form action="{{ route('advance.destroy', $advance->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-icon" style="border: none; background: none; cursor: pointer;">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </button>
                        </form>
                    @else
                    <form action="{{ route('advance.updateStatus', $advance->id) }}" method="POST" style="display:inline;">
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
<!-- Reason Modal -->

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

.table th:nth-child(1), .table td:nth-child(3) { /* For Date Wish */
    width: 75px;
}
.table th:nth-child(2), .table td:nth-child(3) { /* For Date Wish */
    width: 80px;
}
.table th:nth-child(3), .table td:nth-child(4) { /* For Date Wish */
    width: 75px;
}
.table th:nth-child(4), .table td:nth-child(5) { /* For Date Wish */
    width: 75px;
}

.table th:nth-child(5), .table td:nth-child(6) { /* For Description */
    width: 120px; /* Increase for longer descriptions */
}
.table th:nth-child(6), .table td:nth-child(7) { /* For Description */
    width: 110px; /* Increase for longer descriptions */
}
.table th:nth-child(7), .table td:nth-child(8) { /* For Description */
    width: 115px; /* Increase for longer descriptions */
}
.table th:nth-child(8), .table td:nth-child(9) { /* For Description */
    width: 75px; /* Increase for longer descriptions */
}
.table th:nth-child(9), .table td:nth-child(10) { /* For Description */
    width: 75px; /* Increase for longer descriptions */
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
.user-img img {
    width: 35px; /* Adjust as needed */
    height: 30px; /* Adjust as needed */
    border-radius: 50%; /* Ensures the image is fully rounded */
    object-fit: cover; /* Maintains aspect ratio while covering the container */
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
        <!-- /Page Content -->
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

		<!-- Add Leave Modal -->
<!-- Add Advance Modal -->
<div id="add_advance" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Demand of Advance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('advance.store') }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                    <div class="form-group">
                        <label>Amount <span class="text-danger">*</span></label>
                        <input class="form-control" name="amount" type="number" step="0.01" placeholder="Enter the amount" required>
                    </div>

                    <div class="form-group">
                        <label>Date Wish <span class="text-danger">*</span></label>
                        <div class="cal-icon">
                                    <input class="form-control datetimepicker" type="text" name="date_wish" placeholder="Enter the date">
                                </div>                    </div>

                    <div class="form-group">
                        <label>Department</label>
                        <input class="form-control" name="department" type="text" value="{{ auth()->user()->department }}" disabled>
                        <input type="hidden" name="department" value="{{ auth()->user()->department }}">
                    </div>

                    <div class="form-group">
                        <label>Reason</label>
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

<!-- Edit Advance Modal -->
<!-- Edit Advance Modal -->
<div class="modal fade custom-modal" id="edit_advance" tabindex="-1" role="dialog" aria-labelledby="editAdvanceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAdvanceModalLabel">Edit Advance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editAdvanceForm" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="edit_id">
                    <div class="form-group">
                        <label for="edit_amount">Amount <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="edit_amount" name="amount" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_date_wish">Date Whish <span class="text-danger">*</span></label>
                        <input type="text" class="form-control datetimepicker" id="edit_date_wish" name="date_wish" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_department">Department</label>
                        <input type="text" class="form-control" id="edit_department" name="department" required>
                    </div>

                    <div class="form-group">
                        <label for="edit_description">Reason</label>
                        <textarea class="form-control" id="edit_description" rows="4" name="description" required></textarea>
                    </div>
                    <div class="submit-section text-center">
                        <button type="submit" class="btn btn-primary submit-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
    // When a button is clicked
    $('button[data-target="#reasonModal"]').on('click', function() {
        // Get the description from the button's data attribute
        var description = $(this).data('description');
        
        // Set the description in the modal
        $('#modalDescription').text(description);
    });
    
});
document.querySelectorAll('.action-icon').forEach(button => {
    button.addEventListener('click', function(event) {

    });
});
$(document).ready(function() {
    // Event listener for Edit buttons
    $('.edit-advance').on('click', function() {
        var id = $(this).data('id');
        var amount = $(this).data('amount');
        var dateWish = $(this).data('date_wish');
        var department = $(this).data('department');
        var description = $(this).data('description');

        // Populate the modal fields
        $('#editAdvanceForm').attr('action', '/advance/' + id);
        $('#edit_id').val(id);
        $('#edit_amount').val(amount);
        $('#edit_date_wish').val(dateWish);
        $('#edit_department').val(department);
        $('#edit_description').val(description);
    });

    // Event listener for View Reason buttons
    $('[data-toggle="modal"][data-target="#reasonModal"]').on('click', function(){
        var description = $(this).data('description');
        $('#reasonModalBody').text(description);
    });
});

</script>
    <!-- /Page Wrapper -->
@endsection
