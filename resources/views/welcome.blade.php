<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        @include('partials.head')
    </head>
    <body class="bg-white dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100 antialiased min-h-screen flex flex-col">

        <x-home.navbar />

        <main class="flex-grow">
            <!-- Hero Section (Placeholder) -->
            <section class="relative h-[500px] md:h-[600px] overflow-hidden flex items-center justify-center">
                <div class="absolute inset-0 bg-zinc-100 dark:bg-zinc-900">
                     <!-- Abstract Background Pattern -->
                     <div class="absolute inset-0 opacity-30 dark:opacity-20 bg-[radial-gradient(#4f46e5_1px,transparent_1px)] [background-size:16px_16px]"></div>
                </div>

                <div class="relative container mx-auto px-6 text-center max-w-4xl z-10">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 shadow-sm mb-6 animate-fade-in-up">
                        <span class="flex h-2 w-2 rounded-full bg-indigo-500 animate-pulse"></span>
                        <span class="text-xs font-medium text-zinc-600 dark:text-zinc-300">New Collection Spring 2025</span>
                    </div>

                    <h1 class="text-5xl md:text-7xl font-bold tracking-tight text-zinc-900 dark:text-white mb-6 leading-tight animate-fade-in-up delay-100">
                        Elevate Your <span class="text-indigo-600 dark:text-indigo-400">Style</span>
                        <br>
                        Redefine Your <span class="text-indigo-600 dark:text-indigo-400">Look</span>
                    </h1>

                    <p class="text-lg text-zinc-600 dark:text-zinc-400 mb-10 max-w-2xl mx-auto animate-fade-in-up delay-200">
                        Discover the latest trends in fashion and accessories. High-quality products designed to make you stand out from the crowd.
                    </p>

                    <div class="flex flex-col sm:flex-row items-center justify-center gap-4 animate-fade-in-up delay-300">
                        <flux:button variant="primary" class="!h-12 !px-8 !text-base shadow-lg shadow-indigo-500/20">Shop Collection</flux:button>
                        <flux:button variant="outline" class="!h-12 !px-8 !text-base bg-white/50 dark:bg-black/50 backdrop-blur-sm">View Lookbook</flux:button>
                    </div>
                </div>
            </section>

            <!-- Minimalist Featured Section -->
            <section class="py-24 container mx-auto px-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach([
                        ['title' => 'Minimalist Essentials', 'icon' => 'solar:t-shirt-linear'],
                        ['title' => 'Urban Accessories', 'icon' => 'solar:watch-square-linear'],
                        ['title' => 'Modern Footwear', 'icon' => 'solar:sneakers-linear']
                    ] as $feature)
                    <div class="group p-8 rounded-2xl bg-zinc-50 dark:bg-zinc-900 hover:bg-zinc-100 dark:hover:bg-zinc-800/80 transition-colors border border-transparent hover:border-zinc-200 dark:hover:border-zinc-700 cursor-pointer">
                        <div class="w-12 h-12 rounded-xl bg-white dark:bg-zinc-800 flex items-center justify-center text-zinc-900 dark:text-white shadow-sm mb-6 group-hover:scale-110 transition-transform duration-300">
                            <span class="iconify text-2xl" data-icon="{{ $feature['icon'] }}"></span>
                        </div>
                        <h3 class="text-xl font-bold text-zinc-900 dark:text-white mb-2">{{ $feature['title'] }}</h3>
                        <p class="text-zinc-500 dark:text-zinc-400 text-sm mb-4">Curated collection of high-quality items designed for everyday comfort.</p>
                        <span class="text-sm font-medium text-indigo-600 dark:text-indigo-400 flex items-center gap-1 group-hover:gap-2 transition-all">
                            Shop Now <span class="iconify" data-icon="solar:arrow-right-linear"></span>
                        </span>
                    </div>
                    @endforeach
                </div>
            </section>
        </main>

        <x-home.footer />

        @fluxScripts
        <style>
            .animate-fade-in-up {
                animation: fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
                opacity: 0;
            }
            .delay-100 { animation-delay: 0.1s; }
            .delay-200 { animation-delay: 0.2s; }
            .delay-300 { animation-delay: 0.3s; }

            @keyframes fadeInUp {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }
        </style>
    </body>
</html>
