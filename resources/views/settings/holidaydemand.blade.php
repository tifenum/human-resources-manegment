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
                                    <h3 class="page-title">Holiday Request</h3>
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
                                        <label>Type <span class="text-danger">*</span></label>
                                        <select class="form-control" name="type" required>
                                            <option value="">Select Type</option>
                                            <option value="medical">Medical</option>
                                            <option value="personal">Personal</option>
                                            <option value="vacation">Vacation</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>From Date <span class="text-danger">*</span></label>
                                        <input class="form-control" name="from_date" type="date" id="from_date" required onchange="calculateDays()">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>To Date <span class="text-danger">*</span></label>
                                        <input class="form-control" name="to_date" type="date" id="to_date" required onchange="calculateDays()">
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
        <script>
            function calculateDays() {
                var fromDate = document.getElementById('from_date').value;
                var toDate = document.getElementById('to_date').value;

                if (fromDate && toDate) {
                    var from = new Date(fromDate);
                    var to = new Date(toDate);
                    var difference = (to - from) / (1000 * 3600 * 24);
                    document.getElementById('number_of_days').value = difference >= 0 ? difference + 1 : 0;
                } else {
                    document.getElementById('number_of_days').value = 0;
                }
            }
        </script>
    @endsection

