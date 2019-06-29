<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class timetabledetail extends Model
{
  protected $fillable = ['Idtimetable_deteil', 'idstudent', 'id_timetable'];

  protected $primaryKey = 'Idtimetable_deteil';
  protected $table = 'timetable_detail';
}
