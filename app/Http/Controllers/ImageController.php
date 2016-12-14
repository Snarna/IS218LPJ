<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;

class ImageController extends Controller
{
  function getImage($filename)
  {
      $path = storage_path() . '/app/avatars/' . $filename;

      if(!File::exists($path)) echo $path;

      $file = File::get($path);
      $type = File::mimeType($path);

      $response = Response::make($file, 200);
      $response->header("Content-Type", $type);

      return $response;
  }
}
