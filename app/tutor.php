<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tutor extends Model
{
  protected $fillable = ['idtutor', 'firstname', 'lastname', 'sex', 'age', 'Email', 'phone', 'address'];

  protected $primaryKey = 'idtutor';
  protected $table = 'tutor';
}
