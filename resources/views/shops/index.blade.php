@include('layouts.app')

<h3>Shops</h3>
<div class="col col-6">
    <table class="table table-striped ">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Capacity</th>
                <th scope="col">Update Shop</th>
                <th scope="col">Delete Shop</th>
                <th scope="col"></th>
                <th scope="col">Burn Collars</th>


            </tr>
        </thead>
        <tbody>
            @foreach($shops as $shop)
                <tr>

                    <th scope="row">{{ $shop->name }}</th>
                    <td>{{ $shop->capacity }}</td>                 


                    <td><a href="{{ route('updateShop') }}"> <img
                                src="{{ asset('gamer-icons/swiss-army-knife.png') }}" width="30"
                                height="30"></img></a></td>
                    <td><a href="{{ route('deleteShop',$shop) }}"><img
                                src="{{ asset('gamer-icons/broom.png') }}" width="30"
                                height="30"></img></a>
                    </td>
                    <td>
                    @if(count($shop->collars))
                        <details>
                            <summary>Collars</summary>

                            @foreach($shop->collars as $collar)
                                <p><strong>Name: {{ $collar->name }}</strong> </p><p>Author: {{ $collar->author }}</p>
                            @endforeach
                        </details>
                        @endif
                    </td>
                    <td><a href="{{ route('burnCollars',$shop) }}"><img
                                src="{{ asset('gamer-icons/burning-book.png') }}" width="30"
                                height="30"></img></a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
