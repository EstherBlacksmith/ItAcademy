@include('layouts.app')
@include('scriptCollarUpdate')
<h3>Collars</h3>
<div class="col col-6">
    <form>
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
        <input type="hidden" id="id" value="{{$collar->id}}"/>
        <button type="submit" class="btn btn-primary" onclick="updateCollar()">Submit</button>
    </form>
</div>
<div  role="alert"  id="error"></div>

