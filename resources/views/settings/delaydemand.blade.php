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
                                <h3 class="page-title">Delay Permission Request</h3>
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
                                    <input class="form-control" name="exit_time" type="time" id="exit_time" required onchange="calculateHours()">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Return Time <span class="text-danger">*</span></label>
                                    <input class="form-control" name="return_time" type="time" id="return_time" required onchange="calculateHours()">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Number of Hours</label>
                                    <input class="form-control" id="number_of_hours" type="text" disabled>
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
    function calculateHours() {
        var exitTime = document.getElementById('exit_time').value;
        var returnTime = document.getElementById('return_time').value;

        if (exitTime && returnTime) {
            var exit = new Date('1970-01-01T' + exitTime + 'Z');
            var returnDate = new Date('1970-01-01T' + returnTime + 'Z');
            var difference = returnDate - exit;

            var hours = Math.floor(difference / (1000 * 3600));
            var minutes = Math.floor((difference % (1000 * 3600)) / (1000 * 60));

            document.getElementById('number_of_hours').value = `${hours} hours ${minutes} minutes`;
        } else {
            document.getElementById('number_of_hours').value = '0 hours 0 minutes';
        }
    }
</script>

@endsection
