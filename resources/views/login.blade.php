@extends('layout')

@section('content')

<div class="col col-3">
    <form>
    <div class="form-group">
        <label id="emailTitle" for="email">Email address</label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="email">
    </div>
    <div class="form-group">
        <label id="passwordTitle" for="password">Password</label>
        <input type="password"  name="password" id="password"  class="form-control" id="password">
    </div>  
    <button type="button" class="btn btn-primary" id="loginButton" onclick="login()">Submit</button>
    </form>
    

</div>
<script>

function login(){
    email =  document.getElementById("email").value;
    password = document.getElementById("password").value;    

    axios({
        method: 'post',
        url: 'login',
        data: {
            email: email,
            password:password
        }
    })
    .then(response => {
      // Obtenemos los datos
      console.log(response.data);
      localStorage.setItem("token", response.data.token);
     // document.getElementById("player").value = "Welcome!";
      document.getElementById("email").style.display = 'none'; 
      document.getElementById("password").style.display = 'none';
      document.getElementById("emailTitle").style.display = 'none'; 
      document.getElementById("passwordTitle").style.display = 'none';
      document.getElementById("loginButton").style.display = 'none';

    })
    .catch(e => {      
      console.log(e);
      // Capturamos los errores
    });
}
</script>
@endsection