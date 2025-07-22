<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\BienvenidaEmail;
use App\Mail\PlanesPagoEmail;
use Illuminate\Support\Facades\Log;

class ApiRegistroController extends Controller
{
    public function registrar(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email:rfc,dns|unique:users,email',
        ]);

        $nombre = $request->input('name');
        $email  = $request->input('email');

        try {
            Mail::to($email)->queue(new BienvenidaEmail($nombre));
            Mail::to($email)->queue(new PlanesPagoEmail($nombre));

            User::create([
                'name' => $nombre,
                'email' => $email,
                'password' => bcrypt('temporal123'),
            ]);

            return response()->json([
                'message' => 'Usuario registrado correctamente y correos enviados.'
            ], 201);
        } catch (\Throwable $e) {
            Log::error("Error enviando correos a $email: " . $e->getMessage());

            try {
                Mail::raw("Fallo el correo a $email\n" . $e->getMessage(), function ($message) {
                    $message->to(env('MAIL_FAILURES_TO', 'proyectando.fesc2025@gmail.com'))
                            ->subject('Fallo en envío de correo');
                });
            } catch (\Throwable $mailFail) {
                Log::error("También falló el correo de notificación: " . $mailFail->getMessage());
            }

            return response()->json([
                'error' => 'No se pudo registrar el usuario. Verifica el correo.'
            ], 500);
        }
    }
}
