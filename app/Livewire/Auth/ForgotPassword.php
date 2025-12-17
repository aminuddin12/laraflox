<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Password;

#[Layout('components.layouts.auth')]
class ForgotPassword extends Component
{
    #[Validate('required|email')]
    public $email = '';

    public function sendPasswordResetLink()
    {
        $this->validate();

        // Mengirim link reset password menggunakan broker default Laravel
        $status = Password::sendResetLink(['email' => $this->email]);

        if ($status === Password::RESET_LINK_SENT) {
            session()->flash('status', __($status));
            // Opsi: kosongkan email agar user tidak spam
            $this->email = '';
        } else {
            $this->addError('email', __($status));
        }
    }

    public function render()
    {
        return view('livewire.auth.forgot-password');
    }
}
