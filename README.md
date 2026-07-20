# ORVBact4_t4 - API REST Laravel con Sanctum

Proyecto backend para la actividad 4 del tema 4. La aplicacion es una API REST construida en Laravel 12, con autenticacion real mediante Laravel Sanctum, rutas en `routes/api.php`, respuestas JSON, validacion de datos y API Resources.

## Objetivo

Construir una API protegida por tokens para administrar una entidad mediante CRUD completo. Esta actividad solo incluye backend; el frontend con React se conectara en una actividad posterior.

## Entidad del CRUD

La entidad elegida fue `Libro`.

Campos:

- `id`
- `titulo`
- `autor`
- `genero`
- `anio_publicacion`
- `paginas`
- `disponible`
- `descripcion`
- `created_at`
- `updated_at`

## Autenticacion con Sanctum

La API usa Laravel Sanctum con tokens personales.

Endpoints publicos:

```text
POST /api/register
POST /api/login
```

Endpoints protegidos con `auth:sanctum`:

```text
GET    /api/user
POST   /api/logout
GET    /api/libros
POST   /api/libros
GET    /api/libros/{libro}
PUT    /api/libros/{libro}
PATCH  /api/libros/{libro}
DELETE /api/libros/{libro}
```

Para acceder a las rutas protegidas se debe enviar el token:

```http
Authorization: Bearer TOKEN_GENERADO
Accept: application/json
```

## API Resources

El proyecto usa `LibroResource` para controlar el formato JSON de salida. Esto evita exponer informacion innecesaria o sensible y mantiene una estructura clara en las respuestas.

Ejemplo de respuesta:

```json
{
  "data": {
    "id": 1,
    "titulo": "Fundamentos de Laravel 10",
    "autor": "Omar Valencia",
    "genero": "Backend",
    "anio_publicacion": 2025,
    "paginas": 320,
    "disponible": true,
    "descripcion": "Libro de practica para construir APIs.",
    "created_at": "2026-07-20T00:00:00.000000Z",
    "updated_at": "2026-07-20T00:00:00.000000Z"
  }
}
```

## Validacion

Las peticiones de crear y actualizar usan Form Requests:

- `StoreLibroRequest`
- `UpdateLibroRequest`

Si los datos no cumplen las reglas, Laravel responde en JSON con codigo `422`.

## Paginacion

El listado usa paginacion:

```php
Libro::latest()->paginate(10);
```

Endpoint:

```text
GET /api/libros?page=1
```

## Pruebas con Bruno

La coleccion de pruebas esta incluida en:

```text
bruno/
```

Incluye peticiones para:

- Registro
- Login
- Consultar usuario autenticado
- Probar ruta protegida sin token
- Listar libros con paginacion
- Ver un libro
- Crear libro
- Actualizar libro
- Eliminar libro
- Logout

## Instalacion local

```bash
git clone https://github.com/omarferxoo/ORVBact4_t4.git
cd ORVBact4_t4
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve
```

## Despliegue en VPS

La API se despliega en Nginx apuntando a la carpeta `public/` del proyecto.

Ruta esperada en VPS:

```text
/var/www/html/ORVBact4t4/
```

URL de la API:

```text
http://168.231.75.27/ORVBact4t4/api
```

## Seguridad

El archivo `.env` no se sube al repositorio porque contiene credenciales y configuracion sensible. La carpeta `vendor/` tampoco se sube; se instala con Composer.
