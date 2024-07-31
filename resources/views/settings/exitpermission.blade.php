@extends('layouts.settings')
@section('content')
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div class="sidebar-menu">
                <ul>
                    <li><a href="{{ route('home') }}"><i class="la la-home"></i> <span>Back to Home</span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sidebar -->
    
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
                                <h3 class="page-title">Exit Permission Request</h3>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->
                    <form method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Reason <span class="text-danger">*</span></label>
                                    <input class="form-control" name="reason" type="text" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Exit Time <span class="text-danger">*</span></label>
                                    <input class="form-control" name="exit_time" type="date" id="exit_time" required onchange="calculateDays()">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Return Time <span class="text-danger">*</span></label>
                                    <input class="form-control" name="return_time" type="date" id="return_time" required onchange="calculateDays()">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Number of Days</label>
                                    <input class="form-control" id="number_of_days" type="number" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Department</label>
                                    <input class="form-control" name="department" type="text" value="{{ auth()->user()->department }}" disabled>
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
    <script>
        function calculateDays() {
            var exitTime = document.getElementById('exit_time').value;
            var returnTime = document.getElementById('return_time').value;

            if (exitTime && returnTime) {
                var exit = new Date(exitTime);
                var returnDate = new Date(returnTime);
                var difference = (returnDate - exit) / (1000 * 3600 * 24);
                document.getElementById('number_of_days').value = difference >= 0 ? Math.ceil(difference) : 0;
            } else {
                document.getElementById('number_of_days').value = 0;
            }
        }
    </script>
@endsection
