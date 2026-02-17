<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::with('image')->latest()->paginate(env('PAGE_SIZE'));
        return view('dashboard.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required',
            'title_ar' => 'required',
            'content_en' => 'required',
            'content_ar' => 'required',
            'image' => 'required',

        ]);
        $event=Event::create([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar
            ],
            'content' => [
                'en' => $request->input('content_en'),
                'ar' => $request->input('content_ar')
            ],
            'hours' => $request->hours,
            'date' => $request->date,
            'location' => $request->location,
        ]);
         $path = $request->file('image')
            ->store('uploads/events', 'custom');
        $event->image()->create([
            'path' => $path,

        ]);
        flash()->success('Event created successfully');
        return redirect()->route('dashboard.events.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('dashboard.events.edit', compact('event'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title_en' => 'required',
            'title_ar' => 'required',
            'content_en' => 'required',
            'content_ar' => 'required',
        ]);
        $event->update([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar
            ],
            'content' => [
                'en' => $request->input('content_en'),
                'ar' => $request->input('content_ar')
            ],
            'hours' => $request->hours,
            'date' => $request->date,
            'location' => $request->location,
        ]);
        if ($request->hasFile('image')) {
            File::delete(public_path($event->image->path));
            $path = $request->file('image')
                ->store('uploads/event', 'custom');
            $event->image()->update([
                'path' => $path,

            ]);
        }
        flash()->info('Event updated successfully');
        return redirect()->route('dashboard.events.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        File::delete(public_path($event->image->path));
        $event->image()->delete();
        $event->delete();
        flash()->warning('Event deleted successfully');
        return redirect()->route('dashboard.events.index');
    }
}
