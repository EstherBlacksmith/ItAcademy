@include('layouts.app')

<h3>Collars</h3>
<div class="col col-6">
    <form action="{{ route('updateCollar',$collar)}}" method="post">
    @csrf
        <div class="form-group">
            <label for="name">Collar name</label>
            <input type="text" class="form-control" id="name" aria-describedby="name" name="name"
                value="{{ $collar->name}}">
        </div>
        <div class="form-group">
            <label for="author">Collar author</label>
            <input type="text" class="form-control" id="author" name="author"
                value="{{ $collar->author }}">
        </div>
        <div class="form-group">
            <label for="date">Arrival date</label>
            <input type="date" class="form-control" id="date" name="date"
                value="{{ $collar->date}}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>