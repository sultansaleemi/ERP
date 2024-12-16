$(document).ready(function () {
  $('.select2').select2({
    dropdownParent: $('#modalTopbody')
  });

  $('#checkall').on('change', function () {
    var checked = $(this).is(':checked'); // Checkbox state
    // Select all
    if (checked) {
      $('input:checkbox').each(function () {
        $(this).prop('checked', true);
      });
    } else {
      // Deselect All
      $('input:checkbox').each(function () {
        $(this).prop('checked', false);
      });
    }
  });

  /*   var inquiry_country = $('#inquiry_country').val();
  var base_url = $('#base_url').val();

  if (inquiry_country) {
    getServices(inquiry_country);
  } */
});

$("select[name='country']").on('change', function () {
  var country = $(this).val();
  var base_url = $('#base_url').val();

  if (country) {
    getCities(country);
    getParent(country);
    getServices(country);
    getProvince(country);
  }
});

$("select[id='province']").on('change', function () {
  var country = $('#country').val();
  var province = $(this).val();
  var base_url = $('#base_url').val();

  if (province) {
    getCities(country, province);
  }
});

$("select[name='inquiry_country']").on('change', function () {
  var country = $(this).val();
  var base_url = $('#base_url').val();

  if (country) {
    getServices(country);
  }
});

$("select[id='inquiry_country']").on('change', function () {
  var country = $(this).val();
  var base_url = $('#base_url').val();

  if (country) {
    getServices(country);
  }
});
function getCities(country, province = null) {
  var base_url = $('#base_url').val();

  if ($('select[id="cities"]').length != 0) {
    block();
    $.ajax({
      url: base_url + '/getcity?c=' + country,
      success: function (data) {
        $('select[id="cities"]').empty();
        $.each(data, function (key, value) {
          $('select[id="cities"]').append('<option value="' + value + '">' + value + '</option>');
        });
        unblock();
      }
    });
  } else {
    $('select[id="cities"]').empty();
  }
  if ($('#citycheckbox').length != 0) {
    block();
    $.ajax({
      url: base_url + '/getcityprovince?c=' + country + '&p=' + province,
      success: function (data) {
        var selectedCities = [];

        // Iterate through each checked checkbox under #citycheckbox
        $('#citycheckbox input[type="checkbox"]:checked').each(function () {
          selectedCities.push($(this).val());
        });

        $('#citycheckbox').empty();
        $('#checkall').prop('checked', false);

        var currentProvince = null;

        $.each(data, function (key, value) {
          var isChecked = selectedCities.includes(key);

          if (currentProvince !== value) {
            currentProvince = value;
            $('#citycheckbox').append('<div class="col-12 mt-2"><h5>' + currentProvince + '</h5></div>');
          }
          $('#citycheckbox').append(
            '<div class="col-md-3"><label><input type="checkbox" name="cities[]" value="' +
              key +
              '" class="form-check-input" ' +
              (isChecked ? 'checked' : '') +
              '> ' +
              key +
              '</label></div>'
          );
        });
        unblock();
      }
    });
  } else {
    $('#citycheckbox').empty();
  }
}

function getParent(country) {
  var base_url = $('#base_url').val();

  if ($('select[id="parent"]').length != 0) {
    block();
    $.ajax({
      url: base_url + '/getparent/' + country,
      success: function (data) {
        $('select[id="parent"]').empty();
        $('select[id="parent"]').append('<option value="0">Select</option>');
        $.each(data, function (key, value) {
          $('select[id="parent"]').append('<option value="' + value + '">' + value + '</option>');
        });
        unblock();
      }
    });
  } else {
    $('select[id="parent"]').empty();
  }
}

function getProvince(country) {
  var base_url = $('#base_url').val();

  if ($('select[id="province"]').length != 0) {
    block();
    $.ajax({
      url: base_url + '/getprovince/' + country,
      success: function (data) {
        $('select[id="province"]').empty();
        $('select[id="province"]').append('<option value="0">Select</option>');
        $.each(data, function (key, value) {
          $('select[id="province"]').append('<option value="' + value + '">' + value + '</option>');
        });
        unblock();
      }
    });
  } else {
    $('select[id="province"]').empty();
  }
}

function getServices(country) {
  var base_url = $('#base_url').val();

  if ($('select[id="service_id"]').length != 0) {
    block();
    $.ajax({
      url: base_url + '/getservice/' + country,
      success: function (data) {
        $('select[id="service_id"]').empty();
        $('select[id="service_id"]').append(data);
        /*  $.each(data, function (key, value) {
          $('select[id="service_id"]').append('<option value="' + value + '">' + value + '</option>');
        }); */
        unblock();
      }
    });
  } else {
    $('select[id="service_id"]').empty();
  }
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

$('#show_hide_password a').on('click', function (event) {
  event.preventDefault();
  if ($('#show_hide_password input').attr('type') == 'text') {
    $('#show_hide_password input').attr('type', 'password');
    $('#show_hide_password i').addClass('ti-eye-off');
    $('#show_hide_password i').removeClass('ti-eye');
  } else if ($('#show_hide_password input').attr('type') == 'password') {
    $('#show_hide_password input').attr('type', 'text');
    $('#show_hide_password i').removeClass('ti-eye-off');
    $('#show_hide_password i').addClass('ti-eye');
  }
});

$('#show_hide_confirm_password a').on('click', function (event) {
  event.preventDefault();
  if ($('#show_hide_confirm_password input').attr('type') == 'text') {
    $('#show_hide_confirm_password input').attr('type', 'password');
    $('#show_hide_confirm_password i').addClass('ti-eye-off');
    $('#show_hide_confirm_password i').removeClass('ti-eye');
  } else if ($('#show_hide_confirm_password input').attr('type') == 'password') {
    $('#show_hide_confirm_password input').attr('type', 'text');
    $('#show_hide_confirm_password i').removeClass('ti-eye-off');
    $('#show_hide_confirm_password i').addClass('ti-eye');
  }
});

function selectCC(pk) {
  var specific_val = $(pk).val();
  $("#mobileCode option[data-countryCode='" + specific_val + "']").prop('selected', true);
}
