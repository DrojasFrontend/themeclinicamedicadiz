<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

// Definir constantes
define('THEME_VERSION', '1.0.0');
define('THEME_PATH', get_template_directory());
define('THEME_URL', get_template_directory_uri());

// Cargar archivos de funcionalidad
require_once THEME_PATH . '/inc/styles-and-js.php';
require_once THEME_PATH . '/inc/theme-setup.php';
