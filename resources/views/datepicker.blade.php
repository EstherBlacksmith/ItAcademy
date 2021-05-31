


<form action="{{ route('reservasStore')}}" method="POST">
    @csrf
  <label for="birthday">Reserva:</label>
  <input type="date" id="birthday" name="birthday">
  <input type="submit">
</form>
