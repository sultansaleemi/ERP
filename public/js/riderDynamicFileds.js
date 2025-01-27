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
    // $(this).data("id");
    var selectValue = $('.selectvalue'+counter+'[name="items[]"]').val();
    // alert(selectValue);
    // if (selectValue == 0) {
    //   $('#notification'+counter).html("Please select an option");
    //   return false;
    // }
    counter++;
    // alert(counter);
    var row='<tr class="bg-light1" id="'+counter+'">'+
    '<td class="col-sm-4">'+
    '<select name="items['+counter+'][id]" class="form-control form-control-sm select2 selectvalue'+counter+' dFields" id="item_id" required>'+
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
