<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class AudioModel extends Model
{
  protected $connection='mysql';
  protected $primarykey='id';
  protected $table='audio';
  public $timestamps=true;
  function child_audio()
{
return $this->hasMany('app\Model\AudioModel','id');
}
protected $casts = [
       'song_url' => 'array',
   ];
}
