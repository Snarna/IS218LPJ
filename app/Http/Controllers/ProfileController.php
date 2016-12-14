<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function makeProfilePage(){
      $userData = Auth::user();
      $avatarPath = '../avatars/'.$userData['avatar'];

      return view('profile')->with('user', $userData)
                            ->with('avatarPath', $avatarPath);
    }
}
