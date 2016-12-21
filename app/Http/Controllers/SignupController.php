<?php

namespace App\Http\Controllers;

use App\User;
use App\Question;
use App\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class SignupController extends Controller {
  //Do Signup Action
  public function doSignUp(Request $request){
    //Validate User Input
    $va = $this->validateInput($request);

    //No Error Msg
    if(count($va) == 0){
      //Get Infomation From Request
      $email = $request->input('email');
      $password = $request->input('password');
      $firstname = $request->input('firstname');
      $lastname = $request->input('lastname');
      $sq1 = $request->input('sq1');
      $sa1= $request->input('sa1');
      $sq2 = $request->input('sq2');
      $sa2 = $request->input('sa2');

      //Create New User Account
      $user = new User;
      $user->email = $email;
      $user->first_name = $firstname;
      $user->last_name = $lastname;
      $user->password = Hash::make($password);
      $user->save();

      $a1 = new Answer;
      $a1->user_id = $user->id;
      $a1->question_id = $sq1;
      $a1->user_answer = $sa1;
      $a1->save();

      $a2 = new Answer;
      $a2->user_id = $user->id;
      $a2->question_id = $sq2;
      $a2->user_answer = $sa2;
      $a2->save();

      return response()->json([
        'status' => 1
      ]);
    }
    else{
      //Response Error
      return response()->json([
        'status' => 0,
        'err' => json_encode($va)
      ]);
    }
  }

  //Get Questions From Questions Table
  public function makeSignupPage(Request $request){
    //Get Questions From Database
    $qs = Question::all();
    $result = '';
    foreach($qs as $q){
      $result .= '<option value="'.$q->id.'">'.$q->question.'</option>';
    }

    //Return The View
    return view('signupPage')->with('question_options', $result);
  }

  public function makeSignupSuccessPage(){
    return view('signupSuccess');
  }

  private function validateInput(Request $request){
    //Validation Rule
    $validator = Validator::make($request->all(), [
                  'email' => 'required|email',
                  'password' => 'required|max:30|min:6',
                  'firstname' => 'required',
                  'lastname' => 'required',
                  'sa1' => 'required',
                  'sa2' => 'required'
                ]);
    //Validation Failed
    if($validator->fails()){
      return $validator->errors();
    }
    else{
      return array();
    }
  }
}
