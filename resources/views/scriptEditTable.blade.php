

<script type="text/javascript">

/*
* Mofify the shops by editying a table and an axios call
*/


function getSample() {
    var config = {
        headers: {
            '_token': $("meta[name='csrf-token']").attr("content")
        }
    };
    window.axios.get('/shops', config)
        .then((response) => {
            console.log(response);
        })
        .catch((e) => {
            console.log(e);
        });
}

/*function postSample(){
    axios.post("{{ route('StoreUpdateShop')}} ", {
        data: {
                name: 'Finn',
                capacity: 'Williams'
            }
        })
        .then((response) => {
        console.log(response);
        }, (error) => {
        console.log(error);
    });
}*/

function getCellValue(element, id, tipo) {
    var elementValue = element.getElementsByTagName('input')[0].value;

    axios.defaults.headers.common = {
        Authorization: "Bearer " + localStorage.getItem("token")
    };
 
/*
    axios.post('/StoreUpdateShop', {
        _method: 'POST',
        name: elementValue,
       })
    
    .then(
       (res) => {
        console.log('Axios:',res);
        console.log('Axios data:',res.data);
    }).catch((err) => { console.log('Axios Error:', err); }
   


    );*/


alert( elementValue);
    jQuery.ajax({
       url: "{{ route('StoreUpdateShop')}} ",
       method: 'post',
       data: {
        "_token": "{{ csrf_token() }}",
          elemento: tipo,
          valor: elementValue,
          id: id
       },
       success: function(result){
            element.getElementsByTagName('span')[0].value = elementValue ;
        }
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
