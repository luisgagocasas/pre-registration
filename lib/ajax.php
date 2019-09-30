<?php
class Ajax_Pre_Registration {
  public function __construct() {
    add_action('wp_ajax_formPreRegistration', [$this, 'formPreRegistration']);
    add_action('wp_ajax_nopriv_formPreRegistration', [$this, 'formPreRegistration']);
  }

  public function formPreRegistration() {
    global $wpdb;

    $nonce = sanitize_text_field( $_POST['nonceT'] );
    $name_user = wp_strip_all_tags($_POST['name_user']);
    $email_user = wp_strip_all_tags($_POST['email_user']);
    $phone_user = wp_strip_all_tags($_POST['phone_user']);
    $situaciones = wp_strip_all_tags($_POST['situaciones']);
    $capital = wp_strip_all_tags($_POST['capital']);
    $intereses = wp_strip_all_tags($_POST['intereses']);
    $recibos = wp_strip_all_tags($_POST['recibos']);
    $faltapagar = wp_strip_all_tags($_POST['faltapagar']);

    if (wp_verify_nonce( $nonce, 'nonceT'))  {
      $person_model = array(
        'name_user' => $name_user,
        'email_user' => $email_user,
        'phone_user' => $phone_user,
        'situaciones' => $situaciones,
        'capital' => $capital,
        'intereses' => $intereses,
        'recibos' => $recibos,
        'faltapagar' => $faltapagar,
        'date_create' => time(),
      );
  
      $debt_data = $wpdb->insert("{$wpdb->prefix}credit_end", $person_model);
      if ($debt_data) {
        $data = array(
          "state"  =>  true,
          "data"   =>  $person_model
        );
      } else {
        $data = array(
          "state"  =>  false,
          "data"  =>  $person_model
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

new Ajax();
