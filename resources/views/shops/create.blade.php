@include('layouts.app')

<h3>Shops</h3>
<div class="col col-6">
    <form action="{{ route('storeShop')}}" method="post">
    @csrf
        <div class="form-group">
            <label for="name">Shop name</label>
            <input type="text" class="form-control" id="name" aria-describedby="name" name="name"
                value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="capacity">Collar capacity</label>
            <input type="text" class="form-control" id="capacity" name="capacity"
                value="{{ old('capacity') }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
