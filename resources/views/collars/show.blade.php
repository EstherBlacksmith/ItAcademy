@extends('layouts.app')
@section('content')

@foreach($collars as $collar)
    <ul>
    <li>Collar:
    {{$collar->name}}
    </li>
    <li>Author:
    {{$collar->author}}
    </li>
    <li>Date:
    {{$collar->date}}
    </li>  
    
    <li>
      <a href="{{route('collars.edit',$collar->id)}}">Edit</a>
      <form>
          <input type="hidden" id ="id" value="{{$collar->id}}">
          <button type="button" onClick="update({{$collar->id}})" class="btn btn-primary"> Delete </button>
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

        axios.post('/api/collars/' + id,{_method: 'delete'} )        
        .then(function (response) { 
          console.log(response);         
        })
        .catch(function (response) {
            //handle error
            alert(response);
            console.log(response);
        });           
    }
       
</script>
@endsection