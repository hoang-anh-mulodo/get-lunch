<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['created_at','updated_at'];

  /**
   * Order has many DetailOrder
   *
   * @return HasMany
   */ 
  public function detail_orders(){
    return $this->hasMany('App\DetailOrder');
  }

}
