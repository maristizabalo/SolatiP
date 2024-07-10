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

git clone https://github.com/tu_usuario/solatiprueba.git
cd solatiprueba

## 2. Instalar dependecnias PHP

composer install

### 3. Crear y configurar el archivo .env

Copie el archivo .env.example a .env y edite los valores según su configuración.
cp .env.example .env

### 4. Generar claves

Genere las claves necesarias para Laravel y JWT:
php artisan key:generate
php artisan jwt:secret

### 5. Configurar la base de datos

Edite el archivo .env para configurar su conexión a PostgreSQL. Ejemplo:
DB_CONNECTION=pgsql
DB_HOST=localhost
DB_PORT=5432
DB_DATABASE=bd_solati
DB_USERNAME=root
DB_PASSWORD=

### 6. Migrar la base de datos

Ejecute las migraciones para crear las tablas necesarias:
php artisan migrate

### 7. Poblar la base de datos (opcional)

Si tiene un archivo de seed, puede poblar la base de datos con datos iniciales:
php artisan db:seed

### 8. Instalar dependencias de JavaScript (opcional)

Si necesita compilar assets frontend, instale las dependencias de Node.js:
npm install




# Autenticación

La autenticación en esta aplicación se maneja mediante jwt-auth. Para iniciar sesión, haga una solicitud POST a /api/login con el username y password. La respuesta incluirá un token JWT que debe usarse en las solicitudes subsecuentes.

# Rutas de la API

POST /api/login: Autenticar usuario y obtener token JWT.
POST /api/logout: Cerrar sesión invalidando el token JWT.
GET /api/user: Obtener información del usuario autenticado (requiere token JWT en el encabezado de autorización).

# Estructura del Proyecto

app/Http/Controllers/: Controladores de la aplicación.
app/Repositories/: Repositorios para desacoplar la lógica de negocio del acceso a los datos.
database/migrations/: Archivos de migración de la base de datos.
routes/api.php: Definición de rutas de la API.



