<div class="space-y-6 animate-in fade-in slide-in-from-right-4">
    <div>
        <h2 class="text-2xl font-bold text-zinc-900 dark:text-white">Site Configuration</h2>
        <p class="text-zinc-500">Basic global settings for your application.</p>
    </div>

    <div class="space-y-4">
        <flux:input wire:model="app_name" label="Application Name" icon="tag" />
        <flux:input wire:model="app_url" label="Application URL" icon="link" />

        <div class="grid grid-cols-2 gap-4">
            <flux:select wire:model="app_env" label="Environment">
                <option value="local">Local (Development)</option>
                <option value="production">Production</option>
            </flux:select>

            <div class="mt-6">
                <flux:checkbox wire:model="app_debug" label="Enable Debug Mode" />
            </div>
        </div>
    </div>

    <div class="pt-4 flex justify-end">
        <flux:button wire:click="save" variant="primary" :loading="$isProcessing">
            Save Config <span class="iconify ml-2" data-icon="solar:disk-linear"></span>
        </flux:button>
    </div>
</div>
