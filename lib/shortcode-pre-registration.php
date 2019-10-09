<?php
class shortcodePreRegistration {
  public function __construct() {
    if (!is_admin()) {
      add_shortcode('preregistration', array($this, 'shortcode_pre_registration'));
    }
  }

  function shortcode_pre_registration($atts) {
    ob_start();
    wp_enqueue_style('pre/bootstrap.css', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css', false, null);
    wp_enqueue_style('pre/style.css', plugins_url('../css/style.css', __FILE__), false, null);
    wp_enqueue_style('pre/waitMe.min.css', plugins_url('../css/waitMe.min.css', __FILE__), false, null);
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', '//cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js', array(), null, false);
    wp_register_script( 'form-pre-registration', plugins_url('../js/form-pre-registration.js', __FILE__), false, false, false );
    wp_enqueue_script( 'form-pre-registration' );
    wp_register_script( 'jquery-validate', '//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js', false, false, false );
    wp_enqueue_script( 'jquery-validate' );
    wp_register_script( 'waitMe', plugins_url('../js/waitMe.min.js', __FILE__), false, false, false );
    wp_enqueue_script( 'waitMe' );

    $atts = shortcode_atts(
      array(
        'btn-submit' => 'Enviar Información',
        'redirect'   => 'https://google.com'
      ), $atts, 'preregistration');
    $this->form_public($atts);
    return ob_get_clean();
  }

  function form_public($atts) {
    global $wpdb; ?>
    <form id="form-pre-register" class="needs-validation" data-toggle="validator" action="#" method="post" novalidate>
      <blockquote class="blockquote">
        <p class="mb-0">Datos del Padre de familia.</p>
        <footer class="blockquote-footer">Interesado en el colegio.</footer>
      </blockquote>
      <div class="row no-gutters">
        <div class="col-12">
          <div class="form-group">
            <input type="text" class="form-control" name="parent_name" placeholder="Nombres y Apellidos *">
          </div>
        </div>
        <div class="col-6 pr-2">
          <div class="form-group">
            <input type="text" class="form-control" name="parent_dni" placeholder="DNI *">
          </div>
        </div>
        <div class="col-6 pl-2">
          <div class="form-group">
            <input type="text" class="form-control" name="parent_celphone" placeholder="Celular *">
          </div>
        </div>
        <div class="col-6 pr-2">
          <div class="form-group">
            <input type="text" class="form-control" name="parent_phone" placeholder="Fijo *">
          </div>
        </div>
        <div class="col-6 pl-2">
          <div class="form-group">
            <input type="text" class="form-control" name="parent_email" placeholder="Correo Electrónico *">
          </div>
        </div>
        <div class="col-12">
          <div class="form-group">
            <input type="text" class="form-control" name="parent_address" placeholder="Domicilio *">
          </div>
        </div>
        <blockquote class="blockquote">
          <p class="mb-0">Datos del(os) Postulante(s)</p>
          <footer class="blockquote-footer">Postulante N.- 1</footer>
        </blockquote>
        <div class="col-6 pr-2">
          <div class="form-group">
            <input type="text" class="form-control" name="student_one_name" placeholder="Nombre y Apellidos *">
          </div>
        </div>
        <div class="col-6 pl-2">
          <div class="form-group">
            <input type="text" class="form-control" name="student_one_dni" placeholder="DNI *">
          </div>
        </div>
        <div class="col-6 pr-2">
          <div class="form-group">
            <input type="text" class="form-control" name="student_one_grado" placeholder="Grado al que postula *">
          </div>
        </div>
        <div class="col-6 pl-2">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="student_one_nivel">Nivel</label>
            </div>
            <select class="custom-select" id="student_one_nivel">
              <option selected>Selecciona ...</option>
              <option value="Inicial">Inicial</option>
              <option value="Primaria">Primaria</option>
              <option value="Secundaria">Secundaria</option>
            </select>
          </div>
        </div>
        <div class="col-12">
          <div class="form-group">
            <input type="text" class="form-control" name="student_one_procedencia" placeholder="Colegio de procedencia">
          </div>
        </div>
        <div class="col-6 pr-2">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="student_one_repitio_anio">¿Repitio año?</label>
            </div>
            <select class="custom-select" id="student_one_repitio_anio">
              <option selected>Selecciona ...</option>
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
          </div>
        </div>
        <div class="col-6 pl-2">
          <div class="form-group">
            <input type="text" class="form-control" name="student_one_repitio_anio_cual" placeholder="¿Qué grado?">
          </div>
        </div>
        <div class="col-6 pr-2">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="student_one_discapacidad">¿Discapacidad?</label>
            </div>
            <select class="custom-select" id="student_one_discapacidad">
              <option selected>Selecciona ...</option>
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
          </div>
        </div>
        <div class="col-6 pl-2">
          <div class="form-group">
            <input type="text" class="form-control" name="student_one_discapacidad_cual" placeholder="¿De qué tipo?">
          </div>
        </div>
      </div>
      <div class="row no-gutters one_postulant">
        <div class="col-12 text-right">
          <a href="#" class="btn" id="add_one">Agregar Postulante</a>
        </div>
      </div>
      <div class="row no-gutters remove_postulant d-none">
        <div class="col-12 text-right">
          <a href="#" class="btn" id="remove_one">Quitar Postulante</a>
        </div>
      </div>
      <blockquote class="blockquote d-none new_person">
        <footer class="blockquote-footer">Postulante N.- 2</footer>
      </blockquote>
      <div class="row no-gutters d-none new_person mt-2">
        <div class="col-6 pr-2">
          <div class="form-group">
            <input type="text" class="form-control" name="student_two_name" placeholder="Nombre y Apellidos *">
          </div>
        </div>
        <div class="col-6 pl-2">
          <div class="form-group">
            <input type="text" class="form-control" name="student_two_dni" placeholder="DNI *">
          </div>
        </div>
        <div class="col-6 pr-2">
          <div class="form-group">
            <input type="text" class="form-control" name="student_two_grado" placeholder="Grado al que postula *">
          </div>
        </div>
        <div class="col-6 pl-2">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="student_two_nivel">Nivel</label>
            </div>
            <select class="custom-select" id="student_two_nivel">
              <option selected>Selecciona ...</option>
              <option value="Inicial">Inicial</option>
              <option value="Primaria">Primaria</option>
              <option value="Secundaria">Secundaria</option>
            </select>
          </div>
        </div>
        <div class="col-12">
          <div class="form-group">
            <input type="text" class="form-control" name="student_two_procedencia" placeholder="Colegio de procedencia">
          </div>
        </div>
        <div class="col-6 pr-2">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="student_two_repitio_anio">¿Repitio año?</label>
            </div>
            <select class="custom-select" id="student_two_repitio_anio">
              <option selected>Selecciona ...</option>
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
          </div>
        </div>
        <div class="col-6 pl-2">
          <div class="form-group">
            <input type="text" class="form-control" name="student_two_repitio_anio_cual" placeholder="¿Qué grado?">
          </div>
        </div>
        <div class="col-6 pr-2">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="student_two_discapacidad">¿Discapacidad?</label>
            </div>
            <select class="custom-select" id="student_two_discapacidad">
              <option selected>Selecciona ...</option>
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
          </div>
        </div>
        <div class="col-6 pl-2">
          <div class="form-group">
            <input type="text" class="form-control" name="student_two_discapacidad_cual" placeholder="¿De qué tipo?">
          </div>
        </div>
      </div>
      <div class="row no-gutters new_person two_new_postulant d-none">
        <div class="col-12 text-right">
          <a href="#" class="btn" id="add_two">Agregar Postulante</a>
        </div>
      </div>
      <div class="row no-gutters two_remove_postulant d-none">
        <div class="col-12 text-right">
          <a href="#" class="btn" id="remove_two">Quitar Postulante</a>
        </div>
      </div>
      <blockquote class="blockquote d-none two_person">
        <footer class="blockquote-footer">Postulante N.- 3</footer>
      </blockquote>
      <div class="row no-gutters d-none two_person mt-2">
        <div class="col-6 pr-2">
          <div class="form-group">
            <input type="text" class="form-control" name="student_three_name" placeholder="Nombre y Apellidos *">
          </div>
        </div>
        <div class="col-6 pl-2">
          <div class="form-group">
            <input type="text" class="form-control" name="student_three_dni" placeholder="DNI *">
          </div>
        </div>
        <div class="col-6 pr-2">
          <div class="form-group">
            <input type="text" class="form-control" name="student_three_grado" placeholder="Grado al que postula *">
          </div>
        </div>
        <div class="col-6 pl-2">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="student_three_nivel">Nivel</label>
            </div>
            <select class="custom-select" id="student_three_nivel">
              <option selected>Selecciona ...</option>
              <option value="Inicial">Inicial</option>
              <option value="Primaria">Primaria</option>
              <option value="Secundaria">Secundaria</option>
            </select>
          </div>
        </div>
        <div class="col-12">
          <div class="form-group">
            <input type="text" class="form-control" name="student_three_procedencia" placeholder="Colegio de procedencia">
          </div>
        </div>
        <div class="col-6 pr-2">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="student_three_repitio_anio">¿Repitio año?</label>
            </div>
            <select class="custom-select" id="student_three_repitio_anio">
              <option selected>Selecciona ...</option>
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
          </div>
        </div>
        <div class="col-6 pl-2">
          <div class="form-group">
            <input type="text" class="form-control" name="student_three_repitio_anio_cual" placeholder="¿Qué grado?">
          </div>
        </div>
        <div class="col-6 pr-2">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="student_three_discapacidad">¿Discapacidad?</label>
            </div>
            <select class="custom-select" id="student_three_discapacidad">
              <option selected>Selecciona ...</option>
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
          </div>
        </div>
        <div class="col-6 pl-2">
          <div class="form-group">
            <input type="text" class="form-control" name="student_three_discapacidad_cual" placeholder="¿De qué tipo?">
          </div>
        </div>
      </div>
      <blockquote class="blockquote">
        <p class="mb-0">Información adicional</p>
        <footer class="blockquote-footer">Interesado en el colegio.</footer>
      </blockquote>
      <div class="row no-gutters">
        <div class="col-12">
          <div class="form-group">
            <input type="text" class="form-control" name="student_adicional_colegio" placeholder="¿Cómo se enteró del colegio?">
          </div>
        </div>
        <div class="col-12">
          <div class="form-group">
            <input type="text" class="form-control" name="student_adicional_recomendado" placeholder="Viene recomendado por">
          </div>
        </div>
        <div class="col-12">
          <div class="form-group">
            <input type="text" class="form-control" name="student_adicional_espera" placeholder="¿Qué espera encontrar de diferente para la educación de su hijo(a)?">
          </div>
        </div>
        <div class="col-12 text-center">
          <p>¿Su hijo(a) toca algun instrumento?</p>
        </div>
        <div class="col-6 pr-2">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="student_adicional_instromento">Instrumento</label>
            </div>
            <select class="custom-select" id="student_adicional_instromento">
              <option selected>Selecciona ...</option>
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
          </div>
        </div>
        <div class="col-6 pl-2">
          <div class="form-group">
            <input type="text" class="form-control" name="student_adicional_instromento_cual" placeholder="¿Cuál(es)?">
          </div>
        </div>
      </div>
      <p class="fields_required">Todos los campos marcados con * son obligatorios.</p>
      <div class="text-center">
        <button type="submit" class="btn"><?php echo $atts['btn-submit'] ?></button>
      </div>
    </form>
    <script>
      var url_redirect =  '<?php echo $atts['redirect']; ?>';
      var data_url     =  '<?php echo admin_url('admin-ajax.php'); ?>';
      var data_nonce   =  '<?php echo wp_create_nonce(date("Ymd")); ?>'
    </script>
    <?php
  }
}