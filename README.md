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

# Práctica 3 | Laravel - Login por Tokens

### Crea el seeder encargado de insertar un usuario de prueba.
- `php artisan make:seeder UserSeeder`
---
### Ejecuta el seeder e inserta el usuario de prueba.
- `php artisan db:seed --class=UserSeeder`
---
### Crea el controlador AuthController.
- `php artisan make:controller AuthController`
---
### Crea el middleware propio para comprobar si el usuario está logueado.
- `php artisan make:middleware ComprobarToken`
---
### Muestra todas las rutas registradas en el proyecto.
- `php artisan route:list`
---
### Inicia el servidor local de Laravel.
- `php artisan serve`
---


## Usuario de prueba

### Usuario utilizado para comprobar el login.
- `name: Adrian`
- `email: adrian@campico.com`
- `password: 123456`
---


## Rutas API creadas

### Permite iniciar sesión con nombre y contraseña.
- `POST /api/login`
---
### Ruta pública accesible sin estar identificado.
- `GET /api/publica`
---
### Muestra los datos del usuario logueado.
- `GET /api/usuario`
---
### Cierra sesión e invalida el token del usuario.
- `POST /api/logout`
---


## Ejemplos de prueba

### Probar ruta pública.
- `http://127.0.0.1:8000/api/publica`
---
### Hacer login.
- `http://127.0.0.1:8000/api/login`
---
### Body JSON utilizado para hacer login.
- `{"name": "Adrian", "password": "123456"}`
---
### Probar ruta protegida sin token.
- `http://127.0.0.1:8000/api/usuario`
---
### Probar ruta protegida con token.
- `http://127.0.0.1:8000/api/usuario`
---
### Probar login estando ya logueado.
- `http://127.0.0.1:8000/api/login`
---
### Cerrar sesión.
- `http://127.0.0.1:8000/api/logout`
---
### Comprobar que el token queda invalidado después del logout.
- `http://127.0.0.1:8000/api/usuario`
---


## Funcionamiento del middleware

### El middleware ComprobarToken comprueba si la petición contiene un token.
- `Authorization: Bearer TOKEN`
---
### Si no se envía token, devuelve un mensaje de error.
- `No se ha enviado ningún token`
---
### Si el token no existe o no es válido, devuelve un mensaje de error.
- `Token no válido`
---
### Si el token es válido, la petición continúa normalmente.
- `return $next($request);`
---


## Rutas públicas

### Ruta de login accesible sin estar identificado.
- `POST /api/login`
---
### Ruta pública accesible sin estar identificado.
- `GET /api/publica`
---


## Rutas protegidas

### Ruta que muestra el usuario logueado.
- `GET /api/usuario`
---
### Ruta que cierra sesión.
- `POST /api/logout`
---
### Resto de rutas del proyecto.
- `Protegidas mediante el middleware ComprobarToken`
---