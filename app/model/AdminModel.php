<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class AdminModel extends Authenticatable
{
  use Notifiable;
  protected $connection='mysql';
  protected $table='tbluser';
  protected $primarykey='id';
  public $timestamps=true;

}
