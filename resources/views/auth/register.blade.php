@extends('layouts.app')
@section('content')
    <div class="main-wrapper">
        <div class="account-content">
            <div class="container">
                <!-- Account Logo -->
                <div class="account-logo">
                    <a href="index.html"><img src="{{ URL::to('assets/img/photo_defaults.jpg') }}" alt="SoengSouy"></a>
                </div>
                <!-- /Account Logo -->
                <div class="account-box">
                    <div class="account-wrapper">
                        <h3 class="account-title">Register</h3>

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
    <div class="form-group text-center">
    <div class="profile-img-preview mb-3">
        <img id="profileImagePreview" src="#" alt="Profile Image Preview" class="img-thumbnail rounded-circle" style="max-width: 150px; display: none; width: 150px; height: 150px;">
    </div>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="profile_image" name="image" onchange="previewImage(event)">
        <label class="custom-file-label text-left" for="profile_image">Choose your profile picture</label>
    </div>
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
                                <select class="select @error('department') is-invalid @enderror" name="department" id="department" placeholder="-- Select Department --">
                                    @foreach ($department as $departments)
                                    <option value="{{ $departments->department }}">
                                        {{ $departments->department }}
                                    </option>
                                @endforeach
                                </select>
 
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
    <script>
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function() {
        const output = document.getElementById('profileImagePreview');
        output.src = reader.result;
        output.style.display = 'block';
    };
    reader.readAsDataURL(event.target.files[0]);
}

</script>
@endsection
