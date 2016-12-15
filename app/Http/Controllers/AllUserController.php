<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AllUserController extends Controller
{
    public function makeAllUserPage(){
      return view('alluser')->with('user', Auth::user())
                            ->with('userTable', $this->getAllUser());
    }

    private function getAllUser(){
      $allUser =  User::all();
      $t = '<table class="table mytransparent">';
      $t .= '<thead class="thead-inverse">';
      $t .= '<tr>';
      $t .= '<th>ID</th>';
      $t .= '<th>First Name</th>';
      $t .= '<th>Last Name</th>';
      $t .= '<th>Email</th>';
      $t .= '<th>Reg Date</th>';
      $t .= '<th>Avatar</th>';
      $t .= '</tr>';
      $t .= '</thead>';
      foreach($allUser as $user){
        $t .= '<tr>';
        $t .= '<td>'.$user['id'].'</td>';
        $t .= '<td>'.$user['first_name'].'</td>';
        $t .= '<td>'.$user['last_name'].'</td>';
        $t .= '<td>'.$user['email'].'</td>';
        $t .= '<td>'.$user['created_at'].'</td>';
        $t .= '<td>'.$user['avatar'].'"</td>';
        $t .= '</tr>';
      }
      $t .= '</table>';
      return $t;
    }
}
