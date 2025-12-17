<div class="fixed inset-0 overflow-hidden bg-zinc-50 dark:bg-zinc-950 flex flex-col items-center justify-center"
     x-data="{ x: 0, y: 0 }"
     x-on:mousemove="x = ($event.clientX - window.innerWidth / 2) / 20; y = ($event.clientY - window.innerHeight / 2) / 20;">

    <div class="absolute inset-0 pointer-events-none opacity-30 dark:opacity-20">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-indigo-500/30 rounded-full blur-3xl transition-transform duration-100 ease-out"
             :style="`transform: translate(${x}px, ${y}px)`"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-pink-500/30 rounded-full blur-3xl transition-transform duration-100 ease-out"
             :style="`transform: translate(${-x}px, ${-y}px)`"></div>
    </div>

    <div class="relative z-10 text-center space-y-8 animate-in zoom-in-95 fade-in duration-1000">
        <div class="flex justify-center transform hover:scale-105 transition-transform duration-500">
            <x-app-logo class="h-24 w-auto" />
        </div>

        <div class="space-y-2">
            <h1 class="text-5xl md:text-6xl font-black tracking-tighter text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-pink-600 dark:from-indigo-400 dark:to-pink-400">
                Installation Wizard
            </h1>
            <p class="text-xl text-zinc-600 dark:text-zinc-400 font-light tracking-wide">
                Setup your enterprise environment in minutes.
            </p>
        </div>

        <div class="pt-8">
            <button wire:click="start" class="group relative px-8 py-4 bg-zinc-900 dark:bg-white text-white dark:text-zinc-900 rounded-full text-lg font-bold shadow-2xl hover:shadow-indigo-500/50 transition-all duration-300 overflow-hidden">
                <span class="relative z-10 flex items-center gap-2">
                    Start Installation
                    <span class="iconify group-hover:translate-x-1 transition-transform" data-icon="solar:arrow-right-linear"></span>
                </span>
                <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-purple-600 opacity-0 group-hover:opacity-10 transition-opacity duration-300"></div>
            </button>
        </div>
    </div>

    <div class="absolute bottom-10 text-xs text-zinc-400 font-mono animate-pulse">
        v1.0.0 &bull; Secure Environment
    </div>
</div>
