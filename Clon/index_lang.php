
<style>
    /* Ocultar footer original */
    body > footer,
    .footer,
    #footer {
        display: none !important;
    }

    /* ========== OCULTAR/DESOCULTAR SELECTOR DE IDIOMAS ORIGINAL ========== */
    /* Descomenta las líneas de abajo para OCULTAR el selector original */
    /* Comenta las líneas de abajo para MOSTRAR el selector original */

    /*
    .header-selectors,
    .header-selectors .custom-select,
    div.header-selectors {
        display: none !important;
        visibility: hidden !important;
    }
    */

    .boton_redondo:hover{
        /*background-color: <?= $theme_color ?>;*/
    }
    .carousel .carousel-indicators li:hover .boton_redondo.dark:before{
	background-color: rgba(<?= $rgb ?>, 0.9);
    }
    .navbar .nav-item a:before {
        border-bottom: 2px solid <?= $theme_color ?>;
    }
    .datepicker th {
        color: <?= $theme_color ?>;
    }
    .reserva [type="radio"].with-gap:checked+label:before, .reserva [type="radio"].with-gap:checked+label:after {
        border: 2px solid <?= $theme_color ?>;
        background-color: <?= $theme_color ?>;
    }
    .input-field > label {
        color: <?= $theme_color ?>;
    }
    .reserva .note {
    color: <?= $theme_color ?>;
    }
    .btn-primary {
        background-color: <?= $theme_color ?>;
        border: solid 2px <?= $theme_color ?>;
    }
    .reserva .completar .terminos label a {
        color: <?= $theme_color ?>;
    }
    .btn-secondary:hover, .btn-secondary:focus, .btn-secondary.focus, .btn-secondary:not(:disabled):not(.disabled).active, .btn-secondary:not(:disabled):not(.disabled):active {
        background-color: <?= $theme_color ?>;
        border-color: <?= $theme_color ?>;
    }
    .banner_separador {
        background-color: <?= $theme_color ?>;
    }
    .coloured {
        color: <?= $theme_color ?>;
    }
    span.coloured {
        font-weight: bold;
    }
    .reserva form>#loader>.texto {
        color: <?= $theme_color ?>;
    }
    .reserva form>#loader:after {
		background: url(<?= $loader_url ?>) center center no-repeat;
		width: 110px;
		height: 110px;
		background-size: contain;
	}
    #titulo_visita{
        text-transform: uppercase;
    }
	.wrapper_hora_selector, .wrapper_hora_selector_combo {
		border: solid 1px <?= $theme_color ?>;
    	border-bottom: solid 7px <?= $theme_color ?>;
	}
	.hora_selector_arrow {
		border-top: 10px solid <?= $theme_color ?>;
	}
    .modalContainer {
        display: none;
        position: fixed;
        z-index: 9999;
        padding-top: 300px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
    }
    .modalContainer .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 5px 20px;
        border: 1px solid lightgray;
        border-top: 10px solid <?= $theme_color ?>;
        border-radius: 5px;
        width: 50%;
        min-width: 280px;
        max-width: 600px;
    }
    .modalContainer .modal-content .modal-footer {
        text-align: center;
        width: 100%;
    }
    .modalContainer .modal-content .modal-footer button {
        margin: 0 auto;
        border-radius: 5px;
    }
    .louvre-content-section ul {
        text-align: left;
    }

    /* ========== AJUSTES CALENDARIO EN MODAL - REDUCIR ESPACIO ========== */
    /* Reducir padding del modal body */
    .theme4-modal-body {
        padding: 1rem !important;
    }

    /* Reducir espacio del calendario */
    .wizard-step[data-step="1"] {
        padding: 0 !important;
        margin: 0 !important;
    }

    /* Reducir espacios internos del datepicker */
    .ui-datepicker,
    .datepicker,
    #ui-datepicker-div {
        padding: 0.5rem !important;
        margin-bottom: 0.5rem !important;
    }

    .ui-datepicker table,
    .datepicker table {
        margin-bottom: 0.5rem !important;
    }

    .ui-datepicker td,
    .datepicker td {
        padding: 2px !important;
    }

    /* Reducir espacio de los br después del calendario */
    .wizard-step[data-step="1"] br {
        display: none !important;
    }

    /* Reducir margin de la navegación del wizard */
    .wizard-navigation {
        margin-top: 0.75rem !important;
        padding-top: 0.75rem !important;
    }

    /* Asegurar que el step 1 sea compacto */
    .wizard-step[data-step="1"] > * {
        margin-bottom: 0.5rem !important;
    }

    /* ========== AJUSTES PUNTOS DE DISPONIBILIDAD - NO PISAR PRECIOS ========== */
    /* Desplazar puntos de disponibilidad hacia abajo para que no pisen los precios */
    .ui-datepicker td span::after,
    .ui-datepicker td a::after,
    .datepicker td span::after,
    .datepicker td a::after,
    td.ui-datepicker-current-day::after,
    td.ui-datepicker-today::after {
        margin-top: -6px !important;
        transform: translateY(-6px) !important;
    }

    /* Estilos específicos para los puntos de disponibilidad */
    .ui-state-default::after,
    .ui-state-active::after,
    .ui-state-hover::after {
        margin-top: -6px !important;
        transform: translateY(-6px) !important;
    }

    /* Reglas específicas para días seleccionados y día actual - MUY IMPORTANTE */
    td.ui-datepicker-current-day a::after,
    td.ui-datepicker-current-day span::after,
    td.ui-datepicker-today a::after,
    td.ui-datepicker-today span::after,
    .ui-datepicker-current-day .ui-state-active::after,
    .ui-datepicker-today .ui-state-active::after,
    a.ui-state-active::after,
    span.ui-state-active::after {
        margin-top: -6px !important;
        transform: translateY(-6px) !important;
        top: auto !important;
        bottom: auto !important;
    }

    /* Si los puntos están dentro de un elemento con clase específica */
    .agotadas::before,
    .disponible::before,
    .available::before,
    .unavailable::before {
        margin-top: -6px !important;
        transform: translateY(-6px) !important;
    }

    /* Forzar para todos los posibles pseudo-elementos en celdas del datepicker */
    .ui-datepicker td::after,
    .ui-datepicker td *::after,
    .datepicker td::after,
    .datepicker td *::after {
        margin-top: -6px !important;
        transform: translateY(-6px) !important;
    }

    /* ========== ESTILOS CRÍTICOS NAVBAR LOUVRE - FORZADOS ========== */

    /* Logo con fondo CASI BLANCO PURO (95%) para MÁXIMO contraste */
    .navbar-brand,
    .louvre-logo,
    .navbar .navbar-brand,
    header .navbar-brand,
    nav .navbar-brand,
    a.navbar-brand {
        background: rgba(255, 255, 255, 0.95) !important;
        background-color: rgba(255, 255, 255, 0.95) !important;
        padding: 0.4rem 0.8rem !important;
        border-radius: 6px !important;
        box-shadow: 0 2px 8px rgba(255, 255, 255, 0.3) !important;
    }

    .navbar-brand:hover,
    .louvre-logo:hover,
    .navbar .navbar-brand:hover {
        background: #ffffff !important;
        background-color: #ffffff !important;
    }

    /* Texto del logo en NEGRO sobre fondo claro */
    .navbar-brand,
    .navbar-brand *,
    .navbar-brand span,
    .navbar-brand i,
    .louvre-logo,
    .louvre-logo *,
    .navbar .navbar-brand,
    .navbar .navbar-brand *,
    .navbar .navbar-brand span,
    header .navbar-brand,
    header .navbar-brand *,
    .navbar-brand .louvre-logo-text,
    .navbar-brand .louvre-logo-icon {
        color: #000000 !important;
        fill: #000000 !important;
    }

    /* Navbar alineado a la derecha */
    .navbar-nav,
    .navbar .navbar-nav,
    header .navbar-nav {
        display: flex !important;
        align-items: center !important;
        margin-left: auto !important;
        margin-right: 0 !important;
        padding: 0 !important;
        height: auto !important;
        min-height: auto !important;
    }

    .navbar-collapse,
    .navbar .navbar-collapse,
    header .navbar-collapse {
        display: flex !important;
        justify-content: flex-end !important;
        flex-grow: 1 !important;
        margin: 0 !important;
        padding: 0 !important;
        height: auto !important;
        min-height: auto !important;
    }

    /* Asegurar que el navbar mantenga su altura original */
    .navbar,
    .louvre-navbar,
    header.navbar,
    nav.navbar {
        padding: 0.5rem 2rem !important;
        height: auto !important;
        min-height: auto !important;
        display: flex !important;
        align-items: center !important;
    }
</style>
<?php
// CSS is automatically loaded by header.php from theme.json
?>

<!-- EventBus -->
<script src="/conf/componentes/EventBus.js"></script>
<div id="tvesModal" class="modalContainer">
    <div class="modal-content">
        <div class="row">
            <div class="col-md-12 form-group" id="modal-content">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal"><?= $connection->tra("Entendido") ?></button>
        </div>
    </div>
</div>

<main class="louvre-theme">
    <!-- HERO SECTION -->
    <section class="louvre-hero" style="background: linear-gradient(rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.65)), url('<?= $hero_image ?? "https://images.unsplash.com/photo-1499856871958-5b9627545d1a?w=1920&q=80" ?>') center/cover no-repeat;">
        <div class="louvre-hero-content">
            <h1><?= $connection->tra($site_title ?? "Museo del Louvre Tickets") ?></h1>
            <a href="#tours" class="louvre-hero-link"><?= $connection->tra("Ver todas las actividades") ?> ↓</a>
            <a href="#tours" class="louvre-hero-cta"><?= $connection->tra("COMPRAR ENTRADAS") ?></a>
            <p class="louvre-hero-subtitle"><?= $connection->tra("Adquiera sus entradas con suficiente antelación") ?></p>
        </div>
    </section>

    <!-- FEATURES BAR -->
    <section class="louvre-features">
        <?php if(isset($features) && is_array($features)): ?>
            <?php foreach($features as $feature): ?>
            <div class="louvre-feature">
                <span class="louvre-feature-highlight"><?= $feature['highlight'] ?? '' ?></span>
                <span class="louvre-feature-text"><?= $feature['text'] ?? '' ?></span>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="louvre-feature">
                <span class="louvre-feature-highlight">+ 35.000 <?= $connection->tra("obras expuestas") ?></span>
            </div>
            <div class="louvre-feature">
                <span class="louvre-feature-text"><?= $connection->tra("Museo de arte más visitado del mundo") ?></span>
            </div>
            <div class="louvre-feature">
                <span class="louvre-feature-highlight">+ 8 <?= $connection->tra("millones de visitantes anuales") ?></span>
            </div>
        <?php endif; ?>
    </section>

    <!-- SECTION TITLE -->
    <h2 class="louvre-section-title" id="tours"><?= $connection->tra("Las mejores experiencias") ?></h2>

    <!-- TOUR CARDS -->
    <section class="tour-cards-section">
        <div class="tour-cards-container">
            <?php 
            $cards_to_show = !empty($app_group) ? $app_group : $app_tours;
            foreach ($cards_to_show as $key_tour => $tour) {
                if (isset($tour['visible']) && $tour['visible'] === false) continue;
                if (!empty($tour['admin'])) continue;
                
                $img_url = $tour[$idioma]["img"] ?? 'default.jpg';
                $title = $tour[$idioma]['title_category'] ?? ($tour[$idioma]['title_banner'] ?? 'Tour');
                $price_id = "precio_base_" . $key_tour;
                ?>
                <div class="tour-card" data-tour-id="<?= $key_tour ?>">
                    <div class="tour-card-image" style="background-image: url('<?= $img_url ?>');"></div>
                    <div class="tour-card-content">
                        <h3 class="tour-card-title"><?= $title ?></h3>
                        <div class="tour-card-price">
                            <small><?= $connection->tra("Desde")?></small>
                            <span id="<?= $price_id ?>">--,--</span><?= $currency_symbol ?>
                        </div>
                        <div class="tour-buttons-container">
                            <a href="/styles/<?= $__themeSlug ?? getActiveThemeSlug() ?>/info_tours.php?tour=<?= $key_tour ?>&idioma=<?= $idioma ?>" class="tour-info-btn">
                                +INFO
                            </a>
                            <button class="tour-buy-btn" onclick="openModal('<?= $key_tour ?>', '<?= addslashes($title) ?>')">
                                <?= $connection->tra("COMPRAR ENTRADAS") ?>
                            </button>
                        </div>
                    </div>
                </div>
                <?php 
            }
            ?>
        </div>
    </section>

    <!-- BENEFITS SECTION -->
    <section class="louvre-benefits">
        <div class="louvre-benefit">
            <div class="louvre-benefit-title"><?= $connection->tra("Escoja el tipo de visita") ?></div>
            <div class="louvre-benefit-text"><?= $connection->tra("Seleccione la que más se adapte a sus preferencias") ?></div>
        </div>
        <div class="louvre-benefit">
            <div class="louvre-benefit-title"><?= $connection->tra("Flexibilidad horaria") ?></div>
            <div class="louvre-benefit-text"><?= $connection->tra("Escoja el día y la hora según sus preferencias") ?></div>
        </div>
        <div class="louvre-benefit">
            <div class="louvre-benefit-title"><?= $connection->tra("Recorra cada rincón") ?></div>
            <div class="louvre-benefit-text"><?= $connection->tra("Disfrute de un monumento único en el mundo") ?></div>
        </div>
    </section>

    <!-- CONTENT SECTIONS -->
    <h2 class="louvre-section-title-left"><?= $connection->tra("Adquisición de entradas para el Museo del Louvre") ?></h2>
    <div class="louvre-content-section">
        <p><?= $connection->tra("Para acceder al") ?> <strong><?= $connection->tra("Museo del Louvre") ?></strong>, <?= $connection->tra("existen diversas opciones para la adquisición de entradas, lo que le permitirá elegir la modalidad que mejor se adapte a sus necesidades y evitar largas esperas. Se pueden adquirir de") ?> <strong><?= $connection->tra("manera online") ?></strong> <?= $connection->tra("con antelación y mediante las") ?> <strong><?= $connection->tra("taquillas del museo") ?></strong>, <?= $connection->tra("situadas en la pirámide de vidrio y otras áreas de acceso.") ?></p>
        <p><?= $connection->tra("Con la adquisición de las entradas, se incluye") ?> <strong><?= $connection->tra("el acceso a las colecciones permanentes") ?></strong> <?= $connection->tra("y") ?> <strong><?= $connection->tra("exposiciones temporales del Museo del Louvre") ?></strong>, <?= $connection->tra("así como al") ?> <strong><?= $connection->tra("Museo Eugène Delacroix") ?></strong> <?= $connection->tra("(solo si se hace en un plazo de 48 h, a partir de su primer uso).") ?></p>
    </div>

    <h2 class="louvre-section-title-left"><?= $connection->tra("Horario del Museo del Louvre") ?></h2>
    <div class="louvre-content-section">
        <p><?= $connection->tra("El horario habitual del Museo del Louvre es:") ?></p>
        <ul>
            <li><strong><?= $connection->tra("Lunes, jueves, sábado y domingo:") ?></strong> 9:00-18:00</li>
            <li><strong><?= $connection->tra("Miércoles y viernes:") ?></strong> 9:00-21:00</li>
            <li><strong><?= $connection->tra("Martes:") ?></strong> <?= $connection->tra("Cerrado") ?></li>
        </ul>
        <p><?= $connection->tra("Es importante tener en consideración que el museo puede cerrar en días festivos o durante eventos especiales.") ?></p>
    </div>

    <!-- INFO CAROUSEL SECTION -->
    <section class="louvre-info-section">
        <div class="louvre-info-carousel">
            <div class="louvre-info-slide active">
                <div class="louvre-info-content">
                    <span class="louvre-info-number">1</span>
                    <h3 class="louvre-info-title"><?= $connection->tra("De la Colección de la Monarquía al Museo del Pueblo") ?></h3>
                    <p class="louvre-info-text"><strong><?= $connection->tra("El Museo del Louvre nació durante la Revolución Francesa") ?></strong>, <?= $connection->tra("cuando las colecciones privadas de la monarquía, la aristocracia y la iglesia fueron abiertas al público. Este gesto transformador marcó un antes y un después en la historia de los museos, al convertir el arte en un patrimonio accesible para todos.") ?></p>
                </div>
                <div class="louvre-info-image">
                    <img src="https://images.unsplash.com/photo-1742189415527-9149c0c546c8?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="<?= $connection->tra("Historia del Louvre") ?>">
                </div>
            </div>

            <div class="louvre-info-slide">
                <div class="louvre-info-content">
                    <span class="louvre-info-number">2</span>
                    <h3 class="louvre-info-title"><?= $connection->tra("La Mona Lisa de Leonardo da Vinci") ?></h3>
                    <p class="louvre-info-text"><?= $connection->tra("La") ?> <strong><?= $connection->tra("Mona Lisa") ?></strong>, <?= $connection->tra("pintada por") ?> <strong>Leonardo da Vinci</strong> <?= $connection->tra("entre 1503 y 1506, es una de las") ?> <strong><?= $connection->tra("obras más icónicas y misteriosas") ?></strong> <?= $connection->tra("de la historia del arte. La pintura destaca por su") ?> <strong><?= $connection->tra("sonrisa enigmática") ?></strong> <?= $connection->tra("y por el uso de la técnica del") ?> <strong>sfumato</strong>.</p>
                </div>
                <div class="louvre-info-image">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Mona_Lisa%2C_by_Leonardo_da_Vinci%2C_from_C2RMF_retouched.jpg/2560px-Mona_Lisa%2C_by_Leonardo_da_Vinci%2C_from_C2RMF_retouched.jpg" alt="<?= $connection->tra("La Mona Lisa") ?>">
                </div>
            </div>
            
            <div class="louvre-info-slide">
                <div class="louvre-info-content">
                    <span class="louvre-info-number">3</span>
                    <h3 class="louvre-info-title"><?= $connection->tra("Colecciones Diversas del Louvre") ?></h3>
                    <p class="louvre-info-text"><?= $connection->tra("El") ?> <strong><?= $connection->tra("Museo del Louvre") ?></strong> <?= $connection->tra("alberga a más de") ?> <strong>35.000 <?= $connection->tra("obras de arte") ?></strong> <?= $connection->tra("que abarcan desde la") ?> <strong><?= $connection->tra("antigüedad") ?></strong> <?= $connection->tra("hasta el") ?> <strong><?= $connection->tra("arte contemporáneo") ?></strong>. <?= $connection->tra("Sus salas están llenas de piezas de diferentes culturas y períodos.") ?></p>
                </div>
                <div class="louvre-info-image">
                    <img src="https://images.unsplash.com/photo-1591289009723-aef0a1a8a211?w=800&q=80" alt="<?= $connection->tra("Colecciones del Louvre") ?>">
                </div>
            </div>
            
            <div class="louvre-info-slide">
                <div class="louvre-info-content">
                    <span class="louvre-info-number">4</span>
                    <h3 class="louvre-info-title"><?= $connection->tra("La Pirámide del Louvre: Entre la Historia y la Modernidad") ?></h3>
                    <p class="louvre-info-text"><?= $connection->tra("La") ?> <strong><?= $connection->tra("Pirámide de vidrio") ?></strong> <?= $connection->tra("del") ?> <strong><?= $connection->tra("Museo del Louvre") ?></strong> <?= $connection->tra("es una de las estructuras más reconocidas del mundo. Fue inaugurada en 1989 como parte de una renovación del museo, diseñada por el arquitecto") ?> <strong>Leoh Ming Pei</strong>.</p>
                </div>
                <div class="louvre-info-image">
                    <img src="https://images.unsplash.com/photo-1499856871958-5b9627545d1a?w=800&q=80" alt="<?= $connection->tra("La Pirámide del Louvre") ?>">
                </div>
            </div>
            
            <div class="louvre-info-slide">
                <div class="louvre-info-content">
                    <span class="louvre-info-number">5</span>
                    <h3 class="louvre-info-title"><?= $connection->tra("Un viaje al Antiguo Egipto") ?></h3>
                    <p class="louvre-info-text"><?= $connection->tra("La") ?> <strong><?= $connection->tra("colección de arte egipcio") ?></strong> <?= $connection->tra("del Museo del Louvre es una de las más importantes y completas a nivel mundial, con más de") ?> <strong>50.000 <?= $connection->tra("piezas") ?></strong> <?= $connection->tra("que abarcan más de") ?> <strong>4.000</strong> <?= $connection->tra("años de historia.") ?></p>
                </div>
                <div class="louvre-info-image">
                    <img src="https://images.unsplash.com/photo-1541264161754-445bbdd7de52?w=800&q=80" alt="<?= $connection->tra("Arte Egipcio") ?>">
                </div>
            </div>
            
            <div class="louvre-info-slide">
                <div class="louvre-info-content">
                    <span class="louvre-info-number">6</span>
                    <h3 class="louvre-info-title"><?= $connection->tra("El Louvre actual: Un Icono Global del Arte") ?></h3>
                    <p class="louvre-info-text"><?= $connection->tra("El") ?> <strong><?= $connection->tra("Museo del Louvre") ?></strong> <?= $connection->tra("es uno de los") ?> <strong><?= $connection->tra("principales destinos culturales del mundo") ?></strong>, <?= $connection->tra("atrayendo a millones de visitantes cada año. Actualmente, el museo continúa siendo un lugar esencial para quienes desean sumergirse en el arte y la historia.") ?></p>
                </div>
                <div class="louvre-info-image">
                    <img src="https://images.unsplash.com/photo-1478391679764-b2d8b3cd1e94?w=800&q=80" alt="<?= $connection->tra("El Louvre Hoy") ?>">
                </div>
            </div>
            
            <div class="louvre-carousel-arrows">
                <button class="louvre-carousel-arrow prev"><i class="fas fa-chevron-left"></i></button>
                <button class="louvre-carousel-arrow next"><i class="fas fa-chevron-right"></i></button>
            </div>
            
            <div class="louvre-carousel-nav">
                <div class="louvre-carousel-dot active"></div>
                <div class="louvre-carousel-dot"></div>
                <div class="louvre-carousel-dot"></div>
                <div class="louvre-carousel-dot"></div>
                <div class="louvre-carousel-dot"></div>
                <div class="louvre-carousel-dot"></div>
            </div>
        </div>
    </section>

    <!-- CONTACT SECTION -->
    <section class="louvre-contact-section">
        <div class="louvre-contact-container">
            <h2 class="louvre-contact-title"><?= $connection->tra("Atención al cliente") ?></h2>
            <p class="louvre-contact-subtitle"><?= $connection->tra("Te ayudamos en lo que necesites") ?></p>
            <p class="louvre-contact-hours"><?= $connection->tra("Servicio de atención al cliente de lunes a domingo de 8:30 a 20:00h") ?></p>
            <br>
            <a href="mailto:soporte@feelthecitytours.com" style="color: #1a1a1a; text-decoration: none;">
                <i class="far fa-envelope"></i> soporte@feelthecitytours.com
            </a>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="louvre-footer">
        <div class="louvre-footer-content">
            <div class="louvre-footer-logo">
                <div class="louvre-footer-logo-icon"><i class="fas fa-chess-rook"></i></div>
            </div>
            <ul class="louvre-footer-links">
                <li><a href="#"><?= $connection->tra("Política de privacidad y cookies") ?></a></li>
                <li><a href="#"><?= $connection->tra("Condiciones generales") ?></a></li>
                <li><a href="#"><?= $connection->tra("Aviso legal") ?></a></li>
            </ul>
        </div>
        <div class="louvre-footer-bottom">
            <?= $connection->tra("Feel The City Tours - Agencia de viajes especializada en la venta de entradas, experiencias y tours. No somos la venta oficial del Museo del Louvre.") ?>
        </div>
    </footer>

    <!-- MODAL DE RESERVA -->
    <div id="theme4Modal" class="theme4-modal">
        <div class="theme4-modal-content">
            <div class="theme4-modal-header">
                <h3 class="theme4-modal-title"><?= $connection->tra("Elige una fecha y reserva.") ?></h3>
                <button class="theme4-modal-close">&times;</button>
            </div>
            <div class="theme4-modal-body">
                <section id="reserva" class="reserva">
                    <div class="haz_tu_reserva compra_tu_entrada">
                        <form action="/pagar" method="post" id="form_reserva">
                            <div id="loader"><div class="texto"><?= $connection->tra("Checking availability and best prices...")?></div></div>
                            <input type="hidden" name="nombre_tour" id="nombre_tour" value="<?=
                                            isset($tour_destacado, $app_group[$tour_destacado][$idioma]['title'])
                                                ? $app_group[$tour_destacado][$idioma]['title']
                                                : (isset($tour_destacado, $app_tours[$tour_destacado][$idioma]['title'])
                                                    ? $app_tours[$tour_destacado][$idioma]['title']
                                                    : '');
                                        ?>" />
                            <input type="hidden" name="vendedor" id="vendedor" value="web_en" />
                            <input type="hidden" name="idioma_web" id="idioma_web" value="<?= $idioma ?>" />
                            <input type="hidden" name="currency_code" id="currency_code" value="<?= $currency_code ?>" />
                            <input type="hidden" name="currency_rate" id="currency_rate" value="<?= $currency_rate ?>" />
                            <input type="hidden" name="currency_symbol" id="currency_symbol" value="<?= $currency_symbol ?>" />
                            <input type="hidden" name="precio_total_calculado" id="precio_total_calculado" value="" />
                            <div id="guestFields"></div>
                            <div id="guestFieldsType"></div>

                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        
                                        <!-- Step 1: Calendar + Tour Selector -->
                                        <div class="wizard-step" data-step="1">
                                            <input type="hidden" class="input_fecha" name="fecha" id="fecha" value="<?= date('Y-m-d');?>" />
                                            <?php render_calendar(); ?>
                                            <div style="display:none;">
                                                <?php render_tour_selector(); ?>
                                            </div>
                                        </div>

                                        <!-- Step 2: Servicios + Hora + Combos -->
                                        <div class="wizard-step" data-step="2" style="display: none;">
                                            <div class="hora servicios">
                                                <p class="titulo_formulario"><?= $connection->tra("IDIOMA DE GUÍA") ?></p>
                                                <div class="row align-items-center">
                                                    <?php foreach ($app_servicios as $key_serv => $servicio) {
                                                        if (!empty($servicio['admin'])) continue;?>
                                                        <div class="col">
                                                            <p class="linea_<?= $key_serv;?> with_info">
                                                                <input class="with-gap" name="servicio" type="radio" id="servicio_<?= $key_serv;?>" value="<?= $key_serv;?>" data-name="<?= $servicio[$idioma]['title'];?>" <?= $key_serv == $servicio_destacado ? 'checked' : '';?> />
                                                                <label for="servicio_<?= $key_serv;?>">
                                                                    <?= $servicio[$idioma]['title'];?> 
                                                                    <?= !empty($servicio[$idioma]['subtitle']) ? '<br /><small>'.$servicio[$idioma]['subtitle'].'</small>' : '';?> 
                                                                    <br /><span class="agotadas"></span>
                                                                </label>
                                                            </p>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="main_tour" <?= (
                                                                                    isset($app_tours[$tour_destacado]["main_tour"]) ||
                                                                                    isset($app_group[$tour_destacado]["main_tour"]) ) ? '' : 'style="display: none;"' ?>>
                                            </div>
                                            <?php render_time_selector(); ?>
                                            <div class="combos" id="bloque_combos" style="display: none;"></div>
                                            <div id="template_hora_combo" class="d-none row align-items-center">
                                                <div class="col-auto">
                                                    <p class="with_info">
                                                        <input class="with-gap horas_combos" name="hora_replacedbycombo" type="radio" id="hora_replacedbycombo_replacedbyhora" value="replacedbyhora" />
                                                        <label for="hora_replacedbycombo_replacedbyhora">
                                                            replacedbyhora
                                                            <br /><span class="agotadas"></span>
                                                        </label>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="hora horarios_visita d-none">
                                                <p class="titulo_formulario" id="titulo_visita">
                                                    <?php render_person_description(); ?>
                                                </p>
                                                <div id="template_visita" class="d-none row align-items-center">
                                                    <div class="col-auto">
                                                        <p class="linea_visita_replacedbyvisita with_info">
                                                            <input class="with-gap" name="hora_visita" type="radio" id="hora_visita_replacedbyvisita" value="replacedbyvisita" checked="checked" />
                                                            <label for="hora_visita_replacedbyvisita">
                                                                replacedbyvisita
                                                                <br /><span class="agotadas"></span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div id="wrapper_visita" class="row align-items-center"></div>
                                            </div>
                                        </div>

                                        <!-- Step 3: Personas -->
                                        <div class="wizard-step" data-step="3" style="display: none;">
                                            <br><br>
                                            <div class="personas">
                                                <script type="text/x-template" id="person-line-template" class="d-none">
                                                    <div class="row align-items-center justify-content-between linea linea_{{tipo}}" data-tipo="{{tipo}}">
                                                        <div class="col-auto vcenter">
                                                            <p>{{title}} {{subtitle}}</p>
                                                        </div>
                                                        <div class="precio_personas"><span id="precio_{{idInterno}}">00,00</span> <?= $currency_symbol ?></div>
                                                        <div class="col-auto personas_input" style="padding-left:30px;">
                                                            <div class="row align-items-center no-gutters">
                                                                <div class="col-auto boton-menos" data-action="dec"><?= $menos; ?></div>
                                                                <div class="col-auto"><input name="persona_{{tipo}}" id="persona_{{tipo}}" type="text" min="0" max="60" value="{{initialValue}}" data-persona="{{idInterno}}" /></div>
                                                                <div class="col-auto boton-mas" data-action="inc"><?= $mas; ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </script>
                                                <?php
                                                render_person_selector(['auto_init' => false]);
                                                foreach ($app_tours as $key => $tour) {
                                                    if (isset($tour[$idioma]['description'])) {
                                                        echo '<div class="note note_' . $key . '">' . $tour[$idioma]['description'] . '</div>';
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>

                                        <!-- Step 4: Datos cliente + Pago -->
                                        <div class="wizard-step" data-step="4" style="display: none;">
                                            <div class="completar nomargin">
                                                <?php render_client_form(); ?>
                                                <div class="completar">
                                                    <?php
                                                    echo '<div class="terminos">';
                                                    $requeridos = [];
                                                    $totales = [9];
                                                    if (isset($checks[1])) {
                                                        foreach ($checks[1] as $items) {
                                                            echo $items["html"];
                                                            if ($items["check"]) {
                                                                $requeridos[] = $items["name"];
                                                            }
                                                            $totales[] = $items["name"];
                                                        }
                                                    }
                                                    echo '</div><div class="advertencia"></div>';
                                                    ?>
                                                </div>
                                                <?php render_payment_button(); ?>
                                            </div>
                                        </div>

                                        <!-- Step 5: Stripe Payment -->
                                        <div class="wizard-step" data-step="5" style="display: none;">
                                            <div id="stripe-payment-container"></div>
                                        </div>

                                        <!-- Navigation -->
                                        <div class="wizard-navigation">
                                            <button type="button" class="wizard-btn wizard-btn-prev"><?= $connection->tra("Anterior") ?></button>
                                            <button type="button" class="wizard-btn wizard-btn-next"><?= $connection->tra("Siguiente") ?></button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>

</main>

<?php require $base_dir.'/lang/footer.php';?> 

<script>
$(function($){
	$.datepicker.regional["<?= $idioma ?>"] = {
		closeText: '<?= str_replace("'", "\\'", $connection->tra("Cerrar") ) ?>',
		prevText: '&#x3c;<?= str_replace("'", "\\'", $connection->tra("Previo") ) ?>',
		nextText: '<?= str_replace("'", "\\'", $connection->tra("Siguiente") ) ?>&#x3e;',
		currentText: '<?= str_replace("'", "\\'", $connection->tra("Hoy") ) ?>',
		monthNames: ['<?= $connection->tra("Enero") ?>','<?= $connection->tra("Febrero") ?>','<?= $connection->tra("Marzo") ?>',
                    '<?= $connection->tra("Abril") ?>','<?= $connection->tra("Mayo") ?>','<?= $connection->tra("Junio") ?>',
                    '<?= $connection->tra("Julio") ?>','<?= $connection->tra("Agosto") ?>','<?= $connection->tra("Septiembre") ?>',
                    '<?= $connection->tra("Octubre") ?>','<?= $connection->tra("Noviembre") ?>','<?= $connection->tra("Diciembre") ?>'],
		monthNamesShort: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
		dayNames: ['<?= $connection->tra("Domingo") ?>','<?= $connection->tra("Lunes") ?>','<?= $connection->tra("Martes") ?>','<?= $connection->tra("Miércoles") ?>',
                        '<?= $connection->tra("Jueves") ?>','<?= $connection->tra("Viernes") ?>','<?= $connection->tra("Sábado") ?>'],
		dayNamesShort: ['<?= $connection->tra("Dom") ?>','<?= $connection->tra("Lun") ?>','<?= $connection->tra("Mar") ?>','<?= $connection->tra("Mie") ?>',
                            '<?= $connection->tra("Jue") ?>','<?= $connection->tra("Vie") ?>','<?= $connection->tra("Sab") ?>'],
		dayNamesMin: ['<?= $connection->tra("DOM") ?>','<?= $connection->tra("LUN") ?>','<?= $connection->tra("MAR") ?>','<?= $connection->tra("MIE") ?>',
                            '<?= $connection->tra("JUE") ?>','<?= $connection->tra("VIE") ?>','<?= $connection->tra("SAB") ?>'],
		weekHeader: 'Sm',
		dateFormat: 'yy/mm/dd',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['<?= $idioma ?>']);
});
</script>

<?php require $base_dir.'/lib/purchase_form.php';?> 

<script>
$(function() {
    <?php foreach( $connection->getPageSection() as $object ){
        echo $object[$idioma]["js"];
    } ?>

	changeBanner();
	$(window).on('resize', changeBanner);

	function changeBanner(){
		width = $(window).width();
		if (width > 576) {
			var regexp = new RegExp("carousel/mobile/", "g");
			$("#slider .carousel-item > .image").each(function(index, el) {
				$(el).css('background-image', $(el).css('background-image').replace(regexp, 'carousel/desktop/'));
			});
		}
		if (width <= 576) {
			var regexp = new RegExp("carousel/desktop/", "g");
			$("#slider .carousel-item > .image").each(function(index, el) {
				$(el).css('background-image', $(el).css('background-image').replace(regexp, 'carousel/mobile/'));
			});
		}
	}

	if ($('.reserva input[name="tour"]:checked').length) {
		var tour = $('.reserva input[name="tour"]:checked').val();
		$('.bubble-wrap').removeClass('fade-in');
		$('.linea_'+tour).find('.bubble-wrap').addClass('fade-in');
	}
	$('.reserva input[name="tour"]').on('change', function() {
		var tour = $('.reserva input[name="tour"]:checked').val();
		$('.bubble-wrap').removeClass('fade-in');
		$('.linea_'+tour).find('.bubble-wrap').addClass('fade-in');
	});
	$('.bubble-wrap .close').on('click', function() {
		$('.bubble-wrap').removeClass('fade-in');
	});
	$(document).mouseup(function(e) {
		var container = $(".bubble-wrap");
		if (!container.is(e.target) && container.has(e.target).length === 0) {
			container.removeClass('fade-in');
		}
	});

	$('#video').on('click', function() {
		$('.video .texto').toggleClass('hide');
		$('.video .wrapper_video').toggleClass('show');
	});

	// No intentar mover el selector de idiomas
});
</script>

<script src="/conf/componentes/stripe_payment_form/stripe_payment_ajax.js"></script>

<?php 
includeEditorAssets();
renderEditorToolbar($themeId);
?>
<script>window.THEME_NAME = '<?= $__themeSlug ?? getActiveThemeSlug() ?>';</script>
