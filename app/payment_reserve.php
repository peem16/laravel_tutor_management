<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment_reserve extends Model
{
  protected $fillable = ['idpay_reserve','datetime','reserve_price','status','img','idUserAccount','idcoures','random_key'];

  protected $primaryKey = 'idpay_reserve';
  protected $table = 'payment_reserve';
}
