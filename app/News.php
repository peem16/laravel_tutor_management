<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
  protected $fillable = ['id_news','Topics','Content','idemp','pic','updated_at','created_at'];

  protected $primaryKey = 'id_news';
  protected $table = 'news';
}
