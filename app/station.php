<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class station extends Model
{
    //

    protected $fillable = ['id_station', 'name_station','latitude','longitude','Singup_distance','IDUserAccount'];

    protected $primaryKey = 'id_station';
    protected $table = 'station';




}
