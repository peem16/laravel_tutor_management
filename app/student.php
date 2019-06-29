<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
  protected $fillable = ['idstudent','firstname','lastname','sex','age','Email','phone','address'];

  protected $primaryKey = 'idstudent';
  protected $table = 'student';
}
