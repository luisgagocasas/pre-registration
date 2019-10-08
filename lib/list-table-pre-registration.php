<?php
global $table_pre_registration;
$table_pre_registration = '0.1';

function pre_registration_table_install() {
  global $wpdb;
  global $table_pre_registration;

  $sql = "CREATE TABLE " . $wpdb->prefix . "pre_registration (
    id int(11) NOT NULL AUTO_INCREMENT,
    parent_name VARCHAR(200) NOT NULL,
    parent_email VARCHAR(200) NOT NULL,
    parent_celphone VARCHAR(200) NOT NULL,
    parent_phone VARCHAR(200) NOT NULL,
    parent_dni VARCHAR(200) NOT NULL,
    parent_address VARCHAR(200) NOT NULL,
    student_one_name VARCHAR(200) NOT NULL,
    student_one_dni VARCHAR(200) NOT NULL,
    student_one_grado VARCHAR(200) NOT NULL,
    student_one_nivel VARCHAR(200) NOT NULL,
    student_one_procedencia VARCHAR(200) NOT NULL,
    student_one_repitio_anio VARCHAR(200) NOT NULL,
    student_one_repitio_anio_cual VARCHAR(200) NOT NULL,
    student_one_discapacidad VARCHAR(200) NOT NULL,
    student_one_discapacidad_cual VARCHAR(200) NOT NULL,
    student_two_name VARCHAR(200) NOT NULL,
    student_two_dni VARCHAR(200) NOT NULL,
    student_two_grado VARCHAR(200) NOT NULL,
    student_two_nivel VARCHAR(200) NOT NULL,
    student_two_procedencia VARCHAR(200) NOT NULL,
    student_two_repitio_anio VARCHAR(200) NOT NULL,
    student_two_repitio_anio_cual VARCHAR(200) NOT NULL,
    student_two_discapacidad VARCHAR(200) NOT NULL,
    student_two_discapacidad_cual VARCHAR(200) NOT NULL,
    student_three_name VARCHAR(200) NOT NULL,
    student_three_dni VARCHAR(200) NOT NULL,
    student_three_grado VARCHAR(200) NOT NULL,
    student_three_nivel VARCHAR(200) NOT NULL,
    student_three_procedencia VARCHAR(200) NOT NULL,
    student_three_repitio_anio VARCHAR(200) NOT NULL,
    student_three_repitio_anio_cual VARCHAR(200) NOT NULL,
    student_three_discapacidad VARCHAR(200) NOT NULL,
    student_three_discapacidad_cual VARCHAR(200) NOT NULL,
    student_adicional_colegio VARCHAR(200) NOT NULL,
    student_adicional_recomendado VARCHAR(200) NOT NULL,
    student_adicional_espera VARCHAR(200) NOT NULL,
    student_adicional_instromento VARCHAR(200) NOT NULL,
    student_adicional_instromento_cual VARCHAR(200) NOT NULL,
    date_create VARCHAR(10) NOT NULL,
    date_update VARCHAR(10) NOT NULL,
    PRIMARY KEY (id)
  ) COLLATE {$wpdb->collate};";

  require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
  dbDelta($sql);

  add_option('table_pre_registration', $table_pre_registration);

  $installed_ver = get_option('table_pre_registration');
  if ($installed_ver != $table_pre_registration) {
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

    update_option('table_pre_registration', $table_pre_registration);
  }
}
register_activation_hook(__FILE__, 'pre_registration_table_install');

function pre_registration_table_update_db_check() {
  global $table_pre_registration;

  if (get_site_option('table_pre_registration') != $table_pre_registration) {
    pre_registration_table_install();
  }
}

add_action('plugins_loaded', 'pre_registration_table_update_db_check');

if (!class_exists('WP_List_Table')) {
  require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

class Pre_Registration_List_Table extends WP_List_Table {
  function __construct() {
    global $status, $page;

    parent::__construct(
      array(
        'singular' => 'pre_registration',
        'plural'   => 'pre_registrations',
      )
    );
  }

  function column_default($item, $column_name) {
    return $item[$column_name];
  }

  function column_date_create($item) {
    $resources = new Resources_Pre_Registration();
    return $resources->nicetime($item['date_create']);
  }

  function column_date_update($item) {
    $resources = new Resources_Pre_Registration();
    return $resources->nicetime($item['date_update']);
  }

  function column_parent_name($item) {
    $actions = array(
      'edit' => sprintf('<a href="?page=pre_registration_form&id=%s"><strong>%s</strong></a>', $item['id'], 'Edit'),
      'delete' => sprintf('<a href="?page=%s&action=delete&id=%s"><strong>%s</strong></a>', $_REQUEST['page'], $item['id'], 'Delete'),
    );

    return sprintf('%s %s',
      $item['parent_name'],
      $this->row_actions($actions)
    );
  }

  function column_cb($item) {
    return sprintf(
      '<input type="checkbox" name="id[]" value="%s" />',
      $item['id']
    );
  }

  function get_columns() {
    $columns = array(
      'cb'             => '<input type="checkbox" />',
      'parent_name'    =>  'Nombre y Apellidos',
      'parent_email'   =>  'Correo',
      'parent_celphone'=>  'Celular',
      'parent_phone'   =>  'Telefono fijo',
      'parent_dni'     =>  'DNI',
      'parent_address' =>  'Dirección',
      'date_create'    => 'Fecha/Creado',
      'date_update'    => 'Fecha/Actualizado',
    );

    return $columns;
  }

  function get_sortable_columns() {
    $sortable_columns = array(
      'Nombre'      => array('Nombre', true),
      'date_create' => array('date_create', false),
      'date_update' => array('date_update', false),
    );

    return $sortable_columns;
  }

  function get_bulk_actions() {
    $actions = array(
      'delete' => 'Delete'
    );
    return $actions;
  }

  function process_bulk_action() {
    global $wpdb;

    if ('delete' === $this->current_action()) {
      $ids = isset($_REQUEST['id']) ? $_REQUEST['id'] : array();
      if (is_array($ids)) $ids = implode(',', $ids);

      if (!empty($ids)) {
        $wpdb->query("DELETE FROM {$wpdb->prefix}pre_registration WHERE id IN($ids)");
      }
    }
  }

  function prepare_items() {
    global $wpdb;
    $per_page = 10;
    $columns = $this->get_columns();
    $hidden = array();
    $sortable = $this->get_sortable_columns();
    $this->_column_headers = array($columns, $hidden, $sortable);
    $this->process_bulk_action();

    $paged = isset($_REQUEST['paged']) ? ($per_page * max(0, intval($_REQUEST['paged']) - 1)) : 0;
    $orderby = (isset($_REQUEST['orderby']) && in_array($_REQUEST['orderby'], array_keys($this->get_sortable_columns()))) ? $_REQUEST['orderby'] : 'date_create';
    $order = (isset($_REQUEST['order']) && in_array($_REQUEST['order'], array('asc', 'desc'))) ? $_REQUEST['order'] : 'desc';

    $this->items = $wpdb->get_results(
      $wpdb->prepare(
        "SELECT * FROM {$wpdb->prefix}pre_registration ORDER BY $orderby $order LIMIT %d OFFSET %d", $per_page, $paged
      ), ARRAY_A
    );

    $total_items = $wpdb->get_var("SELECT COUNT(id) FROM {$wpdb->prefix}pre_registration");

    $this->set_pagination_args(
      array(
        'total_items' => $total_items,
        'per_page' => $per_page,
        'total_pages' => ceil($total_items / $per_page)
      )
    );
  }
}