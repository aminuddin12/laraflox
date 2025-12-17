<div class="space-y-6 animate-in fade-in slide-in-from-right-4">
    <div>
        <h2 class="text-2xl font-bold text-zinc-900 dark:text-white">Super Admin</h2>
        <p class="text-zinc-500">Create the owner account for full access.</p>
    </div>

    @error('admin_creation')
        <div class="p-3 bg-red-50 text-red-600 text-sm rounded-lg">{{ $message }}</div>
    @enderror

    <div class="space-y-4">
        <flux:input wire:model="admin_name" label="Full Name" icon="user" />
        <flux:input wire:model="admin_email" label="Email Address" type="email" icon="envelope" />
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <flux:input wire:model="admin_password" label="Password" type="password" icon="lock-closed" viewable />
            <flux:input wire:model="admin_password_confirmation" label="Confirm Password" type="password" icon="lock-closed" />
        </div>
    </div>

    <div class="pt-4 flex justify-end">
        <flux:button wire:click="create" variant="primary" :loading="$isProcessing">
            Create Account <span class="iconify ml-2" data-icon="solar:user-plus-linear"></span>
        </flux:button>
    </div>
</div>
