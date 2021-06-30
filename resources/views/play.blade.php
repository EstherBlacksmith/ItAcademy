@extends('layout')
@section('content')

<div class="row">
{{ cookie('token') }}
{{$token}}
    <div class="col col-3">   
        <div class="" role="button" onclick="shakeDices()">
        
            <img src="{{asset('images/rolling-dices.png')}}"  alt="Dice" width="300" height="300">
        </div>
        <br>
    <div>
    <div class="coll col-3">
        <div id="result" class="rounded-pill" style="background-color:grey;">Result: <div>
<div>

<style>
img:hover {
  animation: shake 0.5s;
  animation-iteration-count: infinite;
}

@keyframes shake {
  0% { transform: translate(1px, 1px) rotate(0deg); }
  10% { transform: translate(-1px, -2px) rotate(-1deg); }
  20% { transform: translate(-3px, 0px) rotate(1deg); }
  30% { transform: translate(3px, 2px) rotate(0deg); }
  40% { transform: translate(1px, -1px) rotate(1deg); }
  50% { transform: translate(-1px, 2px) rotate(-1deg); }
  60% { transform: translate(-3px, 1px) rotate(0deg); }
  70% { transform: translate(3px, 1px) rotate(-1deg); }
  80% { transform: translate(-1px, -1px) rotate(1deg); }
  90% { transform: translate(1px, 2px) rotate(0deg); }
  100% { transform: translate(1px, -2px) rotate(-1deg); }
}
</style>

<script>
    function shakeDices(){    
     
        axios.defaults.headers.common = {
            'Content-Type': 'application/json', 
            'Authorization': 'Bearer '+ localStorage.getItem("token"), 
            'Accept': 'application/json',
            'withCredentials': true,
            'Access-Control-Allow-Origin': '*'
        }; 
        
        axios.get('setResult', {    
        })
        .then(function (response) {
            document.getElementById("result").innerHTML = "Result: " +  response.data;
            if(response.data == 7){
                document.getElementById("result").style.backgroundColor = "green";
            }else{
                document.getElementById("result").style.backgroundColor = "red";
            }
      
            console.log(response);
        })
        .catch(function (error) {
            console.log(error);    
        
  });

    }
</script>
@endsection

