<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\Pizza;
use App\Models\User;
//use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        //error_log(Auth::user()->id);
        $id = Auth::user()->id;
        $profile = array();
        if(Auth::user()->admin == 1){
            $orders = order::all();
        }else {
            $orders = order::where('userId', $id)->get();
        }
//        error_log($profile[0]->name);
        if(count($orders) > 0 ) {
//            $user_id =  $orders[0]->userId;
//            $profile = User::find($user_id);

            $pizzas = array();
            foreach ($orders as $order) {
                $user_id =  $order->userId;
                array_push($profile , User::find($user_id));


                $onePizza = Pizza::findOrFail($order->pizzaId);
//            $PizzaArray = json_encode($onePizza);
//            $pass = json_decode($PizzaArray);
//            //return gettype($pizzas);
//            //return $pizzas;
//            //return $onePizza;
                array_push($pizzas, $onePizza);
            }
            return view('order', ['pizzas' => $pizzas, 'orders' => $orders , 'profile' => $profile]);
        }else
        {
            return view('noOrders');
        }//error_log($pizzas[0]->id);
        //return json_decode($pizzas);
        //return view('order', ['orders'=> orders]);
    }
    public function noOrder(){
        return view('noOrders');
    }
    public function deleteOrder($id){
        $order = order::findOrFail($id);
        if($order->delete()){
            return '';
        }
        return "error";
    }
    public function changeOrderStatus($id){
        $order = order::findOrFail($id);
        if($order->status == -1) {
            $order->status = 0;
        }else{
            $order->status = 1;
        }
        $order->save();
    }
}
