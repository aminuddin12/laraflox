<?php

use Illuminate\Support\Facades\Route;
use Flux\Flux;

?>

<x-layouts.auth>
    <div class="flex flex-col gap-6">
        <x-auth-header :title="__('Welcome back')" :description="__('Enter your email and password below to log in')" />

        <!-- Social Login -->
        <div class="grid grid-cols-2 gap-3">
            <flux:button variant="outline" class="w-full gap-2">
                <span class="iconify text-lg" data-icon="logos:google-icon"></span>
                Google
            </flux:button>
            <flux:button variant="outline" class="w-full gap-2">
                <span class="iconify text-lg dark:invert" data-icon="logos:github-icon"></span>
                GitHub
            </flux:button>
        </div>

        <!-- Divider -->
        <div class="relative flex items-center py-2">
            <div class="flex-grow border-t border-zinc-200 dark:border-zinc-700"></div>
            <span class="flex-shrink-0 mx-4 text-xs font-medium text-zinc-400 dark:text-zinc-500 uppercase tracking-wider">
                Or continue with
            </span>
            <div class="flex-grow border-t border-zinc-200 dark:border-zinc-700"></div>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-6">
            @csrf

            <!-- Email Address -->
            <flux:input
                name="email"
                :label="__('Email address')"
                :value="old('email')"
                type="email"
                required
                autofocus
                autocomplete="email"
                placeholder="email@example.com"
                icon="envelope"
            />

            <!-- Password -->
            <div class="relative">
                <flux:input
                    name="password"
                    :label="__('Password')"
                    type="password"
                    required
                    autocomplete="current-password"
                    :placeholder="__('Password')"
                    viewable
                    icon="lock-closed"
                />

                @if (Route::has('password.request'))
                    <flux:link class="absolute top-0 right-0 text-sm" :href="route('password.request')" wire:navigate>
                        {{ __('Forgot password?') }}
                    </flux:link>
                @endif
            </div>

            <!-- Remember Me -->
            <flux:checkbox name="remember" :label="__('Remember me')" :checked="old('remember')" />

            <div class="flex items-center justify-end">
                <flux:button variant="primary" type="submit" class="w-full" data-test="login-button">
                    {{ __('Log in') }}
                </flux:button>
            </div>
        </form>

        @if (Route::has('register'))
            <div class="text-center text-sm text-zinc-600 dark:text-zinc-400">
                {{ __('Don\'t have an account?') }}
                <flux:link :href="route('register')" class="font-semibold" wire:navigate>
                    {{ __('Sign up') }}
                </flux:link>
            </div>
        @endif
    </div>
</x-layouts.auth>
