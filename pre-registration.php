<?php
/*
  Plugin Name: Pre Registro Alumnos
  Plugin URI: https://luisgagocasas.com
  Description: Pre Registro de Alumnos de Colegio
  Version: 1.0.0
  Author: Luis Gago Casas
  Developer: Luis Gago Casas
  Author URI: https://luisgagocasas.com
  * License:     GPL2
  * License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

include_once('lib/init-pre-registration.php');
include_once('lib/list-table-pre-registration.php');
include_once('lib/resources.php');
include_once('lib/shortcode-pre-registration.php');
include_once('lib/ajax.php');
if (!defined('ABSPATH'))
  exit;

if (!class_exists('preRegistration')) {
  class preRegistration {
    function __construct() {
      new initPreRegistration();
      new shortcodePreRegistration();
    }
  }
}
new preRegistration;