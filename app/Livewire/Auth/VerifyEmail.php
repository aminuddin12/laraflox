<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('components.layouts.auth')]
class VerifyEmail extends Component
{
    public function mount()
    {
        // Jika user sudah terverifikasi, redirect ke dashboard
        if (Auth::check() && Auth::user()->email_verified_at) {
            return redirect()->intended(route('dashboard', absolute: false));
        }
    }

    public function sendVerification()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        if ($user->email_verified_at) {
            return redirect()->intended(route('dashboard', absolute: false));
        }

        if (method_exists($user, 'sendEmailVerificationNotification')) {
            $user->sendEmailVerificationNotification();
        }

        session()->flash('status', 'verification-link-sent');
    }

    public function logout()
    {
        Auth::guard('web')->logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect('/');
    }

    public function render()
    {
        return view('livewire.auth.verify-email');
    }
}
