<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Google2FA\Google2FA;

#[Layout('components.layouts.auth')]
class TwoFactorChallenge extends Component
{
    public $code = '';
    public $recovery_code = '';
    public $recovery = false; // Mode toggle: TOTP code vs Recovery code

    public function mount()
    {
        // Pastikan ada user yang sedang dalam proses login (dari step login sebelumnya)
        if (! session()->has('auth.login.id')) {
            return redirect()->route('login');
        }
    }

    public function login()
    {
        $user = User::find(session('auth.login.id'));

        if (! $user) {
            return redirect()->route('login');
        }

        // A. Verifikasi Recovery Code
        if ($this->recovery) {
            $this->validate(['recovery_code' => 'required|string']);

            $recoveryCodes = json_decode(decrypt($user->two_factor_recovery_codes), true);

            if (($key = array_search($this->recovery_code, $recoveryCodes)) !== false) {
                // Hapus kode yang sudah dipakai
                unset($recoveryCodes[$key]);
                $user->forceFill([
                    'two_factor_recovery_codes' => encrypt(json_encode(array_values($recoveryCodes))),
                ])->save();

                $this->authenticate($user);
                return;
            }

            $this->addError('recovery_code', __('The provided recovery code was invalid.'));
            return;
        }

        // B. Verifikasi TOTP Code (Google Authenticator)
        $this->validate(['code' => 'required|string']);

        $google2fa = new Google2FA();
        $secret = decrypt($user->two_factor_secret);

        // Gunakan window 1 (toleransi waktu 30 detik sebelum/sesudah)
        $valid = $google2fa->verifyKey($secret, $this->code, 1);

        if ($valid) {
            $this->authenticate($user);
            return;
        }

        $this->addError('code', __('The provided two factor code was invalid.'));
    }

    protected function authenticate($user)
    {
        $remember = session('auth.login.remember', false);

        Auth::login($user, $remember);

        // Bersihkan session sementara
        session()->forget(['auth.login.id', 'auth.login.remember']);
        session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }

    public function render()
    {
        return view('livewire.auth.two-factor-challenge');
    }
}
