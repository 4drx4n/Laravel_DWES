# Práctica 1 | Laravel

### Crea un nuevo proyecto Laravel
- `composer create-project laravel/laravel practica1_laravel`
---
### Ejecuta las migraciones iniciales y comprueba la conexión con la base de datos.
- `php artisan migrate`
---
### Crea la migración para la tabla alumno.
- `php artisan make:migration create_alumno_table`
---
### Crea el seeder encargado de rellenar la tabla alumno.
- `php artisan make:seeder AlumnoSeeder`
---
### Ejecuta el seeder e inserta datos de prueba.
- `php artisan db:seed --class=AlumnoSeeder`
---
### Crea el controlador AlumnoController.
- `php artisan make:controller AlumnoController`
---
### Instala la configuración necesaria para trabajar con rutas API en Laravel 11.
- `php artisan install:api`
---
### Crea el middleware.
- `php artisan make:middleware ValidarId`
---
### Muestra todas las rutas registradas en el proyecto.
- `php artisan route:list`
---
### Inicia el servidor local de Laravel.
- `php artisan serve`
---