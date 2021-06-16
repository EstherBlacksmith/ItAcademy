

<script type="text/javascript">

/*
* Mofify the shops by editying a table and an ajax call
*/
//get the personal acces token


function getCellValue(element, id, tipo) {
    var elementValue = element.getElementsByTagName('input')[0].value;

    const data = {
        elemento: tipo,
        valor: elementValue,
        id: id
    };    

    axios.defaults.headers.common = {
      Authorization: "Bearer " + localStorage.getItem("token"),
    };

    axios.put( "{{ route('StoreUpdateShop')}} ", data)
      .then(function (response) {
      // handle success
     /* console.log(response.data.messages);
      })*/      
      if( response.data.messages.valor > ""){
        const h4 = document.getElementById("error");
        h4.innerHTML = response.data.messages.valor;
        h4.classList.add("alert-danger");
      }else{
        const h4 = document.getElementById("error");
        h4.innerHTML = response.data.messages;
        h4.classList.add("alert-info");
      }

      })
      .catch(function (response) {
        // handle error
        console.log(response.data);
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