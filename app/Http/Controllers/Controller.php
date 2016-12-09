<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

class SignupController extends BaseController {
  public static function doSignUp(Request $request){

    //Get Infomation From Request
    $email = $request->input('email');
    $password = $request->input('password');
    $firstname = $request->input('firstname');
    $lastname = $request->input('lastname');
    $sq1 = $request->input('sq1');
    $sa1= $request->input('sa1');
    $sq2 = $request->input('sq2');
    $sa2 = $request->input('sa2');
    $reg_date = date('Y-m-d G:i:s');
    $last_login_date = date('Y-m-d G:i:s');

    //Do the Login working on it
  }
}
