<x-guest-layout>
    <x-authentication-card title="Bienvenido de nuevo" subtitle="Iniciar Sesión" description="Ingresa tus datos para acceder a tu cuenta, gestionar tus citas, servicios y mantener tu información fiscal actualizada.">

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <x-ts-input label="Correo Electrónico *" name="email" placeholder="example@email.com" autocomplete="username" required />
            </div>

            <div class="mt-4">
                <x-ts-password label="Contraseña *" name="password" placeholder="********" required autocomplete="current-password" /> 
            </div>

            <div class="block mt-4">
                <x-ts-checkbox label="Recuerdame" name="remember" position="right" color="indigo" sm/>
            </div>

            <div class="flex items-center justify-between mt-6">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif
                @if(Route::has('register'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                        {{ __('¿No tienes una cuenta? Regístrate') }}
                    </a>
                @endif
            </div>
            <div>
                <x-ts-button text="Iniciar Sesión" type="submit" class="w-full mt-7" sm/>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
