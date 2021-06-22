@extends('layouts.app')
@section('content')

<form>
  <div class="form-group">
    <label for="shopname">Shop name</label>
    <input type="text" class="form-control" id="shopname" aria-describedby="shopname" placeholder="Shop name" value ="{{$shop->name}}">
  </div>
  <div class="form-group">
    <label for="capacity">Capacity</label>
    <input type="capacity" class="form-control" id="capacity" placeholder="capacity"  value ="{{$shop->capacity}}">
  </div> 
  <input type="hidden" id="id" value="{{$shop->id}}"</input>
  <button type="button" onClick="update()" class="btn btn-primary"> Submit </button>
</form>

<script>
          function update() {
            
            id = document.getElementById('id').value;
            name = document.getElementById('shopname').value;
            capacity = document.getElementById('capacity').value;
            
            axios.defaults.headers.common = {
                Authorization: "Bearer " + localStorage.getItem("token")
            };
            
            axios({
                method: 'put',
                url: '/api/shops/' + id,
                id:id,
                name:name,
                capacity:capacity                            
            })
            .then(function (response) {
                this.$emit('add', response.data.shop);
            })
            .catch(function (response) {
                //handle error
                console.log(response);
            });           
        }
       
</script>
@endsection