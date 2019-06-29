<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $fillable = ['idroom','number','amount','description','typeroom'];

    protected $primaryKey = 'idroom';
    protected $table = 'room';



}
