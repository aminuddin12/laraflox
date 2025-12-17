<?php

namespace App\Livewire\System\Installer;

use Livewire\Component;

class Packages extends Component
{
    public $install_firebase = false;
    public $install_redis = false;
    public $install_telescope = false;
    public $isProcessing = false;

    public function save()
    {
        $this->isProcessing = true;

        session([
            'installer_install_firebase' => $this->install_firebase,
            'installer_install_redis' => $this->install_redis,
            'installer_install_telescope' => $this->install_telescope,
        ]);

        sleep(1);
        $this->isProcessing = false;
        $this->dispatch('next-step');
    }

    public function render()
    {
        return view('livewire.system.installer.packages');
    }
}
