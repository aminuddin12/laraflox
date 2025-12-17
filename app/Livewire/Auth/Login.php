<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

#[Layout('components.layouts.auth')]
class Login extends Component
{
    #[Validate('required|email')]
    public $email = '';

    #[Validate('required')]
    public $password = '';

    public $remember = false;

    public function login()
    {
        $this->validate();

        $this->ensureIsNotRateLimited();

        // 1. Cari User Manual (Custom Backend)
        $user = User::where('email', $this->email)->first();

        // 2. Verifikasi Password
        if (! $user || ! Hash::check($this->password, $user->password)) {
            RateLimiter::hit($this->throttleKey());

            $this->addError('email', trans('auth.failed'));
            return;
        }

        // 3. Cek apakah User mengaktifkan 2FA
        if ($user->two_factor_secret && $user->two_factor_confirmed_at) {
            // Simpan ID sementara di session untuk diverifikasi di halaman 2FA
            session([
                'auth.login.id' => $user->id,
                'auth.login.remember' => $this->remember,
            ]);

            return redirect()->route('two-factor.login');
        }

        // 4. Login Sukses (Tanpa 2FA)
        Auth::login($user, $this->remember);
        RateLimiter::clear($this->throttleKey());
        session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }

    protected function ensureIsNotRateLimited()
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        $seconds = RateLimiter::availableIn($this->throttleKey());

        $this->addError('email', trans('auth.throttle', [
            'seconds' => $seconds,
            'minutes' => ceil($seconds / 60),
        ]));
    }

    protected function throttleKey()
    {
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
