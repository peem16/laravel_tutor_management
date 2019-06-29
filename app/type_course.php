<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type_course extends Model
{
    //

    protected $fillable = ['idtype', 'nametype'];

    protected $primaryKey = 'idtype';
    protected $table = 'type_course';




}
