<?php

namespace App\Livewire\System\Installer;

use Livewire\Component;
use App\Models\SiteSetting;

class SiteConfig extends Component
{
    public $app_name = 'Laraflox';
    public $app_url = 'http://localhost';
    public $app_env = 'local';
    public $app_debug = true;
    public $isProcessing = false;

    public function mount()
    {
        $this->app_name = config('app.name');
        $this->app_url = config('app.url');
    }

    public function save()
    {
        $this->validate([
            'app_name' => 'required|string',
            'app_url' => 'required|url',
        ]);

        $this->isProcessing = true;

        // Simpan ke session saja
        session([
            'installer_app_name' => $this->app_name,
            'installer_app_url' => $this->app_url,
            'installer_app_env' => $this->app_env,
            'installer_app_debug' => $this->app_debug,
        ]);

        sleep(1);
        $this->isProcessing = false;
        $this->dispatch('next-step');
    }

    public function render()
    {
        return view('livewire.system.installer.site-config');
    }
}
