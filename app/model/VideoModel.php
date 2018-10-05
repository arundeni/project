<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class VideoModel extends Model
{
  protected $connection = 'mysql';
    protected $primarykey = 'id';
    protected $table = 'video';
    public $timestamps = true;
    function child_video()
{
return $this->hasMany('app\Model\VideoModel','id');
}
}
