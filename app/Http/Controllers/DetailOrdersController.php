<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\DetailOrder;
use App\Order;
use App\User;
use Illuminate\Http\Request;

class DetailOrdersController extends Controller {

  /**
   * Function run before all others
   *
   * void
   */
  public function __construct(){
    $this->middleware('auth',['except'=>'index']);
  }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $order = Order::whereRaw('date(created_at)= ?', [date('Y-m-d')])->first();
    if (!is_null($order)) {
      $detail_orders = DetailOrder::where('order_id','=',$order->id)->get(); 
    }else{
      $detail_orders = null;
    }
    return view('detail_orders.index')->with('detail_orders',$detail_orders);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $detail_orders_id, $user_id
   * @return Response
   */
  public function destroy($detail_orders_id,$user_id)
  {
    if ($user_id == \Auth::user()->id || \Auth::user()->isAdmin == true) {
     DetailOrder::destroy($detail_orders_id);
     return redirect('orders')->with('message',['Remove successfully']);
    }
  }

}
