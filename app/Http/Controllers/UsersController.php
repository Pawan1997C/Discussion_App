<?php

namespace Discussion\Http\Controllers;

class UsersController extends Controller
{
    public function notifications()
    {
        auth()->user()->unreadNotifications->markAsRead();

        return view('users.notifications', ['notifications' => auth()->user()->notifications()->paginate(5)]);

    }
}
