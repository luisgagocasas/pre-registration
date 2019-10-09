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

    if (wp_verify_nonce( $nonce, date("Ymd")))  {
      $person_model = array(
        'parent_name' => $parent_name,
      );

      $data = array(
        "state"  =>  false,
        "data"  =>  $person_model
      );
  
      // $debt_data = $wpdb->insert("{$wpdb->prefix}credit_end", $person_model);
      // if ($debt_data) {
      //   $data = array(
      //     "state"  =>  true,
      //     "data"   =>  $person_model
      //   );
      // } else {
      //   $data = array(
      //     "state"  =>  false,
      //     "data"  =>  $person_model
      //   );
      // }
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
