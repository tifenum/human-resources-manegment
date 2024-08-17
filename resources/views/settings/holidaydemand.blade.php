
@extends('layouts.master')
@section('content')
    <!-- Sidebar -->
    {{-- @yield('nav') --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('assets/img/photo_defaults.jpg') }}">

		<div class="header">
			<!-- Logo -->
			<div class="header-left">
				<a href="{{ route('home') }}" class="logo" style="position: relative; top: 9px;"> <img src="{{ URL::to('assets/img/photo_defaults.jpg') }}" style="width: 50px; height: 50px; border-radius: 50%; position: relative; top: -4px;" alt=""> </a>
			</div>
			<!-- /Logo -->
			<a id="toggle_btn" href="javascript:void(0);" style="position: relative; top: 18px;">
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
            <a href="{{ route('logout') }}" class="btn" style="margin-left: 20px; font-size: 18px; position: relative; top: -2px;">Logout</a>
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
<!-- Page Wrapper -->
<div class="page-wrapper">
    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Holidays <span id="year"></span></h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Holidays</li>
                    </ul>
                </div>
                @if (Auth::user()->role_name=='Employee')

                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_holiday"><i class="fa fa-plus"></i> Request Holiday</a>
                </div>
                @endif
            </div>
        </div>

        <!-- Holiday Statistics -->
        <div class="row">
            <!-- Add any holiday-specific statistics here -->
        </div>
        <!-- /Holiday Statistics -->

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0">
                        <thead>
                            <tr>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Reason Why ?</th>
                                <th>Chief Staff</th>
                                <!-- <th>Dept Head</th> -->
                                <!-- <th>Fin Director</th> -->
                                <th>Manager Director</th>
                                <th>Status</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
    @foreach($holidays as $holiday)
    <tr>
        <td>{{ $holiday->from_date }}</td>
        <td>{{ $holiday->to_date }}</td>
        <td class="text-center">
            <button class="btn btn-info btn-sm btn-rounded custom-btn-info" 
                    data-toggle="modal" 
                    data-target="#reasonModal" 
                    data-description="{{ $holiday->reason }}">
                View
            </button>
        </td>
        <td class="text-center">
    <div class="action-label">
        <a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
            @if(is_null($holiday->status_Ch5))
                <i class="fa fa-dot-circle-o text-warning"></i> Unchecked
            @elseif($holiday->status_Ch5)
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
            @if(is_null($holiday->status_MD))
                <i class="fa fa-dot-circle-o text-warning"></i> Unchecked
            @elseif($holiday->status_MD)
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
                    @if($holiday->confirmed)
                        <i class="fa fa-dot-circle-o text-success"></i> Approved
                    @else
                        <i class="fa fa-dot-circle-o text-danger"></i> Declined
                    @endif
                </a>
            </div>
        </td>
        <td class="text-right">
        @if($holiday->confirmed)
                    <div style="text-align: center; width: 120%;">
            <i class="fa fa-check-circle" aria-hidden="true" style="color: green; font-size: 24px;" title="Accepted"></i>
        </div>
            @elseif(auth()->user()->role_name != 'Employee')
            <form action="{{ route('holiday.updateStatus', $holiday->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('PATCH')
    <button type="submit" name="status" value="approve" class="action-icon" style="border: none; background: none; cursor: pointer;">
        <i class="fa fa-check" aria-hidden="true"></i>
    </button>
    <button type="submit" name="status" value="decline" class="action-icon" style="border: none; background: none; cursor: pointer;">
        <i class="fa fa-times" aria-hidden="true"></i>
    </button>
</form>

            @else
                <a href="#" data-toggle="modal" data-target="#edit_holiday" class="action-icon edit-holiday"
                    data-id="{{ $holiday->id }}"
                    data-from_date="{{ $holiday->from_date }}"
                    data-to_date="{{ $holiday->to_date }}"
                    data-description="{{ $holiday->reason }}">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </a>
                <form action="{{ route('holiday.destroy', $holiday->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="action-icon" style="border: none; background: none; cursor: pointer;">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
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

<!-- Add Holiday Modal -->
<div id="add_holiday" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Request Holiday</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('holiday.store') }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                    <div class="form-group">
                        <label>Start Date <span class="text-danger">*</span></label>
                        <input id="from_date" class="form-control datetimepicker" name="from_date" type="text" required>
                    </div>

                    <div class="form-group">
                        <label>End Date <span class="text-danger">*</span></label>
                        <input id="to_date" class="form-control datetimepicker" name="to_date" type="text" required>
                    </div>



                    <div class="form-group">
                        <label>Reason</label>
                        <textarea class="form-control" name="reason" rows="4" placeholder="Add a Reason"></textarea>
                    </div>

                    <div class="submit-section text-center">
                        <button type="submit" class="btn btn-primary submit-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

 
        <!-- Edit Holiday Modal -->
<!-- Edit Holiday Modal -->
<div class="modal custom-modal fade" id="edit_holiday" tabindex="-1" role="dialog" aria-labelledby="editHolidayModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editHolidayModalLabel">Edit Holiday</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editholidayform" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_holiday_id" name="id">

                    <div class="form-group">
                        <label>Start Date <span class="text-danger">*</span></label>
                        <input class="form-control datetimepicker" id="edit_holiday_start_date" name="start_date" type="text" required>
                    </div>

                    <div class="form-group">
                        <label>End Date <span class="text-danger">*</span></label>
                        <input class="form-control datetimepicker" id="edit_holiday_end_date" name="end_date" type="text" required>
                    </div>

                    <div class="form-group">
                        <label>Reason</label>
                        <textarea class="form-control" id="edit_holiday_description" name="description" rows="4"></textarea>
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
    <!-- /Page Content -->
</div>
<!-- /Page Wrapper -->

<!-- jQuery for handling the modals -->
<script>
$(document).ready(function() {
    // Show reason in modal
    $('#reasonModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var description = button.data('description');
        var modal = $(this);
        modal.find('#modalDescription').text(description);
    });

    // Edit holiday
    $('#edit_holiday').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var from_date = button.data('from_date');
        var to_date = button.data('to_date');
        var description = button.data('description');
        var modal = $(this);

        console.log('Modal data:', {
            id: id,
            from_date: from_date,
            to_date: to_date,
            description: description
        });

        // Update the form action URL dynamically
        $('#editholidayform').attr('action', '/holiday/' + id);

        $('#edit_holiday_id').val(id);
        $('#edit_holiday_start_date').val(from_date);
        $('#edit_holiday_end_date').val(to_date);
        $('#edit_holiday_description').val(description);
    });
});


</script>
        <style>
            .user-img img {
    width: 35px; /* Adjust as needed */
    height: 30px; /* Adjust as needed */
    border-radius: 50%; /* Ensures the image is fully rounded */
    object-fit: cover; /* Maintains aspect ratio while covering the container */
}

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
    width: 80px;
}
.table th:nth-child(2), .table td:nth-child(3) { /* For Date Wish */
    width: 70px;
}
.table th:nth-child(3), .table td:nth-child(4) { /* For Date Wish */
    width: 80px;
}
.table th:nth-child(4), .table td:nth-child(5) { /* For Date Wish */
    width: 70px;
}

.table th:nth-child(5), .table td:nth-child(6) { /* For Description */
    width: 80px; /* Increase for longer descriptions */
}
.table th:nth-child(6), .table td:nth-child(7) { /* For Description */
    width: 60px; /* Increase for longer descriptions */
}
.table th:nth-child(7), .table td:nth-child(8) { /* For Description */
    width: 40px; /* Increase for longer descriptions */
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
.user-img img {
    width: 35px; /* Adjust as needed */
    height: 30px; /* Adjust as needed */
    border-radius: 50%; /* Ensures the image is fully rounded */
    object-fit: cover; /* Maintains aspect ratio while covering the container */
}
</style>
        <!-- Add Holiday Modal -->

 
        <!-- Edit Holiday Modal -->

    </div>
    <!-- /Page Content -->
</div>
<!-- /Page Wrapper -->
@endsection
