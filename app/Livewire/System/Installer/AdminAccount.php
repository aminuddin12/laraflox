<?php

namespace App\Livewire\System\Installer;

use Livewire\Component;

class AdminAccount extends Component
{
    public $admin_name = '';
    public $admin_email = '';
    public $admin_password = '';
    public $admin_password_confirmation = '';
    public $isProcessing = false;

    public function create()
    {
        $this->validate([
            'admin_name' => 'required|string|max:255',
            'admin_email' => 'required|email', // Hapus unique check karena tabel users blm ada/kosong
            'admin_password' => 'required|confirmed|min:8',
        ]);

        $this->isProcessing = true;

        // Simpan data admin ke session untuk dibuat nanti di step Finish
        session([
            'installer_admin_name' => $this->admin_name,
            'installer_admin_email' => $this->admin_email,
            'installer_admin_password' => $this->admin_password,
            'admin_email_created' => $this->admin_email // Untuk display di Finish screen
        ]);

        $this->isProcessing = false;
        $this->dispatch('next-step');
    }

    public function render()
    {
        return view('livewire.system.installer.admin-account');
    }
}
