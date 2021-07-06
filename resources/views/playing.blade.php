@extends('layout')

@section('content')
<div class="col col-3">
</div>
<div class="col col-6">
<button type="button" onClick="Shake()">Shake!!</button>
</div>
<script>
function Shake(id){
    console.log(localStorage.getItem('token'));
  /*  axios.post('/login/' + id + '/games')
    .then(response => {
        // Obtenemos los datos
    })
    .catch(e => {
        // Capturamos los errores
    })*/
}
</script>
@endsection