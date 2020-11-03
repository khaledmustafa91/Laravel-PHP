@extends('layouts.layout.app')

@section('content')

<div class="container">
    <div class="imgDiv col-lg-12 col-md-6 col-sm-12 text-center">
        <img class="img" src="img/pizza-house.png" alt="">
    </div>
    <div>
        <h3 class="welcomeText text-center"> Welcome to our restaurants  Pizza House</h3>
    </div>
    <div class="text-center">
        <a class="welcomeBtn btn btn-primary" href="/pizzas" role="button">Go to our Pizzas</a>
{{--        <a href="/pizza">Go to our Pizzas</a>--}}
    </div>
</div>
@endsection
