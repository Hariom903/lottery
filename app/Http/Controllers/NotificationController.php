<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //
  public function Delete()
{
    Auth::user()->notifications()->delete(); // This deletes all notifications
    return redirect()->back();
}

public function MarkAsRead()
{
    Auth::user()->unreadNotifications->markAsRead(); // Fix: Use -> instead of ()
    return redirect()->back();
}

}
