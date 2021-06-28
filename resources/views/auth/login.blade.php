<form method="post" action="{{route('login')}}">
@csrf
  <div class="form-group">
    <label for="Email">Email address</label>
    <input type="email" class="form-control" id="Email1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" class="form-control" id="Password" name="password" placeholder="Password">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="Check">
    <label class="form-check-label" for="Check">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>