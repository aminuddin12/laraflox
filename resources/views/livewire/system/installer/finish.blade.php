<div class="flex flex-col items-center justify-center h-full text-center space-y-8 animate-in zoom-in-95 fade-in duration-500">
    <div class="w-24 h-24 bg-gradient-to-tr from-green-400 to-emerald-600 text-white rounded-full flex items-center justify-center shadow-lg shadow-green-500/30">
        <span class="iconify text-5xl" data-icon="solar:confetti-minimalistic-bold-duotone"></span>
    </div>

    <div class="space-y-2">
        <h2 class="text-3xl font-bold text-zinc-900 dark:text-white">Setup Complete!</h2>
        <p class="text-zinc-500 max-w-md mx-auto">
            Laraflox has been successfully installed. You can now access your dashboard and start building.
        </p>
    </div>

    <div class="p-6 bg-zinc-50 dark:bg-zinc-800/50 rounded-2xl border border-dashed border-zinc-200 dark:border-zinc-700 w-full max-w-sm mx-auto">
        <h3 class="text-sm font-semibold text-zinc-900 dark:text-white mb-2">Login Credentials</h3>
        <div class="text-sm text-zinc-500 flex justify-between items-center py-1">
            <span>Email:</span>
            <span class="font-mono text-zinc-900 dark:text-zinc-300">{{ $admin_email }}</span>
        </div>
    </div>

    <flux:button wire:click="finish" class="!bg-indigo-600 hover:!bg-indigo-700 text-white !px-10 !py-4 !text-lg !rounded-full shadow-xl shadow-indigo-500/20">
        Launch Dashboard
    </flux:button>
</div>
