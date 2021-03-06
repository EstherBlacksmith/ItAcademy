@extends('layouts.app')
@section('content')

@foreach($shops as $shop)
    <ul>
    <li>Shop:
    {{$shop->name}}
    </li>
    <li>Capacity:
    {{$shop->capacity}}
    </li>
    <li>{{$shop->id}}</li>
    <li>
    <a href="{{route('shops.edit',$shop->id)}}">Edit</a>
    <form>
        <input type="hidden" id = "id" value="{{$shop->id}}">
        <button type="button" onClick="update({{$shop->id}})" class="btn btn-primary"> Delete </button>
    </form>
    </li>
    </ul>
    
 @endforeach

 
<script>
      function update(id) {
       
        axios.defaults.headers.common = {
          "Content-Type": "application/json", 
          'Authorization': 'Bearer '+ localStorage.getItem("token"), 
          'Accept': 'application/json'   
        };

        axios.post('/api/shops/' + id ,{_method: 'delete'})        
        .then(function (response) { 
          console.log(response);         
           // this.$emit('add', response.data.shop);
        })
        .catch(function (response) {
            //handle error
            alert(response);
            console.log(response);
        });           
    }
       
</script>
@endsection