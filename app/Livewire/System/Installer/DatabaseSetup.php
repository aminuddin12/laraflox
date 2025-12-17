<?php

namespace App\Livewire\System\Installer;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Artisan; // Hapus atau disable import ini

class DatabaseSetup extends Component
{
    public $db_connection = 'pgsql';
    public $db_host = '127.0.0.1';
    public $db_port = '5433';
    public $db_database = 'laravel';
    public $db_username = 'root';
    public $db_password = '';
    public $isProcessing = false;

    public function mount()
    {
        // Isi default dari session jika user kembali dari step lain
        $this->db_connection = session('installer_db_connection', 'pgsql');
        $this->db_host = session('installer_db_host', '127.0.0.1');
        $this->db_port = session('installer_db_port', '5433');
        $this->db_database = session('installer_db_database', 'laravel');
        $this->db_username = session('installer_db_username', 'root');
        $this->db_password = session('installer_db_password', '');
    }

    public function connect()
    {
        $this->validate([
            'db_host' => 'required',
            'db_port' => 'required',
            'db_database' => 'required',
            'db_username' => 'required',
            'db_password' => '',
        ]);

        $this->isProcessing = true;

        try {
            // 1. Konfigurasi Runtime (Hanya di memori, tidak tulis .env)
            $this->applyDbConfig();

            // 2. Test Koneksi SAJA (Cukup cek PDO)
            // Jangan jalankan migrate:fresh di sini karena bisa bikin session expired (419)
            // Migrasi dipindah ke langkah Finish.
            DB::connection()->getPdo();

            // 3. Simpan kredensial ke Session untuk step berikutnya
            session([
                'installer_db_connection' => $this->db_connection,
                'installer_db_host' => $this->db_host,
                'installer_db_port' => $this->db_port,
                'installer_db_database' => $this->db_database,
                'installer_db_username' => $this->db_username,
                'installer_db_password' => $this->db_password,
            ]);

            $this->isProcessing = false;
            $this->dispatch('next-step');

        } catch (\Exception $e) {
            $this->addError('db_connection', 'Connection failed: ' . $e->getMessage());
            $this->isProcessing = false;
        }
    }

    protected function applyDbConfig()
    {
        // Setup config runtime agar Laravel tahu koneksi baru
        config([
            "database.connections.{$this->db_connection}.host" => $this->db_host,
            "database.connections.{$this->db_connection}.port" => $this->db_port,
            "database.connections.{$this->db_connection}.database" => $this->db_database,
            "database.connections.{$this->db_connection}.username" => $this->db_username,
            "database.connections.{$this->db_connection}.password" => $this->db_password,
        ]);

        // Paksa reconnect dengan config baru
        DB::purge($this->db_connection);
        DB::reconnect($this->db_connection);
    }

    public function render()
    {
        return view('livewire.system.installer.database-setup');
    }
}
