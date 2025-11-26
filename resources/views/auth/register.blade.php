<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-teal-50 py-12 px-15 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <!-- Header -->
            <div class="text-center">
                <div class="mx-auto h-20 w-20 bg-gradient-to-br from-blue-500 to-teal-400 rounded-2xl flex items-center justify-center shadow-lg mb-4 overflow-hidden">
                    <img src="https://img.freepik.com/premium-vector/dental-implant-logo-vector-designs-concept-dental-clinic-care-logo-template_607588-10236.jpg"
                         alt="Dental Care Logo"
                         class="w-16 h-16 object-cover rounded-lg">
                </div>
                <h2 class="text-3xl font-extrabold bg-gradient-to-r from-blue-600 to-teal-600 bg-clip-text text-transparent">
                    Crear Cuenta
                </h2>
                <p class="mt-2 text-sm text-gray-600">
                    Regístrate como paciente
                </p>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-lg border border-blue-100">
                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <!-- Campo oculto para role_id de paciente (3) -->
                    <input type="hidden" name="role_id" value="3">

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Nombre Completo')" class="text-gray-700 font-medium" />
                        <div class="mt-1 relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <x-text-input id="name" class="block mt-1 w-full pl-10" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Ingresa tu nombre completo" />
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Correo Electrónico')" class="text-gray-700 font-medium" />
                        <div class="mt-1 relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </div>
                            <x-text-input id="email" class="block mt-1 w-full pl-10" type="email" name="email" :value="old('email')" required autocomplete="email" placeholder="ejemplo@correo.com" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Phone -->
                    <div>
                        <x-input-label for="phone" :value="__('Teléfono')" class="text-gray-700 font-medium" />
                        <div class="mt-1 relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <x-text-input id="phone" class="block mt-1 w-full pl-10" type="tel" name="phone" :value="old('phone')" required autocomplete="tel" placeholder="+1234567890" />
                        </div>
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>

                    <!-- Address -->
                    <div>
                        <x-input-label for="address" :value="__('Dirección')" class="text-gray-700 font-medium" />
                        <div class="mt-1 relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <x-text-input id="address" class="block mt-1 w-full pl-10" type="text" name="address" :value="old('address')" required autocomplete="street-address" placeholder="Ingresa tu dirección completa" />
                        </div>
                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                    </div>

                    <!-- Gender -->
                    <div>
                        <x-input-label for="gender" :value="__('Género')" class="text-gray-700 font-medium" />
                        <div class="mt-1 relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <select id="gender" name="gender" class="block mt-1 w-full pl-10 border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm" required>
                                <option value="">Selecciona tu género</option>
                                <option value="Masculino" {{ old('gender') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                <option value="Femenino" {{ old('gender') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                            </select>
                        </div>
                        <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                    </div>

                    <!-- Password -->
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
                                          required autocomplete="new-password"
                                          placeholder="Mínimo 8 caracteres" />

                            <!-- Botón para mostrar/ocultar contraseña -->
                            <button type="button"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center"
                                    onclick="togglePasswordVisibility('password')">
                                <svg id="eye-icon-password" class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <svg id="eye-slash-icon-password" class="h-5 w-5 text-gray-400 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                </svg>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" class="text-gray-700 font-medium" />
                        <div class="mt-1 relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <x-text-input id="password_confirmation" class="block mt-1 w-full pl-10 pr-10"
                                          type="password"
                                          name="password_confirmation"
                                          required autocomplete="new-password"
                                          placeholder="Repite tu contraseña" />

                            <!-- Botón para mostrar/ocultar contraseña -->
                            <button type="button"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center"
                                    onclick="togglePasswordVisibility('password_confirmation')">
                                <svg id="eye-icon-confirmation" class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <svg id="eye-slash-icon-confirmation" class="h-5 w-5 text-gray-400 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                </svg>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <a class="text-sm text-blue-600 hover:text-blue-500 font-medium transition duration-150" href="{{ route('login') }}">
                            {{ __('¿Ya tienes una cuenta?') }}
                        </a>

                        <x-primary-button class="flex justify-center py-3 px-6 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-blue-500 to-teal-400 hover:from-blue-600 hover:to-teal-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
                            {{ __('Crear Cuenta') }}
                        </x-primary-button>
                    </div>
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
        function togglePasswordVisibility(fieldId) {
            const passwordInput = document.getElementById(fieldId);
            const eyeIcon = document.getElementById(`eye-icon-${fieldId}`);
            const eyeSlashIcon = document.getElementById(`eye-slash-icon-${fieldId}`);

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                if (eyeIcon) eyeIcon.classList.add('hidden');
                if (eyeSlashIcon) eyeSlashIcon.classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                if (eyeIcon) eyeIcon.classList.remove('hidden');
                if (eyeSlashIcon) eyeSlashIcon.classList.add('hidden');
            }
        }
    </script>
</x-guest-layout>
