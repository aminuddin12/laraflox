<?php

use Flux\Flux;

?>

<x-layouts.auth>
    <div class="flex flex-col gap-6" x-data="{ recovery: false }">
        <x-auth-header :title="__('Two-factor confirmation')" :description="__('Please confirm access to your account by entering the authentication code provided by your authenticator application.')" />

        <div class="text-center text-sm text-zinc-500 dark:text-zinc-400" x-show="recovery" style="display: none;">
            {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
        </div>

        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('two-factor.login') }}" class="flex flex-col gap-6">
            @csrf

            <!-- Code -->
            <div x-show="! recovery">
                <flux:input
                    name="code"
                    :label="__('Code')"
                    type="text"
                    inputmode="numeric"
                    autofocus
                    x-ref="code"
                    autocomplete="one-time-code"
                    placeholder="XXX-XXX"
                    icon="shield-check"
                />
            </div>

            <!-- Recovery Code -->
            <div x-show="recovery" style="display: none;">
                <flux:input
                    name="recovery_code"
                    :label="__('Recovery Code')"
                    type="text"
                    x-ref="recovery_code"
                    autocomplete="one-time-code"
                    placeholder="abcdef-123456"
                    icon="key"
                />
            </div>

            <div class="flex items-center justify-end">
                <flux:button variant="primary" type="submit" class="w-full">
                    {{ __('Log in') }}
                </flux:button>
            </div>

            <button type="button" class="text-sm text-zinc-600 hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100 cursor-pointer transition-colors text-center"
                    x-on:click="recovery = ! recovery; $nextTick(() => { recovery ? $refs.recovery_code.focus() : $refs.code.focus() })">
                <span x-show="! recovery">{{ __('Use a recovery code') }}</span>
                <span x-show="recovery" style="display: none;">{{ __('Use an authentication code') }}</span>
            </button>
        </form>
    </div>
</x-layouts.auth>
