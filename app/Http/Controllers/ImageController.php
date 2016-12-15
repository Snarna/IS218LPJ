<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Response;

class ImageController extends Controller
{
  function getImage($filename)
  {
      $path = storage_path() . '/app/avatars/' . $filename;

      if(!File::exists($path)) abort(404);

      $file = File::get($path);
      $type = File::type($path);

      $response = Response::make($file, 200);
      $response->header("Content-Type", $type);

      return $response;
  }
}
