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
        $dummyNotifications = [
            new Notification([
                'title' => 'New Event Created',
                'body' => 'A new event titled "Tech Conference 2025" has been created. Join us for exciting sessions on the latest technologies!',
            ]),

            new Notification([
                'title' => 'Reservation Confirmed',
                'body' => 'Your reservation for the "Tech Conference 2025" event has been confirmed. We look forward to seeing you there!',
            ]),

            new Notification([
                'title' => 'Event Reminder',
                'body' => 'Reminder: The "Tech Conference 2025" event is tomorrow. Don\'t forget to attend and enjoy the sessions!',
            ]),

            new Notification([
                'title' => 'Event Fully Booked',
                'body' => 'The "Tech Conference 2025" event has reached its maximum number of participants. Unfortunately, you can no longer make a reservation.',
            ]),

            new Notification([
                'title' => 'Event Cancelled',
                'body' => 'We regret to inform you that the "Tech Conference 2025" event has been cancelled due to unforeseen circumstances.',
            ])
        ];

        return view('notifications.index')->with('notifications', Notification::all());
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
