<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <div class="p-2 bg-blue-100 rounded-lg">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </div>
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Mi Perfil') }}
                </h2>
                <p class="text-sm text-gray-600 mt-1">Administre la información de su cuenta dental</p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <!-- Información del Perfil -->
            <div class="bg-gradient-to-br from-white to-blue-50 overflow-hidden shadow-xl sm:rounded-2xl border border-blue-100">
                <div class="bg-gradient-to-r from-blue-600 to-teal-500 px-8 py-6">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-white/20 rounded-xl backdrop-blur-sm">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-white">Información Personal</h1>
                            <p class="text-blue-100 mt-1">Actualice su información de contacto y perfil</p>
                        </div>
                    </div>
                </div>
                <div class="p-8">
                    <div class="max-w-2xl">
                        <!-- Formulario de información del perfil personalizado -->
                        <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
                            @csrf
                            @method('patch')

                            <!-- Nombre -->
                            <div>
                                <x-input-label for="name" :value="__('Nombre Completo')" class="text-gray-700 font-medium" />
                                <div class="mt-1 relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                    </div>
                                    <x-text-input id="name" name="name" type="text" class="block mt-1 w-full pl-10"
                                                  :value="old('name', $user->name)" required autofocus autocomplete="name" />
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <!-- Email -->
                            <div>
                                <x-input-label for="email" :value="__('Correo Electrónico')" class="text-gray-700 font-medium" />
                                <div class="mt-1 relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                        </svg>
                                    </div>
                                    <x-text-input id="email" name="email" type="email" class="block mt-1 w-full pl-10"
                                                  :value="old('email', $user->email)" required autocomplete="email" />
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-800">
                                            {{ __('Your email address is unverified.') }}

                                            <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                {{ __('Click here to re-send the verification email.') }}
                                            </button>
                                        </p>

                                        @if (session('status') === 'verification-link-sent')
                                            <p class="mt-2 font-medium text-sm text-green-600">
                                                {{ __('A new verification link has been sent to your email address.') }}
                                            </p>
                                        @endif
                                    </div>
                                @endif
                            </div>

                            <!-- Teléfono -->
                            <div>
                                <x-input-label for="phone" :value="__('Teléfono')" class="text-gray-700 font-medium" />
                                <div class="mt-1 relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                        </svg>
                                    </div>
                                    <x-text-input id="phone" name="phone" type="tel" class="block mt-1 w-full pl-10"
                                                  :value="old('phone', $user->phone)" required autocomplete="tel" />
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                            </div>

                            <!-- Dirección -->
                            <div>
                                <x-input-label for="address" :value="__('Dirección')" class="text-gray-700 font-medium" />
                                <div class="mt-1 relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                    </div>
                                    <x-text-input id="address" name="address" type="text" class="block mt-1 w-full pl-10"
                                                  :value="old('address', $user->address)" required autocomplete="street-address" />
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('address')" />
                            </div>

                            <!-- Género -->
                            <div>
                                <x-input-label for="gender" :value="__('Género')" class="text-gray-700 font-medium" />
                                <div class="mt-1 relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                    </div>
                                    <select id="gender" name="gender" class="block mt-1 w-full pl-10 border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm" required>
                                        <option value="">Seleccione su género</option>
                                        <option value="Masculino" {{ old('gender', $user->gender) == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                        <option value="Femenino" {{ old('gender', $user->gender) == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                                    </select>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('gender')" />
                            </div>

                            <!-- Información de Rol (solo lectura) -->
                            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                                <div class="flex items-center space-x-3">
                                    <svg class="h-5 w-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <div>
                                        <p class="text-sm font-medium text-blue-900">Rol del Sistema</p>
                                        <p class="text-sm text-blue-700">{{ $user->role_name }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button class="bg-gradient-to-r from-blue-500 to-teal-400 hover:from-blue-600 hover:to-teal-500 transition duration-150">
                                    {{ __('Guardar Cambios') }}
                                </x-primary-button>

                                @if (session('status') === 'profile-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-green-600"
                                    >{{ __('Guardado.') }}</p>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Cambio de Contraseña -->
            <div class="bg-gradient-to-br from-white to-green-50 overflow-hidden shadow-xl sm:rounded-2xl border border-green-100">
                <div class="bg-gradient-to-r from-green-600 to-emerald-500 px-8 py-6">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-white/20 rounded-xl backdrop-blur-sm">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-white">Seguridad</h1>
                            <p class="text-green-100 mt-1">Cambie su contraseña de acceso</p>
                        </div>
                    </div>
                </div>
                <div class="p-8">
                    <div class="max-w-2xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            <!-- Eliminar Cuenta -->
            <div class="bg-gradient-to-br from-white to-red-50 overflow-hidden shadow-xl sm:rounded-2xl border border-red-100">
                <div class="bg-gradient-to-r from-red-600 to-pink-500 px-8 py-6">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-white/20 rounded-xl backdrop-blur-sm">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-white">Zona de Peligro</h1>
                            <p class="text-red-100 mt-1">Elimine permanentemente su cuenta</p>
                        </div>
                    </div>
                </div>
                <div class="p-8">
                    <div class="max-w-2xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .profile-form input:focus,
        .profile-form select:focus {
            border-color: #3b82f6;
            ring-color: #3b82f6;
        }

        .profile-form button[type="submit"] {
            transition: all 0.2s ease-in-out;
        }

        .profile-form button[type="submit"]:hover {
            transform: translateY(-1px);
        }
    </style>
</x-app-layout>
