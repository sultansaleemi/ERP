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

$(document).ready(function () {
  $(window).keydown(function (event) {
    if (event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});

// Dynamic Items Dropmenu for Riders
$(document).ready(function(){
  var counter = 1;

//   function itemAlert(select) {
//   // $(".itemsDropMenu").find(this).on('change', function() {
//   // $(".itemsDropMenu").siblings("select").change(function() {
//     var selectValue = $(select).val();
//     // var selectValue = $('.selectvalue'+counter+'[name="items[]"]').val();
//     alert("onchnage = "+selectValue+" = value = "+counter);
//     if (selectValue != 0) {
//       $('#notification'+counter).html("");
//     }
//   // });
// }
  $("#addrowItems").click(function(){
    // counter = $(this).data("id");
    var selectValue = $('.selectvalue'+counter+'[name="items[]"]').val();
    // alert(selectValue);
    // if (selectValue == 0) {
    //   $('#notification'+counter).html("Please select an option");
    //   return false;
    // }
    counter++;
    var row='<tr class="bg-light1" id="'+counter+'">'+
    '<td class="col-sm-4">'+
    '<select name="items['+counter+'][id]" class="form-control form-control-sm select2 selectvalue'+counter+'" id="item_id">'+
      '<option id="op'+counter+'" value="0">Select Item</option>'+
    '</select>'+
    '<span id="notification'+counter+'" style="font-size: 13px;color:red">'+
    '</td>'+
    '<td>'+
    '<input type="number" class="form-control form-control-sm" step="any" name="items['+counter+'][price]" id="item_price" />'+
    '</td>'+
    '<td>'+
    '<input type="button" value="Remove" class="rmv btn btn-lg btn-dark btn-sm btn-block">'+
    '</td>'+
    '</tr>';
    $("#tbl tbody").append(row);

    $(document).ready(function () {
      $.ajax({
          url: "/itmeslist",
          datatype: "JSON",
          type: "Get",
          success: function (data) {
              // debugger;
              // console.log(data);
              $("#op"+counter).after(data);
          }
      });
  });

  });

  $("body").on("click",".rmv",function(){
    $(this).closest("tr").remove();
  });
});


