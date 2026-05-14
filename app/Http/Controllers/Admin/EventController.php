<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('event_date', 'desc')->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|max:255',
            'location' => 'required',
            'event_date' => 'required|date',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $file->getClientOriginalName());
            $destinationPath = public_path('event-images');
            
            // Create directory if not exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
            
            $file->move($destinationPath, $filename);
            $imagePath = 'event-images/' . $filename;
        }

        // Create event
        Event::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'featured_image' => $imagePath,
            'location' => $request->location,
            'event_date' => $request->event_date,
            'event_end_date' => $request->event_end_date,
            'registration_link' => $request->registration_link,
            'status' => $request->status ?? 'upcoming',
        ]);

        return redirect()->route('events.index')->with('success', 'Event created successfully!');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

  public function update(Request $request, Event $event)
{
    $request->validate([
        'title' => 'required|max:255',
        'location' => 'required',
        'event_date' => 'required|date',
        'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
    ]);

    $data = [
        'title' => $request->title,
        'slug' => Str::slug($request->title),
        'description' => $request->description,
        'location' => $request->location,
        'event_date' => $request->event_date,
        'event_end_date' => $request->event_end_date,
        'registration_link' => $request->registration_link,
        'status' => $request->status,
    ];

    // Handle image upload for update
    if ($request->hasFile('featured_image')) {
        // Delete old image if exists
        if ($event->featured_image && file_exists(public_path($event->featured_image))) {
            unlink(public_path($event->featured_image));
        }
        
        $file = $request->file('featured_image');
        $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $file->getClientOriginalName());
        $destinationPath = public_path('event-images');
        
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }
        
        $file->move($destinationPath, $filename);
        $data['featured_image'] = 'event-images/' . $filename;
    }

    $event->update($data);

    return redirect()->route('events.index')->with('success', 'Event updated successfully!');
}
    public function destroy(Event $event)
    {
        // Delete image
        if ($event->featured_image && file_exists(public_path($event->featured_image))) {
            unlink(public_path($event->featured_image));
        }
        
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully!');
    }
}