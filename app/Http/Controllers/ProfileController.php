<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Image;
use App\User;

class ProfileController extends Controller
{
    public function makeProfilePage(){
      $userData = Auth::user();
      $avatarPath = '../avatars/'.$userData['avatar'];

      return view('profile')->with('user', $userData)
                            ->with('avatarPath', $avatarPath);
    }

    public function uploadAvatar(Request $request){
      $userData = Auth::user();
      if ($request->hasFile('avatar')) {
        if ($request->file('avatar')->isValid()) {
          $file = $request->file('avatar');

          //Prepare File Name
          $fileName = $this->purifyFileName($file->getClientOriginalName());

          //Define Path
          $path = $this->makeAvatarPath($fileName);

          //Update User Avatar Information
          $updateAvatar = $this->updateAvatarPath($fileName);

          //Save New Avatar File
          if($updateAvatar){
            //Make Image and Save
            $avatar = Image::make($file);
            $avatar->resize(150,150);
            $avatar->save($path);
          }
          else{
            return response()->json([
              'status' => 0,
              'err' => "Cannot Update Path!"
            ]);
          }

          //Success
          return response()->json([
            'status' => 1,
            'path' => '../avatars/' . $fileName
          ]);
        }
      }
    }

    public function changeName(Request $request){
      $userData = Auth::user();
      $newFirstName = $request->input('newFirstName');
      $newLastName = $request->input('newLastName');
      //If isset
      if(isset($newFirstName) && isset($newLastName)){

        //Update User Name Information
        $updateAvatar = $this->updateName($newFirstName, $newLastName);

        //Success
        if($updateAvatar){
          return response()->json([
            'status' => 1
          ]);
        }
        //Failed
        else{
          return response()->json([
            'status' => 0,
            'err' => "Something wrong happend"
          ]);
        }
      }
      else{
        return response()->json([
          'status' => 0,
          'err' => "New First Name & Last Name Cannot Be Empty"
        ]);
      }
    }

    private function purifyFileName($raw){
      $userData = Auth::user();
      $arr = explode("." , $raw);
      $name = $arr[0];
      $ext = $arr[1];
      return $name . time() . $userData['id'] . '.' . $ext;
    }

    private function makeAvatarPath($fileName){
      return storage_path() . '/app/avatars/' . $fileName;
    }

    private function updateAvatarPath($fileName){
      $userData = Auth::user();
      $user = User::find($userData['id']);
      $user->avatar = $fileName;
      $user->save();
      return true;
    }

    private function updateName($f, $l){
      $userData = Auth::user();
      $user = User::find($userData['id']);
      $user->first_name = $f;
      $user->last_name = $l;
      $user->save();
      return true;
    }
}
