<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class GuestLoginController extends Controller
{
   
public function guest() {
  $guestUserId = 1; //ゲストユーザーのIDを１とする
  $user = User::find($guestUserId);
  Auth::login($user);
  return redirect()->route('book');
 }
}

