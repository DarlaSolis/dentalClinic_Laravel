# Dental Care Management System

## Descripción
Sistema de gestión dental completo que permite administrar pacientes, dentistas, citas y usuarios. Desarrollado con Laravel, incluye roles de administrador, dentista y paciente con interfaces personalizadas para cada uno.

## Características Principales
- **Gestión de Usuarios:** CRUD completo para administradores.
- **Sistema de Citas:** Agendamiento y seguimiento de citas dentales.
- **Calendario Integrado:** Visualización y gestión de citas en calendario.
- **Roles Múltiples:** Administrador, Dentista y Paciente.
- **Interfaces Responsivas:** Diseño adaptado para cada rol de usuario.

## Instalación Local

1. **Clonar el repositorio**
   ```bash
   git clone [url-del-repositorio]
   cd dental-care-system
2. **Instalar dependencias**
    ```bash
    composer install
3. **Configurar entorno**
    ```bash
   cp .env.example .env
    php artisan key:generate
4. **Configurar base de datos**
   Editar el archivo .env con la configuración de tu base de datos:
    ```bash
   DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=dental_care
    DB_USERNAME=root
    DB_PASSWORD=
5. **Ejecutar migraciones y seeders**
   ```bash
   php artisan migrate --seed
6. **Ejecutar el servidor**
    ```bash
   php artisan serve
## Usuarios de Prueba

### Administrador
- **Email:** `admin@dental.com`
- **Contraseña:** `123456789`
- **Permisos:** Acceso completo al sistema

### Dentistas
| Usuario | Email | Contraseña |
| :--- | :--- | :--- |
| Dra. Zapata | `dra.zapata@dental.com` | `123456789` |
| Dra. Garcia | `dra.garcia@dental.com` | `123456789` |
| Dr. Mendoza | `dr.mendoza@dental.com` | `123456789` |

### Pacientes
- **Usuario 1:** `armando@email.com` (Pass: `123456789`)
- **Usuario 2:** `andrea@email.com` (Pass: `123456789`)
## Funcionalidades por Rol

### Administrador
- Gestión completa de usuarios
- Vista general del sistema
- Reportes y estadísticas
- Administración de todas las citas

### Dentista
- Gestión de sus citas
- Vista de calendario personal
- Perfil profesional
- Historial de pacientes

### Paciente
- Agendar citas
- Ver historial de citas
- Perfil personal
- Notificaciones de recordatorio

## Tecnologías Utilizadas

- **Backend:** Laravel 10.x
- **Frontend:** Tailwind CSS, Alpine.js
- **Base de Datos:** MySQL
- **Autenticación:** Laravel Breeze
- **Xammp:** Levantamiento del entorno
- **Iconos:** Heroicons
## Estructura del Proyecto

```text
app/
├── Http/
│   ├── Controllers/
│   │   ├── Admin/          # Controladores de administración
│   │   ├── Appointment/    # Controladores de citas
│   │   └── Calendar/       # Controladores de calendario
│   └── Requests/           # Form requests de validación
├── Models/                 # Modelos Eloquent
└── Providers/              # Service providers

resources/
├── views/
│   ├── admin/              # Vistas de administración
│   ├── appointments/       # Vistas de citas
│   ├── calendar/           # Vistas de calendario
│   └── profile/            # Vistas de perfil
└── lang/                   # Archivos de traducción

database/
├── migrations/             # Migraciones de base de datos
└── seeders/                # Seeders con datos de prueba
