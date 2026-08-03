<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prototipos Navais - Nuestra Evolución</title>
    <!-- Tipografía Poppins cargada para toda la web -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/3d.css">
    <link rel="icon" type="image/svg+xml" href="/img/isologo.svg">
    
    <!-- Librería para el Modelo 3D -->
    <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.4.0/model-viewer.min.js"></script>
</head>

<body>
    <?php
        // Variables de los modelos 3D
        $modelo_v1 = "CajaNavaisV3.glb"; // El archivo que ya tenés
        $modelo_v2 = ""; // Aún no está listo, lo dejamos vacío para el placeholder
        $modelo_kids = "omnitrixv2.0.glb"; // Modelo infantil futuro
    ?>

   <!-- NAVEGACIÓN UNIVERSAL -->
    <!-- NAVEGACIÓN UNIVERSAL -->
    <header class="navbar">
        <div class="container nav-container">
            <a href="index.php">
                <img src="/img/Navais_logo1.svg" 
                     alt="Conoce nuestros prototipos" 
                     class="logo" id="logo-navais">
            </a>
            
            <nav class="ignorar-lectura">
                <ul class="nav-links">
                    <li><a href="index.php">El Proyecto</a></li>
                    <li><a href="3d.php">Prototipos 3D</a></li>
                    <li><a href="notas.php">En los Medios</a></li>
                    <li><a href="#contacto" class="btn-primary">Contacto</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- INTRODUCCIÓN -->
    <section class="hero" id="inicio">
        <div class="container hero-content">
            <h1>La evolución de Navais</h1>
            <p>El diseño de nuestra tecnología no se detiene. Trabajamos iterando cada prototipo basándonos en el feedback real de los usuarios, buscando siempre un equilibrio perfecto entre <strong>funcionalidad, ergonomía y accesibilidad.</strong> Te invitamos a explorar de cerca nuestras versiones.</p>
        </div>
    </section>

    <!-- PROTOTIPO V1 -->
    <section class="section bg-light" id="v1">
        <div class="container">
            <div class="grid-2 align-center">
                <div>
                    <h2>Prototipo V1: El inicio de nuestra visión</h2>
                    <p>Esta fue nuestra primera prueba tangible. Diseñamos este módulo inicial con impresión 3D básica para validar el funcionamiento del <strong>sensor láser y el motor de vibración</strong>. </p>
                    <p>Con este modelo confirmamos que la lectura frontal de obstáculos elevados (desde la cintura hasta la cabeza) es totalmente posible y efectiva. Su carcasa, aunque robusta, nos permitió realizar las primeras pruebas de campo y entender las necesidades de miniaturización para las siguientes versiones.</p>
                </div>
                <div class="model-wrapper ignorar-lectura">
                    <!-- Modelo 3D -->
                    <model-viewer 
                        src="<?php echo $modelo_v1; ?>" 
                        alt="Un modelo 3D interactivo del primer prototipo de Navais. Tiene forma rectangular y robusta." 
                        auto-rotate 
                        camera-controls 
                        shadow-intensity="1"
                        camera-orbit="45deg 55deg auto">
                    </model-viewer>
                </div>
            </div>
        </div>
    </section>

    <!-- PROTOTIPO V2 -->
    <section class="section" id="v2">
        <div class="container">
            <div class="grid-2 reverse-mobile align-center">
                <div class="model-wrapper placeholder-3d ignorar-lectura">
                    <!-- Placeholder para cuando esté el V2 -->
                    <?php if($modelo_v2 != ""): ?>
                        <model-viewer src="<?php echo $modelo_v2; ?>" alt="Modelo 3D del prototipo versión 2" auto-rotate camera-controls shadow-intensity="1"></model-viewer>
                    <?php else: ?>
                        <div class="coming-soon">
                            <h3>V2 en desarrollo...</h3>
                            <div class="spinner"></div>
                        </div>
                    <?php endif; ?>
                </div>
                <div>
                    <h2>Prototipo V2: Ergonómico y refinado (En desarrollo)</h2>
                    <p>Aprendimos mucho de nuestro primer diseño. Actualmente, estamos trabajando en la <strong>Versión 2</strong>, enfocándonos en reducir su tamaño en un 40% y suavizar sus líneas para que sea mucho más cómodo de llevar en los anteojos o en la muñeca.</p>
                    <p>Esta nueva versión integrará una batería de mayor duración y un sistema de encastre magnético rápido, logrando que el dispositivo se sienta como una extensión natural del usuario, pasando completamente desapercibido.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- PROTOTIPO INFANTIL -->
    <section class="section bg-light" id="kids">
        <div class="container">
            <div class="grid-2 align-center">
                <div>
                    <h2>Navais Kids: Autonomía desde pequeños</h2>
                    <p>Sabemos que los niños necesitan explorar el mundo con seguridad y confianza. Por eso proyectamos <strong>Navais Kids</strong>, una adaptación de nuestra tecnología pensada exclusivamente para ellos.</p>
                    <p>Este modelo cuenta con bordes completamente redondeados, materiales hipoalergénicos y colores amigables. Además, el patrón de vibración será más suave y lúdico, ayudando a los más chicos a interpretar su entorno espacial de manera intuitiva y sin asustarse.</p>
                </div>
                <div class="model-wrapper ignorar-lectura">
                    <!-- Modelo 3D Infantil -->
                    <?php if($modelo_kids != ""): ?>
                        <model-viewer 
                            src="<?php echo $modelo_kids; ?>" 
                            alt="Modelo 3D interactivo del prototipo infantil Navais Kids, con un diseño más amigable y redondeado." 
                            auto-rotate 
                            camera-controls 
                            shadow-intensity="1"
                            camera-orbit="45deg 55deg auto">
                        </model-viewer>
                    <?php else: ?>
                         <div class="coming-soon"><h3>Próximamente</h3></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACTO (Igual a la home) -->
    <section class="section" id="contacto">
        <div class="container text-center">
            <h2>Sé parte de Navais</h2>
            <p><strong>Cada aporte suma.</strong> Buscamos instituciones dispuestas a testear el prototipo físico en la vía pública, alianzas con obras sociales para su distribución, y financiamiento para costear los componentes y escalar nuestra producción a todo el país.</p>
            <p>Podés conocer más de nuestro trabajo y contactarnos en nuestro <strong>Instagram</strong>: <a href="https://www.instagram.com/navais.ar" target="_blank">@navais.ar</a>. ¡Te esperamos!</p>

            <form action="#contacto" method="POST" class="contact-form ignorar-lectura">
                <input type="text" name="nombre" placeholder="Tu Nombre" required>
                <input type="email" name="email" placeholder="Tu Correo Electrónico" required>
                <textarea name="mensaje" rows="5" placeholder="¿Cómo te gustaría colaborar?" required></textarea>
                <button type="submit" class="btn-primary">Enviar Mensaje</button>
            </form>
        </div>
    </section>

    <!-- FOOTER -->
    <!-- FOOTER UNIVERSAL (MAPA DEL SITIO) -->
    <footer class="ignorar-lectura">
        <div class="container">
            <div class="footer-grid">
                <!-- Columna 1: Marca -->
                <div class="footer-col marca">
                    <!-- Usamos un filtro CSS en línea para que el logo SVG se vea blanco sobre el fondo negro -->
                    <img src="/img/Navais_logo1.svg" alt="Navais Logo" style="height: 60px; margin-bottom: 15px; filter: brightness(0) invert(1);">
                    <p style="font-size: 0.95rem; color: #ccc;">Tecnología de alta fidelidad, creada con empatía para acompañarte en cada paso.</p>
                </div>
                
                <!-- Columna 2: El Proyecto -->
                <div class="footer-col">
                    <h4>El Proyecto</h4>
                    <ul>
                        <li><a href="index.php#problema">El Problema</a></li>
                        <li><a href="index.php#solucion">Nuestra Solución</a></li>
                        <li><a href="index.php#equipo">El Equipo</a></li>
                    </ul>
                </div>

                <!-- Columna 3: Prototipos -->
                <div class="footer-col">
                    <h4>Prototipos 3D</h4>
                    <ul>
                        <li><a href="3d.php#v1">Versión 1 (Testeo)</a></li>
                        <li><a href="3d.php#v2">Versión 2 (Ergonómico)</a></li>
                        <li><a href="3d.php#kids">Navais Kids</a></li>
                    </ul>
                </div>

                <!-- Columna 4: Impacto y Contacto -->
                <div class="footer-col">
                    <h4>Prensa y Redes</h4>
                    <ul>
                        <li><a href="notas.php#nota-1">Final Nacional</a></li>
                        <li><a href="notas.php#nota-3">Reconocimiento UNCUYO</a></li>
                        <li><a href="https://www.instagram.com/navais.ar" target="_blank">Instagram Oficial</a></li>
                    </ul>
                </div>
            </div>

            <!-- Copyright -->
            <div class="footer-bottom">
                <p>&copy; 2026 Navais. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- BOTÓN DE LECTURA FLOTANTE -->
    <div class="lector-flotante ignorar-lectura">
        <button id="btn-leer" class="btn-leer-flotante" aria-label="Leer sobre los prototipos de Navais">
            🔊 Leer
        </button>
    </div>

    <!-- Script para el lector de voz (Asegurate de incluir tu JS original) -->
    <script src="/js/index.js"></script>
</body>
</html>