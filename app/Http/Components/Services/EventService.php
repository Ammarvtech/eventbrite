<?php

namespace App\Http\Components\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\Event;

class EventService
{
    public function getAll()
    {

        return Event::latest()->get();
    }
    public function getOne($id)
    {
        return Event::find($id);
    }
    public function create($request)
    {

        $event = new Event();
        $event->vendor = $request->vendor;
        $event->date = $request->date;
        $event->time = $request->time;
        $event->duration = $request->duration;
        $event->location = $request->location;
        $event->event_category_id = $request->event_category;
        $event->deals = $request->deals;
        $event->shipping = $request->shipping ;
        $event->save();
    }
    public function update($request, $id)
    {
        $event = Event::find($id);
        $event->vendor = $request->vendor;
        $event->date = $request->date;
        $event->time = $request->time;
        $event->duration = $request->duration;
        $event->location = $request->location;
        $event->event_category_id = $request->event_category;
        $event->deals = $request->deals;
        $event->shipping = $request->shipping ;
        $event->save();
        $event->save();
    }
    public function delete($id)
    {
        $event = Event::find($id);
        $event->delete();
    }
}