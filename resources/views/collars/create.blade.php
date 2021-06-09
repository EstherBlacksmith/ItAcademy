@include('layouts.app')

<h3>Collars</h3>
<div class="col col-6">
    <form action="{{ route('storeCollar')}}" method="post">
    @csrf
        <div class="form-group">
        <label for="shop_id">Shop</label>
        <select name="shop_id">
            @foreach($shops as $shop)
            <option  value="{{ $shop->id }}">{{$shop->name}}</option>
            @endforeach
        </select>
        </div>
        <div class="form-group">
            <label for="name">Collar name</label>
            <input type="text" class="form-control" id="name" aria-describedby="name" name="name"
                value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="author">Collar author</label>
            <input type="text" class="form-control" id="author" name="author"
                value="{{ old('author') }}">
        </div>
        <div class="form-group">
            <label for="date">Arrival date</label>
            <input type="date" class="form-control" id="date" name="date"
                value="{{ old('date') }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


</div>