<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Support\EnvEditor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    /**
     * Menampilkan halaman settings dikelompokkan per group.
     */
    public function index()
    {
        // Mengelompokkan setting berdasarkan 'group' untuk ditampilkan di Tabs
        $settings = SiteSetting::all()->groupBy('group');

        // Urutan tab yang diinginkan
        $groups = ['general', 'contact', 'social', 'seo', 'system'];

        return view('admin.settings.index', compact('settings', 'groups'));
    }

    /**
     * Update settings (Bulk Update).
     */
    public function update(Request $request)
    {
        // Data input dari form
        $inputs = $request->except(['_token', '_method']);

        foreach ($inputs as $key => $value) {
            $setting = SiteSetting::where('key', $key)->first();

            if (!$setting) {
                continue;
            }

            // Handle File Upload (Logo, Favicon)
            if ($request->hasFile($key)) {
                // Hapus file lama jika ada
                if ($setting->value && Storage::disk('public')->exists($setting->value)) {
                    Storage::disk('public')->delete($setting->value);
                }

                // Upload baru
                $path = $request->file($key)->store('settings', 'public');
                $setting->value = $path;
            }
            // Handle Text/Boolean/Lainnya
            else {
                // Jangan update jika ini input file tapi kosong (artinya user tidak ganti gambar)
                if ($setting->type === 'file') {
                    continue;
                }
                $setting->value = $value;
            }

            $setting->save();

            // Sync ke .env jika diperlukan
            if ($setting->sync_env && $setting->env_key) {
                EnvEditor::updateKey($setting->env_key, $setting->value);
            }
        }

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}
