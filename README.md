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