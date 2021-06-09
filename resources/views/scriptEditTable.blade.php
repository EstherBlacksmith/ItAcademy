

<script type="text/javascript">

/* 
* Modificamos los ejercicios mediante una tabla editable y llamada ajax
*/

function getCellValue(element, id, tipo) {
    var elementValue = element.getElementsByTagName('input')[0].value;

    jQuery.ajax({
      url: "{{ route('updateShop')}} ",     
      method: 'post',
      data: {
         "_token": $("meta[name='csrf-token']").attr("content"),
         elemento: tipo,
         valor: elementValue,
         id: id
      },
      success: function(result){

        element.getElementsByTagName('span')[0].value = elementValue ;
   
      }});

  }

  $(document).ready(function(){
      
    $('#shopsEdition').Tabledit({
      type:'get',

      editButton: false,
      deleteButton: false,
      hideIdentifier: true,
      columns: {
        identifier: [0, 'id'],
        editable: [[1, 'name'], [2, 'capacity']]
      }
  });

});
  
</script>