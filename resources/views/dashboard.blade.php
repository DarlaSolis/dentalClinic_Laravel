<x-app-layout>
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900">
            @auth
                ¡Bienvenido{{ Auth::user()->gender === 'female' ? 'a' : 'o' }}, {{ Auth::user()->name }}!
            @else
                Dashboard
            @endauth
        </h1>
        <p class="text-gray-600">
            @if(auth()->user()->isAdmin())
                Panel de administración del sistema dental
            @elseif(auth()->user()->isDentist())
                Panel de gestión dental
            @else
                Tu portal de paciente
            @endif
        </p>
    </div>

    <!-- Stats Grid - Diferente para cada rol -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        @if(auth()->user()->isAdmin())
            <!-- Stats para Admin -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Usuarios</p>
                        <p class="text-2xl font-bold text-gray-900">{{ \App\Models\User::count() }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Pacientes</p>
                        <p class="text-2xl font-bold text-gray-900">{{ \App\Models\User::where('role_id', 3)->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-purple-100 text-purple-600 mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Dentistas</p>
                        <p class="text-2xl font-bold text-gray-900">{{ \App\Models\User::where('role_id', 2)->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-orange-100 text-orange-600 mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Citas Totales</p>
                        <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Appointment::count() }}</p>
                    </div>
                </div>
            </div>

        @elseif(auth()->user()->isDentist())
            <!-- Stats para Dentista -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Citas Hoy</p>
                        <p class="text-2xl font-bold text-gray-900">
                            {{ \App\Models\Appointment::where('dentist_id', auth()->id())->whereDate('appointment_date', today())->count() }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Citas Completadas</p>
                        <p class="text-2xl font-bold text-gray-900">
                            {{ \App\Models\Appointment::where('dentist_id', auth()->id())->where('status', 'completed')->count() }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-yellow-100 text-yellow-600 mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Citas Programadas</p>
                        <p class="text-2xl font-bold text-gray-900">
                            {{ \App\Models\Appointment::where('dentist_id', auth()->id())->where('status', 'scheduled')->count() }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-purple-100 text-purple-600 mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Citas Confirmadas</p>
                        <p class="text-2xl font-bold text-gray-900">
                            {{ \App\Models\Appointment::where('dentist_id', auth()->id())->where('status', 'confirmed')->count() }}
                        </p>
                    </div>
                </div>
            </div>

        @else
            <!-- Stats para Paciente -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Mis Citas</p>
                        <p class="text-2xl font-bold text-gray-900">
                            {{ \App\Models\Appointment::where('patient_id', auth()->id())->count() }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Completadas</p>
                        <p class="text-2xl font-bold text-gray-900">
                            {{ \App\Models\Appointment::where('patient_id', auth()->id())->where('status', 'completed')->count() }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-yellow-100 text-yellow-600 mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Programadas</p>
                        <p class="text-2xl font-bold text-gray-900">
                            {{ \App\Models\Appointment::where('patient_id', auth()->id())->where('status', 'scheduled')->count() }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-red-100 text-red-600 mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Canceladas</p>
                        <p class="text-2xl font-bold text-gray-900">
                            {{ \App\Models\Appointment::where('patient_id', auth()->id())->where('status', 'cancelled')->count() }}
                        </p>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Main Content - Diferente para cada rol -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        @if(auth()->user()->isAdmin())
            <!-- Contenido para Admin -->
            <div class="bg-white rounded-lg shadow">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Resumen del Sistema</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                            <span class="text-sm font-medium text-gray-700">Citas Programadas</span>
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-sm font-medium rounded-full">
                                {{ \App\Models\Appointment::where('status', 'scheduled')->count() }}
                            </span>
                        </div>
                        <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                            <span class="text-sm font-medium text-gray-700">Citas Confirmadas</span>
                            <span class="px-3 py-1 bg-blue-100 text-blue-800 text-sm font-medium rounded-full">
                                {{ \App\Models\Appointment::where('status', 'confirmed')->count() }}
                            </span>
                        </div>
                        <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                            <span class="text-sm font-medium text-gray-700">Citas Completadas</span>
                            <span class="px-3 py-1 bg-green-100 text-green-800 text-sm font-medium rounded-full">
                                {{ \App\Models\Appointment::where('status', 'completed')->count() }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Acciones Rápidas</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-3">
                        <a href="{{ route('users.index') }}"
                           class="flex items-center p-3 text-gray-700 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50 transition-all group">
                            <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                            </svg>
                            <span class="font-medium">Gestionar Usuarios</span>
                        </a>

                        <a href="{{ route('appointments.index') }}"
                           class="flex items-center p-3 text-gray-700 rounded-lg border border-gray-200 hover:border-green-300 hover:bg-green-50 transition-all group">
                            <svg class="w-5 h-5 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span class="font-medium">Ver Todas las Citas</span>
                        </a>
                    </div>
                </div>
            </div>

        @elseif(auth()->user()->isDentist())
            <!-- Contenido para Dentista -->
            <div class="bg-white rounded-lg shadow">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Próximas Citas</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        @php
                            $upcomingAppointments = \App\Models\Appointment::with('patient')
                                ->where('dentist_id', auth()->id())
                                ->whereIn('status', ['scheduled', 'confirmed'])
                                ->whereDate('appointment_date', '>=', today())
                                ->orderBy('appointment_date')
                                ->orderBy('appointment_time')
                                ->limit(5)
                                ->get();
                        @endphp

                        @forelse($upcomingAppointments as $appointment)
                            <div class="flex items-center justify-between p-4 border border-gray-100 rounded-lg">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center">
                                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">{{ $appointment->patient->name }}</p>
                                        <p class="text-sm text-gray-500">
                                            {{ $appointment->appointment_date->format('M d, Y') }} - {{ date('h:i A', strtotime($appointment->appointment_time)) }}
                                        </p>
                                        <p class="text-xs text-gray-400">{{ $appointment->procedure_type }}</p>
                                    </div>
                                </div>
                                <span class="px-3 py-1 {{ $appointment->status === 'confirmed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }} text-xs font-medium rounded-full">
                                {{ $appointment->status === 'confirmed' ? 'Confirmada' : 'Programada' }}
                            </span>
                            </div>
                        @empty
                            <div class="text-center py-4 text-gray-500">
                                No hay citas próximas
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Acciones Rápidas</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-3">
                        <a href="{{ route('appointments.index') }}"
                           class="flex items-center p-3 text-gray-700 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50 transition-all group">
                            <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                            <span class="font-medium">Ver Todas las Citas</span>
                        </a>

                        <a href="{{ route('profile.edit') }}"
                           class="flex items-center p-3 text-gray-700 rounded-lg border border-gray-200 hover:border-green-300 hover:bg-green-50 transition-all group">
                            <svg class="w-5 h-5 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span class="font-medium">Mi Perfil</span>
                        </a>
                    </div>
                </div>
            </div>

        @else
            <!-- Contenido para Paciente -->
            <div class="bg-white rounded-lg shadow">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Mis Próximas Citas</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        @php
                            $myAppointments = \App\Models\Appointment::with('dentist')
                                ->where('patient_id', auth()->id())
                                ->whereIn('status', ['scheduled', 'confirmed'])
                                ->whereDate('appointment_date', '>=', today())
                                ->orderBy('appointment_date')
                                ->orderBy('appointment_time')
                                ->limit(5)
                                ->get();
                        @endphp

                        @forelse($myAppointments as $appointment)
                            <div class="flex items-center justify-between p-4 border border-gray-100 rounded-lg">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center">
                                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">Dr. {{ $appointment->dentist->name }}</p>
                                        <p class="text-sm text-gray-500">
                                            {{ $appointment->appointment_date->format('M d, Y') }} - {{ date('h:i A', strtotime($appointment->appointment_time)) }}
                                        </p>
                                        <p class="text-xs text-gray-400">{{ $appointment->procedure_type }}</p>
                                    </div>
                                </div>
                                <span class="px-3 py-1 {{ $appointment->status === 'confirmed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }} text-xs font-medium rounded-full">
                                {{ $appointment->status === 'confirmed' ? 'Confirmada' : 'Programada' }}
                            </span>
                            </div>
                        @empty
                            <div class="text-center py-4 text-gray-500">
                                No tienes citas próximas
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Acciones Rápidas</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-3">
                        <a href="{{ route('appointments.create') }}"
                           class="flex items-center p-3 text-gray-700 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50 transition-all group">
                            <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            <span class="font-medium">Nueva Cita</span>
                        </a>

                        <a href="{{ route('appointments.index') }}"
                           class="flex items-center p-3 text-gray-700 rounded-lg border border-gray-200 hover:border-green-300 hover:bg-green-50 transition-all group">
                            <svg class="w-5 h-5 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                            <span class="font-medium">Ver Mis Citas</span>
                        </a>

                        <a href="{{ route('profile.edit') }}"
                           class="flex items-center p-3 text-gray-700 rounded-lg border border-gray-200 hover:border-purple-300 hover:bg-purple-50 transition-all group">
                            <svg class="w-5 h-5 text-purple-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span class="font-medium">Mi Perfil</span>
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
