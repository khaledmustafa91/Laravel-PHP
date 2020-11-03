@extends('layouts.layout.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2> <b> Pizzas </b></h2>
            </div>
            @foreach($pizzas as $pizza)
                <div class=" col-lg-3">
                    <div class="pizzaContent">
                        <div class="text-center">
                        <img class="pizzaImage " src="img/pizza.png" alt="">
                        </div>
                        <h3 class="pizzaName"> <b> {{$pizza->name}} </b> </h3>

                        <ul class="ingredient">
                        @foreach(json_decode($pizza->ingredients) as $ing)
                            <li> {{$ing}} </li>
{{--                            <li>Two </li>--}}
{{--                            <li>Three </li>--}}
                        @endforeach
                        </ul>
                        <div class="row">
                            <div class="col-lg-6">
                                <h4> <b>{{$pizza->price}} $</b></h4>
                            </div>
                                <div class="col-lg-6">

                                    <form action="" id="order" method="post">
                                        <a class="btn btn-primary" href="#" role="button" onclick="order({{$pizza->id}})">Order Now</a>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
            @endforeach
                <div class="alert alert-success alertMessage" role="alert">
                    Order has completed successfully
                </div>
                <div class="alert alert-danger DangerMessage" role="alert">
                    Error you must log in first
                </div>
        </div>

    </div>

@endsection
