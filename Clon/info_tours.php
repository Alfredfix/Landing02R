<?php

// Inicialización
$base_dir = dirname(dirname(dirname(__FILE__)));
require_once $base_dir . '/lib/app_data.php';
require_once $base_dir . '/conf/class/bbddi.php';

// Cargar componentes
require_once $base_dir . '/conf/componentes/calendar/calendar.php';
require_once $base_dir . '/conf/componentes/time_selector/time_selector.php';
require_once $base_dir . '/conf/componentes/tour_selector/tour_selector.php';
require_once $base_dir . '/conf/componentes/person_selector/person_selector.php';
require_once $base_dir . '/conf/componentes/client_form/client_form.php';
require_once $base_dir . '/conf/componentes/payment_button/payment_button.php';
require_once $base_dir . '/conf/componentes/tour_description/tour_description.php';
require_once $base_dir . '/conf/componentes/language_selector/language_selector.php';

$idioma = $_GET['idioma'] ?? 'es';

ini_set('display_errors', false);
error_reporting(0);
$securityController = new securityController();

$tour_key = $_GET['tour'] ?? null;
$current_tour = null;
$tour_destacado = null;

if ($tour_key) {
    if (isset($app_tours[$tour_key])) {
        $current_tour = $app_tours[$tour_key];
        $tour_destacado = $tour_key;
    } elseif (isset($app_group[$tour_key])) {
        $current_tour = $app_group[$tour_key];
        $tour_destacado = $tour_key;
    } else {
        foreach ($app_tours as $key => $tour) {
            if (isset($tour['id']) && $tour['id'] == $tour_key) {
                $current_tour = $tour;
                $tour_destacado = $key;
                break;
            }
        }
        if (!$current_tour) {
            foreach ($app_group as $key => $tour) {
                if (isset($tour['id']) && $tour['id'] == $tour_key) {
                    $current_tour = $tour;
                    $tour_destacado = $key;
                    break;
                }
            }
        }
    }
}

if (!$current_tour) {
    header('Location: ' . ROOT_WEB);
    exit;
}

$selected_tour_key = $tour_destacado;

$elem = new stdClass;
$elem->title = $current_tour[$idioma]['title'] ?? 'Tour';
$elem->intro = $current_tour[$idioma]['meta_description'] ?? '';
$elem->keywords = $current_tour[$idioma]['meta_keywords'] ?? '';

require $base_dir . '/lang/header.php';

$tour_destacado = $selected_tour_key;

$tour_images = [];
if (isset($current_tour[$idioma]['gallery']) && is_array($current_tour[$idioma]['gallery'])) {
    $tour_images = $current_tour[$idioma]['gallery'];
} elseif (isset($current_tour[$idioma]['img'])) {
    $tour_images[] = $current_tour[$idioma]['img'];
}
?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600;700&display=swap');

body > footer,
    .footer,
    #footer {
        display: none !important;
    }
    

.tour-info-page {
    background-color: #f5f5f5;
    font-family: 'Montserrat', sans-serif;
}

.tour-carousel {
    position: relative;
    width: 100%;
    height: 500px;
    overflow: hidden;
}

.tour-carousel .carousel-inner,
.tour-carousel .carousel-item {
    height: 100%;
}

.tour-carousel .carousel-item .image {
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
}

.tour-carousel .carousel-control-prev,
.tour-carousel .carousel-control-next {
    width: 50px;
    height: 50px;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(255, 255, 255, 0.9);
    border-radius: 50%;
    opacity: 1;
    transition: all 0.3s;
}

.tour-carousel .carousel-control-prev:hover,
.tour-carousel .carousel-control-next:hover {
    background-color: #1a1a1a;
}

.tour-carousel .carousel-control-prev:hover .carousel-control-prev-icon,
.tour-carousel .carousel-control-next:hover .carousel-control-next-icon {
    filter: brightness(0) invert(1);
}

.tour-carousel .carousel-control-prev { left: 20px; }
.tour-carousel .carousel-control-next { right: 20px; }

.tour-carousel .carousel-indicators {
    bottom: 20px;
}

.tour-carousel .carousel-indicators li {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.5);
    border: 2px solid white;
}

.tour-carousel .carousel-indicators .active {
    background-color: #1a1a1a;
    border-color: #1a1a1a;
}

.tour-content-area {
    max-width: 1300px;
    margin: 0 auto;
    padding: 2.5rem 1.5rem;
}

.tour-description-card {
    background: white;
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 2rem;
}

.tour-description-card h1 {
    font-family: 'Playfair Display', serif;
    color: #1a1a1a;
    margin-bottom: 1.5rem;
    font-size: 2rem;
    font-weight: 700;
}

.tour-description-card h2 {
    font-family: 'Playfair Display', serif;
    color: <?= $theme_color ?>;
    margin-top: 1.5rem;
    margin-bottom: 0.75rem;
    font-size: 1.4rem;
}

.tour-description-card p {
    line-height: 1.8;
    color: #555;
    margin-bottom: 1rem;
}

.tour-description-card ul {
    list-style: none;
    padding-left: 0;
}

.tour-description-card ul li {
    position: relative;
    padding-left: 1.25rem;
    margin-bottom: 0.5rem;
    color: #555;
}

.tour-description-card ul li::before {
    content: '✓';
    position: absolute;
    left: 0;
    color: <?= $theme_color ?>;
    font-weight: bold;
}

.tour-booking-sidebar {
    background: white;
    padding: 1.5rem;
    border-radius: 8px;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
    position: sticky;
    top: 90px;
}

.tour-booking-sidebar h2 {
    font-family: 'Playfair Display', serif;
    color: #1a1a1a;
    margin-bottom: 1.25rem;
    text-align: center;
    font-size: 1.3rem;
    font-weight: 600;
}

.tour-booking-sidebar .price-display {
    background: #f9f9f9;
    padding: 1rem;
    border-radius: 6px;
    text-align: center;
    margin-bottom: 1.25rem;
    border: 1px solid #eee;
}

.tour-booking-sidebar .price-display .from-text {
    font-size: 0.85rem;
    color: #888;
}

.tour-booking-sidebar .price-display .price {
    font-size: 1.75rem;
    font-weight: 700;
    color: <?= $theme_color ?>;
}

.tour-booking-sidebar h4 {
    color: #333;
    font-size: 0.95rem;
    margin-top: 1.25rem;
    margin-bottom: 0.6rem;
    font-weight: 600;
}

.reserva form>#loader>.texto {
    color: <?= $theme_color ?>;
}

.reserva form>#loader:after {
    background: url(<?= $loader_url ?? '/img/loading.svg' ?>) center center no-repeat;
    width: 100px;
    height: 100px;
    background-size: contain;
}

.datepicker th {
    color: <?= $theme_color ?>;
}

.reserva [type="radio"].with-gap:checked+label:before, 
.reserva [type="radio"].with-gap:checked+label:after {
    border: 2px solid <?= $theme_color ?>;
    background-color: <?= $theme_color ?>;
}

.input-field > label {
    color: <?= $theme_color ?>;
}

.btn-primary {
    background-color: #1a1a1a !important;
    border: none !important;
    padding: 12px 24px !important;
    border-radius: 4px !important;
    font-weight: 600 !important;
    text-transform: uppercase !important;
    letter-spacing: 0.5px !important;
    transition: all 0.3s !important;
}

.btn-primary:hover {
    background: #333 !important;
}

.wrapper_hora_selector, .wrapper_hora_selector_combo {
    border: solid 1px <?= $theme_color ?>;
    border-bottom: solid 5px <?= $theme_color ?>;
}

.hora_selector_arrow {
    border-top: 8px solid <?= $theme_color ?>;
}

.reserva .note {
    color: <?= $theme_color ?>;
}

.louvre-back-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 8px 18px;
    background: white;
    color: #1a1a1a;
    border: 1px solid #ddd;
    border-radius: 4px;
    text-decoration: none;
    font-weight: 500;
    font-size: 0.9rem;
    transition: all 0.3s;
    margin-bottom: 1.25rem;
}

.louvre-back-btn:hover {
    background: #1a1a1a;
    color: white;
    border-color: #1a1a1a;
    text-decoration: none;
}

.col-lg-7 {
    text-align: left;
}

@media (max-width: 992px) {
    .tour-carousel { height: 350px; }
    .tour-booking-sidebar { position: static; margin-top: 1.5rem; }
    .tour-description-card h1 { font-size: 1.6rem; }
}

@media (max-width: 768px) {
    .tour-carousel { height: 280px; }
    .tour-content-area { padding: 1.5rem 1rem; }
}
</style>

<main class="tour-info-page">
    <div id="tourCarousel" class="carousel slide tour-carousel" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php foreach ($tour_images as $index => $image): ?>
                <li data-target="#tourCarousel" data-slide-to="<?= $index ?>" class="<?= $index === 0 ? 'active' : '' ?>"></li>
            <?php endforeach; ?>
        </ol>
        
        <div class="carousel-inner">
            <?php foreach ($tour_images as $index => $image): ?>
                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                    <div class="image" style="background-image: url('<?= $image ?>');"></div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <?php if (count($tour_images) > 1): ?>
            <a class="carousel-control-prev" href="#tourCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#tourCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
        <?php endif; ?>
    </div>
    
    <div class="container tour-content-area">
        <div class="row">
            <div class="col-lg-7">
                <a href="/styles/<?= $__themeSlug ?? getActiveThemeSlug() ?>/?idioma=<?= $idioma ?>" class="louvre-back-btn">
                    <i class="fas fa-arrow-left"></i> <?= $connection->tra("Ver todos los tours") ?>
                </a>
                
                <div class="tour-description-card">
                    <h1><?= $current_tour[$idioma]['title'] ?? 'Tour' ?></h1>
                    <?php render_tour_description(['specific_tour' => $tour_destacado]); ?>
                </div>
            </div>
            
            <div class="col-lg-5">
                <div class="tour-booking-sidebar">
                    <h2><?= $connection->tra("Reserva tu plaza") ?></h2>
                    
                    <div class="price-display">
                        <span class="from-text"><?= $connection->tra("Desde") ?></span>
                        <span class="price" id="sidebar_price">--,--<?= $currency_symbol ?></span>
                    </div>
                    
                    <section class="reserva">
                        <form action="/pagar" method="post" id="form_reserva">
                            <div id="loader"><div class="texto"><?= $connection->tra("Checking availability...")?>  </div></div>
                            
                            <input type="hidden" name="nombre_tour" id="nombre_tour" value="<?= $current_tour[$idioma]['title'] ?? '' ?>" />
                            <input type="hidden" name="vendedor" id="vendedor" value="web_<?= $idioma ?>" />
                            <input type="hidden" name="idioma_web" id="idioma_web" value="<?= $idioma ?>" />
                            <input type="hidden" name="currency_code" id="currency_code" value="<?= $currency_code ?>" />
                            <input type="hidden" name="currency_rate" id="currency_rate" value="<?= $currency_rate ?>" />
                            <input type="hidden" name="currency_symbol" id="currency_symbol" value="<?= $currency_symbol ?>" />
                            <input type="hidden" name="precio_total_calculado" id="precio_total_calculado" value="" />
                            <input type="hidden" class="input_fecha" name="fecha" id="fecha" value="<?= date('Y-m-d');?>" />
                            
                            <div id="guestFields"></div>
                            <div id="guestFieldsType"></div>
                            
                            <div style="display:none;">
                                <?php render_tour_selector(); ?>
                            </div>
                            
                            <div class="mb-3">
                                <h4><?= $connection->tra("Fecha") ?></h4>
                                <?php render_calendar(); ?>
                            </div>
                            
                            <div class="mb-3">
                                <?php render_language_selector(); ?>
                            </div>
                            
                            <div class="mb-3">
                                <?php render_time_selector(); ?>
                            </div>
                            
                            <div class="combos" id="bloque_combos" style="display: none;"></div>
                            
                            <div class="mb-3 personas">
                                <h4><?= $connection->tra("Personas") ?></h4>
                                <?php render_person_selector(['auto_init' => false]); ?>
                                
                                <?php
                                foreach ($app_tours as $key => $tour) {
                                    if (isset($tour[$idioma]['description'])) {
                                        echo '<div class="note note_' . $key . '">' . $tour[$idioma]['description'] . '</div>';
                                    }
                                }
                                ?>
                            </div>
                            
                            <div class="mb-3 completar nomargin">
                                <h4><?= $connection->tra("Tus datos") ?></h4>
                                <?php render_client_form(); ?>
                            </div>
                            
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
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
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
</main>

<script src="/js/jquery.min.js"></script>
<script src="/js/jquery.scrollTo.min.js"></script>
<script src="/js/jquery-ui.min.js"></script>

<?php require $base_dir.'/lib/purchase_form.php';?>
<?php require $base_dir.'/lang/footer.php';?>

<script>
(function checkJQuery() {
    if (typeof jQuery !== 'undefined') {
        $(function(){
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
            
            var tourKey = '<?= addslashes($tour_destacado ?? '') ?>';
            const tourRadio = document.querySelector('input[name="tour"][value="' + tourKey + '"]');
            if (tourRadio) {
                tourRadio.checked = true;
                $(tourRadio).trigger('change');
            }
        });
    } else {
        setTimeout(checkJQuery, 50);
    }
})();
</script>
