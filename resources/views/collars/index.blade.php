@include('layouts.app')

<h3>Collars</h3>
<div class="col col-6">
    <table class="table table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Author</th>
                <th scope="col">Shop</th>
                <th scope="col">Date</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>

            </tr>
        </thead>
        <tbody>
            @foreach($collars as $collar)
                <tr>
                    <th scope="row">{{ $collar->name }}</th>
                    <td>{{ $collar->author }}</td>
                    <td>{{ $collar->shops->name}}</td>
                   
                    <td>{{ $collar->date}}</td>
                    <td><a href="{{ route('updateCollar',$collar->id) }}"> <img
                                src="{{ asset('gamer-icons/swiss-army-knife.png') }}" width="30"
                                height="30"></img></a></td>
                    <td><a href="{{ route('deleteCollar',$collar) }}"><img
                                src="{{ asset('gamer-icons/broom.png') }}" width="30"
                                height="30"></img></a></td>
                </tr>
            @endforeach

        </tbody>
    </table>

</div>
