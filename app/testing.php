<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class testing extends Model
{
  protected $fillable = ['idTesting','datetime','comment','idtutor','idpay_reserve','ask1','ask2','ask3','ask4','ask5','Total','score'];

  protected $primaryKey = 'idTesting';
  protected $table = 'testing';
}
