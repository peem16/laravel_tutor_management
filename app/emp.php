<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class emp extends Model
{
  protected $fillable = ['idemp','firstname','lastname','lastname','email','sex','age','phone','address','idposition'];

  protected $primaryKey = 'idemp';
  protected $table = 'employee';
}
