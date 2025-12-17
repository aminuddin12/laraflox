<?php

namespace App\Livewire\System\Installer;

use Livewire\Component;

class Requirements extends Component
{
    public $requirements = [];
    public $canProceed = false;

    public function mount()
    {
        $this->checkRequirements();
    }

    public function checkRequirements()
    {
        $extensions = ['bcmath', 'ctype', 'fileinfo', 'json', 'mbstring', 'openssl', 'pdo', 'tokenizer', 'xml', 'curl'];

        $results = [
            'php' => [
                'label' => 'PHP >= 8.2',
                'status' => version_compare(PHP_VERSION, '8.2.0', '>='),
            ]
        ];

        foreach ($extensions as $ext) {
            $results[$ext] = [
                'label' => "Extension: " . strtoupper($ext),
                'status' => extension_loaded($ext),
            ];
        }

        $this->requirements = $results;
        $this->canProceed = !in_array(false, array_column($results, 'status'));
    }

    public function next()
    {
        if ($this->canProceed) {
            $this->dispatch('next-step');
        }
    }

    public function render()
    {
        return view('livewire.system.installer.requirements');
    }
}
