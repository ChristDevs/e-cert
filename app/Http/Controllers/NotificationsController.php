<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('notifications.layout');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show($notification)
    {
        $notification = auth()->user()->notifications()->where('id', $notification)->first();
        $notification->markAsRead();
        return view('notifications.layout', compact('notification'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy($notification)
    {
        $alert = auth()->user()->notifications()->where('id', $notification)->firstOrFail();
        $alert->delete();
        flash_message('Notification alert was successfully deleted', 'success', 'Notification deleted');

        return redirect()->route('notifications.index');
    }
    /**
     * Mark notifications as read
     *
     * @return RedirectResponse
     **/
    public function markAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();

        return back();
    }
}
