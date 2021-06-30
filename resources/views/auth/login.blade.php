@extends('layout')
@section('content')

<div class="col col-3">
  <form method="post" >
  @csrf
    <div class="form-group">
      <label for="Email">Email address</label>
      <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="Password">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
    <input type="hidden" id="route" value="{{route('play')}}">
    
    <button type="button" onClick="login()" class="btn btn-primary">Submit</button>
  </form>
</div>
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<script>
function login(){

  email = document.getElementById("email").value;
  password = document.getElementById("password").value;
  route = document.getElementById("route").value;

  axios.defaults.headers.common = {
      "Content-Type": "application/json", 
      'Accept': 'application/json'               
  }; 

  axios.post('players', {
    email: email,
    password: password
  })
  .then(function (response) {
    window.location = "play";
    console.log(response);
  })
  .catch(function (error) {
    console.log(error);    
   
  });
}
</script>
@endsection