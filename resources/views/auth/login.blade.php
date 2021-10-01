@include('header')
<x-guest-layout>
    <div class="card">
        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}
                    <img src="/frontend/assets/images/logo-mobile.png" alt="">
                </a>
            </x-slot>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-label id="titulo" for="email" :value="__('Nombre')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autofocus />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label id="titulo" for="password" value="{!! html_entity_decode('Contrase&ntilde;a') !!}" />

                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />
                </div>
                <br>
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                        href="{{ route('password.request') }}">
                        {!! html_entity_decode('Olvidé mi contraseña') !!}
                    </a>
                @endif
                <br>
                <x-button class="ml-3 mt-2" id="button_login">
                    {{ __('Acceder') }}
                </x-button>
            </form>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <button
                            class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                            {{ __('Facebook') }}
                        </button>
                    </div>
                    <div class="col">
                        <button
                            class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                            {{ __('Instagram') }}
                        </button>
                    </div>
                </div>
            </div>
            <br>
            <p class="text-center">
                <span>No tienes Cuenta</span>
                <br>
                <span class="enlace"><a href="/register">Registrate</a></span>
            </p>

        </x-auth-card>
    </div>
</x-guest-layout>
@include('footer')
