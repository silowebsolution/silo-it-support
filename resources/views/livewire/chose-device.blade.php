@php
    $androidLink = $mobileApp?->android ?: $mobileApp?->apk;
    $iosLink = $mobileApp?->ios;
@endphp

<div class="min-h-screen bg-slate-50 py-16 text-slate-900 dark:bg-slate-950 dark:text-slate-100">
    <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-sky-500">Mobile Access</p>
            <h1 class="mt-3 text-3xl font-semibold sm:text-4xl">{{ __('Choose your device') }}</h1>
            <p class="mt-3 text-sm text-slate-600 dark:text-slate-300">
                {{ __('Scan the QR code or tap the button to install the Silo IT Support mobile app on your preferred platform.') }}
            </p>
            <a href="{{ route('demo-page') }}" class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-slate-600 underline-offset-4 hover:text-slate-900 dark:text-slate-300 dark:hover:text-white">
                &larr; {{ __('Back to demo page') }}
            </a>
            @if($sessionMessage)
                <div class="mt-5 rounded-2xl border border-sky-200/80 bg-sky-50/80 px-4 py-3 text-sm font-semibold text-sky-700 dark:border-sky-500/30 dark:bg-sky-500/10 dark:text-sky-200">
                    {{ $sessionMessage }}
                </div>
            @endif
        </div>

        <div class="mt-10 grid gap-6 md:grid-cols-2">
            <div class="rounded-2xl border border-white/40 bg-white/90 p-6 text-center shadow-lg backdrop-blur dark:border-white/10 dark:bg-white/5">
                <div class="flex items-center justify-center gap-3 text-emerald-500">
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.788 5.108a.75.75 0 0 0-1.314-.723l-.21.381A7.938 7.938 0 0 0 12 3.25a7.938 7.938 0 0 0-4.264 1.516l-.21-.38a.75.75 0 0 0-1.314.723l.23.42A7.965 7.965 0 0 0 3.25 12v5.5c0 .69.56 1.25 1.25 1.25H6.5v2a.75.75 0 0 0 1.5 0v-2h8v2a.75.75 0 0 0 1.5 0v-2h2c.69 0 1.25-.56 1.25-1.25V12a7.965 7.965 0 0 0-2.962-6.472l.23-.42Z"/></svg>
                    <span class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-500">{{ __('Android') }}</span>
                </div>
                <p class="mt-3 text-base font-semibold text-slate-900 dark:text-white">Google Play / APK</p>
                @if($androidLink)
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data={{ urlencode($androidLink) }}" alt="Android QR" class="mx-auto mt-6 h-40 w-40 rounded-2xl border border-slate-200/80 bg-white p-4 shadow-inner dark:border-white/10 dark:bg-white/5">
                    <a href="{{ $androidLink }}" target="_blank" rel="noopener noreferrer"
                       class="mt-5 inline-flex items-center gap-2 rounded-2xl bg-gradient-to-r from-emerald-500 to-teal-400 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-emerald-500/30 transition hover:brightness-110">
                        <span class="text-lg">⬇</span>
                        {{ __('Download build') }}
                    </a>
                    @if($mobileApp?->version)
                        <p class="mt-3 text-xs font-semibold text-slate-500">{{ __('Version') }} {{ $mobileApp->version }}</p>
                    @endif
                @else
                    <div class="mx-auto mt-6 flex h-40 w-40 items-center justify-center rounded-2xl border border-dashed border-slate-300 text-xs text-slate-500 dark:border-white/20 dark:text-slate-300">
                        {{ __('Android build unavailable') }}
                    </div>
                    <p class="mt-3 text-xs font-semibold text-amber-500">{{ __('Check back soon for Android access.') }}</p>
                @endif
            </div>

            <div class="rounded-2xl border border-white/40 bg-slate-900/90 p-6 text-center text-white shadow-lg backdrop-blur dark:border-white/10">
                <div class="flex items-center justify-center gap-3 text-indigo-200">
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M16.365 1.43A5.485 5.485 0 0 1 12.166 4.5a5.477 5.477 0 0 1-4.306-3.06A5.497 5.497 0 0 0 6.5 4.5c0 5.133 3.667 9.935 5.833 9.935C14.5 14.435 18.167 9.633 18.167 4.5a5.5 5.5 0 0 0-1.802-3.07Z"/></svg>
                    <span class="text-xs font-semibold uppercase tracking-[0.3em]">{{ __('iOS') }}</span>
                </div>
                <p class="mt-3 text-base font-semibold">TestFlight / App Store</p>
                @if($iosLink)
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data={{ urlencode($iosLink) }}" alt="iOS QR" class="mx-auto mt-6 h-40 w-40 rounded-2xl border border-white/40 bg-white/10 p-4 shadow-inner">
                    <a href="{{ $iosLink }}" target="_blank" rel="noopener noreferrer"
                       class="mt-5 inline-flex items-center gap-2 rounded-2xl bg-white/15 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-900/40 transition hover:bg-white/25">
                        <span class="text-lg">⬇</span>
                        {{ __('Open TestFlight / App Store') }}
                    </a>
                    @if($mobileApp?->version)
                        <p class="mt-3 text-xs font-semibold text-indigo-200">{{ __('Version') }} {{ $mobileApp->version }}</p>
                    @endif
                @else
                    <div class="mx-auto mt-6 flex h-40 w-40 items-center justify-center rounded-2xl border border-dashed border-white/40 text-xs text-indigo-200">
                        {{ __('iOS build unavailable') }}
                    </div>
                    <p class="mt-3 text-xs font-semibold text-amber-300">{{ __('iOS build coming soon.') }}</p>
                @endif
            </div>
        </div>

        @unless($mobileApp)
            <div class="mt-10 rounded-2xl border border-white/40 bg-white/80 p-5 text-center text-slate-600 shadow-lg dark:border-white/10 dark:bg-white/5 dark:text-slate-300">
                {{ __('No mobile builds are currently available. Please check back later or contact IT.') }}
            </div>
        @endunless
    </div>
</div>
