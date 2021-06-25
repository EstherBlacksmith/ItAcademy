@extends('layouts.app')
@section('content')

<form>
  <div class="form-group">
    <label for="shopname">Collar name</label>
    <input type="text" class="form-control" id="collarname" aria-describedby="collarname" placeholder="Collar name" value ="{{$collar->name}}">
  </div>
  <div class="form-group">
    <label for="author">Author</label>
    <input type="author" class="form-control" id="author" placeholder="author"  value ="{{$collar->author}}">
  </div> 
  <div class="form-group">
    <label for="date">Date</label>
    <input type="date" class="form-control" id="date" placeholder="date"  value ="{{$collar->date}}">
  </div>  
  <div class="form-group">
    <label for="shop_id">Shop</label>
    <select class="form-control" id="shop_id">
      @foreach($shops as $shop)
        @if($collar->shop_id == $shop->id )
          <option value ="{{$shop->id}}" selected >{{$shop->name}}</option>              
        @else
          <option  value ="{{$shop->id}}">{{$shop->name}}</option>
        @endif
      @endforeach        
    </select>
  </div>
  <input type="hidden" id="id" value="{{$collar->id}}">
  <button type="button" onClick="update()" class="btn btn-primary"> Submit </button>
</form>
 
<script>
      function update() {
       
        shop_id = document.getElementById('shop_id').value;
        id = document.getElementById('id').value;
        name = document.getElementById('collarname').value;
        author = document.getElementById('author').value;
        date = document.getElementById('date').value;
       
        axios.defaults.headers.common = {
          "Content-Type": "application/json", 
          'Authorization': 'Bearer '+ localStorage.getItem("token"), 
          'Accept': 'application/json'   
        };
        axios.put('/api/collars/' + id,
          { id:id,
            name:name,
            author:author,
            date:date,
            shop_id:shop_id,
            withCredentials: true})
       
        .then(function (response) { 
          console.log(response);         
        })
        .catch(function (response) {
            //handle error
            console.log(response);
        });           
    }
       
</script>
@endsection

