README.md - AIHA Best Home Movies
Catálogo completo de películas con backend Laravel y aplicación móvil Flutter. Sistema de autenticación completo para usuarios con gestión de películas favoritas de Hollywood y animaciones USA.
🎬 Descripción del Proyecto
AIHA Best Home Movies es una aplicación móvil que permite a los usuarios:
Registrarse e iniciar sesión
Explorar un catálogo de películas actuales de Hollywood
Ver detalles completos de cada película
Administrar el catálogo (alta, baja, edición)
🛠 Requisitos Previos
Backend Laravel
PHP 8.1 o superior
Composer
MySQL 5.7+ o PostgreSQL
Node.js (opcional, para frontend)
Frontend Flutter
Flutter SDK 3.0+
Dart SDK
Android Studio / VS Code
Emulador Android o dispositivo físico
📦 Instalación
1. Backend Laravel
bash
Copy
# Clonar o crear proyecto
composer create-project laravel/laravel backend-laravel
cd backend-laravel

# Instalar dependencias
composer require laravel/sanctum
php artisan install:api

# Configurar entorno
cp .env.example .env

# Editar .env con tus credenciales de base de datos
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=aiha_movies
DB_USERNAME=root
DB_PASSWORD=tu_contraseña

# Generar key y migrar
php artisan key:generate
php artisan migrate
php artisan db:seed

# Iniciar servidor
php artisan serve
API Base URL: http://localhost:8000/api
2. Frontend Flutter
bash
Copy
# Crear proyecto Flutter
flutter create aiham_movies_app
cd aiham_movies_app

# Instalar dependencias
flutter pub add http shared_preferences

# Configurar IP para emulador Android
# En lib/services/api_service.dart, usa:
# static const String baseUrl = 'http://10.0.2.2:8000/api';

# Para dispositivo físico en misma red:
# static const String baseUrl = 'http://TU_IP_LOCAL:8000/api';

# Ejecutar
flutter run
📱 Funcionalidades Implementadas
Usuario
✅ Registro e inicio de sesión
✅ Persistencia de sesión con tokens
✅ Pantalla de bienvenida
Catálogo
✅ Grid con posters de películas
✅ Título e imagen visible
✅ Scroll infinito (puede extenderse)
Detalles
✅ Título, año, director, género
✅ Sinopsis completa
✅ Imagen en alta resolución
Administración
✅ Formulario para agregar películas
✅ Campos requeridos validados
✅ Solo usuarios autenticados
🎥 Catálogo Incluido (2023)
Table
Copy
Película	Director	Género
Oppenheimer	Christopher Nolan	Drama/Histórico
Barbie	Greta Gerwig	Comedia/Fantasía
Spider-Man: Across the Spider-Verse	Joaquim Dos Santos	Animación/Acción
The Super Mario Bros. Movie	Aaron Horvath	Animación/Aventura
Guardians of the Galaxy Vol. 3	James Gunn	Acción/Comedia
Elemental	Peter Sohn	Animación/Romance
Fast X	Louis Leterrier	Acción/Aventura
The Little Mermaid	Rob Marshall	Fantasía/Musical
🔌 Endpoints API
Table
Copy
Método	Endpoint	Descripción	Auth
POST	/api/register	Registrar usuario	No
POST	/api/login	Iniciar sesión	No
GET	/api/movies	Listar catálogo	Sí
GET	/api/movies/{id}	Detalle película	Sí
POST	/api/movies	Crear película	Sí
PUT	/api/movies/{id}	Actualizar	Sí
DELETE	/api/movies/{id}	Eliminar	Sí
📁 Estructura del Proyecto
Copy
aiha-movies-project/
├── backend-laravel/
│   ├── app/Http/Controllers/AuthController.php
│   ├── app/Http/Controllers/MovieController.php
│   ├── app/Models/Movie.php
│   ├── database/migrations/2024_xx_create_movies_table.php
│   ├── database/seeders/MovieSeeder.php
│   └── routes/api.php
│
└── flutter-app/
    ├── lib/
    │   ├── models/movie.dart
    │   ├── services/api_service.dart
    │   ├── screens/
    │   │   ├── home_screen.dart
    │   │   ├── auth_screen.dart
    │   │   ├── catalog_screen.dart
    │   │   ├── movie_detail_screen.dart
    │   │   └── admin_screen.dart
    │   └── main.dart
    └── pubspec.yaml
🎨 Capturas de Pantalla
Pantalla de Inicio
Bienvenida con logo de película, botón de registro e inicio de sesión. Fondo degradado oscuro.
Catálogo
Grid 2 columnas con posters de películas. Títulos truncados si son largos. Botón flotante "+" para admin.
Detalles
Imagen grande arriba, información organizada debajo con sinopsis completa.
Administración
Formulario con campos: título, año, director, género, URL imagen y sinopsis.
🔐 Seguridad
Sanctum para autenticación
Tokens de acceso personal
Hash de contraseñas con Bcrypt
Validación de entrada en todos los endpoints
⚠️ Consideraciones Importantes
Android Emulator: Usa 10.0.2.2 para acceder al localhost del host
Dispositivo Físico: Usa tu IP local y asegúrate que estén en la misma red
HTTPS: Configura SSL en producción para seguridad real
Validación de URLs: En producción, valida que las URLs de imágenes sean seguras
Rate Limiting: Implementa límites de peticiones en producción
🚀 Mejoras Futuras
Edición y eliminación de películas en la app
Búsqueda y filtros por género/año
Favoritos por usuario
Cacheo de imágenes
Pull-to-refresh
Paginación infinita
Roles de usuario (Admin, Regular)
💻 Tecnologías
Backend:
Laravel 11
Laravel Sanctum
MySQL/PostgreSQL
Frontend:
Flutter 3.19+
Dart 3.0+
HTTP Package
SharedPreferences
👨‍💻 Desarrollo
bash
Copy
# Modo desarrollo Laravel
php artisan serve --host=0.0.0.0

# Hot reload Flutter
flutter run -d all
📜 Licencia
Proyecto educativo - Uso libre para aprendizaje
🆘 Solución de Problemas
Error de conexión en Flutter:
dart
Copy
// Asegúrate de cambiar la IP en ApiService.dart
// Para emulador: 10.0.2.2
// Para físico: IP de tu máquina (ej: 192.168.1.10)
Error de CORS en Laravel:
bash
Copy
# configurado por defecto en Laravel 11
# versión anterior, añade en config/cors.php:
'paths' => ['api/*', 'sanctum/csrf-cookie'],