<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  protected $redirectAfterLogout = '../login';

  public function makeLoginView(){
    return view('loginPage');
  }

  public function doLogin(Request $request){
      //Get Information From Request
      $userData = array(
        'email' => $request->input('email'),
        'password' => $request->input('password')
      );

      if(Auth::attempt($userData)){
        //Success
        return "pass";
      }
      else{
        return "Wrong Username or Password";
      }

  }

  public function doLogout(Request $request){
    $request->session()->flush();
    $request->session()->regenerate();
    return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '../login');
  }
}
