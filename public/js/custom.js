$('body').on('click', '.show-modal', function () {
  var action = $(this).data('action');
  var title = $(this).data('title');
  var size = $(this).data('size');
  var table = $(this).data('table');

  if (size) {
    $('.modal-dialog').addClass('modal-' + size);
  }

  $('#modalTopbody').load(action, function () {
    unblock();
  });
  if (table) {
    $('#dataTableBuilder').DataTable().ajax.reload(null, false);
  }
  $('#modalTopTitle').text(title);

  $('#modalTop').modal('show');
  block();
});

$('body').on('click', '.show-offcanvas', function () {
  var action = $(this).data('action');
  var title = $(this).data('title');
  $('.offcanvas-body').load(action, function () {
    unblock();
  });
  $('.offcanvas-title').text(title);

  $('#offcanvasBoth').offcanvas('show');
  block();
});

$(document).on('submit', '#formajax', function (e) {
  e.preventDefault();
  block();

  let formID = 'formajax';
  var action = $(this).attr('action');

  var formData = new FormData(this);

  // Dynamic fields ki values ko ek array mein store karein
  var values = [];
  $('.dFields').each(function () {
    values.push($(this).val());
    console.log(values);
  });
  $('#error_message_duplicate_id').html('');
  // Repeat id check karein
  if (values.length !== values.filter((item, index) => values.indexOf(item) === index).length) {
    console.log('Array has duplicates');
    $('#error_message_duplicate_id').html('Array has duplicates');
    return false;
  }

  $.ajax({
    url: action,
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    type: 'POST',
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend: function () {
      $('#' + formID)
        .find('.save_rec')
        .hide();
      $('#' + formID)
        .find('.loader')
        .show();
    },
    success: function (data) {
      unblock();
      if (data.message) {
        toastr.success(data.message);
      } else {
        toastr.success('Action performed successfully.');
      }
      if ($('#reload_page').val() == 1) {
        location.reload();
      }
      if ($('#redirect_url').length != 0) {
        window.location = $('#redirect_url').val();
      }
      $('#modalTop').modal('hide');
      $('#dataTableBuilder').DataTable().ajax.reload(null, false);
    },
    error: function (ajaxcontent) {
      unblock();
      if (ajaxcontent.responseJSON.success == 'false') {
        //toastr.error(ajaxcontent.responseJSON.errors);
        return false;
      }
      vali = ajaxcontent.responseJSON.errors;
      $('#' + formID + ' input').css('border', '1px solid #dfdfdf');
      $('#' + formID + ' input')
        .next('span')
        .remove();

      $.each(vali, function (index, value) {
        $('#' + formID + " input[name~='" + index + "']").css('border', '1px solid red');
        //$('#' + formID + " input[name~='" + index + "']").after('<span style="color:red;">' + value + '</span>');
        $('#' + formID + " select[name~='" + index + "']")
          .parent()
          .find('.select2-container--default .select2-selection--single')
          .css('border', '1px solid red');
        toastr.error(value);
      });

      $('#dataTableBuilder').DataTable().ajax.reload(null, false);
    },
    complete: function () {
      $('#' + formID)
        .find('.save_rec')
        .show();
      $('#' + formID)
        .find('.loader')
        .hide();
    }
  });
});

$(document).on('submit', '#formajax2', function (e) {
  e.preventDefault();
  block();

  let formID = 'formajax2';
  var action = $(this).attr('action');

  var formData = new FormData(this);
  $.ajax({
    url: action,
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    type: 'POST',
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function (data) {
      if ($('#reload_modal').length != 0) {
        $('#modalTopbody').load($('#reload_modal').val(), function () {
          unblock();
        });
      } else {
        $('#modalTopbody').html(data);
        $('#dataTableBuilder').DataTable().ajax.reload(null, false);
      }

      unblock();
      if (data.message) {
        toastr.success(data.message);
      } else {
        toastr.success('Action performed successfully.');
      }
    },
    error: function (ajaxcontent) {
      unblock();
      if (ajaxcontent.responseJSON.success == 'false') {
        toastr.error(ajaxcontent.responseJSON.errors);
        return false;
      }
      vali = ajaxcontent.responseJSON.errors;
      $('#' + formID + ' input').css('border', '1px solid #dfdfdf');
      $('#' + formID + ' input')
        .next('span')
        .remove();

      $.each(vali, function (index, value) {
        $('#' + formID + " input[name~='" + index + "']").css('border', '1px solid red');
        $('#' + formID + " input[name~='" + index + "']").after('<span style="color:red;">' + value + '</span>');
        $('#' + formID + " select[name~='" + index + "']")
          .parent()
          .find('.select2-container--default .select2-selection--single')
          .css('border', '1px solid red');
        toastr.error(value);
      });
    }
  });
});
function alertfunction() {
  alert('Hello alert is working');
}

function block() {
  $('#modalTopbody').block({
    message:
      '<div style="width=100%;margin:0 auto; padding:50px;"><div class="spinner-border text-primary text-center" role="status" ></div></div>',
    css: {
      backgroundColor: 'transparent',
      border: '0'
    },
    overlayCSS: {
      backgroundColor: '#fff',
      opacity: 0.8
    }
  });
}
function unblock() {
  $('#modalTopbody').unblock();
}
/* $('.select2').select2({
  dropdownParent: $('#modalTop')
}); */
$('.select2').select2({
  /* dropdownParent: $('.card ') */
});

$("select[name='country']").on('change', function () {
  var country = $(this).val();
  var base_url = $('#base_url').val();
  if (country) {
    bodyblock();
    $.ajax({
      url: base_url + '/getcity?c=' + country,
      success: function (data) {
        $('select[id="cities"]').empty();
        $.each(data, function (key, value) {
          $('select[id="cities"]').append('<option value="' + value + '">' + value + '</option>');
        });
        bodyunblock();
      }
    });
  } else {
    $('select[id="cities"]').empty();
  }
});

function bodyblock() {
  $('.card').block({
    message:
      '<div style="width=100%;margin:0 auto; padding:50px;"><div class="spinner-border text-primary text-center" role="status" ></div></div>',
    css: {
      backgroundColor: 'transparent',
      border: '0'
    },
    overlayCSS: {
      backgroundColor: '#fff',
      opacity: 0.8
    }
  });
}
function bodyunblock() {
  $('.card').unblock();
}

$('#show_hide_password a').on('click', function (event) {
  event.preventDefault();
  if ($('#show_hide_password input').attr('type') == 'text') {
    $('#show_hide_password input').attr('type', 'password');
    $('#show_hide_password i').addClass('bi-eye-slash-fill');
    $('#show_hide_password i').removeClass('bi-eye');
  } else if ($('#show_hide_password input').attr('type') == 'password') {
    $('#show_hide_password input').attr('type', 'text');
    $('#show_hide_password i').removeClass('bi-eye-slash-fill');
    $('#show_hide_password i').addClass('bi-eye-fill');
  }
});

$('#show_hide_confirm_password a').on('click', function (event) {
  event.preventDefault();
  if ($('#show_hide_confirm_password input').attr('type') == 'text') {
    $('#show_hide_confirm_password input').attr('type', 'password');
    $('#show_hide_confirm_password i').addClass('bi-eye-slash-fill');
    $('#show_hide_confirm_password i').removeClass('bi-eye');
  } else if ($('#show_hide_confirm_password input').attr('type') == 'password') {
    $('#show_hide_confirm_password input').attr('type', 'text');
    $('#show_hide_confirm_password i').removeClass('bi-eye-slash-fill');
    $('#show_hide_confirm_password i').addClass('bi-eye-fill');
  }
});

function selectCC(pk) {
  var specific_val = $(pk).val();
  $("#mobileCode option[data-countryCode='" + specific_val + "']").prop('selected', true);
}

/* $(document).ready(function () {
  $(window).keydown(function (event) {
    if (event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
}); */

$(document).ready(function () {
  // Initialize select2 for the existing select elements
  $('.select2').select2();

  // Add new row by cloning the first row
  $('#add-new-row').click(function () {
    // Clone the first row
    const newRow = $('#rows-container .row:first').clone();

    // Destroy select2 and clean up in the cloned row
    if (newRow.find('.select2').data('select2')) {
      newRow.find('.select2').select2('destroy');
    }
    //newRow.find('.select2').select2('destroy').end();
    newRow
      .find('select')
      .removeAttr('data-select2-id')
      .removeClass('select2-hidden-accessible')
      .next('.select2')
      .remove();

    // Clear input, textarea, and select values in the cloned row
    newRow.find('input, textarea').val(''); // Clear inputs and textareas
    newRow.find('select').val(null).trigger('change'); // Reset the select value and trigger change

    // Append the new row to the container
    $('#rows-container').append(newRow);

    // Reinitialize select2 for the newly added select element
    $('.select2').select2();
  });

  // Remove a row
  $(document).on('click', '.btn-remove-row', function () {
    if ($('#rows-container .row').length > 1) {
      $(this).closest('.row').remove();
    } else {
      alert('At least one row is required.');
    }
  });
});
