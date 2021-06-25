@include('layouts.app')
@include('scriptEditTable')


<h3>Shops</h3>
<div class="col col-8">
    <table class="table table-striped" id="shopsEdition">
        <thead class="thead-dark">
            <tr>
                <th></th>
                <th scope="col">Name</th>
                <th scope="col">Capacity</th>
                <th scope="col">Delete Shop</th>
                <th scope="col"></th>
                <th scope="col">Burn Collars</th>
            </tr>
        </thead>
        <tbody>
            @foreach($shops as $shop)
                <tr>
                    <td></td>
                    <td onfocusout="getCellValue(this, {{ $shop->id }},'name')" class="tabledit-view-mode"
                        style="cursor: pointer;">
                        <span class="tabledit-span" style="font-weight: bold; ">{{ $shop->name }} </span>
                        <input class="tabledit-input form-control input-sm" type="text" id="name_{{ $shop->id }}"
                            name="name" value="{{ $shop->name }}" style="display: none;" disabled=""></td>

                    <td onfocusout="getCellValue(this, {{ $shop->id }},'capacity')" class="tabledit-view-mode"
                        style="cursor: pointer;">
                        <span class="tabledit-span" style="font-weight: bold; ">{{ $shop->capacity }} </span>
                        <input class="tabledit-input form-control input-sm" type="text" id="capacity_{{ $shop->id }}"
                            name="capacity" value="{{ $shop->capacity }}" style="display: none;" disabled=""></td>


                    <td><a href="{{ route('deleteShop',$shop) }}"><img
                                src="{{ asset('gamer-icons/broom.png') }}" width="30"
                                height="30"/></a>
                    </td>
                    <td>
                        @if(count($shop->collars))
                            <details>
                                <summary>Collars</summary>

                                @foreach($shop->collars as $collar)
                                    <p><strong>Name: {{ $collar->name }}</strong> </p>
                                    <p>Author: {{ $collar->author }}</p>
                                @endforeach
                            </details>
                        @endif
                    </td>
                    <td><a href="{{ route('burnCollars',$shop) }}"><img
                                src="{{ asset('gamer-icons/burning-book.png') }}" width="30"
                                height="30"/></a>
                    </td>
                </tr>
                
            @endforeach
            
            <div  role="alert"  id="error">
            </div>
            <script>
            
            </script>

           
            
        </tbody>
    </table>
</div>