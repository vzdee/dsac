<x-guest-layout>
    <x-authentication-card title="Registrate con nosotros" subtitle="Crea tu cuenta" description="Completa el formulario para crear tu cuenta y acceder a nuestros servicios." >
        <form method="POST" action="{{ route('register') }}" x-data>
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <x-ts-input label="Nombre(s) *" placeholder="Ej: Juan Carlos" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div>
                    <x-ts-input label="Apellido(s) *" placeholder="Ej: Pérez García" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
                </div>

                <div>
                    <x-ts-input label="Correo Electrónico *" name="email" placeholder="Ej: juan.perez@example.com" :value="old('email')" required autocomplete="username" />
                </div>

                <div>
                    <x-ts-input label="Número de Teléfono *" name="phone_number" :value="old('phone_number')" placeholder="(999) 123 9876" autocomplete="tel" x-mask="(999) 999 9999" maxlength="15"/>
                </div>

                <div>
                    <x-ts-select.styled label="Género *" name="gender" placeholder="Masculino" :options="[
                    ['value' => 'male', 'label' => 'Masculino'], 
                    ['value' => 'female', 'label' => 'Femenino']]" :value="old('gender')" required />
                </div>

                <div>
                    <x-ts-date label="Fecha de Nacimiento *" name="birth_date" placeholder="Ej: 26/03/2003" format="DD/MM/YYYY" :value="old('birth_date')"
                    :min-date="now()->subYears(90)->format('Y-m-d')" :max-date="now()->subYears(18)->format('Y-m-d')"   required/>
                </div>

                <div>
                    <x-ts-password label="Contraseña *" name="password" placeholder="Al menos 8 carácteres" required autocomplete="new-password" />
                </div>
    
                <div>
                    <x-ts-password label="Confirmar Contraseña *" name="password_confirmation" placeholder="Confirma tu contraseña" required autocomplete="new-password"/>
                </div>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-between mt-6">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif
                @if(Route::has('login'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('¿Ya tienes una cuenta? Inicia sesión') }}
                    </a>
                @endif
            </div>
            <div>
                <x-ts-button text="Registrarse" type="submit" class="w-full mt-7" sm/>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
