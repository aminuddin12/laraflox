<div class="space-y-6 animate-in fade-in slide-in-from-right-4">
    <div>
        <h2 class="text-2xl font-bold text-zinc-900 dark:text-white">System Requirements</h2>
        <p class="text-zinc-500">Checking server environment compatibility.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
        @foreach($requirements as $key => $req)
        <div class="flex items-center justify-between p-3 rounded-xl border {{ $req['status'] ? 'border-green-200 bg-green-50 dark:bg-green-900/10 dark:border-green-900' : 'border-red-200 bg-red-50 dark:bg-red-900/10 dark:border-red-900' }}">
            <span class="text-sm font-medium {{ $req['status'] ? 'text-green-700 dark:text-green-400' : 'text-red-700 dark:text-red-400' }}">{{ $req['label'] }}</span>
            <span class="iconify text-lg {{ $req['status'] ? 'text-green-600' : 'text-red-600' }}" data-icon="{{ $req['status'] ? 'solar:check-circle-bold' : 'solar:close-circle-bold' }}"></span>
        </div>
        @endforeach
    </div>

    <div class="pt-4 flex justify-end">
        <flux:button wire:click="next" variant="primary" :disabled="!$canProceed">
            Next Step <span class="iconify ml-2" data-icon="solar:arrow-right-linear"></span>
        </flux:button>
    </div>
</div>
