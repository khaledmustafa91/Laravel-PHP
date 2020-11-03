@extends('layouts.layout.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <img src="../../img/pizza-piece.png" alt="">
            </div>
            <div class="text-center col-lg-12 ">
                <h3 class="noOrderText"> <b> You are not allow to add pizzas </b> </h3>
            </div>
            <div class="text-center col-lg-12">
                <a class="welcomeBtn btn btn-primary" href="/pizzas" role="button">Go to our Pizzas</a>
                {{--        <a href="/pizza">Go to our Pizzas</a>--}}
            </div>

        </div>
    </div>


@endsection
