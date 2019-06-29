<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class webboarddetail extends Model
{
  protected $fillable = ['idwebboard_detail', 'who', 'Answer','idboard'];

  protected $primaryKey = 'idwebboard_detail';
  protected $table = 'webboard_detail';
}
