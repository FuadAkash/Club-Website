<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $event = Event::all();
        return view('event', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules for image files
            'title' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|string',
            'time' => 'required|string',
            'deadline' => 'required|string',
        ]);

        $event = new Event;
        $event->title = $request->title;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->time = $request->time;
        $event->deadline = $request->deadline;

        $image = $request->file('image');
        Storage::putFile('public/img/', $image);
        $image->$image ="storage/img/".$image->hashName();

        $event->save();

        return redirect()->route('event.store')->with('success', 'Successful!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::find($id);
        return view('event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules for image files
            'title' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|string',
            'time' => 'required|string',
            'deadline' => 'required|string',
        ]);

        $event = Event::find($id);
        $event->title = $request->title;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->time = $request->time;
        $event->deadline = $request->deadline;

        $image = $request->file('image');
        Storage::putFile('public/img/', $image);
        $image->$image ="storage/img/".$image->hashName();

        $event->save();

        return redirect()->route('event.update')->with('success', 'Successful!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::find($id);

        @unlink(public_path($event->image));

        $event->delete();

        return redirect()->route('event.destroy')->with('success', 'Event deleted!');
    }
}
