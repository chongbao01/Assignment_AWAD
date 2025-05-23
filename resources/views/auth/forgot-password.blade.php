@extends('layouts.app')

@section('title', 'Forgot Password')

@section('styles')
    <link href="{{ asset('css/bidview.css') }}" rel="stylesheet">
@endsection

@section('content')
    <h1><strong>Reset Password (OTP)</strong></h1>

    <div class="form-container">
        <!-- Status Message -->
        @if (session('status'))
            <div style="color: green; margin-bottom: 20px;">
                {{ session('status') }}
            </div>
            <!-- Display OTP on the page -->
            @if (session('otp'))
                <div style="background-color: #dbeafe; color: #1e40af; padding: 10px; margin-bottom: 20px; border-radius: 5px;">
                    Your OTP: {{ session('otp') }}
                </div>
            @endif
        @endif

        <!-- Error Messages -->
        @if ($errors->any())
            <div style="color: red; margin-bottom: 20px;">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div style="margin-bottom: 20px; font-weight: medium; font-size: 14px; color: #4b5563;">
            Enter your email address to receive an OTP.
        </div>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <strong>Email Address:</strong><br>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus>
            <br><br>
            @error('email')
                <div style="color: red; font-size: 12px; margin-top: 5px;">
                    {{ $message }}
                </div>
                <br>
            @enderror

            <div class="form-footer">
                <button type="submit" class="form-btn">Send OTP</button>
                <a href="{{ route('login') }}" class="back-link">Back to Login</a>
            </div>
        </form>
    </div>

    <!-- Display OTP in Alert -->
    @if (session('otp'))
        <script>
            alert('Your OTP is: ' + @json(session('otp')));
        </script>
    @endif
@endsection