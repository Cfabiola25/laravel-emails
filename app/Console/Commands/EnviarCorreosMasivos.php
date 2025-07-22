<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\BienvenidaEmail;
use App\Mail\PlanesPagoEmail;

class EnviarCorreosMasivos extends Command
{
    // Comando que se ejecuta por consola: php artisan correos:masivos
    protected $signature = 'correos:masivos';

    // Descripción del comando
    protected $description = 'Envía correos masivos de bienvenida y planes de pago a todos los usuarios registrados';

    /**
     * Ejecuta el comando en consola.
     */
    public function handle()
    {
        // Buscar usuarios con email registrado
        $usuarios = User::whereNotNull('email')->get();

        if ($usuarios->isEmpty()) {
            $this->info('No hay usuarios con email.');
            return;
        }

        foreach ($usuarios as $usuario) {
            try {
                // Enviar correo de bienvenida
                Mail::to($usuario->email)->send(new BienvenidaEmail($usuario->name));
                $this->info("✔ Correo de bienvenida enviado a: {$usuario->email}");

                // Enviar correo de planes de pago
                Mail::to($usuario->email)->send(new PlanesPagoEmail($usuario->name));
                $this->info("✔ Correo de planes de pago enviado a: {$usuario->email}");
            } catch (\Exception $e) {
                $this->error("✘ Error enviando correos a {$usuario->email}: {$e->getMessage()}");
            }
        }

        $this->info('Todos los correos fueron procesados.');
    }
}
