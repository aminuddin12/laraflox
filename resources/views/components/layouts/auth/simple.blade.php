<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
        <style>
            /* Custom Animation Fallback */
            @keyframes fadeInUp {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .animate-enter {
                animation: fadeInUp 0.7s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            }
        </style>
    </head>
    <body class="min-h-screen bg-zinc-50 dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100 antialiased">
        <div class="flex min-h-svh flex-col items-center justify-center p-6 md:p-10">
            <!-- Container Utama dengan Animasi -->
            <div class="w-full max-w-sm space-y-8 animate-enter opacity-0">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex flex-col items-center gap-2" wire:navigate>
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-zinc-900 text-white dark:bg-white dark:text-black shadow-lg">
                         <span class="iconify text-2xl" data-icon="solar:bolt-bold-duotone"></span>
                    </div>
                    <span class="text-xl font-bold tracking-tight text-zinc-900 dark:text-zinc-100">{{ config('app.name', 'Laravel') }}</span>
                </a>

                <!-- Slot Konten (Login/Register Form) -->
                <!-- Perbaikan: Tambahkan dark:bg-zinc-900 dan border yang sesuai -->
                <div class="bg-white dark:bg-zinc-900/50 backdrop-blur-xl rounded-2xl border border-zinc-200 dark:border-zinc-800 p-8 shadow-sm">
                    {{ $slot }}
                </div>
            </div>
        </div>
        @fluxScripts
    </body>
</html>
