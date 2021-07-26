<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Notification::all()->where('user_id', '=', auth()->user()->id);
        return response([
            'notifications' => $notifications
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //users can create their own notifications?
        return response('', 422);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        if ($notification->user_id == auth()->user()->id) {

            $query = Notification::with('user')->findOrFail($notification->id);
            return response([
                'notifications' => $query
            ], 200);
        }

        return response([
            'Error' => 'Unauthorized'
        ], 401);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notification $notification)
    {
        $request->validate([
            'status' => 'required|string|in:0,1'
        ]);

        if ($notification->user_id == auth()->user()->id) {

            $notification->update($request->all());
            return response($notification, 200);
        }

        return response([
            'Error' => 'Unauthorized'
        ], 401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        if ($notification->user_id == auth()->user()->id) {
            $notification->delete();
            return response($notification, 200);
        }

        return response([
            'Error' => 'Unauthorized'
        ], 401);
    }
}
