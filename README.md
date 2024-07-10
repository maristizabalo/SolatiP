# SolatiPrueba

Este proyecto es una aplicación desarrollada en Laravel como prueba de desarrollo para la vacante de Analista de Desarrollo 2 en Solati. La aplicación incluye una API REST que permite el inicio de sesión mediante tokens usando `jwt-auth` y consulta de información almacenada en una base de datos PostgreSQL.

## Requisitos

- PHP >= 7.4
- Composer
- PostgreSQL
- Node.js & npm/yarn (opcional, para compilar assets frontend)

## Instalación

Siga estos pasos para instalar y configurar el proyecto en su entorno local.

## 1. Clonar el repositorio

```
git clone https://github.com/tu_usuario/solatiprueba.git
cd solatiprueba
```

## 2. Instalar dependecnias PHP

```
composer install
```

### 3. Crear y configurar el archivo .env

Copie el archivo .env.example a .env y edite los valores según su configuración.
```
cp .env.example .env
```

### 4. Generar claves

Genere las claves necesarias para Laravel y JWT:
```
php artisan key:generate
php artisan jwt:secret
```

### 5. Configurar la base de datos

Edite el archivo .env para configurar su conexión a PostgreSQL. Ejemplo:
```
DB_CONNECTION=pgsql
DB_HOST=localhost
DB_PORT=5432
DB_DATABASE=bd_solati
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Migrar la base de datos

Ejecute las migraciones para crear las tablas necesarias:
```
php artisan migrate
```

### 7. Poblar la base de datos con usuario prueba()

Poblar la base de datos con datos iniciales:
```
php artisan db:seed
```



## Autenticación

La autenticación en esta aplicación se maneja mediante jwt-auth. Para iniciar sesión, haga una solicitud POST a /api/login con el username y password. La respuesta incluirá un token JWT que debe usarse en las solicitudes subsecuentes.

## Rutas de la API

### Rutas de autenticación

- POST /api/auth/register: Registrar un nuevo usuario.
- POST /api/auth/login: Autenticar usuario y obtener token JWT.
- GET /api/auth/logout: Cerrar sesión invalidando el token JWT.
- GET /api/auth/refresh: Refrescar el token JWT.
- GET /api/auth/me: Obtener información del usuario autenticado (requiere token JWT en el encabezado de autorización).

### Rutas protegidas de usuarios

- GET /api/users: Obtener todos los usuarios (requiere token JWT en el encabezado de autorización).
- GET /api/users/{id}: Obtener información de un usuario específico (requiere token JWT en el encabezado de autorización).
- PUT /api/users/{id}: Actualizar información de un usuario específico (requiere token JWT en el encabezado de autorización).
- DELETE /api/users/{id}: Eliminar un usuario específico (requiere token JWT en el encabezado de autorización).

## Uso del Patrón Repository
El proyecto utiliza el patrón Repository para desacoplar la lógica de negocio del acceso a los datos.

### UserRepository
El UserRepository maneja las operaciones de acceso a los datos del modelo User.

### UserController
El UserController utiliza el UserRepository para manejar las solicitudes HTTP relacionadas con los usuarios.

### AuthController
El AuthController maneja las operaciones de autenticación utilizando JWT.

## Estructura del Proyecto

- app/Http/Controllers/: Controladores de la aplicación.
- app/Repositories/: Repositorios para desacoplar la lógica de negocio del acceso a los datos.
- database/migrations/: Archivos de migración de la base de datos.
- routes/api.php: Definición de rutas de la API.



