<?php

namespace Database\Seeders;

use App\Models\MenuPermission;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class MenuPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Dashboard (Menu Utama, Semua yang login bisa lihat, atau batasi permission)
        MenuPermission::create([
            'name' => 'Dashboard',
            'route' => 'admin.dashboard',
            'icon' => 'home', // Sesuaikan dengan icon set kamu (misal: heroicons/solar)
            'order' => 1,
            'permission_name' => 'view dashboard', // Permission yang dibutuhkan
        ]);

        // 2. Group: Administrator (Parent Menu)
        $adminMenu = MenuPermission::create([
            'name' => 'Administrator',
            'icon' => 'shield-check',
            'order' => 99, // Taruh di bawah
            'permission_name' => 'access admin menu', // Hanya user dengan permission ini yang lihat group ini
        ]);

        // Pastikan permission ada
        $this->ensurePermissionExists('access admin menu');
        $this->ensurePermissionExists('manage users');
        $this->ensurePermissionExists('manage roles');
        $this->ensurePermissionExists('view system settings');

        // 2a. Submenu: User Management
        MenuPermission::create([
            'parent_id' => $adminMenu->id,
            'name' => 'Users',
            'route' => 'admin.users.index', // Pastikan route ini ada nanti
            'icon' => 'users',
            'order' => 1,
            'permission_name' => 'manage users',
        ]);

        // 2b. Submenu: Roles & Permissions
        MenuPermission::create([
            'parent_id' => $adminMenu->id,
            'name' => 'Roles',
            'route' => 'admin.roles.index',
            'icon' => 'lock-closed',
            'order' => 2,
            'permission_name' => 'manage roles',
        ]);

        // 2c. Submenu: Settings
        MenuPermission::create([
            'parent_id' => $adminMenu->id,
            'name' => 'Settings',
            'route' => 'admin.settings.index',
            'icon' => 'cog-6-tooth',
            'order' => 3,
            'permission_name' => 'view system settings',
        ]);

        // 3. Content (Contoh Group Lain)
        $contentMenu = MenuPermission::create([
            'name' => 'Content',
            'icon' => 'document-text',
            'order' => 10,
            'permission_name' => 'manage content',
        ]);

        MenuPermission::create([
            'parent_id' => $contentMenu->id,
            'name' => 'Articles',
            'route' => 'admin.articles.index',
            'icon' => 'pencil-square',
            'order' => 1,
            'permission_name' => 'manage articles',
        ]);
    }

    private function ensurePermissionExists($name)
    {
        if (!Permission::where('name', $name)->exists()) {
            Permission::create(['name' => $name]);
        }
    }
}
