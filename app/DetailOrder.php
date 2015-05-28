<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model {
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['order_id','user_id','food_id','amount'];

  /**
   * DetailOrder belongs to Order
   *
   * @return BelongsTo
   */
  public function order(){
    return $this->belongsTo('App\Order');
  }

  /**
   * DetailOrder belongs to Food
   *
   * @return BelongsTo
   */
  public function food(){
    return $this->belongsTo('App\Food');
  }

  /**
   * DetailOrder belongs to User
   *
   * @return BelongsTo
   */
  public function user(){
    return $this->belongsTo('App\User');
  }

}
