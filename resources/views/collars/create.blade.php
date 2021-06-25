@extends('layouts.app')
@section('content')


<form>
    <div class="form-group">
      <label for="shopname">Collar name</label>
      <input type="text" class="form-control" id="collarname" aria-describedby="collarname" placeholder="Collar name" value ="{{old('name')}}">
    </div>
    <div class="form-group">
      <label for="author">Author</label>
      <input type="author" class="form-control" id="author" placeholder="author"  value ="{{old('author')}}">
    </div> 
    <div class="form-group">
      <label for="date">Date</label>
      <input type="date" class="form-control" id="date" placeholder="date"  value ="{{old('date')}}">
    </div>  
    <div class="form-group">
        <label for="shop_id">Shop</label>
        <select class="form-control" id="shop_id">
          @foreach($shops as $shop)
            <option  value ="{{$shop->id}}">{{$shop->name}}</option>
          @endforeach        
        </select>
      </div>
    <button type="button" onClick="create()" class="btn btn-primary"> Submit </button>
  </form>
 
<script>
      function create() {
        shop_id = document.getElementById('shop_id').value;
        name = document.getElementById('collarname').value;
        author = document.getElementById('author').value;
        date = document.getElementById('date').value;
       
        axios.defaults.headers.common = {
          "Content-Type": "application/json", 
          'Authorization': 'Bearer '+ localStorage.getItem("token"), 
          'Accept': 'application/json'   
        };
        axios.post('/api/collars/',
          {name:name,
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

