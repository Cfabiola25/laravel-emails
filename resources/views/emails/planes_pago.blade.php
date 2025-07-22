<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Planes de Pago - PROYECTANDO</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        
        * {
            margin: 0;
            padding: 0;
        }


        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #fff;
            padding: 2rem;
        }

        .div_inicial{
            width: 100%;
            height: auto;
            margin: auto;
            background-color: #f8f4f4;
            border-radius: 10px;
        }

        .logo{
            margin: auto;
            display: flex;
            justify-content: center;
            padding: 2rem;
        }

        .logo img{
            width: 250px;
            height: auto;
        }

        .encabezado{
            background-color: #e90019;
            color: white;
            padding: 25px 30px;
            text-align: left;
            word-break: break-word;
        }

        .encabezado h2{
            font-size: 22px;
            margin: 0;
        }

        .contenido{
            padding: 2rem;
        }

        .titulo-principal{
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            text-align: center;
        }

        .titulo-principal h1{
            font-size:  1.8rem;
            line-height: 1.2rem;
            color: #101828;
            font-weight: 700;
        }

        .titulo-principal span{
            margin-top: 0.5rem;
            font-size: 1.5rem;
            width: 50%;
            color: #6a7282;
        }

        .contenedor-planes{
            width: 100%;
            height: 100%;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            margin-top: 1rem;
            gap: 1rem;
        }

        @media (max-width: 768px) {
            .titulo-principal span{
                width: 100%;
            }

            .contenedor-planes{
                grid-template-columns: repeat(1, 1fr);
                gap: 3rem;
            }
        }

        .contenedor-plan{
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: 100%;
            height: 35rem;
            border-radius: 16px;
            background-color: #fff;
            text-align: center;
            padding: 2rem;
        }

        .titulo-plan{
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .contenedor-plan h1{
            font-weight: 700;
            font-size: 1.5rem;
            line-height: 1.3rem;
            color: #030712;
        }

        .contenedor-plan p, span{
            color: #6a7282;
        }

        .contenedor-plan strong{
            font-size: 1.8rem;
            line-height: 1.2rem;
            color: #030712;
        }

        .lista-plan{
            margin-top: 1rem;
        }

        .lista-plan ul{
            text-align: left;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            color: #6a7282;
        }

        .lista-plan ul > li{
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        .boton-seleccionar{
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f4f4;
            border-radius: 12px;
            height: 3rem;
            text-align: center;
        }

        .boton-seleccionar span{
            font-weight: 700;
            color: #030712;
        }

        /*==============================================================================*/
        .contenedor-plan-principal{
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: 100%;
            height: 35rem;
            border-radius: 16px;
            background-color: #e90019;
            text-align: center;
            padding: 2rem;
            color: #fff;
        }

        .contenedor-plan-principal h1{
            font-weight: 700;
            font-size: 1.5rem;
            line-height: 1.3rem;
        }

        .contenedor-plan-principal p, span{
            color: #fff;
        }

        .contenedor-plan-principal strong{
            font-size: 1.8rem;
            line-height: 1.2rem;
        }

        .lista-plan-principal{
            margin-top: 1rem;
        }

        .lista-plan-principal ul{
            text-align: left;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .lista-plan-principal ul > li{
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        .boton-seleccionar-principal{
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f4f4;
            border-radius: 12px;
            height: 3rem;
            text-align: center;
        }

        .boton-seleccionar-principal span{
            font-weight: 700;
            color: #e90019;
        }

        .footer-contenedor{
            text-align: center;
            margin-top: 1rem;
        }

        .footer-contenedor a{
            color: #e90019;
            text-decoration: underline;
        }
    </style>
    <script src="https://kit.fontawesome.com/a1ddf57449.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="div_inicial">

        <!-- Logo -->
        <div class="logo">
            <img src="{{ $message->embed(public_path('images/LOGO_PROYECTANDO_OPTIMIZADO.png')) }}" alt="Logo Proyectando"/>
        </div>

        <!-- Encabezado adaptable -->
        <div class="encabezado">
            <h2>Hola, {{ $nombre }}</h2>
        </div>

        <!-- Contenido -->
        <div class="contenido">
            
            <div class="titulo-principal">
                <h1>
                    Planes de Entrada
                </h1>
                <span>Elige el plan perfecto para tu experiencia en eventos. Desde acceso basico hasta empresarial.</span>
            </div>

            <!-- Contenedor de planes -->
            <div class="contenedor-planes">
                
                <!--PRIMER PLAN-->
                <div class="contenedor-plan">
                    <div>
                        <div class="titulo-plan">
                            <h1>Plan Básico</h2>
                            <p>Perfecto para comenzar.</p>
                            <div>
                                <strong>$29.900</strong>
                                <span>/mes</span>
                            </div>
                        </div>
                        <div class="lista-plan">
                            <ul>
                                <li><i class="fa-solid fa-check" style="color: #00c489;"></i>Acceso general al evento</li>
                                <li><i class="fa-solid fa-check" style="color: #00c489;"></i>Certificado digital</li>
                                <li><i class="fa-solid fa-check" style="color: #00c489;"></i>Notificaciones generales</li>
                                <li><i class="fa-solid fa-check" style="color: #00c489;"></i>Networking básico</li>
                            </ul>
                        </div>
                    </div>
                    
                    
                    <a href="">
                        <div class="boton-seleccionar">
                            <span>Seleccionar Plan</span>
                        </div>
                    </a>
                    
                </div>

                <!--SEGUNDO PLAN-->
                <div class="contenedor-plan-principal">
                    <div>
                        <div class="titulo-plan">
                            <h1>Plan Premium</h2>
                            <p>Perfecto para comenzar.</p>
                            <div>
                                <strong>$79.900</strong>
                                <span>/mes</span>
                            </div>
                        </div>
                        <div class="lista-plan-principal">
                            <ul>
                                <li><i class="fa-solid fa-check"></i>Acceso general al evento</li>
                                <li><i class="fa-solid fa-check"></i>Certificado digital</li>
                                <li><i class="fa-solid fa-check"></i>Notificaciones generales</li>
                                <li><i class="fa-solid fa-check"></i>Networking básico</li>
                                <li><i class="fa-solid fa-check"></i>Inscripción prioritaria</li>
                                <li><i class="fa-solid fa-check"></i>Soporte especial</li>
                                <li><i class="fa-solid fa-check"></i>Kit de bienvenida</li>
                            </ul>
                        </div>
                    </div>
                    
                    
                    <a href="">
                        <div class="boton-seleccionar-principal">
                            <span>Seleccionar Plan</span>
                        </div>
                    </a>
                    
                </div>


                <!--TERCER PLAN-->
                <div class="contenedor-plan">
                    <div>
                        <div class="titulo-plan">
                            <h1>Plan Empresarial</h2>
                            <p>Para equipos y empresas.</p>
                            <div>
                                <strong>$149.900</strong>
                                <span>/mes</span>
                            </div>
                        </div>
                        <div class="lista-plan">
                            <ul>
                                <li><i class="fa-solid fa-check" style="color: #00c489;"></i>Acceso general al evento</li>
                                <li><i class="fa-solid fa-check" style="color: #00c489;"></i>Certificado digital</li>
                                <li><i class="fa-solid fa-check" style="color: #00c489;"></i>Notificaciones generales</li>
                                <li><i class="fa-solid fa-check" style="color: #00c489;"></i>Networking básico</li>
                                <li><i class="fa-solid fa-check"></i>Inscripción prioritaria</li>
                                <li><i class="fa-solid fa-check"></i>Soporte especial</li>
                                <li><i class="fa-solid fa-check"></i>Kit de bienvenida</li>
                                <li><i class="fa-solid fa-check"></i>Gestión de tus eventos</li>
                                <li><i class="fa-solid fa-check"></i>Estadísticas avanzadas</li>
                                <li><i class="fa-solid fa-check"></i>Branding personalizado</li>
                            </ul>
                        </div>
                    </div>
                    
                    
                    <a href="">
                        <div class="boton-seleccionar">
                            <span>Seleccionar Plan</span>
                        </div>
                    </a>
                    
                </div>
                
            </div>

            <!-- Footer -->
            <div class="footer-contenedor">
                ¿Tienes dudas? Escríbenos a
                <a href="mailto:soporte@proyectando.com" >soporte@proyectando.com</a>
            
            </div>
        </div>
    </div>
</body>
</html>