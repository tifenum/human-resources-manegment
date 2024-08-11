
@extends('layouts.master')
@section('content')
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                @if (Auth::user()->role_name=='Admin')
                    <li class="menu-title">
                        <span>Main</span>
                    </li>
                    <li class="submenu">
                        <a href="#" class="noti-dot">
                            <i class="la la-dashboard"></i>
                            <span> Dashboard</span> <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: block;">
                            <li><a class="active" href="{{ route('home') }}">Admin Dashboard</a></li>
                            <li><a href="{{ route('em/dashboard') }}">Employee Dashboard</a></li>
                        </ul>
                    </li>
                        <li class="menu-title"> <span>Authentication</span> </li>
                        <li class="submenu">
                            <a href="#">
                                <i class="la la-user-secret"></i> <span> User Controller</span> <span class="menu-arrow"></span>
                            </a>
                            <ul style="display: block;">
                                <li><a href="{{ route('userManagement') }}">All User</a></li>
                                <li><a href="{{ route('activity/log') }}">Activity Log</a></li>
                                <li><a href="{{ route('activity/login/logout') }}">Activity User</a></li>
                            </ul>
                        </li>
                    <li class="menu-title"> <span>Employees</span> </li>
                    <li class="submenu">
                        <a href="#">
                            <i class="la la-user"></i> <span> Employees</span> <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: block;">
                            <li><a href="{{ route('all/employee/card') }}">All Employees</a></li>
                            <li><a href="{{ route('form/holidays/new') }}">Holidays</a></li>
                            <li><a href="{{ route('form/leaves/new') }}">Leaves (Admin) 
                                <span class="badge badge-pill bg-primary float-right">1</span></a>
                            </li>
                            <li><a href="{{route('form/leavesemployee/new')}}">Leaves (Employee)</a></li>
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
                    <li class="menu-title"> <span>HR</span> </li>
                    <li class="submenu">
                        <a href="#">
                            <i class="la la-files-o"></i>
                            <span> Sales </span> 
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: block;">
                            <li><a href="estimates.html">Estimates</a></li>
                            <li><a href="{{ route('form/invoice/view/page') }}">Invoices</a></li>
                            <li><a href="payments.html">Payments</a></li>
                            <li><a href="expenses.html">Expenses</a></li>
                            <li><a href="provident-fund.html">Provident Fund</a></li>
                            <li><a href="taxes.html">Taxes</a></li>
                        </ul>
                    </li>
                    <li class="submenu"> <a href="#"><i class="la la-money"></i>
                        <span> Payroll </span> <span class="menu-arrow"></span></a>
                        <ul style="display: block;">
                            <li><a href="{{ route('form/salary/page') }}"> Employee Salary </a></li>
                            <li><a href="{{ url('form/salary/view') }}"> Payslip </a></li>
                            <li><a href="{{ route('form/payroll/items') }}"> Payroll Items </a></li>
                        </ul>
                    </li>
                    <li class="submenu"> <a href="#"><i class="la la-pie-chart"></i>
                        <span> Reports </span> <span class="menu-arrow"></span></a>
                        <ul style="display: block;">
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
                    <li class="menu-title"> <span>Performance</span> </li>
                    <li class="submenu"> <a href="#"><i class="la la-graduation-cap"></i>
                        <span> Performance </span> <span class="menu-arrow"></span></a>
                        <ul style="display: block;">
                            <li><a href="{{ route('form/performance/indicator/page') }}"> Performance Indicator </a></li>
                            <li><a href="{{ route('form/performance/page') }}"> Performance Review </a></li>
                            <li><a href="{{ route('form/performance/appraisal/page') }}"> Performance Appraisal </a></li>
                        </ul>
                    </li>
                    <li class="submenu"> <a href="#"><i class="la la-edit"></i>
                        <span> Training </span> <span class="menu-arrow"></span></a>
                        <ul style="display: block;">
                            <li><a href="{{ route('form/training/list/page') }}"> Training List </a></li>
                            <li><a href="{{ route('form/trainers/list/page') }}"> Trainers</a></li>
                            <li><a href="{{ route('form/training/type/list/page') }}"> Training Type </a></li>
                        </ul>
                    </li>
                    <li class="menu-title"> <span>Administration</span> </li>
                    <li> <a href="assets.html"><i class="la la-object-ungroup">
                        </i> <span>Assets</span></a>
                    </li>
                    <li class="submenu"> <a href="#"><i class="la la-briefcase"></i>
                        <span> Jobs </span> <span class="menu-arrow"></span></a>
                        <ul style="display: block;">
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
                    @elseif (Auth::user()->role_name=='Employee')
                    <li class="menu-title"> <span>main</span> </li>
                    <li class="submenu">
                        <a href="#">
                            <i class="la la-files-o"></i>
                            <span> Demands </span> 
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: block;">
                        <li><a href="{{ route('all/employee/card') }}">Demand Advance</a></li>
                            <li><a href="{{ route('company/settings/page1') }}">Demand Holiday</a></li>
                            <li><a href="{{ route('company/settings/page2') }}">Exit Permission</a></li>
                            <li><a href="{{ route('company/settings/page3') }}">Delay Permission</a></li>
                            <li><a href="{{ route('company/settings/page4') }}">Demand Certificate</a></li>
                        </ul>
                    </li>
                    <li class="menu-title"> <span>Pages</span> </li>
                    <li class="submenu"> <a href="#"><i class="la la-user"></i>
                        <span> Profile </span> <span class="menu-arrow"></span></a>
                        <ul style="display: block;">
                            <li><a href="profile.html"> Employee Profile </a></li>
                        </ul>
                    </li>
                    @elseif (Auth::user()->role_name=='Head of department')
                    <li class="menu-title"> <span>main</span> </li>
                    <li class="submenu">
                        <a href="#">
                            <i class="la la-files-o"></i>
                            <span>advances demands Demands </span> 
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: block;">
                        <li><a href="{{ route('all/employee/card') }}">Demand Advance</a></li>
                            <li><a href="{{ route('company/settings/page1') }}">Demand Holiday</a></li>
                            <li><a href="{{ route('company/settings/page2') }}">Exit Permission</a></li>
                            <li><a href="{{ route('company/settings/page3') }}">Delay Permission</a></li>
                            <li><a href="{{ route('company/settings/page4') }}">Demand Certificate</a></li>

                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#">
                            <i class="la la-files-o"></i>
                            <span> consult retard demands </span> 
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: block;">
                        <li><a href="{{ route('all/employee/card') }}">Demand Advance</a></li>
                            <li><a href="{{ route('company/settings/page1') }}">Demand Holiday</a></li>
                            <li><a href="{{ route('company/settings/page2') }}">Exit Permission</a></li>
                            <li><a href="{{ route('company/settings/page3') }}">Delay Permission</a></li>
                            <li><a href="{{ route('company/settings/page4') }}">Demand Certificate</a></li>

                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#">
                            <i class="la la-files-o"></i>
                            <span> consult permission de sortie </span> 
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: block;">
                        <li><a href="{{ route('all/employee/card') }}">Demand Advance</a></li>
                            <li><a href="{{ route('company/settings/page1') }}">Demand Holiday</a></li>
                            <li><a href="{{ route('company/settings/page2') }}">Exit Permission</a></li>
                            <li><a href="{{ route('company/settings/page3') }}">Delay Permission</a></li>
                            <li><a href="{{ route('company/settings/page4') }}">Demand Certificate</a></li>

                        </ul>
                    </li>
                    <li class="menu-title"> <span>Pages</span> </li>
                    <li class="submenu"> <a href="#"><i class="la la-user"></i>
                        <span> Profile </span> <span class="menu-arrow"></span></a>
                        <ul style="display: block;">
                            <li><a href="profile.html"> Employee Profile </a></li>
                        </ul>
                    </li>
                    @elseif (Auth::user()->role_name=='Chief of staff')
                    <li class="menu-title"> <span>main</span> </li>
                    <li class="submenu">
                        <a href="#">
                            <i class="la la-files-o"></i>
                            <span> consult certificates </span> 
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: block;">
                        <li><a href="{{ route('all/employee/card') }}">Demand Advance</a></li>
                            <li><a href="{{ route('company/settings/page1') }}">Demand Holiday</a></li>
                            <li><a href="{{ route('company/settings/page2') }}">Exit Permission</a></li>
                            <li><a href="{{ route('company/settings/page3') }}">Delay Permission</a></li>
                            <li><a href="{{ route('company/settings/page4') }}">Demand Certificate</a></li>

                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#">
                            <i class="la la-files-o"></i>
                            <span> consult retard demands</span> 
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: block;">
                        <li><a href="{{ route('all/employee/card') }}">Demand Advance</a></li>
                            <li><a href="{{ route('company/settings/page1') }}">Demand Holiday</a></li>
                            <li><a href="{{ route('company/settings/page2') }}">Exit Permission</a></li>
                            <li><a href="{{ route('company/settings/page3') }}">Delay Permission</a></li>
                            <li><a href="{{ route('company/settings/page4') }}">Demand Certificate</a></li>

                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#">
                            <i class="la la-files-o"></i>
                            <span> consult advances demands </span> 
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: block;">
                        <li><a href="{{ route('all/employee/card') }}">Demand Advance</a></li>
                            <li><a href="{{ route('company/settings/page1') }}">Demand Holiday</a></li>
                            <li><a href="{{ route('company/settings/page2') }}">Exit Permission</a></li>
                            <li><a href="{{ route('company/settings/page3') }}">Delay Permission</a></li>
                            <li><a href="{{ route('company/settings/page4') }}">Demand Certificate</a></li>

                        </ul>
                    </li>
                    <li class="menu-title"> <span>Pages</span> </li>
                    <li class="submenu"> <a href="#"><i class="la la-user"></i>
                        <span> Profile </span> <span class="menu-arrow"></span></a>
                        <ul style="display: block;">
                            <li><a href="profile.html"> Employee Profile </a></li>
                        </ul>
                    </li>
                    @elseif (Auth::user()->role_name=='Financial director')
                    <li class="menu-title"> <span>main</span> </li>
                    <li class="submenu">
                        <a href="#">
                            <i class="la la-files-o"></i>
                            <span>consult advance demands</span> 
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: block;">
                        <li><a href="{{ route('all/employee/card') }}">Demand Advance</a></li>
                            <li><a href="{{ route('company/settings/page1') }}">Demand Holiday</a></li>
                            <li><a href="{{ route('company/settings/page2') }}">Exit Permission</a></li>
                            <li><a href="{{ route('company/settings/page3') }}">Delay Permission</a></li>
                            <li><a href="{{ route('company/settings/page4') }}">Demand Certificate</a></li>

                        </ul>
                    </li>
                    <li class="menu-title"> <span>Pages</span> </li>
                    <li class="submenu"> <a href="#"><i class="la la-user"></i>
                        <span> Profile </span> <span class="menu-arrow"></span></a>
                        <ul style="display: block;">
                            <li><a href="profile.html"> Employee Profile </a></li>
                        </ul>
                    </li>
                    @elseif (Auth::user()->role_name=='Manager director')
                    <li class="menu-title"> <span>main</span> </li>
                    <li class="submenu">
                        <a href="#">
                            <i class="la la-files-o"></i>
                            <span>consult advances Demands </span> 
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: block;">
                        <li><a href="{{ route('all/employee/card') }}">Demand Advance</a></li>
                            <li><a href="{{ route('company/settings/page1') }}">Demand Holiday</a></li>
                            <li><a href="{{ route('company/settings/page2') }}">Exit Permission</a></li>
                            <li><a href="{{ route('company/settings/page3') }}">Delay Permission</a></li>
                            <li><a href="{{ route('company/settings/page4') }}">Demand Certificate</a></li>

                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#">
                            <i class="la la-files-o"></i>
                            <span> consult conges demands </span> 
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: block;">
                        <li><a href="{{ route('all/employee/card') }}">Demand Advance</a></li>
                            <li><a href="{{ route('company/settings/page1') }}">Demand Holiday</a></li>
                            <li><a href="{{ route('company/settings/page2') }}">Exit Permission</a></li>
                            <li><a href="{{ route('company/settings/page3') }}">Delay Permission</a></li>
                            <li><a href="{{ route('company/settings/page4') }}">Demand Certificate</a></li>

                        </ul>
                    </li>
                    <li class="menu-title"> <span>Pages</span> </li>
                    <li class="submenu"> <a href="#"><i class="la la-user"></i>
                        <span> Profile </span> <span class="menu-arrow"></span></a>
                        <ul style="display: block;">
                            <li><a href="profile.html"> Employee Profile </a></li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
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
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_advance"><i class="fa fa-plus"></i> Request Advance</a>
                    </div>
                </div>
            </div>
            
            <!-- Leave Statistics -->
            <div class="row">
                <div class="col-md-3">
                    <div class="stats-info">
                        <h6>Annual Leave</h6>
                        <h4>12</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-info">
                        <h6>Medical Leave</h6>
                        <h4>3</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-info">
                        <h6>Other Leave</h6>
                        <h4>4</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-info">
                        <h6>Remaining Leave</h6>
                        <h4>5</h4>
                    </div>
                </div>
            </div>
            <!-- /Leave Statistics -->
            
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
                    <th>Dept Head</th>
                    <th>Fin Director</th>
                    <th>Mngr Director</th>
                    <th>status</th>
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
                                @if($advance->chief_staff_status)
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
                                @if($advance->head_department_status)
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
                                @if($advance->financial_director_status)
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
                                @if($advance->manager_director_status)
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
                    @if(auth()->user()->role_name == 'Employee')
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
                                    <input class="form-control datetimepicker" type="text" name="date_wish">
                                </div>                    </div>

                    <div class="form-group">
                        <label>Department</label>
                        <input class="form-control" name="department" type="text" value="{{ auth()->user()->department }}" disabled>
                        <input type="hidden" name="department" value="{{ auth()->user()->department }}">
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

<!-- Edit Advance Modal -->
<!-- Edit Advance Modal -->
<div class="modal fade" id="edit_advance" tabindex="-1" role="dialog" aria-labelledby="editAdvanceModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
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
                        <label for="edit_amount">Amount</label>
                        <input type="text" class="form-control" id="edit_amount" name="amount" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_date_wish">Date</label>
                        <input type="text" class="form-control" id="edit_date_wish" name="date_wish" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_department">Department</label>
                        <input type="text" class="form-control" id="edit_department" name="department" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_description">Reason</label>
                        <textarea class="form-control" id="edit_description" name="description" required></textarea>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
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
