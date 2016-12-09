<?php

namespace App\Http\Controllers;

use App\User;
use App\Question;
use App\Answer;
use Illuminate\Http\Request;

class SignupController extends Controller {
  //Do Signup Action
  public function doSignUp(Request $request){
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
    $user = new User;
    $user->email = $email;
    $user->first_name = $firstname;
    $user->last_name = $lastname;
    $user->password = $password;
    $user->save();
    
    $a1 = new Answer;

  }

  //Get Questions From Questions Table
  public static function makeSignupPage(Request $request){
    //Get Questions From Database
    $qs = Question::all();
    $result = '';
    foreach($qs as $q){
      $result .= '<option value="'.$q->id.'">'.$q->question.'</option>';
    }

    //Return The View
    return view('signupPage')->with('question_options', $result);
  }
}
