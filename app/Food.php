<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model {
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['name','isDefault','isShow','price','image','description'];

  /**
   * Food has many DetailOrder
   *
   * @return HasMany
   */
  public function detail_orders(){
    return $this->hasMany('App\DetailOrder');
  }

}
