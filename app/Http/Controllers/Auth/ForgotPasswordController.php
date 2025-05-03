<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Log;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */


    public function showLinkRequestForm()
    {
        // Clear any existing OTP and reset_email from the session
        session()->forget(['otp', 'reset_email']);
        return view('auth.forgot-password');
    }

    // // use SendsPasswordResetEmails;
    // public function sendResetLinkEmail(Request $request)
    // {
    //     $request->validate([
    //         'email' => ['required', 'email', 'exists:authors,email'],
    //     ]);

    //     // Generate OTP
    //     $otp = rand(100000, 999999);

    //     // Store in session (or DB if needed)
    //     session(['otp' => $otp, 'reset_email' => $request->email]);
    //     return redirect()->route('password.otp') 
    //     ->with('status', 'OTP generated successfully');
        
    // }
    // public function showOtpForm()
    // {
    //     Log::info('Session data in showOtpForm:', session()->all());
    //     return view('auth.verify-otp');
    // }

    /**
     * Handle OTP verification and password update.
     */
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => ['required', 'numeric'],
            'password' => ['required', 'confirmed', Password::min(6)],
        ]);

        if ($request->otp != session('otp')) {
            return back()->withErrors(['otp' => 'Invalid OTP.']);
        }

        DB::table('authors')
            ->where('email', session('reset_email'))
            ->update([
                'password' => Hash::make($request->password),
            ]);

        session()->forget(['otp', 'reset_email']);

        return redirect()->route('login')->with('status', 'Password has been reset.');
    }

    // use SendsPasswordResetEmails;
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:authors,email'],
        ]);

        // Generate OTP
        $otp = rand(100000, 999999);

        // Store in session (or DB if needed)
        session(['otp' => $otp, 'reset_email' => $request->email]);
        session()->flash('show_otp_alert', true); //show otp alert for the first attempt
        return redirect()->route('password.otp') 
        ->with('status', 'OTP generated successfully');
        
    }
    public function showOtpForm()
    {
        Log::info('Session data in showOtpForm:', session()->all());

        //Send OTP only if this is the first time (after redirect)
        $showAlert = session('show_otp_alert', false);
        $otp = session('otp');

        return view('auth.verify-otp', compact('showAlert', 'otp'));
    }
}
