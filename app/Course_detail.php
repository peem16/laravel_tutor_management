<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course_detail extends Model
{
    //

    protected $fillable = ['Idcourse_detail','idcoures','idGrade', 'amount_courses', 'per_round', 'Time_length', 'price', 'note'];

    protected $primaryKey = 'Idcourse_detail';
    protected $table = 'Course_detail';

}
