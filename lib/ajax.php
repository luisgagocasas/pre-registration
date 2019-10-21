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
  
      $debt_data = $wpdb->insert("{$wpdb->prefix}pre_registration", $registration_model);
      if ($debt_data) {
        $data = array(
          "state"  =>  true,
          "data"   =>  $registration_model
        );
        // send mail
        $to = 'luisgago@lagc-peru.com';
        $subject = 'Solicitud de ' . $parent_name . ' - ' . get_bloginfo('name');
        $body = $this->format_mail($registration_model);
        $headers = array('Content-Type: text/html; charset=UTF-8');
        wp_mail( $to, $subject, $body, $headers );
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

  public function format_mail($value = ''){
    $return = '
    <!doctype html>
    <html>
      <head>
        <meta name="viewport" content="width=device-width" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Komensky</title>
        <style>
          img {
            border: none;
            -ms-interpolation-mode: bicubic;
            max-width: 100%; 
          }
          body {
            background-color: #f6f6f6;
            font-family: sans-serif;
            -webkit-font-smoothing: antialiased;
            font-size: 14px;
            line-height: 1.4;
            margin: 0;
            padding: 0;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%; 
          }
          table {
            border-collapse: separate;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            width: 100%; }
            table td {
              font-family: sans-serif;
              font-size: 14px;
              vertical-align: top; 
          }
          .body {
            background-color: #f6f6f6;
            width: 100%; 
          }
          .container {
            display: block;
            margin: 0 auto !important;
            /* makes it centered */
            max-width: 580px;
            padding: 10px;
            width: 580px; 
          }
          .content {
            box-sizing: border-box;
            display: block;
            margin: 0 auto;
            max-width: 580px;
            padding: 10px; 
          }
          .main {
            background: #ffffff;
            border-radius: 3px;
            width: 100%; 
          }
          .wrapper {
            box-sizing: border-box;
            padding: 20px; 
          }
          .content-block {
            padding-bottom: 10px;
            padding-top: 10px;
          }
          .footer {
            clear: both;
            margin-top: 10px;
            text-align: center;
            width: 100%; 
          }
            .footer td,
            .footer p,
            .footer span,
            .footer a {
              color: #999999;
              font-size: 12px;
              text-align: center; 
          }
          h1,
          h2,
          h3,
          h4 {
            color: #000000;
            font-family: sans-serif;
            font-weight: 400;
            line-height: 1.4;
            margin: 0;
            margin-bottom: 30px; 
          }
          h1 {
            font-size: 35px;
            font-weight: 300;
            text-align: center;
            text-transform: capitalize; 
          }
          p,
          ul,
          ol {
            font-family: sans-serif;
            font-size: 14px;
            font-weight: normal;
            margin: 0;
            margin-bottom: 15px; 
          }
            p li,
            ul li,
            ol li {
              list-style-position: inside;
              margin-left: 5px; 
          }
          a {
            color: #3498db;
            text-decoration: underline; 
          }
          .btn {
            box-sizing: border-box;
            width: 100%; }
            .btn > tbody > tr > td {
              padding-bottom: 15px; }
            .btn table {
              width: auto; 
          }
            .btn table td {
              background-color: #ffffff;
              border-radius: 5px;
              text-align: center; 
          }
            .btn a {
              background-color: #ffffff;
              border: solid 1px #3498db;
              border-radius: 5px;
              box-sizing: border-box;
              color: #3498db;
              cursor: pointer;
              display: inline-block;
              font-size: 14px;
              font-weight: bold;
              margin: 0;
              padding: 12px 25px;
              text-decoration: none;
              text-transform: capitalize; 
          }
          .btn-primary table td {
            background-color: #3498db; 
          }
          .btn-primary a {
            background-color: #3498db;
            border-color: #3498db;
            color: #ffffff; 
          }
          .last {
            margin-bottom: 0; 
          }
          .first {
            margin-top: 0; 
          }
          .align-center {
            text-align: center; 
          }
          .align-right {
            text-align: right; 
          }
          .align-left {
            text-align: left; 
          }
          .clear {
            clear: both; 
          }
          .mt0 {
            margin-top: 0; 
          }
          .mb0 {
            margin-bottom: 0; 
          }
          .preheader {
            color: transparent;
            display: none;
            height: 0;
            max-height: 0;
            max-width: 0;
            opacity: 0;
            overflow: hidden;
            mso-hide: all;
            visibility: hidden;
            width: 0; 
          }
          .powered-by a {
            text-decoration: none; 
          }
          hr {
            border: 0;
            border-bottom: 1px solid #f6f6f6;
            margin: 20px 0; 
          }
          @media only screen and (max-width: 620px) {
            table[class=body] h1 {
              font-size: 28px !important;
              margin-bottom: 10px !important; 
            }
            table[class=body] p,
            table[class=body] ul,
            table[class=body] ol,
            table[class=body] td,
            table[class=body] span,
            table[class=body] a {
              font-size: 16px !important; 
            }
            table[class=body] .wrapper,
            table[class=body] .article {
              padding: 10px !important; 
            }
            table[class=body] .content {
              padding: 0 !important; 
            }
            table[class=body] .container {
              padding: 0 !important;
              width: 100% !important; 
            }
            table[class=body] .main {
              border-left-width: 0 !important;
              border-radius: 0 !important;
              border-right-width: 0 !important; 
            }
            table[class=body] .btn table {
              width: 100% !important; 
            }
            table[class=body] .btn a {
              width: 100% !important; 
            }
            table[class=body] .img-responsive {
              height: auto !important;
              max-width: 100% !important;
              width: auto !important; 
            }
          }
          @media all {
            .ExternalClass {
              width: 100%; 
            }
            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
              line-height: 100%; 
            }
            .apple-link a {
              color: inherit !important;
              font-family: inherit !important;
              font-size: inherit !important;
              font-weight: inherit !important;
              line-height: inherit !important;
              text-decoration: none !important; 
            }
            #MessageViewBody a {
              color: inherit;
              text-decoration: none;
              font-size: inherit;
              font-family: inherit;
              font-weight: inherit;
              line-height: inherit;
            }
            .btn-primary table td:hover {
              background-color: #34495e !important; 
            }
            .btn-primary a:hover {
              background-color: #34495e !important;
              border-color: #34495e !important; 
            } 
          }
          .table_title {
            width: 120px;
            text-align: right;
            padding-right: 15px;
            font-weight: bold;
          }
          .table_row {
            margin-bottom: 10px;
            display: inline-block;
            width: 100%;
          }
        </style>
      </head>
      <body class="">
        <span class="preheader">This is preheader text. Some clients will show this text as a preview.</span>
        <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
          <tr>
            <td>&nbsp;</td>
            <td class="container">
              <div class="content">
                <table role="presentation" class="main">
                  <tr>
                    <td class="wrapper">
                      <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td>
                            <p>' . $value['parent_name'] . ', a enviado una Solicitud de preinscripción.</p>
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                              <tr>
                                <td class="table_title">Familiar<br><br></td>
                                <td></td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">Nombre:</td>
                                <td>' . $value['parent_name'] . '</td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">Email:</td>
                                <td>' . $value['parent_email'] . '</td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">Celular:</td>
                                <td>' . $value['parent_celphone'] . '</td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">Telefono:</td>
                                <td>' . $value['parent_phone'] . '</td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">DNI:</td>
                                <td>' . $value['parent_dni'] . '</td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">Dirección</td>
                                <td>' . $value['parent_address'] . '</td>
                              </tr>
                              <tr>
                                <td class="table_title"><br>Estudiante 1<br><br></td>
                                <td></td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">Nombre:</td>
                                <td>' . $value['student_one_name'] . '</td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">DNI:</td>
                                <td>' . $value['student_one_dni'] . '</td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">Grado:</td>
                                <td>' . $value['student_one_grado'] . '</td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">Nivel:</td>
                                <td>' . $value['student_one_nivel'] . '</td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">Procedencia:</td>
                                <td>' . $value['student_one_procedencia'] . '</td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">Repitio:</td>
                                <td>' . $value['student_one_repitio_anio'] . '</td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">Cual:</td>
                                <td>' . $value['student_one_repitio_anio_cual'] . '</td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">Discapacidad:</td>
                                <td>' . $value['student_one_discapacidad'] . '</td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">Cual:</td>
                                <td>' . $value['student_one_discapacidad_cual'] . '</td>
                              </tr>
                              <tr>
                                <td class="table_title"><br>Estudiante 2<br><br></td>
                                <td></td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">Nombre:</td>
                                <td>' . $value['student_two_name'] . '</td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">DNI:</td>
                                <td>' . $value['student_two_dni'] . '</td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">Grado:</td>
                                <td>' . $value['student_two_grado'] . '</td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">Nivel:</td>
                                <td>' . $value['student_two_nivel'] . '</td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">Procedencia:</td>
                                <td>' . $value['student_two_procedencia'] . '</td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">Repitio:</td>
                                <td>' . $value['student_two_repitio_anio'] . '</td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">Cual:</td>
                                <td>' . $value['student_two_repitio_anio_cual'] . '</td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">Discapacidad:</td>
                                <td>' . $value['student_two_discapacidad'] . '</td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">Cual:</td>
                                <td>' . $value['student_two_discapacidad_cual'] . '</td>
                              </tr>
                              <tr>
                                <td class="table_title"><br>Estudiante 3<br><br></td>
                                <td></td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">Nombre:</td>
                                <td>' . $value['student_three_name'] . '</td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">DNI:</td>
                                <td>' . $value['student_three_dni'] . '</td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">Grado:</td>
                                <td>' . $value['student_three_grado'] . '</td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">Nivel:</td>
                                <td>' . $value['student_three_nivel'] . '</td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">Procedencia:</td>
                                <td>' . $value['student_three_procedencia'] . '</td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">Repitio</td>
                                <td>' . $value['student_three_repitio_anio'] . '</td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">Cual:</td>
                                <td>' . $value['student_three_repitio_anio_cual'] . '</td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">Discapacidad:</td>
                                <td>' . $value['student_three_discapacidad'] . '</td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">Cual:</td>
                                <td>' . $value['student_three_discapacidad_cual'] . '</td>
                              </tr>
                              <tr>
                                <td class="table_title"><br><br>Informacion adicional<br><br></td>
                                <td></td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">Colegio:</td>
                                <td>' . $value['student_adicional_colegio'] . '</td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">Recomendado por:</td>
                                <td>' . $value['student_adicional_recomendado'] . '</td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">Que espera de Komensky</td>
                                <td>' . $value['student_adicional_espera'] . '</td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">Instromento:</td>
                                <td>' . $value['student_adicional_instromento'] . '</td>
                              </tr>
                              <tr class="table_row">
                                <td class="table_title">Cual:</td>
                                <td>' . $value['student_adicional_instromento_cual'] . '</td>
                              </tr>
                            </table>
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                              <tbody>
                                <tr>
                                  <td align="left">
                                    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                      <tbody>
                                        <tr>
                                          <td> <a href="https://api.whatsapp.com/send?phone=51' . $value['parent_celphone'] . '&text=Hola ' . $value['parent_name'] . ', " target="_blank">Escribir por WhatsApp a ' . $value['parent_name'] . '</a> </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
                <div class="footer">
                  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td class="content-block powered-by">
                        Mensaje enviado desde <a href="' . get_home_url() . '">' . home_url() . '</a>.
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </body>
    </html>
    ';

    return $return;
  }
}

new Ajax_Pre_Registration();
