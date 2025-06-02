<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = collect([
            new Event([
                'name' => 'Music Festival',
                'description' => 'A fun-filled day with live music performances.',
                'location' => 'Central Park',
                'event_date' => '2025-01-25',
                'event_time' => '14:00',
                'max_participants' => 500,
            ]),
            new Event([
                'name' => 'Tech Conference',
                'description' => 'Explore the latest trends in technology.',
                'location' => 'TechHub Conference Center',
                'event_date' => '2025-02-10',
                'event_time' => '09:00',
                'max_participants' => 300,
            ]),
            new Event([
                'name' => 'Art Exhibition',
                'description' => 'Showcasing contemporary art from local artists.',
                'location' => 'Downtown Art Gallery',
                'event_date' => '2025-03-15',
                'event_time' => '11:00',
                'max_participants' => 100,
            ]),
            new Event([
                'name' => 'Charity Run',
                'description' => 'Join us for a 5K run to raise funds for education.',
                'location' => 'City Stadium',
                'event_date' => '2025-04-05',
                'event_time' => '07:00',
                'max_participants' => 200,
            ]),
            new Event([
                'name' => 'Cooking Workshop',
                'description' => 'Learn to cook delicious meals with a professional chef.',
                'location' => 'Culinary Institute',
                'event_date' => '2025-02-20',
                'event_time' => '17:00',
                'max_participants' => 50,
            ]),
            new Event([
                'name' => 'Film Screening',
                'description' => 'Watch an exclusive screening of an award-winning film.',
                'location' => 'Grand Cinema',
                'event_date' => '2025-03-01',
                'event_time' => '19:00',
                'max_participants' => 150,
            ])]);
        return view('adminWelcome')->with('events', Event::all());
    }
}
