<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
  protected $fillable = ['idGrade','nameGrade','idtype','Isgroup','Isgroup'];

  protected $primaryKey = 'idGrade';
  protected $table = 'grade';
}
