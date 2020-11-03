@extends('layouts.layout.app')

@section('content')

    <div class="container">
        <div class="row">
        <div class="col-lg-12">
            <h2> <b> Your orders </b> </h2>
        </div>
            <div class="col-lg-12">
                <h2> <b> Pending orders </b> </h2>
            </div>
        @for($i = 0 ; $i < count($pizzas) ; $i++)
                @if( $orders[$i]->status == -1)
                <div class=" col-lg-3">
                    <div class="pizzaContent">
                        <div class="text-center">
                            <img class="pizzaImage " src="../img/pizza.png" alt="">
                        </div>
                        <h3 class="pizzaName"> <b> {{$pizzas[$i]->name}} </b> </h3>

                        <ul class="ingredient">
                            @foreach(json_decode($pizzas[$i]->ingredients) as $ing)
                                <li> {{$ing}} </li>
                                {{--                            <li>Two </li>--}}
                                {{--                            <li>Three </li>--}}
                            @endforeach
                        </ul>

                        <!-- Here in Admin side -->
                        <div style="display:  {{ Auth::user()->admin == 1 ? "block" : "none" }}">
                            <p> <b> Customer Name : </b>  {{$profile[$i]->name}}  </p>
                        </div>
                        <!-- End of Admin side -->

                        <!-- Here in customer side -->
                        <div style="display:  {{ Auth::user()->admin == 0 ? "block" : "none" }}">
                            <b> Status : </b> <span style="color: darkred">   Pending  </span>
                        </div>
                        <!-- End of customer side -->

                        <div class="row">
                            <div class="col-lg-6">
                                <h4> <b>{{$pizzas[$i]->price}} $</b></h4>
                            </div>
                            <div class="col-lg-6">

                                <form style="display: {{Auth::user()->admin == 0 ? "block" : "none"}}" action="" id="order" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-primary" href="#" role="button" onclick="Deleteorder({{$orders[$i]->id}})" style="padding: 7px;">
                                        {{ Auth::user()->admin == 0 ? "delete order" : "Completed"}}
                                    </a>
                                </form>

                                <form style="display: {{Auth::user()->admin == 0 ? "none" : "block"}}" action="" id="order" method="get">
                                    <a class="btn btn-primary" href="#" role="button" onclick="Completeorder({{$orders[$i]->id}})" style="padding: 7px;">
                                        {{ Auth::user()->admin == 0 ? "delete order" : "Shipping"}}
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                @endif
            @endfor

            <div class="col-lg-12">
                <h2> <b> Shipping orders </b> </h2>
            </div>
            @for($i = 0 ; $i < count($pizzas) ; $i++)
                @if( $orders[$i]->status == 0)
                    <div class=" col-lg-3">
                        <div class="pizzaContent">
                            <div class="text-center">
                                <img class="pizzaImage " src="../img/pizza.png" alt="">
                            </div>
                            <h3 class="pizzaName"> <b> {{$pizzas[$i]->name}} </b> </h3>

                            <ul class="ingredient">
                                @foreach(json_decode($pizzas[$i]->ingredients) as $ing)
                                    <li> {{$ing}} </li>
                                    {{--                            <li>Two </li>--}}
                                    {{--                            <li>Three </li>--}}
                                @endforeach
                            </ul>

                            <!-- Here in Admin side -->
                            <div style="display:  {{ Auth::user()->admin == 1 ? "block" : "none" }}">
                                <p> <b> Customer Name : </b>  {{$profile[$i]->name}}  </p>
                            </div>
                            <!-- End of Admin side -->

                            <!-- Here in customer side -->
                            <div style="display:  {{ Auth::user()->admin == 0 ? "block" : "none" }}">
                                <b> Status : </b> <span style="color: #2e4cab">   Shipping  </span>

                            </div>
                            <!-- End of customer side -->

                            <div class="row">
                                <div class="col-lg-6">
                                    <h4> <b>{{$pizzas[$i]->price}} $</b></h4>
                                </div>
                                <div class="col-lg-6">

{{--                                    <form action="" id="order" method="post">--}}
{{--                                        <a class="btn btn-primary" href="#" role="button" onclick="Deleteorder({{$orders[$i]->id}})" style="padding: 7px;">--}}
{{--                                            {{ Auth::user()->admin == 0 ? "delete order" : "Completed"}}--}}
{{--                                        </a>--}}
{{--                                    </form>--}}
                                    <form style="display: {{Auth::user()->admin == 0 ? "none" : "block"}}" action="" id="order" method="get">
                                        <a class="btn btn-primary" href="#" role="button" onclick="Completeorder({{$orders[$i]->id}})" style="padding: 7px;">
                                            {{ Auth::user()->admin == 0 ? "delete order" : "Completed"}}
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                @endif
            @endfor




            <div class="col-lg-12">
                <h2> <b> Delivered orders </b> </h2>
            </div>

            @for($i = 0 ; $i < count($pizzas) ; $i++)
                @if( $orders[$i]->status == 1)
                    <div class=" col-lg-3">
                        <div class="pizzaContent">
                            <div class="text-center">
                                <img class="pizzaImage " src="../img/pizza.png" alt="">
                            </div>
                            <h3 class="pizzaName"> <b> {{$pizzas[$i]->name}} </b> </h3>

                            <ul class="ingredient">
                                @foreach(json_decode($pizzas[$i]->ingredients) as $ing)
                                    <li> {{$ing}} </li>
                                    {{--                            <li>Two </li>--}}
                                    {{--                            <li>Three </li>--}}
                                @endforeach
                            </ul>

                            <!-- Here in Admin side -->
                            <div style="display:  {{ Auth::user()->admin == 1 ? "block" : "none" }}">
                                <p> <b> Customer Name : </b>  {{$profile[$i]->name}}  </p>
                            </div>
                            <!-- End of Admin side -->

                            <!-- Here in customer side -->
                            <div style="display:  {{ Auth::user()->admin == 0 ? "block" : "none" }}">
                                <b> Status : </b> <span style="color: darkgreen">  Delivered  </span>

                            </div>
                            <!-- End of customer side -->

                            <div class="row">
                                <div class="col-lg-6">
                                    <h4> <b>{{$pizzas[$i]->price}} $</b></h4>
                                </div>
                                <div class="col-lg-6">

{{--                                    <form action="" id="order" method="post">--}}
{{--                                        <a class="btn btn-primary" href="#" role="button" onclick="Deleteorder({{$orders[$i]->id}})" style="padding: 7px;">--}}
{{--                                            {{ Auth::user()->admin == 0 ? "delete order" : "Completed"}}--}}
{{--                                        </a>--}}
{{--                                    </form>--}}
                                </div>
                            </div>
                        </div>

                    </div>
                @endif
            @endfor


            <div class="alert alert-success alertMessage" role="alert">
                    {{ Auth::user()->admin == 1 ? "changed the order status successfully reload page after you finish" : "order deleted successfully reload page after you finish" }}
                </div>
                <div class="alert alert-danger DangerMessage" role="alert">
                    {{ Auth::user()->admin == 1 ? "Error of ship that order Contact the technical support" : "Error of delete that order Contact the restaurants service" }}
                </div>
        </div>

    </div>




@endsection
