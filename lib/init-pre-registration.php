<?php
class initPreRegistration {
  public function __construct() {
    add_action('admin_menu', array($this,'pre_registration_table_admin_menu'));
  }

  function pre_registration_table_admin_menu() {
    add_menu_page('Pre Registration', 'Pre Registration', 'activate_plugins', 'pre_registration', array($this,'pre_registration_menu_init_page_handler'), 'dashicons-welcome-widgets-menus',
    2);

    add_submenu_page('pre_registration','List Pre Registration','List Pre Registration', 'activate_plugins', 'pre_registration', array($this,'pre_registration_menu_init_page_handler'));

    add_submenu_page('pre_registration', 'New Pre Registration', '+ New Pre Registration', 'activate_plugins', 'pre_registration_form', array($this,'pre_registration_admin_form_handler'));
  }

  function pre_registration_menu_init_page_handler() {
    global $wpdb;

    $table = new Pre_Registration_List_Table();
    $table->prepare_items();

    $message = '';
    if ('delete' === $table->current_action()) {
      $message = '<div class="notice notice-error" id="message"><p>Pre registration delete</p></div>';
    }
    ?>
    <div class="wrap">
      <div class="icon32 icon32-posts-post" id="icon-edit"><br></div>
      <h2>
        Pre Registration
        <a class="add-new-h2" href="<?php echo get_admin_url(get_current_blog_id(), 'admin.php?page=pre_registration_form');?>">
          New Pre Registration
        </a>
      </h2>
      <?php echo $message; ?>
      <form id="persons-table" method="GET">
        <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
        <?php
          $table->search_box( 'search', 'search_id' ); 
          $table->display();
        ?>
      </form>
    </div>
  <?php
  }

  function pre_registration_admin_form_handler() {
    global $wpdb;
    $message = '';
    $notice = '';
    $default = array(
      'id' => 0,
      'parent_name'=> '',
      'parent_email'=> '',
      'parent_celphone'=> '',
      'parent_phone'=> '',
      'parent_dni'=> '',
      'parent_address'=> '',
      'student_one_name' => '',
      'student_one_dni' => '',
      'student_one_grado' => '',
      'student_one_nivel' => '',
      'student_one_procedencia' => '',
      'student_one_repitio_anio' => '',
      'student_one_repitio_anio_cual' => '',
      'student_one_discapacidad' => '',
      'student_one_discapacidad_cual' => '',
      'student_two_name' => '',
      'student_two_dni' => '',
      'student_two_grado' => '',
      'student_two_nivel' => '',
      'student_two_procedencia' => '',
      'student_two_repitio_anio' => '',
      'student_two_repitio_anio_cual' => '',
      'student_two_discapacidad' => '',
      'student_two_discapacidad_cual' => '',
      'student_three_name' => '',
      'student_three_dni' => '',
      'student_three_grado' => '',
      'student_three_nivel' => '',
      'student_three_procedencia' => '',
      'student_three_repitio_anio' => '',
      'student_three_repitio_anio_cual' => '',
      'student_three_discapacidad' => '',
      'student_three_discapacidad_cual' => '',
      'student_adicional_colegio' => '',
      'student_adicional_recomendado' => '',
      'student_adicional_espera' => '',
      'student_adicional_instromento' => '',
      'student_adicional_instromento_cual' => '',
    );

    if (wp_verify_nonce($_REQUEST['nonce'], basename(__FILE__))) {
      $item = shortcode_atts($default, $_REQUEST);
      $item_valid = $this->pre_registration_table_example_validate_person($item);
      if ($item_valid === true) {
        if ($item['id'] == 0) {
          $result = $wpdb->insert("{$wpdb->prefix}pre_registration",
            array(
              'parent_name'=> $item['parent_name'],
              'parent_email'=> $item['parent_email'],
              'parent_celphone'=> $item['parent_celphone'],
              'parent_phone'=> $item['parent_phone'],
              'parent_dni'=> $item['parent_dni'],
              'parent_address'=> $item['parent_address'],
              'student_one_name'=> $item['student_one_name'],
              'student_one_dni'=> $item['student_one_dni'],
              'student_one_grado'=> $item['student_one_grado'],
              'student_one_nivel'=> $item['student_one_nivel'],
              'student_one_procedencia'=> $item['student_one_procedencia'],
              'student_one_repitio_anio'=> $item['student_one_repitio_anio'],
              'student_one_repitio_anio_cual'=> $item['student_one_repitio_anio_cual'],
              'student_one_discapacidad'=> $item['student_one_discapacidad'],
              'student_one_discapacidad_cual'=> $item['student_one_discapacidad_cual'],
              'student_two_name'=> $item['student_two_name'],
              'student_two_dni'=> $item['student_two_dni'],
              'student_two_grado'=> $item['student_two_grado'],
              'student_two_nivel'=> $item['student_two_nivel'],
              'student_two_procedencia'=> $item['student_two_procedencia'],
              'student_two_repitio_anio'=> $item['student_two_repitio_anio'],
              'student_two_repitio_anio_cual'=> $item['student_two_repitio_anio_cual'],
              'student_two_discapacidad'=> $item['student_two_discapacidad'],
              'student_two_discapacidad_cual'=> $item['student_two_discapacidad_cual'],
              'student_three_name'=> $item['student_three_name'],
              'student_three_dni'=> $item['student_three_dni'],
              'student_three_grado'=> $item['student_three_grado'],
              'student_three_nivel'=> $item['student_three_nivel'],
              'student_three_procedencia'=> $item['student_three_procedencia'],
              'student_three_repitio_anio'=> $item['student_three_repitio_anio'],
              'student_three_repitio_anio_cual'=> $item['student_three_repitio_anio_cual'],
              'student_three_discapacidad'=> $item['student_three_discapacidad'],
              'student_three_discapacidad_cual'=> $item['student_three_discapacidad_cual'],
              'student_adicional_colegio'=> $item['student_adicional_colegio'],
              'student_adicional_recomendado'=> $item['student_adicional_recomendado'],
              'student_adicional_espera'=> $item['student_adicional_espera'],
              'student_adicional_instromento'=> $item['student_adicional_instromento'],
              'student_adicional_instromento_cual'=> $item['student_adicional_instromento_cual'],
              'date_create' => time(),
            )
          );
          $item['id'] = $wpdb->insert_id;
          if ($result) {
            $message = 'Item was successfully create saved';
          } else {
            $notice = 'There was an error while saving item';
          }
        } else {
          $result = $wpdb->update("{$wpdb->prefix}pre_registration",
            array(
              'id'=> $item['id'],
              'parent_name'=> $item['parent_name'],
              'parent_email'=> $item['parent_email'],
              'parent_celphone'=> $item['parent_celphone'],
              'parent_phone'=> $item['parent_phone'],
              'parent_dni'=> $item['parent_dni'],
              'parent_address'=> $item['parent_address'],
              'student_one_name'=> $item['student_one_name'],
              'student_one_dni'=> $item['student_one_dni'],
              'student_one_grado'=> $item['student_one_grado'],
              'student_one_nivel'=> $item['student_one_nivel'],
              'student_one_procedencia'=> $item['student_one_procedencia'],
              'student_one_repitio_anio'=> $item['student_one_repitio_anio'],
              'student_one_repitio_anio_cual'=> $item['student_one_repitio_anio_cual'],
              'student_one_discapacidad'=> $item['student_one_discapacidad'],
              'student_one_discapacidad_cual'=> $item['student_one_discapacidad_cual'],
              'student_two_name'=> $item['student_two_name'],
              'student_two_dni'=> $item['student_two_dni'],
              'student_two_grado'=> $item['student_two_grado'],
              'student_two_nivel'=> $item['student_two_nivel'],
              'student_two_procedencia'=> $item['student_two_procedencia'],
              'student_two_repitio_anio'=> $item['student_two_repitio_anio'],
              'student_two_repitio_anio_cual'=> $item['student_two_repitio_anio_cual'],
              'student_two_discapacidad'=> $item['student_two_discapacidad'],
              'student_two_discapacidad_cual'=> $item['student_two_discapacidad_cual'],
              'student_three_name'=> $item['student_three_name'],
              'student_three_dni'=> $item['student_three_dni'],
              'student_three_grado'=> $item['student_three_grado'],
              'student_three_nivel'=> $item['student_three_nivel'],
              'student_three_procedencia'=> $item['student_three_procedencia'],
              'student_three_repitio_anio'=> $item['student_three_repitio_anio'],
              'student_three_repitio_anio_cual'=> $item['student_three_repitio_anio_cual'],
              'student_three_discapacidad'=> $item['student_three_discapacidad'],
              'student_three_discapacidad_cual'=> $item['student_three_discapacidad_cual'],
              'student_adicional_colegio'=> $item['student_adicional_colegio'],
              'student_adicional_recomendado'=> $item['student_adicional_recomendado'],
              'student_adicional_espera'=> $item['student_adicional_espera'],
              'student_adicional_instromento'=> $item['student_adicional_instromento'],
              'student_adicional_instromento_cual'=> $item['student_adicional_instromento_cual'],
              'date_update' => time(),
            ), array('id'=>$item['id'])
          );

          if ($result) {
            $message = 'Item was successfully update updated';
          } else {
            $notice = 'There was an error while updating item';
          }
        }
      } else {
        $notice = $item_valid;
      }
    } else {
      $item = $default;
      if (isset($_REQUEST['id'])) {
        $item = $wpdb->get_row(
          $wpdb->prepare(
            "SELECT * FROM {$wpdb->prefix}pre_registration WHERE id = %d",
            $_REQUEST['id']
          ), ARRAY_A
        );
        if (!$item) {
          $item = $default;
          $notice = 'Item not found';
        }
      }
    }

    add_meta_box('pre_registration_form_meta_box', 'Pre Registration data', array($this,'pre_registration_form_handler'), 'pre_registration_form', 'normal', 'default'); ?>
    <div class="wrap">
      <div class="icon32 icon32-posts-post" id="icon-edit">
        <br>
      </div>
      <h2>
        Pre Registration
        <a class="add-new-h2" href="<?php echo get_admin_url(get_current_blog_id(), 'admin.php?page=pre_registration');?>">
          back to list
        </a>
      </h2>

      <?php if (!empty($notice)): ?>
        <div id="notice" class="error">
          <p><?php echo $notice ?></p>
        </div>
      <?php endif;?>

      <?php if (!empty($message)): ?>
        <div id="message" class="updated"><p><?php echo $message ?></p></div>
      <?php endif;?>

      <form id="form" method="POST">
        <input type="hidden" name="nonce" value="<?php echo wp_create_nonce(basename(__FILE__))?>" />
        <input type="hidden" name="id" value="<?php echo $item['id'] ?>"/>
        <div class="metabox-holder" id="poststuff">
          <div id="post-body" class="metabox-holder columns-2">
            <div id="postbox-container-1" class="postbox-container">
              <div id="side-sortables" class="meta-box-sortables ui-sortable">
                <div id="submitdiv" class="postbox ">
                  <h2 class="hndle ui-sortable-handle"><span>Publicar</span></h2>
                  <div class="inside">
                    <div class="submitbox" id="submitpost">
                      <div id="minor-publishing">
                        <div class="misc-pub-section">
                          <p></p>
                        </div>
                      </div>
                      <div id="major-publishing-actions">
                        <div id="publishing-action">
                          <input type="submit" value="Save Person" id="submit" class="button button-primary button-large" name="submit">
                        </div>
                        <div class="clear"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="postbox-container-2" class="postbox-container">
              <div id="post-body">
                <div id="post-body-content">
                  <?php do_meta_boxes('pre_registration_form', 'normal', $item); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <?php
  }

  function pre_registration_form_handler($item) {
    global $wpdb; ?>
    <table cellspacing="2" cellpadding="5" style="width: 100%;" class="form-table">
      <tbody>
        <tr class="form-field">
          <th valign="top" scope="row">
            <label for="parent_name">Name</label>
          </th>
          <td>
            <input id="parent_name" name="parent_name" type="text" style="width: 95%" value="<?php echo esc_attr($item['parent_name']); ?>" size="50" class="code" required>
          </td>
          <th valign="top" scope="row">
            <label for="parent_email">parent_email</label>
          </th>
          <td>
            <input id="parent_email" name="parent_email" type="text" style="width: 95%" value="<?php echo esc_attr($item['parent_email']); ?>" size="50" class="code" required>
          </td>
        </tr>
        <tr class="form-field">
          <th valign="top" scope="row">
            <label for="parent_celphone">parent_celphone</label>
          </th>
          <td>
            <input id="parent_celphone" name="parent_celphone" type="text" style="width: 95%" value="<?php echo esc_attr($item['parent_celphone']); ?>" size="50" class="code" required>
          </td>
          <th valign="top" scope="row">
            <label for="parent_phone">parent_phone</label>
          </th>
          <td>
            <input id="parent_phone" name="parent_phone" type="text" style="width: 95%" value="<?php echo esc_attr($item['parent_phone']); ?>" size="50" class="code" required>
          </td>
        </tr>
        <tr class="form-field">
          <th valign="top" scope="row">
            <label for="parent_dni">parent_dni</label>
          </th>
          <td>
            <input id="parent_dni" name="parent_dni" type="text" style="width: 95%" value="<?php echo esc_attr($item['parent_dni']); ?>" size="50" class="code" required>
          </td>
          <th valign="top" scope="row">
            <label for="parent_address">parent_address</label>
          </th>
          <td>
            <input id="parent_address" name="parent_address" type="text" style="width: 95%" value="<?php echo esc_attr($item['parent_address']); ?>" size="50" class="code" required>
          </td>
        </tr>
        <tr class="form-field">
          <th valign="top" scope="row">
            <label for="student_one_name">student_one_name</label>
          </th>
          <td>
            <input id="student_one_name" name="student_one_name" type="text" style="width: 95%" value="<?php echo esc_attr($item['student_one_name']); ?>" size="50" class="code">
          </td>
          <th valign="top" scope="row">
            <label for="student_one_dni">student_one_dni</label>
          </th>
          <td>
            <input id="student_one_dni" name="student_one_dni" type="text" style="width: 95%" value="<?php echo esc_attr($item['student_one_dni']); ?>" size="50" class="code">
          </td>
        </tr>
        <tr class="form-field">
          <th valign="top" scope="row">
            <label for="student_one_grado">student_one_grado</label>
          </th>
          <td>
            <input id="student_one_grado" name="student_one_grado" type="text" style="width: 95%" value="<?php echo esc_attr($item['student_one_grado']); ?>" size="50" class="code">
          </td>
          <th valign="top" scope="row">
            <label for="student_one_nivel">student_one_nivel</label>
          </th>
          <td>
            <input id="student_one_nivel" name="student_one_nivel" type="text" style="width: 95%" value="<?php echo esc_attr($item['student_one_nivel']); ?>" size="50" class="code">
          </td>
        </tr>
        <tr class="form-field">
          <th valign="top" scope="row">
            <label for="student_one_procedencia">student_one_procedencia</label>
          </th>
          <td>
            <input id="student_one_procedencia" name="student_one_procedencia" type="text" style="width: 95%" value="<?php echo esc_attr($item['student_one_procedencia']); ?>" size="50" class="code">
          </td>
          <th valign="top" scope="row">
            <label for="student_one_repitio_anio">student_one_repitio_anio</label>
          </th>
          <td>
            <input id="student_one_repitio_anio" name="student_one_repitio_anio" type="text" style="width: 95%" value="<?php echo esc_attr($item['student_one_repitio_anio']); ?>" size="50" class="code">
          </td>
        </tr>
        <tr class="form-field">
          <th valign="top" scope="row">
            <label for="student_one_repitio_anio_cual">student_one_repitio_anio_cual</label>
          </th>
          <td>
            <input id="student_one_repitio_anio_cual" name="student_one_repitio_anio_cual" type="text" style="width: 95%" value="<?php echo esc_attr($item['student_one_repitio_anio_cual']); ?>" size="50" class="code">
          </td>
          <th valign="top" scope="row">
            <label for="student_one_discapacidad">student_one_discapacidad</label>
          </th>
          <td>
            <input id="student_one_discapacidad" name="student_one_discapacidad" type="text" style="width: 95%" value="<?php echo esc_attr($item['student_one_discapacidad']); ?>" size="50" class="code">
          </td>
        </tr>
        <tr class="form-field">
          <th valign="top" scope="row">
            <label for="student_one_discapacidad_cual">student_one_discapacidad_cual</label>
          </th>
          <td>
            <input id="student_one_discapacidad_cual" name="student_one_discapacidad_cual" type="text" style="width: 95%" value="<?php echo esc_attr($item['student_one_discapacidad_cual']); ?>" size="50" class="code">
          </td>
          <th valign="top" scope="row">
            <label for="student_two_name">student_two_name</label>
          </th>
          <td>
            <input id="student_two_name" name="student_two_name" type="text" style="width: 95%" value="<?php echo esc_attr($item['student_two_name']); ?>" size="50" class="code">
          </td>
        </tr>
        <tr class="form-field">
          <th valign="top" scope="row">
            <label for="student_two_dni">student_two_dni</label>
          </th>
          <td>
            <input id="student_two_dni" name="student_two_dni" type="text" style="width: 95%" value="<?php echo esc_attr($item['student_two_dni']); ?>" size="50" class="code">
          </td>
          <th valign="top" scope="row">
            <label for="student_two_grado">student_two_grado</label>
          </th>
          <td>
            <input id="student_two_grado" name="student_two_grado" type="text" style="width: 95%" value="<?php echo esc_attr($item['student_two_grado']); ?>" size="50" class="code">
          </td>
        </tr>
        <tr class="form-field">
          <th valign="top" scope="row">
            <label for="student_two_nivel">student_two_nivel</label>
          </th>
          <td>
            <input id="student_two_nivel" name="student_two_nivel" type="text" style="width: 95%" value="<?php echo esc_attr($item['student_two_nivel']); ?>" size="50" class="code">
          </td>
          <th valign="top" scope="row">
            <label for="student_two_procedencia">student_two_procedencia</label>
          </th>
          <td>
            <input id="student_two_procedencia" name="student_two_procedencia" type="text" style="width: 95%" value="<?php echo esc_attr($item['student_two_procedencia']); ?>" size="50" class="code">
          </td>
        </tr>
        <tr class="form-field">
          <th valign="top" scope="row">
            <label for="student_two_repitio_anio">student_two_repitio_anio</label>
          </th>
          <td>
            <input id="student_two_repitio_anio" name="student_two_repitio_anio" type="text" style="width: 95%" value="<?php echo esc_attr($item['student_two_repitio_anio']); ?>" size="50" class="code">
          </td>
          <th valign="top" scope="row">
            <label for="student_two_repitio_anio_cual">student_two_repitio_anio_cual</label>
          </th>
          <td>
            <input id="student_two_repitio_anio_cual" name="student_two_repitio_anio_cual" type="text" style="width: 95%" value="<?php echo esc_attr($item['student_two_repitio_anio_cual']); ?>" size="50" class="code">
          </td>
        </tr>
        <tr class="form-field">
          <th valign="top" scope="row">
            <label for="student_two_discapacidad">student_two_discapacidad</label>
          </th>
          <td>
            <input id="student_two_discapacidad" name="student_two_discapacidad" type="text" style="width: 95%" value="<?php echo esc_attr($item['student_two_discapacidad']); ?>" size="50" class="code">
          </td>
          <th valign="top" scope="row">
            <label for="student_two_discapacidad_cual">student_two_discapacidad_cual</label>
          </th>
          <td>
            <input id="student_two_discapacidad_cual" name="student_two_discapacidad_cual" type="text" style="width: 95%" value="<?php echo esc_attr($item['student_two_discapacidad_cual']); ?>" size="50" class="code">
          </td>
        </tr>
        <tr class="form-field">
          <th valign="top" scope="row">
            <label for="student_three_name">student_three_name</label>
          </th>
          <td>
            <input id="student_three_name" name="student_three_name" type="text" style="width: 95%" value="<?php echo esc_attr($item['student_three_name']); ?>" size="50" class="code">
          </td>
          <th valign="top" scope="row">
            <label for="student_three_dni">student_three_dni</label>
          </th>
          <td>
            <input id="student_three_dni" name="student_three_dni" type="text" style="width: 95%" value="<?php echo esc_attr($item['student_three_dni']); ?>" size="50" class="code">
          </td>
        </tr>
        <tr class="form-field">
          <th valign="top" scope="row">
            <label for="student_three_grado">student_three_grado</label>
          </th>
          <td>
            <input id="student_three_grado" name="student_three_grado" type="text" style="width: 95%" value="<?php echo esc_attr($item['student_three_grado']); ?>" size="50" class="code">
          </td>
          <th valign="top" scope="row">
            <label for="student_three_nivel">student_three_nivel</label>
          </th>
          <td>
            <input id="student_three_nivel" name="student_three_nivel" type="text" style="width: 95%" value="<?php echo esc_attr($item['student_three_nivel']); ?>" size="50" class="code">
          </td>
        </tr>
        <tr class="form-field">
          <th valign="top" scope="row">
            <label for="student_three_procedencia">student_three_procedencia</label>
          </th>
          <td>
            <input id="student_three_procedencia" name="student_three_procedencia" type="text" style="width: 95%" value="<?php echo esc_attr($item['student_three_procedencia']); ?>" size="50" class="code">
          </td>
          <th valign="top" scope="row">
            <label for="student_three_repitio_anio">student_three_repitio_anio</label>
          </th>
          <td>
            <input id="student_three_repitio_anio" name="student_three_repitio_anio" type="text" style="width: 95%" value="<?php echo esc_attr($item['student_three_repitio_anio']); ?>" size="50" class="code">
          </td>
        </tr>
        <tr class="form-field">
          <th valign="top" scope="row">
            <label for="student_three_repitio_anio_cual">student_three_repitio_anio_cual</label>
          </th>
          <td>
            <input id="student_three_repitio_anio_cual" name="student_three_repitio_anio_cual" type="text" style="width: 95%" value="<?php echo esc_attr($item['student_three_repitio_anio_cual']); ?>" size="50" class="code">
          </td>
          <th valign="top" scope="row">
            <label for="student_three_discapacidad">student_three_discapacidad</label>
          </th>
          <td>
            <input id="student_three_discapacidad" name="student_three_discapacidad" type="text" style="width: 95%" value="<?php echo esc_attr($item['student_three_discapacidad']); ?>" size="50" class="code">
          </td>
        </tr>
        <tr class="form-field">
          <th valign="top" scope="row">
            <label for="student_three_discapacidad_cual">student_three_discapacidad_cual</label>
          </th>
          <td>
            <input id="student_three_discapacidad_cual" name="student_three_discapacidad_cual" type="text" style="width: 95%" value="<?php echo esc_attr($item['student_three_discapacidad_cual']); ?>" size="50" class="code">
          </td>
          <th valign="top" scope="row">
            <label for="student_adicional_colegio">student_adicional_colegio</label>
          </th>
          <td>
            <input id="student_adicional_colegio" name="student_adicional_colegio" type="text" style="width: 95%" value="<?php echo esc_attr($item['student_adicional_colegio']); ?>" size="50" class="code">
          </td>
        </tr>
        <tr class="form-field">
          <th valign="top" scope="row">
            <label for="student_adicional_recomendado">student_adicional_recomendado</label>
          </th>
          <td>
            <input id="student_adicional_recomendado" name="student_adicional_recomendado" type="text" style="width: 95%" value="<?php echo esc_attr($item['student_adicional_recomendado']); ?>" size="50" class="code">
          </td>
          <th valign="top" scope="row">
            <label for="student_adicional_espera">student_adicional_espera</label>
          </th>
          <td>
            <input id="student_adicional_espera" name="student_adicional_espera" type="text" style="width: 95%" value="<?php echo esc_attr($item['student_adicional_espera']); ?>" size="50" class="code">
          </td>
        </tr>
        <tr class="form-field">
          <th valign="top" scope="row">
            <label for="student_adicional_instromento">student_adicional_instromento</label>
          </th>
          <td>
            <input id="student_adicional_instromento" name="student_adicional_instromento" type="text" style="width: 95%" value="<?php echo esc_attr($item['student_adicional_instromento']); ?>" size="50" class="code">
          </td>
          <th valign="top" scope="row">
            <label for="student_adicional_instromento_cual">student_adicional_instromento_cual</label>
          </th>
          <td>
            <input id="student_adicional_instromento_cual" name="student_adicional_instromento_cual" type="text" style="width: 95%" value="<?php echo esc_attr($item['student_adicional_instromento_cual']); ?>" size="50" class="code">
          </td>
        </tr>
      </tbody>
    </table>
    <hr>
    <table cellspacing="2" cellpadding="5" style="width: 100%;" class="form-table">
      <tbody>
        <tr class="form-field">
          <th valign="top" scope="row">
            <label for="faltapagar">faltapagar</label>
          </th>
          <td>
            <input id="faltapagar" name="faltapagar" type="text" style="width: 95%" value="<?php echo esc_attr($item['faltapagar']); ?>" size="50" class="code">
          </td>
        </tr>
      </tbody>
    </table>
    <?php
  }

  function pre_registration_table_example_validate_person($item) {
    $messages = array();

    if (empty($item['parent_name'])) $messages[] = 'parent_name is required';
    if (empty($item['parent_email'])) $messages[] = 'parent_email is required';
    if (empty($item['parent_celphone'])) $messages[] = 'parent_celphone is required';
    if (empty($item['parent_phone'])) $messages[] = 'parent_phone is required';
    if (empty($item['parent_dni'])) $messages[] = 'parent_dni is required';
    if (empty($item['parent_address'])) $messages[] = 'parent_address is required';

    if (empty($messages)) return true;
    return implode('<br />', $messages);
  }
}