@extends('layouts.settings')
@section('content')
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div class="sidebar-menu">
                <ul>
                    <li><a href="{{ route('home') }}"><i class="la la-home"></i> <span>Back to Home</span></a></li>
                    <li><a href="{{ route('company/settings/page') }}">advances</a></li>
                    <li><a href="{{ route('company/settings/page1') }}">holiday</a></li>
                    <li><a href="{{ route('company/settings/page2') }}">Epermission</a></li>
                    <li><a href="{{ route('company/settings/page3') }}">Dpermission</a></li>
                    <li><a href="{{ route('certificate.create') }}">certificate</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sidebar -->
    {{-- message --}}
    {!! Toastr::message() !!}
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="page-title">Certificate Demand</h3>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->
                    <form method="POST" action="{{ route('certificate.store') }}">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Type <span class="text-danger">*</span></label>
                                    <input class="form-control" name="type" type="text" required placeholder="Enter the type">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Issued For <span class="text-danger">*</span></label>
                                    <input class="form-control" name="issued_for" type="text" required placeholder="Enter the issued for">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Salary <span class="text-danger">*</span></label>
                                    <input class="form-control" name="salary" type="number" step="0.01" required placeholder="Enter the salary">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Department</label>
                                    <input class="form-control" name="department" type="text" value="{{ auth()->user()->department }}" disabled>
                                    <input class="form-control" name="department" type="hidden" value="{{ auth()->user()->department }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" rows="4" placeholder="Add a description"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="submit-section text-center">
                            <button type="submit" class="btn btn-primary submit-btn">Submit Request</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
    </div>
    <!-- /Page Wrapper -->
@endsection
