@extends('layouts.master')
@section('content')

<div class="sidebar" id="sidebar">

    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"><span>Main</span></li>

                <!-- Dashboard -->
                <li class="submenu">
                    <a href="#">
                        <i class="la la-dashboard"></i>
                        <span> Dashboard</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                            <li><a href="{{ route('home') }}">Admin Dashboard</a></li>
                            <li><a href="{{ route('em/dashboard') }}">Employee Dashboard</a></li>
                    </ul>
                </li>

                <!-- Employees -->
                <li class="menu-title"><span>Employees</span></li>
                <li class="submenu">
                    <a href="#" class="noti-dot">
                        <i class="la la-user"></i>
                        <span> Employees</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li><a href="{{ route('all/employee/card') }}">All Employees</a></li>
                        <li><a href="{{ route('form/holidays/new') }}">Holidays</a></li>
                        <li><a href="{{ route('form/leaves/new') }}">Leaves (Admin) <span class="badge badge-pill bg-primary float-right">1</span></a></li>
                        <li><a href="{{ route('form/leavesemployee/new') }}">Leaves (Employee)</a></li>
                        <li><a href="{{ route('form/leavesettings/page') }}">Leave Settings</a></li>
                        <li><a href="{{ route('attendance/page') }}">Attendance (Admin)</a></li>
                        <li><a href="{{ route('attendance/employee/page') }}">Attendance (Employee)</a></li>
                        <li><a href="departments.html">Departments</a></li>
                        <li><a href="designations.html">Designations</a></li>
                        <li><a href="timesheet.html">Timesheet</a></li>
                        <li><a href="shift-scheduling.html">Shift & Schedule</a></li>
                        <li><a href="overtime.html">Overtime</a></li>
                    </ul>
                </li>

                <!-- Sales (HR/Admin) -->
                <li class="menu-title"><span>HR</span></li>
                <li class="submenu">
                    <a href="#">
                        <i class="la la-files-o"></i>
                        <span> Sales </span> 
                        <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li><a href="estimates.html">Estimates</a></li>
                        <li><a href="{{ route('form/invoice/view/page') }}">Invoices</a></li>
                        <li><a href="payments.html">Payments</a></li>
                        <li><a href="expenses.html">Expenses</a></li>
                        <li><a href="provident-fund.html">Provident Fund</a></li>
                        <li><a href="taxes.html">Taxes</a></li>
                    </ul>
                </li>

                <!-- Payroll -->
                <li class="submenu">
                    <a href="#"><i class="la la-money"></i>
                        <span> Payroll </span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li><a href="{{ route('form/salary/page') }}"> Employee Salary </a></li>
                        <li><a href="{{ url('form/salary/view') }}"> Payslip </a></li>
                        <li><a href="{{ route('form/payroll/items') }}"> Payroll Items </a></li>
                    </ul>
                </li>

                <!-- Reports -->
                <li class="submenu">
                    <a href="#"><i class="la la-pie-chart"></i>
                        <span> Reports </span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li><a href="{{ route('form/expense/reports/page') }}"> Expense Report </a></li>
                        <li><a href="{{ route('form/invoice/reports/page') }}"> Invoice Report </a></li>
                        <li><a href="payments-reports.html"> Payments Report </a></li>
                        <li><a href="employee-reports.html"> Employee Report </a></li>
                        <li><a href="payslip-reports.html"> Payslip Report </a></li>
                        <li><a href="attendance-reports.html"> Attendance Report </a></li>
                        <li><a href="{{ route('form/leave/reports/page') }}"> Leave Report </a></li>
                        <li><a href="{{ route('form/daily/reports/page') }}"> Daily Report </a></li>
                    </ul>
                </li>

                <!-- Performance -->
                <li class="menu-title"> <span>Performance</span> </li>
                <li class="submenu">
                    <a href="#"><i class="la la-graduation-cap"></i>
                        <span> Performance </span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li><a href="{{ route('form/performance/indicator/page') }}"> Performance Indicator </a></li>
                        <li><a href="{{ route('form/performance/page') }}"> Performance Review </a></li>
                        <li><a href="{{ route('form/performance/appraisal/page') }}"> Performance Appraisal </a></li>
                    </ul>
                </li>

                <!-- Training -->
                <li class="submenu">
                    <a href="#"><i class="la la-edit"></i>
                        <span> Training </span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li><a href="{{ route('form/training/list/page') }}"> Training List </a></li>
                        <li><a href="{{ route('form/trainers/list/page') }}"> Trainers</a></li>
                        <li><a href="{{ route('form/training/type/list/page') }}"> Training Type </a></li>
                    </ul>
                </li>

                <!-- Administration -->
                <li class="menu-title"> <span>Administration</span> </li>
                <li> <a href="assets.html"><i class="la la-object-ungroup"></i> <span>Assets</span></a></li>
                <li class="submenu">
                    <a href="#"><i class="la la-briefcase"></i>
                        <span> Jobs </span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li><a href="user-dashboard.html"> User Dasboard </a></li>
                        <li><a href="jobs-dashboard.html"> Jobs Dasboard </a></li>
                        <li><a href="jobs.html"> Manage Jobs </a></li>
                        <li><a href="manage-resumes.html"> Manage Resumes </a></li>
                        <li><a href="shortlist-candidates.html"> Shortlist Candidates </a></li>
                        <li><a href="interview-questions.html"> Interview Questions </a></li>
                        <li><a href="offer_approvals.html"> Offer Approvals </a></li>
                        <li><a href="experiance-level.html"> Experience Level </a></li>
                        <li><a href="candidates.html"> Candidates List </a></li>
                        <li><a href="schedule-timing.html"> Schedule timing </a></li>
                        <li><a href="apptitude-result.html"> Aptitude Results </a></li>
                    </ul>
                </li>

                <!-- Admin Only -->
                <li class="submenu">
                    <a href="#"><i class="la la-cogs"></i>
                        <span> Settings </span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li><a href="general-settings.html"> General Settings </a></li>
                        <li><a href="custom-fields.html"> Custom Fields </a></li>
                        <li><a href="company-settings.html"> Company Settings </a></li>
                        <li><a href="taxes.html"> Taxes </a></li>
                        <li><a href="payment-methods.html"> Payment Methods </a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>



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
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_exit_demand"><i class="fa fa-plus"></i> Request Exit</a>
                </div>
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
                        <th>MD Status</th>
                        <th>HD Status</th>
                        <th>FD Status</th>
                        <th>Ch5 Status</th>
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
                                    @if($demand->status_MD)
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
                                    @if($demand->status_HD)
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
                                    @if($demand->status_FD)
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
                                    @if($demand->status_Ch5)
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
                                <input class="form-control" name="department" type="text" required>
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
        <div class="modal fade" id="edit_exit_demand" tabindex="-1" role="dialog" aria-labelledby="editExitDemandModalLabel" aria-hidden="true">
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
                        <input id="edit_department" class="form-control" name="department" type="text" required>
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
    width: 75px;
}
.table th:nth-child(3), .table td:nth-child(4) { /* For Date Wish */
    width: 75px;
}
.table th:nth-child(4), .table td:nth-child(5) { /* For Date Wish */
    width: 75px;
}

.table th:nth-child(5), .table td:nth-child(6) { /* For Description */
    width: 100px; /* Increase for longer descriptions */
}
.table th:nth-child(6), .table td:nth-child(7) { /* For Description */
    width: 100px; /* Increase for longer descriptions */
}
.table th:nth-child(7), .table td:nth-child(8) { /* For Description */
    width: 104px; /* Increase for longer descriptions */
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

    $('#reasonModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var description = button.data('description');
        
        var modal = $(this);
        modal.find('#modalDescription').text(description);
    });
});





</script>


@endsection
