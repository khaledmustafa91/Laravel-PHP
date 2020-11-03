@extends('layouts.layout.app')

@section('content')

    <div class="container">
        <div class=" row">
            <div class="col-lg-3 col-sm-1 col-xs-1"></div>
            <div class="CreateContent text-center col-lg-6 col-sm-10">

                <img class="Createimage" src="../img/pizza-piece.png" alt="">
                <form class="CreateForm" action="/pizzas/create" method="post">
                    @csrf
                    <div class="form-group Data">
                        <label id="pizzaName" for="exampleInputEmail1" style="">Pizza Name </label>
                        <input name="pizzaName" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
                    </div>
                    <div class="form-group Data">
                        <label id="price" for="exampleInputPassword1" style="">Price</label>
                        <input name = "price" type="number" class="form-control" id="exampleInputPassword1" placeholder="Enter Price">
                    </div>

                    <div class="checkBoxes">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="exampleCheck1" style="margin-right: 11px;">Extra toppings:</label>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"  name="ingredients[]" value="mushrooms" id="customControlAutosizing">
                            <label class="custom-control-label" for="customControlAutosizing">
                                Mushrooms
                            </label>
                        </div>
                    </div>

                        <div class="form-check form-check-inline">
                            <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"  name="ingredients[]" value="peppers" id="customControlAutosizing1">
                            <label class="custom-control-label" for="customControlAutosizing1">
                                peppers
                            </label>
                            </div>
                        </div>

                        <div class="form-check form-check-inline">
                            <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"  name="ingredients[]" value="garlic" id="customControlAutosizing3">
                            <label class="custom-control-label" for="customControlAutosizing3">
                                garlic
                            </label>
                            </div>
                        </div>

                        <div class="form-check form-check-inline">
                            <div class="custom-control custom-checkbox">

                            <input class="custom-control-input" type="checkbox"  name="ingredients[]" value="olives" id="customControlAutosizing4">
                            <label class="custom-control-label" for="customControlAutosizing4">
                                olives
                            </label>
                            </div>
                        </div>
                    </div>
                    <br>

                    <button type="submit" id="createBtn" class="btn btn-primary">Create</button>


                </form>

            </div>

            <div class="col-lg-3 col-sm-1 col-xs-1"></div>

        </div>
    </div>

@endsection
