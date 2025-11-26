<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Odonto Care') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50">
<!-- Mostrar alertas de SweetAlert -->
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '{{ session('success') }}',
            timer: 3000,
            showConfirmButton: false
        });
    </script>
@endif

@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '{{ session('error') }}',
            timer: 3000,
            showConfirmButton: false
        });
    </script>
@endif

<div class="min-h-screen flex flex-col">
    <!-- Navigation Bar -->
    @include('layouts.navigation')

    <!-- Sidebar and Main Content -->
    <div class="flex flex-1 pt-16">
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Main Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50">
            <div class="container mx-auto px-6 py-8">
                <!-- Breadcrumbs -->
                @include('layouts.breadcrumbs')

                <!-- Page Content -->
                {{ $slot }}
            </div>
        </main>
    </div>
</div>

<!-- Scripts -->
<script>
    // Función para confirmar eliminación con SweetAlert
    function confirmDelete(event, formId) {
        event.preventDefault();

        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡Esta acción no se puede deshacer!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formId).submit();
            }
        });
    }

    // Sidebar functionality
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const mobileOverlay = document.getElementById('mobileOverlay');

    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('-translate-x-full');
            if (mobileOverlay) {
                mobileOverlay.classList.toggle('hidden');
            }
        });
    }

    if (mobileOverlay) {
        mobileOverlay.addEventListener('click', function() {
            sidebar.classList.add('-translate-x-full');
            mobileOverlay.classList.add('hidden');
        });
    }

    // Close sidebar on mobile when clicking links
    document.querySelectorAll('#sidebar a').forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth < 1024) {
                sidebar.classList.add('-translate-x-full');
                if (mobileOverlay) {
                    mobileOverlay.classList.add('hidden');
                }
            }
        });
    });
</script>
</body>
</html>
