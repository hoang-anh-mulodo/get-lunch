<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;
use App\DetailOrder;
use Illuminate\Http\Request;

class OrdersController extends Controller {

  /**
   * Function run before all others
   *
   * void
   */
  public function __construct(){
    $this->middleware('auth');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  int  $id, Request $request
   * @return Response
   */
  public function store($id,Request $request)
  {
    $orders = Order::whereRaw('date(created_at)= ?', [date('Y-m-d')])->first();
    //Check user inputs empty value or value <= 0 
    if(is_null($request->amount) || $request->amount <=0)
      $request->amount = 1;

    //Check creating record in table Order for today
    if (is_null($orders)) {
      $order_id = Order::create(array('created_at'=>date('Y-m-d H:i:s')))->id;
      $data_detail_order = array(
       'order_id' => $order_id,
       'user_id' => \Auth::user()->id,
       'food_id' => $id,
       'amount' => $request->amount);
      DetailOrder::create($data_detail_order);
      return redirect('/')->with('message',['Order successfully']);
    }else{
      $order_id = $orders->id;
      $data_detail_order = array(
       'order_id' => $order_id,
       'user_id' => \Auth::user()->id,
       'food_id' => $id,
       'amount' => $request->amount);
      DetailOrder::create($data_detail_order);
      return redirect('/')->with('message',['Order successfully']);
    }
  }
}
