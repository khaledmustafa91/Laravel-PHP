<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PizzaController extends Controller
{
    protected $casts=[
        'ingredients' => 'array'
    ];

    public function index(){
        return view('welcome');
    }
    public function show(){
        $pizzas = Pizza::all();
        return view('pizzas' , ['pizzas' => $pizzas]);
    }
    public function create(){
        error_log(Auth::user()->admin);
        if(Auth::user()->admin == 1)
        {
            return view('create');
        }else{
            return view('adminMessage');
        }
    }
    public function store(){

            $pizza = new Pizza();
            $pizza->name = \request('pizzaName');
            $pizza->price = \request('price');
            //$pizza->ingredients = json_encode(\request('toppings'));
            $pizza->ingredients = json_encode( \request('ingredients') );

            $pizza->save();
            return redirect('/pizzas');

    }
    public function showOne($id){
        //$pizza = Pizza::findOrFail($id);
        error_log(auth()->check());
        if( auth()->check()) {
            $oneOrder = new order();
            $oneOrder->pizzaId = $id;
            $oneOrder->userId = Auth::user()->id;
            $oneOrder->status = -1;
            $oneOrder->save();
            return ;
        }
        return '/login';
    }
}
