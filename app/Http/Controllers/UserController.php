<?php

namespace App\Http\Controllers;
use Auth;
use Hash;
use Image;
use URL;
use Storage;
use File;
use Illuminate\Contracts\Filesystem\Factory;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\model\AudioModel;
use App\model\VideoModel;
use App\model\UserModel;

class UserController extends Controller
{
   function __construct()
    {
        $this->middleware('auth:admin,admi');
    }
    function index()
    {
      return view('index');
    }

    function showaudio()
    {
    $audiolist=AudioModel::all();
    $data = array();
    $data = array_pluck($audiolist, 'song');
    return view('audio_form')->with('audiolist',$audiolist)->with('data',$data);
    return view('audio_form');
  }
  function doaudio(Request $request)
  {
    $vd=Validator($request->all(),[
      'title' => 'required',
      'description' => 'required',
      //  'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
      // 'song' => 'required',
      // 'song' => 'required|mimes:jpeg,png,jpg,gif,svg,mp3,mp4',
    ]);
    if($vd->fails())
    {
      return redirect()->back()->withErrors($vd)->withInput();
    }
            $image = $request->file('image');
            $filename= $image->getClientOriginalName();
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $image->getClientOriginalName());
            $file = Image::make(sprintf('images/%s', $filename))->resize(100, 100)->save();
            $url = asset('images/'.$filename);

            if($request->hasfile('song'))
             {
            foreach($request->file('song') as $file)
                {
                    $name=$file->getClientOriginalName();
                    $input['songname'] = time().'.'.$file->getClientOriginalExtension();
                    $destinationPath = public_path('/audios');
                    $file->move($destinationPath, $file->getClientOriginalName());
                    $surl = asset('audios/'.$name);
                    $data[] = $name;
                    $song_url[]=$surl;
                  }

             }
    $audiodetails=new AudioModel();
    if(Auth::guard('admin')->user())
    {
    $username = Auth::guard('admin')->user()->name;
  }
    elseif(Auth::guard('admi')->user())
    {
      $username = Auth::guard('admi')->user()->name;
    }
    $audiodetails->title=$request->get('title');
    $audiodetails->description=$request->get('description');
    $audiodetails->song=json_encode($data);
    $audiodetails->song_url=json_encode($song_url);
    $audiodetails->image=$filename;
    $audiodetails->image_url=$url;
    $audiodetails->user=$username;
    if($audiodetails->save())
    {
      return redirect('/home');
    }
}

  function showvideo()
  {
    return view('video_form');
  }
  function dovideo(Request $request)
  {
    $vd=Validator($request->all(),[
      'category' => 'required',
      'title' => 'required',
      'description' => 'required',
      // 'video' => 'required',
      // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    if($vd->fails())
    {
      return redirect()->back()->withErrors($vd)->withInput();
    }
    $image = $request->file('image');
    $filename= $image->getClientOriginalName();
    $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
    $destinationPath = public_path('/images');
    $image->move($destinationPath, $image->getClientOriginalName());
    $file = Image::make(sprintf('images/%s', $filename))->resize(100, 100)->save();
    $image_url = asset('images/'.$filename);

    $video = $request->file('video');
    $filename1= $video->getClientOriginalName();
    $input['videoname'] = time().'.'.$video->getClientOriginalExtension();
    $destinationPath = public_path('/videos');
    $video->move($destinationPath, $video->getClientOriginalName());
    $video_url = asset('videos/'.$filename1);
    if($vd->fails())
    {
      return redirect()->back()->withErrors($vd)->withInput();
    }
    $videodetails=new VideoModel();
    $videodetails->category=$request->get('category');
    if(Auth::guard('admin')->user())
    {
    $username = Auth::guard('admin')->user()->name;
  }
  elseif(Auth::guard('admi')->user())
  {
    $username = Auth::guard('admi')->user()->name;
  }
    $videodetails->title=$request->get('title');
    $videodetails->description=$request->get('description');
    $videodetails->user=$username;
    $videodetails->video=$filename1;
    $videodetails->video_url=$video_url;
    $videodetails->image=$filename;
    $videodetails->image_url=$image_url;

  if($videodetails->save())
  {
    return redirect('/home');
  }
  }

  function viewaudio()
    {
      $audiolist=AudioModel::all();
      $data = array();
      $data = array_pluck($audiolist, 'song');
      return view('audio')->with('audiolist',$audiolist)->with('data',$data);
    }
    function editaudio($id)
    {
      $audiolist=AudioModel::all();
      $editaudio=AudioModel::find($id);
      $data = array();
      $data = array_pluck($audiolist, 'song');
      return view('audio_form')->with('editaudio',$editaudio)->with('audiolist',$audiolist)->with('data',$data);
    }
  function updateaudio(Request $request,$id)
  {
    $vd=Validator($request->all(),[
      'title' => 'required',
      'description' => 'required',
      'song' => 'required|in:mp3,mp4,doc',
       'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
    ]);
    if($request->hasfile('song'))
     {
        foreach($request->file('song') as $file)
        {
            $name=$file->getClientOriginalName();
            $file->move(public_path().'/files/', $name);
            $data1[] = $name;
          }
     }
     if($request->hasfile('imge'))
      {
            $image = $request->file('imge');
            $filename= $image->getClientOriginalName();
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $image->getClientOriginalName());
            $file = Image::make(sprintf('uploads/%s', $filename))->resize(100, 100)->save();
          }
            $audiolist=AudioModel::all();
            $updateaudio=AudioModel::find($id);
            $data= $updateaudio->song;
            $area = json_decode($data, true);
            // if(Auth::guard('admin')->user())
            // {
            //   $username = Auth::guard('admin')->user()->name;
            // }
            // elseif(Auth::guard('admi')->user())
            // {
            //   $username = Auth::guard('admi')->user()->name;
            // }
            // $username = Auth::guard('admin')->user()->name;
            $updateaudio->title=$request->get('title');
            $updateaudio->description=$request->get('description');
            if($request->hasfile('song'))
             {
               $audiolist=AudioModel::all();
               $updateaudio=AudioModel::find($id);
               $area=array();

                 $data= $updateaudio->song;
                 $area = json_decode($data, true);
                 foreach($data1 as $dat)
                 {
              $rew= array_push($area, "$dat");
             $updateaudio->song=json_encode($area);
          }
            }
            if($request->hasfile('imge'))
             {
            $updateaudio->image=$filename;
            }
                if($updateaudio->save())
            {
              return redirect('/home/audio');
            }

  }
  function deleteaudio($id)
  {
    $deleteaudio=AudioModel::find($id);
    $deleteaudio->delete();

    {
      return redirect('home/audio');
    }
  }

  function viewvideo()
  {
    $videolist=VideoModel::all();
    return view('video')->with('videolist',$videolist);
  }
  function editvideo($id)
  {
        $editvideo=VideoModel::find($id);
        return view('video_form')->with('editvideo',$editvideo);
  }
  function updatevideo(Request $request,$id)
  {
    $vd=Validator($request->all(),[
      'category' => 'required',
      'title' => 'required',
      'description' => 'required',
      'video' => 'required',
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
      if($request->hasfile('image'))
      {
    $image = $request->file('image');
    $filename= $image->getClientOriginalName();
    $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
    $destinationPath = public_path('/images');
    $image->move($destinationPath, $image->getClientOriginalName());
    $file = Image::make(sprintf('images/%s', $filename))->resize(100, 100)->save();
  }
    if($request->hasfile('video'))
    {
    $video = $request->file('video');
    $filename1= $video->getClientOriginalName();
    $input['videoname'] = time().'.'.$video->getClientOriginalExtension();

    $destinationPath = public_path('/videos');

    $video->move($destinationPath, $video->getClientOriginalName());
  }
    $updatevideo=VideoModel::find($id);
    $updatevideo->category=$request->get('category');
    $updatevideo->title=$request->get('title');
    $updatevideo->description=$request->get('description');
    if($request->hasfile('video'))
    {
    $updatevideo->video=$filename1;
    }
    if($request->hasfile('image'))
    {
    $updatevideo->image=$filename;
    }
    // $username = Auth::guard('admin')->user()->name;
    // $updatevideo->user=$username;
    if($updatevideo->save())
    {
      return redirect('/home/video');
    }
  }
  function deletevideo($id)
    {
      $deletevideo=VideoModel::find($id);
      $deletevideo->delete();
      {
        return redirect('/home/video');
      }
    }
    function deletesong(Request $request,$id)
    {
      $audiolist=AudioModel::all();
      $updateaudio=AudioModel::find($id);
      $data=array();
      $data= $updateaudio->song;

      $area = json_decode($data, true);
      $data2= $request->id;
      unset($area[$data2]);

     $updateaudio->song=json_encode(array_values($area));
     if($updateaudio->save())
     {
       return redirect('/home/audio');
     }
    }
      function showuser()
      {
        return view('user_form');
      }
      function douser(Request $request)
      {
        $vd=Validator($request->all(),[
          'name'=>'required',
          'email'=>'required',
          'phoneno'=>'required',
          'department'=>'required',
          'username'=>'required',
          'password'=>'required|min:6'
        ]);
        if($vd->fails())
        {
          return redirect()->back()->withErrors($vd)->withInput();
        }
        $userdetails=new UserModel();
        $userdetails->name=$request->get('name');
        $userdetails->email=$request->get('email');
        $userdetails->phoneno=$request->get('phoneno');
        $userdetails->department=$request->get('department');
        $userdetails->username=$request->get('username');
        $userdetails->password= Hash::make($request->get('password'));
        if($userdetails->save())
        {
          return redirect('/home');
        }

      }
      function viewuser()
      {
          $user=UserModel::all();
          return view('user')->with('user',$user);
      }
      function edituser($id)
      {
          $edituser=UserModel::find($id);
          return view('user_form')->with('edituser',$edituser);
      }
      function updateuser(Request $request,$id)
        {
          $vd=Validator($request->all(),[
            'name'=>'required',
            'email'=>'required',
            'phoneno'=>'required',
            'department'=>'required',
            'username'=>'required',
            'password'=>'required|min:6'
          ]);
          if($vd->fails())
          {
            return redirect()->back()->withErrors($vd)->withInput();
          }
          $updatedetails=UserModel::find($id);
          $updatedetails->name=$request->get('name');
          $updatedetails->email=$request->get('email');
          $updatedetails->phoneno=$request->get('phoneno');
          $updatedetails->department=$request->get('department');
          $updatedetails->username=$request->get('username');
          $updatedetails->password= Hash::make($request->get('password'));
          if($updatedetails->save())
          {
            return redirect('/home');
          }
        }
        function deleteuser($id)
        {
          $deleteuser=UserModel::find($id);
          $deleteuser->delete();
          {
            return redirect('/home/user');
          }
        }
}
