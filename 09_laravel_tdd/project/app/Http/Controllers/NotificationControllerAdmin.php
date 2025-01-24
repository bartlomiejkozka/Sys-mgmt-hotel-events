<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNotificationRequest;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class NotificationControllerAdmin extends Controller
{
    public function index(): View
    {
        $notifications = Notification::orderBy('created_at', 'desc')->get(); // Sortuj najnowsze na górze
        return view('notifications.index')->with('notifications', $notifications);
    }

    public function create(): View
    {
        return view('notifications.create');
    }

    public function store(StoreNotificationRequest $request): RedirectResponse
    {
        $notification = Notification::create($request->validated());

        return redirect()->route('notifications.index', $notification);
    }

    public function notificationsForUser(){
        $notifications = Notification::get();
        return view('user.notifications', compact('notifications'));
    }

    public function show(Notification $notification): View
    {
        return view('notifications.show')->with('notification', $notification);
    }

    public function destroy(Notification $notification): RedirectResponse
    {
        $notification->delete();

        return redirect()->route('notifications.index');
    }
}
