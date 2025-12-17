<div class="space-y-6 animate-in fade-in slide-in-from-right-4">
    <div>
        <h2 class="text-2xl font-bold text-zinc-900 dark:text-white">Database Setup</h2>
        <p class="text-zinc-500">Configure your data storage connection.</p>
    </div>

    @error('db_connection')
        <div class="p-3 bg-red-50 text-red-600 text-sm rounded-lg flex items-center gap-2">
            <span class="iconify" data-icon="solar:danger-triangle-bold"></span> {{ $message }}
        </div>
    @enderror

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <flux:select wire:model="db_connection" label="Connection">
            <option value="mysql">MySQL</option>
            <option value="pgsql">PostgreSQL</option>
            <option value="sqlite">SQLite</option>
        </flux:select>
        <flux:input wire:model="db_host" label="Host" icon="server" />
        <flux:input wire:model="db_port" label="Port" />
        <flux:input wire:model="db_database" label="Database Name" icon="circle-stack" />
        <flux:input wire:model="db_username" label="Username" icon="user" />
        <flux:input wire:model="db_password" label="Password" type="password" icon="lock-closed" viewable />
    </div>

    <div class="pt-4 flex justify-end">
        <flux:button wire:click="connect" variant="primary" :loading="$isProcessing">
            Connect & Migrate <span class="iconify ml-2" data-icon="solar:arrow-right-linear"></span>
        </flux:button>
    </div>
</div>
