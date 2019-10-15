"use strict";
var data_nonce = window.data_nonce;
var data_url = window.data_url;
var url_redirect = window.url_redirect;

jQuery(document).ready(function($) {
  $("#add_one").click(function(e) {
    e.preventDefault();
    $('.new_person').removeClass('d-none');
    $('.one_postulant').addClass('d-none');
    $('.remove_postulant').removeClass('d-none');
  });
  
  $("#remove_one").click(function(e) {
    e.preventDefault();
    $('.new_person').addClass('d-none');
    $('.remove_postulant').addClass('d-none');
    $('.one_postulant').removeClass('d-none');
  });

  $("#add_two").click(function(e) {
    e.preventDefault();
    $('.two_person').removeClass('d-none');
    $('.two_new_postulant').addClass('d-none');
    $('.two_remove_postulant').removeClass('d-none');
  });

  $("#remove_two").click(function(e) {
    e.preventDefault();
    $('.two_person').addClass('d-none');
    $('.two_remove_postulant').addClass('d-none');
    $('.two_new_postulant').removeClass('d-none');
  });

  $.validator.addMethod(
    "laxEmail",
    function(value, element) {
      return this.optional(element) || /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(value);
    }, 'Ingrese un correo valido.'
  );

  $('#form-pre-register').validate({
    errorClass: 'is-invalid',
    validClass: 'is-valid',
    errorElement: 'em',
    debug: false,
    rules: {
      parent_name: {
        required: true,
        minlength: 4,
        maxlength: 80
      },
      parent_dni: {
        required: true,
        minlength: 4,
        maxlength: 80,
        number: true,
      },
      parent_celphone: {
        required: true,
        minlength: 4,
        maxlength: 80,
        number: true,
      },
      parent_phone: {
        required: true,
        minlength: 4,
        maxlength: 80,
        number: true,
      },
      parent_email: {
        required: {
          depends:function() {
            $(this).val($.trim($(this).val()));
            return true;
          }
        },
        laxEmail: true
      },
      parent_address: {
        required: true,
        minlength: 5,
        maxlength: 100
      },
      student_one_name: {
        required: true,
        minlength: 5,
        maxlength: 100
      },
      student_one_dni: {
        required: true,
        minlength: 5,
        maxlength: 100,
        number: true,
      },
      student_one_grado: {
        required: true,
        minlength: 1,
        maxlength: 5,
        number: true,
      },
      student_one_nivel: {
        required: true,
      },
      student_one_repitio_anio: {
        required: true
      },
    },
    messages: {
      parent_name: {
        required: '',
        minlength: '',
        maxlength: '',
      },
      parent_dni: {
        required: '',
        minlength: '',
        maxlength: '',
        number: '',
      },
      parent_celphone: {
        required: '',
        minlength: '',
        maxlength: '',
        number: '',
      },
      parent_phone: {
        required: '',
        minlength: '',
        maxlength: '',
        number: '',
      },
      parent_email: {
        required: '',
        minlength: '',
        maxlength: '',
      },
      parent_address: {
        required: '',
        minlength: '',
        maxlength: '',
      },
      student_one_name: {
        required: '',
        minlength: '',
        maxlength: '',
      },
      student_one_dni: {
        required: '',
        minlength: '',
        maxlength: '',
        number: '',
      },
      student_one_grado: {
        required: '',
        minlength: '',
        maxlength: '',
        number: '',
      },
      student_one_nivel: {
        required: '',
      },
      student_one_repitio_anio: {
        required: '',
      },
      student_one_discapacidad: {
        required: '',
      },
    },
    submitHandler: function() {
      $('#form-pre-register').waitMe({
        effect: 'rotation',
        text: 'Procesando ...',
        bg: 'rgba(250, 250, 250, 0.75)',
        color:'#ffc107',
      });
      let parent_name = $("input[name='parent_name']");
      let parent_email = $("input[name='parent_email']");
      let parent_celphone = $("input[name='parent_celphone']");
      let parent_phone = $("input[name='parent_phone']");
      let parent_dni = $("input[name='parent_dni']");
      let parent_address = $("input[name='parent_address']");
      let student_one_name = $("input[name='student_one_name']");
      let student_one_dni = $("input[name='student_one_dni']");
      let student_one_grado = $("input[name='student_one_grado']");
      let student_one_nivel = $("select[name='student_one_nivel']");
      let student_one_procedencia = $("input[name='student_one_procedencia']");
      let student_one_repitio_anio = $("input[name='student_one_repitio_anio']");
      let student_one_repitio_anio_cual = $("input[name='student_one_repitio_anio_cual']");
      let student_one_discapacidad = $("select[name='student_one_discapacidad']");
      let student_one_discapacidad_cual = $("input[name='student_one_discapacidad_cual']");
      let student_two_name = $("input[name='student_two_name']");
      let student_two_dni = $("input[name='student_two_dni']");
      let student_two_grado = $("input[name='student_two_grado']");
      let student_two_nivel = $("select[name='student_two_nivel']");
      let student_two_procedencia = $("input[name='student_two_procedencia']");
      let student_two_repitio_anio = $("input[name='student_two_repitio_anio']");
      let student_two_repitio_anio_cual = $("input[name='student_two_repitio_anio_cual']");
      let student_two_discapacidad = $("select[name='student_two_discapacidad']");
      let student_two_discapacidad_cual = $("input[name='student_two_discapacidad_cual']");
      let student_three_name = $("input[name='student_three_name']");
      let student_three_dni = $("input[name='student_three_dni']");
      let student_three_grado = $("input[name='student_three_grado']");
      let student_three_nivel = $("select[name='student_three_nivel']");
      let student_three_procedencia = $("input[name='student_three_procedencia']");
      let student_three_repitio_anio = $("input[name='student_three_repitio_anio']");
      let student_three_repitio_anio_cual = $("input[name='student_three_repitio_anio_cual']");
      let student_three_discapacidad = $("select[name='student_three_discapacidad']");
      let student_three_discapacidad_cual = $("input[name='student_three_discapacidad_cual']");
      let student_adicional_colegio = $("input[name='student_adicional_colegio']");
      let student_adicional_recomendado = $("input[name='student_adicional_recomendado']");
      let student_adicional_espera = $("input[name='student_adicional_espera']");
      let student_adicional_instromento = $("select[name='student_adicional_instromento']");
      let student_adicional_instromento_cual = $("select[name='student_adicional_instromento_cual']");

      var fd = new FormData();
      fd.append('action',     "formPreRegistration");
      fd.append('nonceT',     data_nonce);
      fd.append('parent_name',    parent_name.val());
      fd.append('parent_email',    parent_email.val());
      fd.append('parent_celphone',    parent_celphone.val());
      fd.append('parent_phone',    parent_phone.val());
      fd.append('parent_dni',    parent_dni.val());
      fd.append('parent_address',    parent_address.val());
      fd.append('student_one_name',    student_one_name.val());
      fd.append('student_one_dni',    student_one_dni.val());
      fd.append('student_one_grado',    student_one_grado.val());
      fd.append('student_one_nivel',    student_one_nivel.val());
      fd.append('student_one_procedencia',    student_one_procedencia.val());
      fd.append('student_one_repitio_anio',    student_one_repitio_anio.val());
      fd.append('student_one_repitio_anio_cual',    student_one_repitio_anio_cual.val());
      fd.append('student_one_discapacidad',    student_one_discapacidad.val());
      fd.append('student_one_discapacidad_cual',    student_one_discapacidad_cual.val());
      fd.append('student_two_name',    student_two_name.val());
      fd.append('student_two_dni',    student_two_dni.val());
      fd.append('student_two_grado',    student_two_grado.val());
      fd.append('student_two_nivel',    student_two_nivel.val());
      fd.append('student_two_procedencia',    student_two_procedencia.val());
      fd.append('student_two_repitio_anio',    student_two_repitio_anio.val());
      fd.append('student_two_repitio_anio_cual',    student_two_repitio_anio_cual.val());
      fd.append('student_two_discapacidad',    student_two_discapacidad.val());
      fd.append('student_two_discapacidad_cual',    student_two_discapacidad_cual.val());
      fd.append('student_three_name',    student_three_name.val());
      fd.append('student_three_dni',    student_three_dni.val());
      fd.append('student_three_grado',    student_three_grado.val());
      fd.append('student_three_nivel',    student_three_nivel.val());
      fd.append('student_three_procedencia',    student_three_procedencia.val());
      fd.append('student_three_repitio_anio',    student_three_repitio_anio.val());
      fd.append('student_three_repitio_anio_cual',    student_three_repitio_anio_cual.val());
      fd.append('student_three_discapacidad',    student_three_discapacidad.val());
      fd.append('student_three_discapacidad_cual',    student_three_discapacidad_cual.val());
      fd.append('student_adicional_colegio',    student_adicional_colegio.val());
      fd.append('student_adicional_recomendado',    student_adicional_recomendado.val());
      fd.append('student_adicional_espera',    student_adicional_espera.val());
      fd.append('student_adicional_instromento',    student_adicional_instromento.val());
      fd.append('student_adicional_instromento_cual',    student_adicional_instromento_cual.val());

      $.ajax({
        type: 'POST',
        url: data_url,
        data: fd,
        contentType: false,
        processData: false,
        success:function(r) {
          console.log('data1: ', r);
          if (r.state == true) {
            $('#form-pre-register').waitMe({
              effect: 'rotation',
              text: 'Estaremos comunicandonos con usted pronto ...',
              bg: 'rgba(250, 250, 250, 0.75)',
              color:'#88b53d',
            });
            setTimeout(function() {
              window.location = url_redirect;
            }, 2000);
          } else {
            $('#form-pre-register').waitMe({
              effect: 'rotation',
              text: 'Se produjo un error ...',
              bg: 'rgba(250, 250, 250, 0.75)',
              color:'#dc3545',
            });
            setTimeout(function() {
              $('#form-pre-register').waitMe('hide');
            }, 2000);
          }
        },
        error: function() {}
      });
    },
  });
});