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


# Práctica 2 | Laravel - Relaciones

### Crea el modelo Alumno.
- `php artisan make:model Alumno`
---
### Crea el modelo Curso junto con su migración.
- `php artisan make:model Curso -m`
---
### Crea el modelo HistorialAcademico junto con su migración.
- `php artisan make:model HistorialAcademico -m`
---
### Crea una migración para añadir la clave foránea curso_id a la tabla alumno.
- `php artisan make:migration add_curso_id_to_alumno_table --table=alumno`
---
### Ejecuta las migraciones y crea las tablas relacionadas en la base de datos.
- `php artisan migrate`
---
### Crea el seeder encargado de insertar datos de prueba relacionados.
- `php artisan make:seeder RelacionesSeeder`
---
### Ejecuta el seeder e inserta los datos de prueba.
- `php artisan db:seed --class=RelacionesSeeder`
---
### Crea el controlador CursoController.
- `php artisan make:controller CursoController`
---
### Crea el controlador HistorialAcademicoController.
- `php artisan make:controller HistorialAcademicoController`
---
### Muestra todas las rutas registradas en el proyecto.
- `php artisan route:list`
---
### Inicia el servidor local de Laravel.
- `php artisan serve`
---


## Rutas API creadas

### Obtiene los alumnos de un curso.
- `GET /api/cursos/{id}/alumnos`
---
### Obtiene el curso de un alumno.
- `GET /api/alumnos/{id}/curso`
---
### Obtiene el historial académico de un alumno.
- `GET /api/alumnos/{id}/historial-academico`
---
### Obtiene el alumno asociado a un historial académico.
- `GET /api/historial-academico/{id}/alumno`
---

## Ejemplos de prueba

### Obtener los alumnos del curso con id 1.
- `http://127.0.0.1:8000/api/cursos/1/alumnos`
---
### Obtener el curso del alumno con id 1.
- `http://127.0.0.1:8000/api/alumnos/1/curso`
---
### Obtener el historial académico del alumno con id 1.
- `http://127.0.0.1:8000/api/alumnos/1/historial-academico`
---
### Obtener el alumno relacionado con el historial académico con id 1.
- `http://127.0.0.1:8000/api/historial-academico/1/alumno`
---