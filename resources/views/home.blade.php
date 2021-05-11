@extends('layouts.head')
@include('layouts.body')

<div class="page-container">

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-4 ">
                        <div class="card-body">                       

                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <div class="d-flex justify-content-center">
                                    
                                    <div class="carousel-inner">
                                                               
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="{{asset('image/pinturas_con_gato_05.jpg')}}" alt="Third slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="{{asset('image/pinturas_con_gato_11.jpg')}}" alt="Third slide">
                                        </div>
                                    
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="{{asset('image/pinturas_con_gato_15.jpg')}}" alt="Third slide">
                                        </div>
                                     
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="{{asset('image/pinturas_con_gato_18.jpg')}}" alt="Third slide">
                                        </div>
                                       
                                    </div>

                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true" style="color: olive"></span>
                                        <span class="sr-only">Previo</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true" style="color: olive"></span>
                                        <span class="sr-only">Siguiente</span>
                                    </a>
                                </div>

                                <blockquote class="blockquote mb-0">
                                    <footer class="blockquote-footer text-light">
                                        <cite title="Source Title">El Arte de Fat Cat</cite>
                                    </footer>
                                </blockquote>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.scripts')
