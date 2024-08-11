@extends('layouts.app')
@section('content')
    <div class="main-wrapper">
        <div class="account-content">
            <div class="container">
                <!-- Account Logo -->
                <div class="account-logo">
                    <a href="index.html"><img src="{{ URL::to('assets/img/logo2.png') }}" alt="SoengSouy"></a>
                </div>
                <!-- /Account Logo -->
                <div class="account-box">
                    <div class="account-wrapper">
                        <h3 class="account-title">Register</h3>
                        <p class="account-subtitle">Access to our dashboard</p>

                        <!-- Account Form -->
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter Your Name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter Your Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Profile Photo Upload -->
                            <div class="form-group">
                                <label>Profile Photo</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Phone Number Field -->
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Enter Your Phone Number">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Department Dropdown -->
                            <div class="form-group">
                                <label class="col-form-label">Department</label>
                                <select class="select @error('department') is-invalid @enderror" name="department" id="department">
                                    <option selected disabled>-- Select Department --</option>
                                    <option value="HR">HR</option>
                                    <option value="Finance">Finance</option>
                                    <option value="Development">Development</option>
                                    <option value="Sales">Sales</option>
                                </select>
                                @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Salary Field -->
                            <div class="form-group">
                                <label>Salary</label>
                                <input type="number" step="0.01" class="form-control @error('salary') is-invalid @enderror" name="salary" placeholder="Enter Your Salary">
                                @error('salary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Role (Hidden, Default to Employee) -->
                            <input type="hidden" name="role_name" value="Employee">

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label><strong>Repeat Password</strong></label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Repeat Password">
                            </div>

                            <div class="form-group text-center">
                                <button class="btn btn-primary account-btn" type="submit">Register</button>
                            </div>

                            <div class="account-footer">
                                <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
                            </div>
                        </form>
                        <!-- /Account Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
