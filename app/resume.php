<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class resume extends Model
{
  protected $fillable = ['idresume','firstname','lastname','Identification_no','phone','interested_position','email','ability','address','sex','age','resume_file','Identification_file','status','profilepic','comment','course'];

  protected $primaryKey = 'idresume';
  protected $table = 'resume';


}
