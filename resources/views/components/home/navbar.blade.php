@props(['active' => ''])

<nav class="w-full bg-white dark:bg-zinc-950 border-b border-zinc-200 dark:border-zinc-800 transition-colors duration-300 sticky top-0 z-50">
    <!-- Top Nav -->
    <div class="hidden md:flex items-center justify-between px-6 py-1.5 bg-zinc-100 dark:bg-zinc-900 text-[11px] font-medium border-b border-zinc-200 dark:border-zinc-800">
        <div class="flex-1">
            <a href="#" class="group flex items-center gap-1 text-zinc-600 dark:text-zinc-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                <span class="iconify" data-icon="solar:smartphone-2-linear"></span>
                <span>Download App</span>
                <span class="opacity-0 -translate-x-1 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-300">&gt;</span>
            </a>
        </div>

        <div class="flex-1 flex justify-center overflow-hidden h-4">
            <div class="animate-swipe-up flex flex-col items-center">
                <a href="#" class="h-4 flex items-center gap-1.5 text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white">
                    <span class="px-1.5 py-0.5 rounded-full bg-indigo-100 dark:bg-indigo-900/50 text-indigo-600 dark:text-indigo-400 text-[9px] font-bold uppercase tracking-wider">New</span>
                    <span>Big Sale up to 50% Off! Shop Now</span>
                </a>
                <a href="#" class="h-4 flex items-center gap-1.5 text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white">
                    <span class="px-1.5 py-0.5 rounded-full bg-emerald-100 dark:bg-emerald-900/50 text-emerald-600 dark:text-emerald-400 text-[9px] font-bold uppercase tracking-wider">Promo</span>
                    <span>Free Shipping on all orders over $50</span>
                </a>
            </div>
        </div>

        <div class="flex-1 flex justify-end items-center gap-4 text-zinc-500 dark:text-zinc-400">
            <a href="#" class="hover:text-zinc-900 dark:hover:text-white transition-colors">Term & Condition</a>
            <a href="#" class="hover:text-zinc-900 dark:hover:text-white transition-colors">About Us</a>

            <flux:dropdown>
                <flux:button variant="ghost" size="xs" class="!text-[11px] !h-auto !px-0 gap-1 font-medium hover:text-zinc-900 dark:hover:text-white">
                    <span class="iconify text-sm" data-icon="circle-flags:us"></span>
                    Language
                </flux:button>
                <flux:menu>
                    <flux:menu.item>
                        <span class="flex items-center gap-2">
                            <span class="iconify" data-icon="circle-flags:us"></span> English
                        </span>
                    </flux:menu.item>
                    <flux:menu.item>
                        <span class="flex items-center gap-2">
                            <span class="iconify" data-icon="circle-flags:id"></span> Indonesia
                        </span>
                    </flux:menu.item>
                </flux:menu>
            </flux:dropdown>

            <flux:dropdown>
                <flux:button variant="ghost" size="xs" class="!text-[11px] !h-auto !px-0 gap-1 font-medium hover:text-zinc-900 dark:hover:text-white">
                    <span class="iconify text-sm" data-icon="solar:moon-stars-bold-duotone"></span>
                    Theme
                </flux:button>
                <flux:menu>
                    <flux:menu.item x-on:click="$flux.appearance = 'light'">
                        <span class="flex items-center gap-2">
                            <span class="iconify" data-icon="solar:sun-2-bold-duotone"></span> Light
                        </span>
                    </flux:menu.item>
                    <flux:menu.item x-on:click="$flux.appearance = 'dark'">
                        <span class="flex items-center gap-2">
                            <span class="iconify" data-icon="solar:moon-stars-bold-duotone"></span> Dark
                        </span>
                    </flux:menu.item>
                    <flux:menu.item x-on:click="$flux.appearance = 'system'">
                        <span class="flex items-center gap-2">
                            <span class="iconify" data-icon="solar:laptop-3-bold-duotone"></span> System
                        </span>
                    </flux:menu.item>
                </flux:menu>
            </flux:dropdown>
        </div>
    </div>

    <!-- Center Nav -->
    <div class="px-6 py-4 flex items-center justify-between gap-8">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex items-center gap-2 flex-shrink-0" wire:navigate>
            <div class="w-10 h-10 bg-zinc-900 dark:bg-white text-white dark:text-zinc-900 rounded-xl flex items-center justify-center shadow-lg shadow-zinc-200 dark:shadow-none">
                <span class="iconify text-2xl" data-icon="solar:bolt-bold-duotone"></span>
            </div>
            <div class="flex flex-col">
                <span class="font-bold text-lg leading-none tracking-tight text-zinc-900 dark:text-white">{{ config('app.name') }}</span>
                <span class="text-[10px] font-medium text-zinc-500 tracking-wide">STORE</span>
            </div>
        </a>

        <!-- Search -->
        <div class="flex-1 max-w-2xl hidden md:block">
            <flux:modal.trigger name="search-modal">
                <button type="button" class="w-full h-11 px-4 rounded-xl bg-zinc-50 dark:bg-zinc-900/50 border border-zinc-200 dark:border-zinc-800 text-zinc-400 flex items-center justify-between hover:border-zinc-300 dark:hover:border-zinc-700 hover:bg-white dark:hover:bg-zinc-900 transition-all group shadow-sm">
                    <div class="flex items-center gap-3">
                        <span class="iconify text-lg text-zinc-400 group-hover:text-zinc-600 dark:group-hover:text-zinc-300 transition-colors" data-icon="solar:magnifer-linear"></span>
                        <span class="text-sm">Search for products, brands and more...</span>
                    </div>
                    <div class="flex items-center gap-1">
                        <kbd class="hidden sm:inline-flex h-5 items-center gap-1 rounded border border-zinc-200 dark:border-zinc-700 bg-zinc-100 dark:bg-zinc-800 px-1.5 font-mono text-[10px] font-medium text-zinc-500 dark:text-zinc-400 opacity-100">
                            <span class="text-xs">⌘</span>K
                        </kbd>
                    </div>
                </button>
            </flux:modal.trigger>
        </div>

        <!-- Icons -->
        <div class="flex items-center gap-1">
            <div class="relative group">
                <flux:button variant="ghost" class="!w-10 !h-10 !rounded-full !px-0">
                    <span class="iconify text-xl text-zinc-600 dark:text-zinc-400 group-hover:text-zinc-900 dark:group-hover:text-white transition-colors" data-icon="solar:cart-large-2-linear"></span>
                </flux:button>
                <div class="absolute right-0 top-full pt-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 transform translate-y-2 group-hover:translate-y-0">
                    <div class="w-72 bg-white dark:bg-zinc-900 rounded-xl border border-zinc-200 dark:border-zinc-800 shadow-xl p-4">
                        <p class="text-sm font-medium text-zinc-900 dark:text-white mb-2">Shopping Cart</p>
                        <div class="text-center py-6 text-zinc-400 text-xs">Your cart is empty</div>
                    </div>
                </div>
            </div>

            <div class="relative group">
                <flux:button variant="ghost" class="!w-10 !h-10 !rounded-full !px-0">
                    <span class="iconify text-xl text-zinc-600 dark:text-zinc-400 group-hover:text-zinc-900 dark:group-hover:text-white transition-colors" data-icon="solar:bell-linear"></span>
                    <span class="absolute top-2 right-2.5 w-2 h-2 bg-red-500 rounded-full border border-white dark:border-zinc-950"></span>
                </flux:button>
                <div class="absolute right-0 top-full pt-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 transform translate-y-2 group-hover:translate-y-0">
                    <div class="w-80 bg-white dark:bg-zinc-900 rounded-xl border border-zinc-200 dark:border-zinc-800 shadow-xl p-4">
                        <div class="flex items-center justify-between mb-3">
                            <p class="text-sm font-medium text-zinc-900 dark:text-white">Notifications</p>
                            <span class="text-[10px] text-indigo-500 cursor-pointer">Mark all read</span>
                        </div>
                        <div class="space-y-3">
                            <div class="flex gap-3">
                                <div class="w-8 h-8 rounded-full bg-indigo-50 dark:bg-indigo-900/30 flex items-center justify-center text-indigo-600 dark:text-indigo-400 shrink-0">
                                    <span class="iconify" data-icon="solar:sale-linear"></span>
                                </div>
                                <div>
                                    <p class="text-xs font-medium text-zinc-800 dark:text-zinc-200">Big Sale Started!</p>
                                    <p class="text-[10px] text-zinc-500">Up to 50% off on selected items.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative group">
                <a href="{{ route('login') }}" class="block">
                    <flux:button variant="ghost" class="!w-10 !h-10 !rounded-full !px-0">
                        <span class="iconify text-xl text-zinc-600 dark:text-zinc-400 group-hover:text-zinc-900 dark:group-hover:text-white transition-colors" data-icon="solar:user-circle-linear"></span>
                    </flux:button>
                </a>
                <div class="absolute right-0 top-full pt-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 transform translate-y-2 group-hover:translate-y-0">
                    <div class="w-48 bg-white dark:bg-zinc-900 rounded-xl border border-zinc-200 dark:border-zinc-800 shadow-xl py-1 overflow-hidden">
                        @auth
                            <div class="px-4 py-3 border-b border-zinc-100 dark:border-zinc-800">
                                <p class="text-sm font-medium text-zinc-900 dark:text-white truncate">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-zinc-500 truncate">{{ auth()->user()->email }}</p>
                            </div>
                            <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-zinc-700 dark:text-zinc-300 hover:bg-zinc-50 dark:hover:bg-zinc-800">Dashboard</a>
                            <a href="#" class="block px-4 py-2 text-sm text-zinc-700 dark:text-zinc-300 hover:bg-zinc-50 dark:hover:bg-zinc-800">Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20">Sign out</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-zinc-700 dark:text-zinc-300 hover:bg-zinc-50 dark:hover:bg-zinc-800">Log In</a>
                            <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-zinc-700 dark:text-zinc-300 hover:bg-zinc-50 dark:hover:bg-zinc-800">Create Account</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Nav -->
    <div class="hidden md:flex justify-center border-t border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-950">
        <div class="flex items-center gap-8 px-6 overflow-x-auto no-scrollbar">
            @foreach(['New Arrivals', 'Trending', 'Men', 'Women', 'Kids', 'Accessories', 'Sportswear', 'Electronics', 'Home & Living', 'Beauty'] as $item)
                <a href="#" class="py-3 text-[13px] font-medium text-zinc-600 dark:text-zinc-400 hover:text-indigo-600 dark:hover:text-indigo-400 border-b-2 border-transparent hover:border-indigo-600 dark:hover:border-indigo-400 transition-all whitespace-nowrap">
                    {{ $item }}
                </a>
            @endforeach
            <a href="#" class="py-3 text-[13px] font-medium text-red-500 hover:text-red-600 flex items-center gap-1 whitespace-nowrap">
                <span class="iconify" data-icon="solar:fire-bold"></span> Sale
            </a>
        </div>
    </div>
</nav>

<!-- Search Modal -->
<flux:modal name="search-modal" class="md:w-full md:max-w-2xl !bg-transparent !shadow-none !border-none !p-0 backdrop-blur-sm">
    <div class="bg-white dark:bg-zinc-900 rounded-2xl shadow-2xl overflow-hidden border border-zinc-200 dark:border-zinc-800 w-full max-w-2xl mx-auto mt-[10vh]">
        <div class="relative border-b border-zinc-200 dark:border-zinc-800">
            <span class="absolute left-4 top-4 text-zinc-400">
                <span class="iconify text-xl" data-icon="solar:magnifer-linear"></span>
            </span>
            <input type="text" placeholder="Search products, categories, etc..." class="w-full h-14 pl-12 pr-4 bg-transparent border-none outline-none text-zinc-900 dark:text-white placeholder-zinc-400 text-base" autofocus>
            <div class="absolute right-3 top-3">
                <div class="px-2 py-1 rounded border border-zinc-200 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-800 text-[10px] text-zinc-400 font-mono">ESC</div>
            </div>
        </div>
        <div class="p-4">
            <div class="text-xs font-semibold text-zinc-500 dark:text-zinc-400 uppercase tracking-wider mb-3 px-2">Recent Searches</div>
            <div class="space-y-1">
                <button class="w-full flex items-center justify-between px-3 py-2 rounded-lg hover:bg-zinc-100 dark:hover:bg-zinc-800 group transition-colors">
                    <div class="flex items-center gap-3 text-zinc-600 dark:text-zinc-300">
                        <span class="iconify text-zinc-400" data-icon="solar:history-linear"></span>
                        <span>Wireless Headphones</span>
                    </div>
                    <span class="iconify text-zinc-400 opacity-0 group-hover:opacity-100" data-icon="solar:arrow-right-up-linear"></span>
                </button>
                <button class="w-full flex items-center justify-between px-3 py-2 rounded-lg hover:bg-zinc-100 dark:hover:bg-zinc-800 group transition-colors">
                    <div class="flex items-center gap-3 text-zinc-600 dark:text-zinc-300">
                        <span class="iconify text-zinc-400" data-icon="solar:history-linear"></span>
                        <span>Nike Air Max</span>
                    </div>
                    <span class="iconify text-zinc-400 opacity-0 group-hover:opacity-100" data-icon="solar:arrow-right-up-linear"></span>
                </button>
            </div>

            <div class="mt-6 text-xs font-semibold text-zinc-500 dark:text-zinc-400 uppercase tracking-wider mb-3 px-2">Popular</div>
            <div class="flex flex-wrap gap-2 px-2">
                <a href="#" class="px-3 py-1.5 rounded-full bg-zinc-100 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-300 text-sm hover:bg-indigo-50 dark:hover:bg-indigo-900/30 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">iPhone 15 Case</a>
                <a href="#" class="px-3 py-1.5 rounded-full bg-zinc-100 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-300 text-sm hover:bg-indigo-50 dark:hover:bg-indigo-900/30 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Gaming Chair</a>
                <a href="#" class="px-3 py-1.5 rounded-full bg-zinc-100 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-300 text-sm hover:bg-indigo-50 dark:hover:bg-indigo-900/30 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Mechanical Keyboard</a>
            </div>
        </div>
        <div class="bg-zinc-50 dark:bg-zinc-800/50 px-4 py-3 border-t border-zinc-200 dark:border-zinc-800 flex items-center justify-between text-xs text-zinc-500">
            <span>Search by <strong class="text-indigo-500">Algolia</strong></span>
            <div class="flex gap-4">
                <span class="flex items-center gap-1"><kbd class="font-mono bg-zinc-200 dark:bg-zinc-700 px-1 rounded">↑↓</kbd> Navigate</span>
                <span class="flex items-center gap-1"><kbd class="font-mono bg-zinc-200 dark:bg-zinc-700 px-1 rounded">↵</kbd> Select</span>
            </div>
        </div>
    </div>
</flux:modal>

<style>
@keyframes swipeUp {
    0%, 45% { transform: translateY(0); opacity: 1; }
    50%, 95% { transform: translateY(-100%); opacity: 0; } /* Text 1 Out, Text 2 In logic needs absolute overlap or simple container scroll. Using simple scroll logic below */
    100% { transform: translateY(-200%); }
}
/* Simplified visual loop for demo */
@keyframes textSlide {
    0%, 45% { transform: translateY(0); }
    50%, 95% { transform: translateY(-1rem); }
    100% { transform: translateY(0); } /* Reset for loop */
}
.animate-swipe-up {
    animation: textSlide 8s cubic-bezier(0.4, 0, 0.2, 1) infinite;
}
</style>
