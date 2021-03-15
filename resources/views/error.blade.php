@extends('layout')

@section('content')
    <label for="title">Post Title</label>

    <input id="title" type="text" class=" is-invalid">

    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

@endsection

