@extends('layouts.app')
@section('content')

@foreach($shops as $shop)
    <ul>
    <li>Shop:
    {{$shop->name}}
    </li>
    <li>Capacity:
    {{$shop->capacity}}
    </li>
    <li>
    <a href="{{route('shops.edit',$shop->id)}}">Edit</a>
    </li>
    </ul>
 @endforeach
 @endsection