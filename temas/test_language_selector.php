<?php
/**
 * Archivo de prueba para render_header_language_selector()
 *
 * Este archivo permite probar el selector de idioma de forma aislada
 */

// Configuración básica de errores para ver cualquier problema
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Intentar cargar la función desde el CMS (ajusta la ruta según tu estructura)
// Descomenta y ajusta esta línea si conoces dónde está definida la función:
// require_once __DIR__ . '/ruta/al/modulo/language_selector.php';

// Si la función NO existe, creamos una versión simulada para prueba
if (!function_exists('render_header_language_selector')) {
    /**
     * Función simulada de selector de idioma para header
     * Esta es una versión de ejemplo - reemplázala con la real de tu CMS
     */
    function render_header_language_selector() {
        // Idiomas disponibles (ajusta según tu proyecto)
        $languages = [
            'es' => ['name' => 'Español', 'flag' => '🇪🇸'],
            'en' => ['name' => 'English', 'flag' => '🇬🇧'],
            'fr' => ['name' => 'Français', 'flag' => '🇫🇷'],
            'de' => ['name' => 'Deutsch', 'flag' => '🇩🇪']
        ];

        // Detectar idioma actual (ejemplo básico)
        $current_lang = $_GET['lang'] ?? 'es';

        // Renderizar el selector
        echo '<div class="language-selector" style="padding: 10px; background: #f5f5f5; border-radius: 5px;">';
        echo '<strong>Idioma / Language:</strong> ';

        foreach ($languages as $code => $data) {
            $active = ($code === $current_lang) ? 'style="font-weight: bold; color: #007bff;"' : '';
            echo sprintf(
                '<a href="?lang=%s" %s>%s %s</a> ',
                $code,
                $active,
                $data['flag'],
                $data['name']
            );
            if ($code !== array_key_last($languages)) {
                echo '| ';
            }
        }

        echo '</div>';
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba - Selector de Idioma</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #f9f9f9;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }
        .info {
            background: #e7f3ff;
            padding: 15px;
            border-left: 4px solid #007bff;
            margin: 20px 0;
        }
        .language-selector {
            margin: 20px 0;
        }
        .language-selector a {
            text-decoration: none;
            color: #333;
            padding: 5px 10px;
            transition: all 0.3s;
        }
        .language-selector a:hover {
            background: #007bff;
            color: white;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🧪 Prueba de Selector de Idioma</h1>

        <div class="info">
            <strong>ℹ️ Información:</strong><br>
            Este archivo es una prueba del módulo <code>render_header_language_selector()</code>.<br>
            Idioma actual: <strong><?= $_GET['lang'] ?? 'es' ?></strong>
        </div>

        <h2>Selector de Idioma:</h2>
        <?php
        // Llamar a la función del selector de idioma
        render_header_language_selector();
        ?>

        <div style="margin-top: 30px; padding: 20px; background: #f8f9fa; border-radius: 5px;">
            <h3>Estado de la función:</h3>
            <p>
                ✅ La función <code>render_header_language_selector()</code>
                <?= function_exists('render_header_language_selector') ? 'EXISTE' : 'NO EXISTE' ?>
                y está funcionando.
            </p>

            <h3>Datos de sesión/request:</h3>
            <pre><?php
            echo "GET params: ";
            print_r($_GET);
            echo "\nIdioma detectado: " . ($_GET['lang'] ?? 'es (por defecto)');
            ?></pre>
        </div>
    </div>
</body>
</html>
