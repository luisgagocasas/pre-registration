"use strict";
var data_nonce = window.data_nonce;
var data_url = window.data_url;
var url_redirect = window.url_redirect;

jQuery(document).ready(function($) {
  $("#add_one").click(function(e) {
    e.preventDefault();
    $('.new_person').removeClass('d-none');
  });

  $("#remove_one").click(function(e) {
    e.preventDefault();
    $('.new_person').addClass('d-none');
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
      console.log('form validate');
      // $('#form_payment').waitMe({
      //   effect: 'rotation',
      //   text: 'Procesando pago...',
      //   bg: 'rgba(250, 250, 250, 0.75)',
      //   color:'#88b53d',
      // });
    },
  });

  // let situaciones = $("input[name='situaciones']").val();
  // let capital = $("input[name='capital']").val();
  // let intereses = $("input[name='intereses']").val();
  // let recibos = $("input[name='recibos']").val();
  // let faltapagar = $("input[name='faltapagar']").val();
  // let name_user = $("input[name='name_user']").val();
  // let email_user = $("input[name='email_user']").val();
  // let phone_user = $("input[name='phone_user']").val();

  // var fd = new FormData();
  // fd.append('action', 'formCreditEnd');
  // fd.append('nonceT', data_nonce);
  // fd.append('situaciones', situaciones);
  // fd.append('capital', capital);
  // fd.append('intereses', intereses);
  // fd.append('recibos', recibos);
  // fd.append('faltapagar', faltapagar);
  // fd.append('name_user', name_user);
  // fd.append('email_user', email_user);
  // fd.append('phone_user', phone_user);

  // $.ajax({
  //   type: 'POST',
  //   url: data_url,
  //   data: fd,
  //   contentType: false,
  //   processData: false,
  //   error:function() {},
  //   success:function( r ) {
  //     if (r.state) {
  //       $("#message_return").html("Su información se a enviado correctamente.");
  //       setTimeout(function() {
  //         window.location = url_redirect;
  //       }, 2000);      
  //     } else {
  //       $("#message_return").html("Se presento un error en su solicitud.");
  //     }
  //   },
  // });
});