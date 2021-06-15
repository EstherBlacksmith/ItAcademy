

<script type="text/javascript">

/*
* Mofify the shops by editying a table and an ajax call
*/
//get the personal acces token


function getCellValue(element, id, tipo) {
    var elementValue = element.getElementsByTagName('input')[0].value;
/*
    $.ajax({
       url: "{{ route('StoreUpdateShop')}} ",
       
       headers: {'Authorization': localStorage.getItem('token') },
       method: 'post',
       data: {
        "_token": $("meta[name='csrf-token']").attr("content"),
          elemento: tipo,
          valor: elementValue,
          id: id
       },
       success: function(data){           
            element.getElementsByTagName('span')[0].value = elementValue ;
       }
       
    });*/

    const data = {
        elemento: tipo,
        valor: elementValue,
        id: id

    };    

    axios.defaults.headers.common = {
      Authorization: "Bearer " + localStorage.getItem("token"),
    };

    axios.put( "{{ route('StoreUpdateShop')}} ", data)
            .then(response => {
                console.log(response.data);
            })
            .catch (response => {
                // List errors on response...
            });
    }  

  $(document).ready(function(){
      var x = $('#shopsEdition');
    x.Tabledit({
      type:'get',

      editButton: false,
      deleteButton: false,
      hideIdentifier: false,
      columns: {
        identifier: [0, 'id'],
        editable: [[1, 'name'], [2, 'capacity']]
      }
  });

});

</script>