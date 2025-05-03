@extends('layouts.app')

@section('title', 'Verify OTP')

@section('styles')
    <link href="{{ asset('css/bidview.css') }}" rel="stylesheet">
@endsection

@section('content')
    <h1><strong>Verify OTP</strong></h1>

    <div class="form-container">
        <!-- Status Message -->
        @if ($showAlert)
            <script>
                alert("Your OTP is: {{ $otp }}");
            </script>
        @endif
        
        @if (session('status'))
            <div style="color: green; margin-bottom: 20px;">
                {{ session('status') }}
            </div>
        @endif

        <!-- Error Messages -->
        @if ($errors->any())
            <div style="color: red; margin-bottom: 20px;">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('password.otp.verify') }}">
            @csrf
            <strong>Enter OTP:</strong><br>
            <input type="text" name="otp" required>
            <br><br>
            @error('otp')
                <div style="color: red; font-size: 12px; margin-top: 5px;">
                    {{ $message }}
                </div>
                <br>
            @enderror

            <strong>New Password:</strong><br>
            <input type="password" name="password" required>
            <br><br>
            @error('password')
                <div style="color: red; font-size: 12px; margin-top: 5px;">
                    {{ $message }}
                </div>
                <br>
            @enderror

            <strong>Confirm Password:</strong><br>
            <input type="password" name="password_confirmation" required>
            <br><br>

            <div class="form-footer">
                <button type="submit" class="form-btn">Reset Password</button>
                <a href="{{ route('login') }}" class="back-link">Back to Login</a>
            </div>
        </form>
    </div>

   
@endsection