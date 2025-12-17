<?php

namespace App\Livewire\System\Installer;

use Livewire\Component;

class Splash extends Component
{
    public function start()
    {
        $this->dispatch('next-step');
    }

    public function render()
    {
        return view('livewire.system.installer.splash');
    }
}
