<div class="space-y-6 animate-in fade-in slide-in-from-right-4">
    <div>
        <h2 class="text-2xl font-bold text-zinc-900 dark:text-white">Packages & Services</h2>
        <p class="text-zinc-500">Install additional modules and integrations.</p>
    </div>

    <div class="space-y-3">
        <div class="p-4 rounded-xl border border-zinc-200 dark:border-zinc-800 flex items-start gap-4">
            <div class="pt-1"><flux:checkbox wire:model="install_firebase" /></div>
            <div>
                <h4 class="font-semibold">Firebase Integration</h4>
                <p class="text-xs text-zinc-500">Enable push notifications and realtime database features.</p>
            </div>
        </div>
        <div class="p-4 rounded-xl border border-zinc-200 dark:border-zinc-800 flex items-start gap-4">
            <div class="pt-1"><flux:checkbox wire:model="install_redis" /></div>
            <div>
                <h4 class="font-semibold">Redis Driver</h4>
                <p class="text-xs text-zinc-500">Switch cache, session, and queue drivers to Redis (Requires Redis server).</p>
            </div>
        </div>
        <div class="p-4 rounded-xl border border-zinc-200 dark:border-zinc-800 flex items-start gap-4">
            <div class="pt-1"><flux:checkbox wire:model="install_telescope" /></div>
            <div>
                <h4 class="font-semibold">Laravel Telescope</h4>
                <p class="text-xs text-zinc-500">Install debugging assistant for local development.</p>
            </div>
        </div>
    </div>

    <div class="pt-4 flex justify-end">
        <flux:button wire:click="save" variant="primary" :loading="$isProcessing">
            Install Selected <span class="iconify ml-2" data-icon="solar:box-minimalistic-linear"></span>
        </flux:button>
    </div>
</div>
