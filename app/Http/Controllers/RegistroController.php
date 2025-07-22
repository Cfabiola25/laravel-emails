<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\BienvenidaEmail;
use App\Mail\PlanesPagoEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;

class RegistroController extends Controller
{
    // Mostrar el formulario de registro con usuarios registrados
    public function formulario()
    {
        $usuarios = User::latest()->get();
        return view('registro.formulario', compact('usuarios'));
    }

    // Registrar nuevo usuario desde web y enviar correos
    public function registrar(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt('password') // Contraseña por defecto
            ]);

            // Enviar correos en cola
            Mail::to($user->email)->queue(new BienvenidaEmail($user->name));
            Mail::to($user->email)->queue(new PlanesPagoEmail($user->name));

            return redirect()->route('registro.formulario')->with('success', 'Usuario registrado correctamente y correos enviados.');
        } catch (\Exception $e) {
            Log::error("Error al registrar usuario: ".$e->getMessage());
            return redirect()->back()->with('error', 'Hubo un error en el registro.');
        }
    }

    // API: registrar usuario por Postman (JSON)
    public function registrarApi(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt('password')
            ]);

            Mail::to($user->email)->queue(new BienvenidaEmail($user));
            Mail::to($user->email)->queue(new PlanesPagoEmail($user));

            return response()->json(['message' => 'Usuario registrado correctamente.'], 201);
        } catch (\Exception $e) {
            Log::error("Error API al registrar usuario: ".$e->getMessage());
            return response()->json(['error' => 'Error interno del servidor.'], 500);
        }
    }

    // API: obtener todos los usuarios registrados
    public function index()
    {
        return response()->json(User::all());
    }
}
