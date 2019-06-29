<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class buy_list extends Model
{


  protected $fillable = ['idbuy','datetime','buy_price', 'img', 'status', 'Idcourse_detail', 'idUserAccount', 'idTesting','date_pay','date_start','date_end','time_start','time_end','keyinput'];

  protected $primaryKey = 'idbuy';
  protected $table = 'buy_list';


}
