<?php

namespace App\Http\Controllers;
use Image;
use URL;
use App\model\VideoModel;
use Illuminate\Http\Request;

class JsonController extends Controller
{
  function chunkvideo($category,$i)
  {
    $videolists=VideoModel::all();
    $categories=VideoModel::select('id','title','description', 'video_url', 'image_url')->where('category',$category)->get();

     $count = count($categories);
    $chunks = $categories->chunk(10);
     $collapsed=$chunks[$i-1]->toArray();
	 foreach($collapsed as $collapseds){
      $result[]=$collapseds;
    }
    return response()->json([ 'counts' => $count, 'results' => $result ]);
  }
  function chunkaudio($i)
  {
	  $user = AudioModel::select('audio_url')->get();
    $dd=$videolists=AudioModel::all('id');
    $videolists=AudioModel::all('audio_url');
    $categories=array();
    $categories= AudioModel::select('id','title','description','audio_url','image_url')->get();

$chunks = $categories->chunk(10);
$collapsed=$chunks[$i-1]->toArray();
foreach($collapsed as $collapseds){
      $result[]=$collapseds;
    }
$collection=count($categories);
return response()->json([ 'counts' => $collection, 'results' => $result]);

  }
}
