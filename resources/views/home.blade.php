
@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="row">
            <h1 class="display-4">White Collar</h1>
        </div>
        <div class="row">
            <p class="lead">Modern jewelry art</p>
        </div>

        <div class="row justify-content-center">
            <div class="col col-2">
                <div class="card" style="max-width:: 18rem;">
                    <div class="card-body">
                        @if(session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
            <div class="col  col-2">
                <div class="card" style="max-width: 18rem;">

                    <div class="card-body">
                        <h5 class="card-title">La Miauconda</h5>

                    </div>
                </div>
            </div>
            <div class="col  col-2">
                <div class="card" style="max-width: 18rem;">
                   
                    <div class="card-body">
                        <h5 class="card-title">The cat with a pearl</h5>

                    </div>
                </div>
            </div>
            <div class="col  col-2">
                <div class="card" style="max-width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Kiss Kat</h5>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection



