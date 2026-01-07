
<!-- Inyección de variables CSS dinámicas desde PHP -->
<style>
:root {
    --theme-primary-color: <?= $theme_color ?>;
    --theme-primary-rgb: <?= $rgb ?>;
    --loader-url: url(<?= $loader_url ?>);
}
</style>

<!-- Enlace al archivo CSS organizado del tema -->
<link rel="stylesheet" href="/styles/theme1/css/theme.css">

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

<main class="bbgrey">
	<section class="portada" id="portada">
		<div id="slider" class="carousel slide" data-ride="carousel" data-interval="false">
			<?php render_home_carousel(); ?>
			<?php render_home_spheres(); ?>
		</div>
	</section>
	<section id="reserva" class="reserva">
		<div class="banner_separador nomargin" style="background-color: <?= $theme_color ?>;">
			<div class="container">
				<h2><?= $connection->tra("Reserva un tour") ?></h2>
			</div>
			<!--<img class="flecha_reserva" alt="Book a tour" src="../img/flecha-abajo.svg" />-->
                        <?= $flecha_abajo;?>
		</div>
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
						<div class="col-md-6 text-left izquierda">
							<input type="hidden" class="input_fecha" name="fecha" id="fecha" value="<?= date('Y-m-d');?>" />
							<div class="mitad_ipad">
								<?php 
								render_calendar();
								?>
								<br><br>
								<?php render_tour_selector(); ?>
								<br>
								<div class="hora servicios">
									<?php render_language_selector(); ?>
								</div>
								<div class="main_tour" <?= (
                                                                        isset($app_tours[$tour_destacado]["main_tour"]) ||
                                                                        isset($app_group[$tour_destacado]["main_tour"]) ) ? '' : 'style="display: none;"' ?>>
                                                                </div>
								<?php 
								render_time_selector();
								?>
								<div class="combos" id="bloque_combos" style="display: none;">
								</div>
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
									<p class="titulo_formulario" id="titulo_visita"><?=
                                                                                isset( $app_group[$tour_destacado][$idioma]['title'] )
                                                                                        ? $app_group[$tour_destacado][$idioma]['title']
                                                                                                : (isset($app_tours[$tour_destacado][$idioma]['title']) ? $app_tours[$tour_destacado][$idioma]['title'] : '');
                                                                            ?></p>
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
							<br><br>
							<div class="personas">
								<!-- Plantilla opcional para líneas de personas -->
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
								// Render del selector modular de personas (sin handlers de +/− para evitar doble incremento con legacy)
								render_person_selector(['auto_init' => false]); // Modo legacy: desactivamos init JS del componente
								// Notas por tour
								render_person_description();
								?>
							</div>
						</div>
						<div class="col-md-6 text-left derecha">
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
							<?php render_tour_description(); ?>							
						</div>
					</div>
				</div>
			</form>
		</div>
	</section>
        <?php foreach( $connection->getPageSection() as $object ){
            echo "<section>" . $object[$idioma]["html"] . "</section>";
        } ?>
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
	/*
	var carousel = $('.slider_galeria').flipster({
		style: 'carousel',
		start: 'center',
		scrollwheel: false,
		spacing: -0.8,
		loop: true,
		buttons: false
	});
	*/


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
	$('.bubble-wrap .close').on('click', function() {
		$('.bubble-wrap').removeClass('fade-in');
	});
	$(document).mouseup(function(e) {
		var container = $(".bubble-wrap");
		// if the target of the click isn't the container nor a descendant of the container
		if (!container.is(e.target) && container.has(e.target).length === 0) {
			container.removeClass('fade-in');
		}
	});

	$('#video').on('click', function() {
		$('.video .texto').toggleClass('hide');
		$('.video .wrapper_video').toggleClass('show');
	});
});
</script>

<?php 
// Incluir assets y toolbar del editor visual (si está en modo edición)
includeEditorAssets();
renderEditorToolbar($themeId);
?>
<script>
    // Pasar theme_name al editor
    window.THEME_NAME = 'theme1';
</script>
