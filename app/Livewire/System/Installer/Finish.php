<?php

namespace App\Livewire\System\Installer;

use Livewire\Component;
use App\Models\SiteSetting;
use App\Support\EnvEditor;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class Finish extends Component
{
    public $admin_email;
    public $isProcessing = false;

    public function mount()
    {
        $this->admin_email = session('admin_email_created', 'admin@example.com');
    }

    protected function reconnectDatabase()
    {
        if (session()->has('installer_db_host')) {
            $conn = session('installer_db_connection', 'mysql');

            // Konfigurasi koneksi spesifik yang dipilih user
            config([
                "database.connections.{$conn}.host" => session('installer_db_host'),
                "database.connections.{$conn}.port" => session('installer_db_port'),
                "database.connections.{$conn}.database" => session('installer_db_database'),
                "database.connections.{$conn}.username" => session('installer_db_username'),
                "database.connections.{$conn}.password" => session('installer_db_password'),
            ]);

            // PENTING: Set koneksi default aplikasi ke koneksi yang baru dikonfigurasi
            // Ini memastikan semua Model (User, Role, Permission) menggunakan koneksi yang benar saat seeding
            config(['database.default' => $conn]);

            DB::purge($conn);
            DB::reconnect($conn);
        }
    }

    public function finish()
    {
        $this->isProcessing = true;

        // 1. Setup Runtime Connection
        $this->reconnectDatabase();

        // 2. Tulis Konfigurasi Database ke .ENV (Persist)
        // Kita lakukan ini di awal agar jika terjadi error setelah ini, config DB setidaknya sudah tersimpan
        if (session()->has('installer_db_host')) {
            EnvEditor::updateKey('DB_CONNECTION', session('installer_db_connection'));
            EnvEditor::updateKey('DB_HOST', session('installer_db_host'));
            EnvEditor::updateKey('DB_PORT', session('installer_db_port'));
            EnvEditor::updateKey('DB_DATABASE', session('installer_db_database'));
            EnvEditor::updateKey('DB_USERNAME', session('installer_db_username'));
            EnvEditor::updateKey('DB_PASSWORD', session('installer_db_password'));
        }

        try {
            // 3. Bersihkan Cache Permission Spatie
            // Ini krusial karena Spatie sering men-cache struktur tabel, yang bisa menyebabkan error "table not found"
            // jika cache menunjuk ke tabel lama/tidak ada sebelum migrasi berjalan.
            app()[PermissionRegistrar::class]->forgetCachedPermissions();

            // 4. Jalankan Migrasi
            Artisan::call('migrate:fresh', ['--force' => true]);

            // Bersihkan cache lagi setelah migrasi untuk memastikan struktur baru terbaca
            app()[PermissionRegistrar::class]->forgetCachedPermissions();

            // 5. Jalankan Seeder
            Artisan::call('db:seed', ['--force' => true]);

            // 6. Buat Akun Admin (Jika belum dibuat oleh seeder atau perlu override)
            if (session()->has('installer_admin_email')) {
                // Buat Role super-admin jika entah kenapa belum ada
                if (!Role::where('name', 'super-admin')->exists()) {
                    Role::create(['name' => 'super-admin']);
                }

                $user = User::create([
                    'name' => session('installer_admin_name'),
                    'email' => session('installer_admin_email'),
                    'password' => Hash::make(session('installer_admin_password')),
                    'email_verified_at' => now(),
                ]);

                $user->assignRole('super-admin');
            }

            // 7. Tulis Konfigurasi Aplikasi ke .ENV
            try {
                if (session()->has('installer_app_name')) {
                     SiteSetting::updateOrCreate(['key' => 'site_name'], ['value' => session('installer_app_name')]);
                }
                $appName = SiteSetting::where('key', 'site_name')->value('value') ?? 'Laraflox';
            } catch (\Exception $e) { $appName = 'Laraflox'; }

            EnvEditor::updateKey('APP_NAME', $appName);

            if (session()->has('installer_app_url')) {
                EnvEditor::updateKey('APP_URL', session('installer_app_url'));
                EnvEditor::updateKey('APP_ENV', session('installer_app_env'));
                EnvEditor::updateKey('APP_DEBUG', session('installer_app_debug') ? 'true' : 'false');
            }

            // 8. Tulis Paket Config ke .ENV
            if (session('installer_install_redis')) {
                EnvEditor::updateKey('CACHE_STORE', 'redis');
                EnvEditor::updateKey('SESSION_DRIVER', 'redis');
                EnvEditor::updateKey('QUEUE_CONNECTION', 'redis');
            }

            // 9. Bersihkan Session & Cache
            session()->forget([
                'installer_step',
                'installer_db_connection', 'installer_db_host', 'installer_db_port',
                'installer_db_database', 'installer_db_username', 'installer_db_password',
                'installer_app_name', 'installer_app_url', 'installer_app_env', 'installer_app_debug',
                'installer_install_firebase', 'installer_install_redis', 'installer_install_telescope',
                'installer_admin_name', 'installer_admin_email', 'installer_admin_password',
                'admin_email_created'
            ]);

            Artisan::call('optimize:clear');

            return redirect()->route('login');

        } catch (\Exception $e) {
            $this->addError('finish_error', 'Installation failed: ' . $e->getMessage());
            $this->isProcessing = false;
        }
    }

    public function render()
    {
        return view('livewire.system.installer.finish');
    }
}
