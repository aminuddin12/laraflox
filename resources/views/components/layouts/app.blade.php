<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-zinc-50 dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100 antialiased">
        <x-layouts.app.sidebar />

        <flux:main>
            <x-layouts.app.header />

            {{ $slot }}
        </flux:main>

        @fluxScripts
    </body>
</html>
