<?php
class Ajax_Pre_Registration {
  public function __construct() {
    add_action('wp_ajax_formPreRegistration', [$this, 'formPreRegistration']);
    add_action('wp_ajax_nopriv_formPreRegistration', [$this, 'formPreRegistration']);
  }

  public function formPreRegistration() {
    global $wpdb;

    $nonce = sanitize_text_field($_POST['nonceT']);
    $parent_name = wp_strip_all_tags($_POST['parent_name']);
    $parent_email = wp_strip_all_tags($_POST['parent_email']);
    $parent_celphone = wp_strip_all_tags($_POST['parent_celphone']);
    $parent_phone = wp_strip_all_tags($_POST['parent_phone']);
    $parent_dni = wp_strip_all_tags($_POST['parent_dni']);
    $parent_address = wp_strip_all_tags($_POST['parent_address']);
    $student_one_name = wp_strip_all_tags($_POST['student_one_name']);
    $student_one_dni = wp_strip_all_tags($_POST['student_one_dni']);
    $student_one_grado = wp_strip_all_tags($_POST['student_one_grado']);
    $student_one_nivel = wp_strip_all_tags($_POST['student_one_nivel']);
    $student_one_procedencia = wp_strip_all_tags($_POST['student_one_procedencia']);
    $student_one_repitio_anio = wp_strip_all_tags($_POST['student_one_repitio_anio']);
    $student_one_repitio_anio_cual = wp_strip_all_tags($_POST['student_one_repitio_anio_cual']);
    $student_one_discapacidad = wp_strip_all_tags($_POST['student_one_discapacidad']);
    $student_one_discapacidad_cual = wp_strip_all_tags($_POST['student_one_discapacidad_cual']);
    $student_two_name = wp_strip_all_tags($_POST['student_two_name']);
    $student_two_dni = wp_strip_all_tags($_POST['student_two_dni']);
    $student_two_grado = wp_strip_all_tags($_POST['student_two_grado']);
    $student_two_nivel = wp_strip_all_tags($_POST['student_two_nivel']);
    $student_two_procedencia = wp_strip_all_tags($_POST['student_two_procedencia']);
    $student_two_repitio_anio = wp_strip_all_tags($_POST['student_two_repitio_anio']);
    $student_two_repitio_anio_cual = wp_strip_all_tags($_POST['student_two_repitio_anio_cual']);
    $student_two_discapacidad = wp_strip_all_tags($_POST['student_two_discapacidad']);
    $student_two_discapacidad_cual = wp_strip_all_tags($_POST['student_two_discapacidad_cual']);
    $student_three_name = wp_strip_all_tags($_POST['student_three_name']);
    $student_three_dni = wp_strip_all_tags($_POST['student_three_dni']);
    $student_three_grado = wp_strip_all_tags($_POST['student_three_grado']);
    $student_three_nivel = wp_strip_all_tags($_POST['student_three_nivel']);
    $student_three_procedencia = wp_strip_all_tags($_POST['student_three_procedencia']);
    $student_three_repitio_anio = wp_strip_all_tags($_POST['student_three_repitio_anio']);
    $student_three_repitio_anio_cual = wp_strip_all_tags($_POST['student_three_repitio_anio_cual']);
    $student_three_discapacidad = wp_strip_all_tags($_POST['student_three_discapacidad']);
    $student_three_discapacidad_cual = wp_strip_all_tags($_POST['student_three_discapacidad_cual']);
    $student_adicional_colegio = wp_strip_all_tags($_POST['student_adicional_colegio']);
    $student_adicional_recomendado = wp_strip_all_tags($_POST['student_adicional_recomendado']);
    $student_adicional_espera = wp_strip_all_tags($_POST['student_adicional_espera']);
    $student_adicional_instromento = wp_strip_all_tags($_POST['student_adicional_instromento']);
    $student_adicional_instromento_cual = wp_strip_all_tags($_POST['student_adicional_instromento_cual']);

    if (wp_verify_nonce( $nonce, date("Ymd")))  {
      $registration_model = array(
        'parent_name' => $parent_name != 'undefined' ? $parent_name : '',
        'parent_email' => $parent_email != 'undefined' ? $parent_email : '',
        'parent_celphone' => $parent_celphone != 'undefined' ? $parent_celphone : '',
        'parent_phone' => $parent_phone != 'undefined' ? $parent_phone : '',
        'parent_dni' => $parent_dni != 'undefined' ? $parent_dni : '',
        'parent_address' => $parent_address != 'undefined' ? $parent_address : '',
        'student_one_name' => $student_one_name != 'undefined' ? $student_one_name : '',
        'student_one_dni' => $student_one_dni != 'undefined' ? $student_one_dni : '',
        'student_one_grado' => $student_one_grado != 'undefined' ? $student_one_grado : '',
        'student_one_nivel' => $student_one_nivel != 'undefined' ? $student_one_nivel : '',
        'student_one_procedencia' => $student_one_procedencia != 'undefined' ? $student_one_procedencia : '',
        'student_one_repitio_anio' => $student_one_repitio_anio != 'undefined' ? $student_one_repitio_anio : '',
        'student_one_repitio_anio_cual' => $student_one_repitio_anio_cual != 'undefined' ? $student_one_repitio_anio_cual : '',
        'student_one_discapacidad' => $student_one_discapacidad != 'undefined' ? $student_one_discapacidad : '',
        'student_one_discapacidad_cual' => $student_one_discapacidad_cual != 'undefined' ? $student_one_discapacidad_cual : '',
        'student_two_name' => $student_two_name != 'undefined' ? $student_two_name : '',
        'student_two_dni' => $student_two_dni != 'undefined' ? $student_two_dni : '',
        'student_two_grado' => $student_two_grado != 'undefined' ? $student_two_grado : '',
        'student_two_nivel' => $student_two_nivel != 'undefined' ? $student_two_nivel : '',
        'student_two_procedencia' => $student_two_procedencia != 'undefined' ? $student_two_procedencia : '',
        'student_two_repitio_anio' => $student_two_repitio_anio != 'undefined' ? $student_two_repitio_anio : '',
        'student_two_repitio_anio_cual' => $student_two_repitio_anio_cual != 'undefined' ? $student_two_repitio_anio_cual : '',
        'student_two_discapacidad' => $student_two_discapacidad != 'undefined' ? $student_two_discapacidad : '',
        'student_two_discapacidad_cual' => $student_two_discapacidad_cual != 'undefined' ? $student_two_discapacidad_cual : '',
        'student_three_name' => $student_three_name != 'undefined' ? $student_three_name : '',
        'student_three_dni' => $student_three_dni != 'undefined' ? $student_three_dni : '',
        'student_three_grado' => $student_three_grado != 'undefined' ? $student_three_grado : '',
        'student_three_nivel' => $student_three_nivel != 'undefined' ? $student_three_nivel : '',
        'student_three_procedencia' => $student_three_procedencia != 'undefined' ? $student_three_procedencia : '',
        'student_three_repitio_anio' => $student_three_repitio_anio != 'undefined' ? $student_three_repitio_anio : '',
        'student_three_repitio_anio_cual' => $student_three_repitio_anio_cual != 'undefined' ? $student_three_repitio_anio_cual : '',
        'student_three_discapacidad' => $student_three_discapacidad != 'undefined' ? $student_three_discapacidad : '',
        'student_three_discapacidad_cual' => $student_three_discapacidad_cual != 'undefined' ? $student_three_discapacidad_cual : '',
        'student_adicional_colegio' => $student_adicional_colegio != 'undefined' ? $student_adicional_colegio : '',
        'student_adicional_recomendado' => $student_adicional_recomendado != 'undefined' ? $student_adicional_recomendado : '',
        'student_adicional_espera' => $student_adicional_espera != 'undefined' ? $student_adicional_espera : '',
        'student_adicional_instromento' => $student_adicional_instromento != 'undefined' ? $student_adicional_instromento : '',
        'student_adicional_instromento_cual' => $student_adicional_instromento_cual != 'undefined' ? $student_adicional_instromento_cual : '',
        'date_create' => time(),
      );

      // $data = array(
      //   "state"  =>  false,
      //   "data"  =>  $registration_model
      // );
  
      $debt_data = $wpdb->insert("{$wpdb->prefix}pre_registration", $registration_model);
      if ($debt_data) {
        $data = array(
          "state"  =>  true,
          "data"   =>  $registration_model
        );
      } else {
        $data = array(
          "state"  =>  false,
          "data"  =>  $registration_model
        );
      }
    } else {
      $data = array(
        "status"  =>  false,
        "message" =>  "nonce fail"
      );
    }
    wp_send_json($data);
  }
}

new Ajax_Pre_Registration();
