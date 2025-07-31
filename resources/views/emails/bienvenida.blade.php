<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido a PROYECTANDO</title>
</head>
<body style="font-family: Verdana, Tahoma, sans-serif; background-color: #f3f4f6; padding: 20px; margin: 0;">
    <div style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">

        <!-- LOGO -->
        <div style="text-align: center; padding-top: 20px;">
            <img src="{{ $message->embed(public_path('images/LOGO_PROYECTANDO_OPTIMIZADO.png')) }}"
                 alt="Logo Proyectando"
                 style="width: 300px; margin: auto; display: block;" />
        </div>

        <!-- Encabezado -->
        <div style="height: 20px;"></div>
        <div style="background-color: #e90019; color: #ffffff; text-align: left; padding: 20px;">
            <h2 style="font-size: 24px; margin: 0;">¡Gracias por registrarte, {{ $nombre }}!</h2>
        </div>

        <!-- Contenido -->
        <div style="padding: 30px;">
            <p style="font-size: 16px; color: #111827; margin-bottom: 20px;">
                Te damos la bienvenida a <strong>PROYECTANDO</strong>, la plataforma de gestión de eventos de la FESC. Aquí podrás inscribirte, asistir y hacer seguimiento a todos tus eventos.
            </p>

            <!-- Botón -->
            <div style="text-align: center; margin: 30px 0;">
                <a href="#"
                   style="background-color: #e90019; color: #ffffff; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-size: 16px; display: inline-block;">
                    Ir a la plataforma de eventos
                </a>
            </div>

            <!-- Mensaje final -->
            <p style="font-size: 16px; color: #111827; text-align: center;">
                ¡Gracias por hacer parte de esta experiencia!
            </p>

            <!-- Footer -->
            <p style="font-size: 14px; color: #6b7280; margin-top: 30px;">
                Si tienes dudas, escríbenos a
                <a href="mailto:soporte@proyectando.com" style="color: #2563eb; text-decoration: none;">soporte@proyectando.com</a>
            </p>
        </div>
    </div>
</body>
</html>
