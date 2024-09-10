@extends('layouts.app')
@section('content')
    <div class="main-wrapper">
        <div class="account-content">
            <div class="container">
                {{-- message --}}
                {!! Toastr::message() !!}
                <div class="account-box">
                    <div class="account-wrapper">
                    <div class="account-logo">
                    <img src="{{ URL::to('assets/img/hotel.png') }}" alt="Soeng Souy">
                </div>                        
                <p class="account-subtitle">welcome to our platform</p>

            <a href="{{ route('login') }}" class="btn btn-primary account-btn">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
