<?php

namespace App\Livewire\System;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use App\Startup\SystemCheck;

class Installer extends Component
{
    public $step = 1;

    public function mount()
    {
        if (SystemCheck::isInstalled()) {
            return redirect()->route('home');
        }

        if (session()->has('installer_step')) {
            $this->step = session('installer_step');
        }
    }

    #[On('next-step')]
    public function nextStep()
    {
        $this->step++;
        session(['installer_step' => $this->step]);
    }

    #[On('prev-step')]
    public function prevStep()
    {
        if ($this->step > 1) {
            $this->step--;
            session(['installer_step' => $this->step]);
        }
    }

    #[On('go-to-step')]
    public function goToStep($step)
    {
        $this->step = $step;
        session(['installer_step' => $this->step]);
    }

    public function render()
    {
        return view('livewire.system.installer')->layout('components.layouts.wizard');
    }
}
