
@extends('layouts.app')
@section('content')

<form>
  <div class="form-group">
    <label for="shopname">Shop name</label>
    <input type="text" class="form-control" id="shopname" aria-describedby="shopname" placeholder="Shop name" value ="{{old('name')}}">
  </div>
  <div class="form-group">
    <label for="capacity">Capacity</label>
    <input type="capacity" class="form-control" id="capacity" placeholder="capacity"  value ="{{old('capacity')}}">
  </div> 
  <button type="button" onClick="create()" class="btn btn-primary"> Submit </button>
</form>
 
<script>
      function create() {       
          
        name = document.getElementById('shopname').value;
        capacity = document.getElementById('capacity').value;
        axios.defaults.headers.common = {
          "Content-Type": "application/json",
          'Authorization': 'Bearer '+ localStorage.getItem("token"), 
          'Accept': 'application/json'   
        };
        axios.post('/api/shops/',
          { name:name,
            capacity:capacity,
            withCredentials: true})

        .then(function (response) {            

            if(response.errors) {
                console.error(response.errors)
            }
         // console.log(response);         
        })
        .catch(function (response) {
            //handle error            
            console.log(response);
        });           
    }         

</script>
@endsection

