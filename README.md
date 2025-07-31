# 📧 Proyecto Laravel: Envío de Correos Masivos con Gmail SMTP y API REST

Este proyecto tiene como objetivo **registrar usuarios desde una API** y **enviar correos personalizados** de forma masiva utilizando **Laravel**, **colas**, **Gmail SMTP** y pruebas con **Postman**. Fue desarrollado como parte de una práctica en la Unidad de Desarrollo de la **FESC**.

---

## 🚀 Tecnologías Usadas

* PHP 8.x
* Laravel 10.x
* Laravel Breeze (auth)
* SMTP Gmail
* Postman
* Mailables
* Laravel Queues (Base de datos)
* MySQL / Laragon
* HTML Email Templates

---

## 📁 Estructura del Proyecto

```
laravel-emails/
├── app/
│   ├── Console/Commands/EnviarCorreosMasivos.php
│   ├── Http/Controllers/ApiRegistroController.php
│   └── Mail/NotificacionMasiva.php
├── resources/
│   └── views/emails/notificacion.blade.php
├── public/images/LOGO_PROYECTANDO_OPTIMIZADO.png
├── routes/
│   └── api.php
├── .env
└── README.md
```

---

## 🛠️ Instalación y Configuración

### 1. Crear Proyecto con Laragon

Menú → Creación Rápida de Sitio Web → Laravel
**Nombre del Proyecto:** `laravel-emails`

### 2. Abrir Proyecto en VS Code

```bash
cd laravel-emails
code .
```

### 3. Configurar `.env` para Gmail SMTP

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=
MAIL_FROM_NAME=
```

⚠️ Activa la verificación en dos pasos y genera una contraseña de aplicación:
[https://myaccount.google.com/apppasswords](https://myaccount.google.com/apppasswords)

---

🛑 Para el envio de emails NO usar formato `.webp`

---

## 📧 Clase Mailable

Ruta: `app/Mail/NotificacionMasiva.php`

```php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificacionMasiva extends Mailable
{
    use Queueable, SerializesModels;

    public \$nombre;

    public function __construct(\$nombre)
    {
        \$this->nombre = \$nombre;
    }

    public function build()
    {
        return \$this->view('emails.notificacion')
                    ->subject("Bienvenido a PROYECTANDO FESC");
    }
}
```

---

## 🧵 Envío Masivo desde la Base de Datos

### 1. Crear el comando

```bash
php artisan make:command EnviarCorreosMasivos
```

### 2. Lógica del comando

Ruta: `app/Console/Commands/EnviarCorreosMasivos.php`

```php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Mail\NotificacionMasiva;
use Illuminate\Support\Facades\Mail;

class EnviarCorreosMasivos extends Command
{
    protected \$signature = 'correos:enviar';
    protected \$description = 'Envía correos masivos personalizados a todos los usuarios';

    public function handle()
    {
        \$usuarios = User::all();

        foreach (\$usuarios as \$usuario) {
            Mail::to(\$usuario->email)->queue(new NotificacionMasiva(\$usuario->name));
            \$this->info("Correo enviado a: {\$usuario->email}");
        }

        return Command::SUCCESS;
    }
}
```

### 3. Ejecutar el comando

```bash
php artisan correos:enviar
```

---

## 🔗 API REST con Postman

### 1. Ruta de Registro

`routes/api.php`

```php
use App\Http\Controllers\ApiRegistroController;

Route::post('/registrar', [ApiRegistroController::class, 'store']);
```

### 2. Controlador de Registro

`app/Http/Controllers/ApiRegistroController.php`

```php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Mail\NotificacionMasiva;
use Illuminate\Support\Facades\Mail;

class ApiRegistroController extends Controller
{
    public function store(Request \$request)
    {
        \$usuario = User::create([
            'name' => \$request->name,
            'email' => \$request->email,
            'password' => Hash::make(\$request->password),
        ]);

        Mail::to(\$usuario->email)->queue(new NotificacionMasiva(\$usuario->name));

        return response()->json(['message' => 'Usuario registrado y correo enviado']);
    }
}
```

### 3. Enviar desde Postman

* **Método:** POST
* **URL:** `http://127.0.0.1:8000/api/registrar`
* **JSON Body:**

```json
{
  "name": "Nelly Cano",
  "email": "nellycano800@gmail.com"
}
```

---

## 📡 Activar Sistema de Colas

### 1. Configurar `.env`

```env
QUEUE_CONNECTION=database
```

### 2. Migraciones necesarias

```bash
php artisan queue:table
php artisan queue:failed-table
php artisan migrate
```

### 3. Iniciar Worker

```bash
php artisan queue:work
```

---

## ✅ Recomendaciones Finales

* Ejecutar:

  ```bash
  php artisan config:clear
  php artisan cache:clear
  ```

  después de editar `.env`
* Verifica que `php artisan serve` esté corriendo
* Ejecuta `php artisan queue:work` para procesar colas
* Usa `send()` para envío inmediato o `queue()` para asincrónico

---

## 🧠 Autor

**Nelly Fabiola Cano Oviedo**
Estudiante de Ingeniería de Software - FESC
Unidad de Desarrollo - Julio 2025

**Contacto**
Linkedin: www.linkedin.com/in/nelis250

---

## 📌 Licencia

MIT © 2025 — Proyecto académico para fines educativos y pruebas internas.
