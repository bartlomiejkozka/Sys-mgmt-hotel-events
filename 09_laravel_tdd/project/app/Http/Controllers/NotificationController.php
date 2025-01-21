<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNotificationRequest;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class NotificationController extends Controller
{
    public function index(): View
    {
        return view('notification.index')->with('notifications', Notification::all());
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
