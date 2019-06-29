<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class webboard extends Model
{
  protected $fillable = ['idboard', 'Topics', 'Content','IDUserAccount'];

  protected $primaryKey = 'idboard';
  protected $table = 'webboard';
}
