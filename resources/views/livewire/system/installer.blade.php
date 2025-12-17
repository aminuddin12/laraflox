<div class="relative w-full h-full flex items-center justify-center transition-all duration-700">

    @if($step === 1)
        <livewire:system.installer.splash />
    @else
        <div class="w-full max-w-6xl animate-in slide-in-from-bottom-8 fade-in duration-700">
            <div class="flex flex-col md:flex-row min-h-[650px] bg-white dark:bg-zinc-900 rounded-3xl shadow-2xl overflow-hidden border border-zinc-200 dark:border-zinc-800">

                <!-- Sidebar Navigation -->
                <div class="w-full md:w-80 bg-zinc-50 dark:bg-zinc-950 p-8 flex flex-col justify-between border-r border-zinc-100 dark:border-zinc-800">
                    <div>
                        <div class="flex items-center gap-3 mb-10">
                            <x-app-logo class="h-8 w-auto" />
                        </div>

                        <div class="space-y-1">
                            @foreach([2 => 'Requirements', 3 => 'Database', 4 => 'Configuration', 5 => 'Packages', 6 => 'Administrator', 7 => 'Finish'] as $s => $label)
                            <div class="flex items-center gap-3 p-2 rounded-lg transition-colors {{ $step == $s ? 'bg-white dark:bg-zinc-800 shadow-sm' : 'opacity-60' }}">
                                <div class="w-6 h-6 rounded-full flex items-center justify-center text-xs font-bold
                                    {{ $step > $s ? 'bg-green-500 text-white' : ($step == $s ? 'bg-indigo-600 text-white' : 'bg-zinc-200 dark:bg-zinc-800 text-zinc-500') }}">
                                    @if($step > $s) <span class="iconify" data-icon="solar:check-read-linear"></span> @else {{ $s - 1 }} @endif
                                </div>
                                <span class="text-sm font-medium {{ $step == $s ? 'text-zinc-900 dark:text-white' : 'text-zinc-500' }}">{{ $label }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="pt-6 border-t border-zinc-200 dark:border-zinc-800">
                        <div class="flex items-center gap-2 text-xs text-zinc-500">
                            <span class="iconify text-lg" data-icon="solar:shield-check-bold"></span>
                            <span>Secure Installer</span>
                        </div>
                    </div>
                </div>

                <!-- Dynamic Step Content -->
                <div class="flex-1 p-8 md:p-12 overflow-y-auto relative">
                    @switch($step)
                        @case(2) <livewire:system.installer.requirements /> @break
                        @case(3) <livewire:system.installer.database-setup /> @break
                        @case(4) <livewire:system.installer.site-config /> @break
                        @case(5) <livewire:system.installer.packages /> @break
                        @case(6) <livewire:system.installer.admin-account /> @break
                        @case(7) <livewire:system.installer.finish /> @break
                    @endswitch
                </div>
            </div>
        </div>
    @endif
</div>
