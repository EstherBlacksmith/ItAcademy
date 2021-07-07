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

</script>
@endsection