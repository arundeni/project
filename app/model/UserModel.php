<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable
{
    use Notifiable;
    protected $connection='mysql';
    protected $table='login';
    protected $primarykey='id';
    public $timestamps=true;
    function child_user()
  {
    return $this->hasmany('app\model\UserModel','id');
  }
}
