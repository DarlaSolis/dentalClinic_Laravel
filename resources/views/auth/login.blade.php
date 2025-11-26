<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-teal-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <!-- Header con nuevo logo dental -->
            <div class="text-center">
                <div class="mx-auto h-20 w-20 bg-gradient-to-br from-blue-500 to-teal-400 rounded-2xl flex items-center justify-center shadow-lg mb-4 overflow-hidden">
                    <img src="https://img.freepik.com/premium-vector/dental-implant-logo-vector-designs-concept-dental-clinic-care-logo-template_607588-10236.jpg"
                         alt="DentalCare Logo"
                         class="w-16 h-16 object-cover rounded-lg">
                </div>
                <h2 class="text-3xl font-extrabold bg-gradient-to-r from-blue-600 to-teal-600 bg-clip-text text-transparent">
                    Dental Care
                </h2>
                <p class="mt-2 text-sm text-gray-600">
                    Sistema de gestión dental
                </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 p-4 bg-blue-50 border border-blue-200 rounded-lg text-blue-700" :status="session('status')" />

            <div class="bg-white p-8 rounded-2xl shadow-lg border border-blue-100">
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Correo Electrónico')" class="text-gray-700 font-medium" />
                        <div class="mt-1 relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </div>
                            <x-text-input id="email" class="block mt-1 w-full pl-10" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password con toggle de visibilidad -->
                    <div>
                        <x-input-label for="password" :value="__('Contraseña')" class="text-gray-700 font-medium" />
                        <div class="mt-1 relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <x-text-input id="password" class="block mt-1 w-full pl-10 pr-10"
                                          type="password"
                                          name="password"
                                          required autocomplete="current-password" />

                            <!-- Botón para mostrar/ocultar contraseña -->
                            <button type="button"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center"
                                    onclick="togglePasswordVisibility()">
                                <svg id="eye-icon" class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <svg id="eye-slash-icon" class="h-5 w-5 text-gray-400 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                </svg>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm text-blue-600 hover:text-blue-500 font-medium transition duration-150" href="{{ route('password.request') }}">
                                {{ __('¿Olvidaste tu contraseña?') }}
                            </a>
                        @endif
                    </div>

                    <div>
                        <x-primary-button class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-blue-500 to-teal-400 hover:from-blue-600 hover:to-teal-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
                            {{ __('Iniciar Sesión') }}
                        </x-primary-button>
                    </div>

                    @if (Route::has('register'))
                        <div class="text-center">
                            <p class="text-sm text-gray-600">
                                ¿No tienes una cuenta?
                                <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-500 transition duration-150">
                                    {{ __('Regístrate aquí') }}
                                </a>
                            </p>
                        </div>
                    @endif
                </form>
            </div>

            <!-- Footer decorativo -->
            <div class="text-center">
                <p class="text-xs text-gray-500">
                    &copy; 2025 DentalCare. Todos los derechos reservados.
                </p>
            </div>
        </div>
    </div>

    <!-- Script para mostrar/ocultar contraseña -->
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            const eyeSlashIcon = document.getElementById('eye-slash-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.add('hidden');
                eyeSlashIcon.classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('hidden');
                eyeSlashIcon.classList.add('hidden');
            }
        }
    </script>
</x-guest-layout>
