<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Auth;
use Hash;
use App\model\UserModel;
use App\model\AdminModel;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class AdminController extends Controller
{
    use AuthenticatesUsers;

  function showlogin()
  {
    return view('login');
  }
  function dologin(Request $req)
  {
    $vd=Validator($req->all(),[
        'email'=>'required',
        'password'=>'required|min:6'
      ]);
      if($vd->fails())
      {
        return redirect()->back()->withErrors($vd)->withInput();
      }

      $inputs=[
        'email'=>$req->get('email'),
        'password'=>$req->get('password')
      ];

  if(Auth::guard('admi')->attempt($inputs))
  {
  return redirect('/home');
  }
  elseif(Auth::guard('admin')->attempt($inputs))
  {
    return redirect('/home');
  }
      return redirect()->back()->withErrors(['invalid'=>'invalid credentials.'])->withInput();

}
function showadmin()
{
  return view('login');
}
function doadmin(Request $req)
{
  $vd=Validator($req->all(),[
      'email'=>'required',
      'password'=>'required|min:6'
    ]);
    if($vd->fails())
    {
      return redirect()->back()->withErrors($vd)->withInput();
    }

    $inputs=[
      'email'=>$req->get('email'),
      'password'=>$req->get('password')
    ];

if(Auth::guard('admi')->attempt($inputs))
{
return redirect('/home');
}
    return redirect()->back()->withErrors(['invalid'=>'invalid credentials.'])->withInput();

}
function logout()
{
  if(Auth::guard('admin')->check())
  {
      Auth::guard('admin')->logout();
      return redirect('/auth');
  }
  elseif(Auth::guard('admi')->check())
  {
    Auth::guard('admi')->logout();
    return redirect('/auth');
  }

}

}
