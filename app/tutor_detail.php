<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tutor_detail extends Model
{
  protected $fillable = ['idtutor_detail', 'idcourse', 'idtutor'];

  protected $primaryKey = 'idtutor_detail';
  protected $table = 'tutor_detail';
}
