<x-guest-layout>
    <x-authentication-card title="¿Olvidaste tu contraseña?" subtitle="Recuperar Contraseña" description="Si olvidaste tu contraseña, no te preocupes. Ingresa tu correo electrónico y te enviaremos un enlace para restablecerla.">


        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-ts-input label="Correo Electrónico *" name="email" :value="old('email')" placeholder="Introduce tu correo electrónico" required autofocus autocomplete="email" />
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('login'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('Regresar a Iniciar sesión') }}
                    </a>
                @endif
            </div>

            <div>
                <x-ts-button text="Recuperar Contraseña" type="submit" class="w-full mt-7" sm/>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
