<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{


    protected $fillable = ['idcourse, name'];

    protected $primaryKey = 'idcourse';
    protected $table = 'course';


}
