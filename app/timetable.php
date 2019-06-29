<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class timetable extends Model
{
  protected $fillable = ['id_timetable', 'Start_time', 'End_time', 'Start_date', 'End_date', 'idtutor', 'Idcourse_detail', 'idroom','privatekey'];

  protected $primaryKey = 'id_timetable';
  protected $table = 'timetable';
}
