<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Flyer;
use App\Forms\AddPhotoToFlyer;
use App\Http\Requests\AddFlyerRequest;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
  public function store($zip, $street,AddFlyerRequest $request)
  {
    $flyer = Flyer::locatedAt($zip, $street);
    $photo = $request->file("photos");

    (new AddPhotoToFlyer($flyer, $photo))->save();
  }
  public function destroy($id)
  {
    Photo::findOrFail($id)->delete();
    return back();
  }
}
