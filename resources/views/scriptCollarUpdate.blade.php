<script type="text/javascript">

/*
* Mofify the shops by editying a table and an ajax call
*/
//get the personal acces token


function updateCollar() {  
  var authorValue = element.getElementsById('author')[0].value;
  var dateValue = element.getElementsById('date')[0].value;
  var nameValue = element.getElementsById('name')[0].value;
  var idValue = element.getElementsById('id')[0].value;

    const data = {
      name: name,
      author: author,
      date :date,
      id: id
    };    

    axios.defaults.headers.common = {
      Authorization: "Bearer " + localStorage.getItem("token"),
    };
    axios.put( "{{ route('updateCollarStore')}} ", data)
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

</script>