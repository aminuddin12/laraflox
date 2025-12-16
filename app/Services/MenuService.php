<?php

namespace App\Services;

use App\Models\MenuPermission;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class MenuService
{
    /**
     * Mendapatkan struktur menu sidebar untuk user yang sedang login.
     *
     * @return Collection
     */
    public function getSidebarMenu(): Collection
    {
        $user = Auth::user();

        if (!$user) {
            return collect([]);
        }

        // Ambil menu root yang aktif, beserta children-nya yang juga aktif
        $menus = MenuPermission::root()
            ->active()
            ->with(['children' => function ($query) {
                $query->active();
            }])
            ->get();

        // Filter menu berdasarkan permission user
        return $menus->filter(function ($menu) use ($user) {
            return $this->userCanAccessMenu($user, $menu);
        })->map(function ($menu) use ($user) {
            // Jika menu punya children, filter juga children-nya
            if ($menu->children->isNotEmpty()) {
                $filteredChildren = $menu->children->filter(function ($child) use ($user) {
                    return $this->userCanAccessMenu($user, $child);
                });

                // Set relation children dengan hasil filter
                $menu->setRelation('children', $filteredChildren);
            }

            return $menu;
        })->filter(function ($menu) {
            // Hapus menu parent jika semua children-nya terhapus (opsional, tergantung UX)
            // Misalnya: Menu "Settings" kosong karena user gak punya akses ke submenunya
            // Uncomment baris di bawah jika ingin behavior tersebut:
            // if ($menu->children()->exists() && $menu->children->isEmpty()) return false;

            return true;
        });
    }

    /**
     * Cek apakah user boleh melihat menu ini.
     */
    protected function userCanAccessMenu($user, MenuPermission $menu): bool
    {
        // 1. Jika menu tidak butuh permission khusus, boleh akses
        if (empty($menu->permission_name)) {
            return true;
        }

        // 2. Super admin bypass semua permission (opsional, sesuaikan nama role kamu)
        if ($user->hasRole('super-admin')) {
            return true;
        }

        // 3. Cek via Spatie Permission
        return $user->can($menu->permission_name);
    }
}
