<nav class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-blue-200 shadow-lg h-16">
    <div class="px-4 sm:px-6 lg:px-8 h-full">
        <div class="flex justify-between items-center h-full">
            <!-- Left Section -->
            <div class="flex items-center">
                <!-- Mobile menu button -->
                <button id="sidebarToggle" class="lg:hidden p-2 rounded-md text-blue-600 hover:text-blue-800 hover:bg-blue-50 focus:outline-none focus:bg-blue-100 focus:text-blue-900 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Logo con nuevo icono dental -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3">
                        <div class="h-10 w-10 bg-gradient-to-br from-blue-500 to-teal-400 rounded-xl flex items-center justify-center shadow-md overflow-hidden">
                            <img src="https://img.freepik.com/premium-vector/dental-implant-logo-vector-designs-concept-dental-clinic-care-logo-template_607588-10236.jpg"
                                 alt="Dental Care Logo"
                                 class="w-8 h-8 object-cover rounded-lg">
                        </div>
                        <span class="text-xl font-bold bg-gradient-to-r from-blue-600 to-teal-600 bg-clip-text text-transparent hidden lg:block">DentalCare</span>
                    </a>
                </div>
            </div>

            <!-- Right side - User dropdown -->
            <div class="flex items-center">
                <!-- User Menu -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <div class="h-8 w-8 bg-gradient-to-br from-blue-500 to-teal-400 rounded-full flex items-center justify-center shadow-sm">
                            <span class="text-sm font-medium text-white">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </span>
                        </div>
                        <span class="ml-2 text-sm font-medium text-gray-700 hidden sm:block">{{ Auth::user()->name }}</span>
                        <svg class="ml-1 h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div x-show="open"
                         x-cloak
                         @click.away="open = false"
                         class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                        <div class="py-1">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 flex items-center transition duration-150">
                                <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Mi Perfil
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 flex items-center transition duration-150">
                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    Cerrar Sesión
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
