<?php

namespace App\Startup;

use App\Models\User;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class SystemCheck
{
    public static function isInstalled(): bool
    {
        if (!file_exists(base_path('.env'))) {
            return false;
        }

        try {
            DB::connection()->getPdo();

            if (!Schema::hasTable('migrations')) {
                return false;
            }

            if (!Schema::hasTable('users')) {
                return false;
            }

            return User::role('super-admin')->exists();
        } catch (\Exception $e) {
            return false;
        }
    }

    public static function isMaintenanceMode(): bool
    {
        if (app()->isDownForMaintenance()) {
            return true;
        }

        try {
            if (class_exists(SiteSetting::class) && Schema::hasTable('site_settings')) {
                return SiteSetting::where('key', 'maintenance_mode_active')->value('value') === '1';
            }
        } catch (\Exception $e) {
            return false;
        }

        return false;
    }
}
