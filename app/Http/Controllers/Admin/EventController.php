<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Components\Services\EventService;
use App\Http\Components\Services\EventCategoryService;




class EventController extends Controller
{
    private $eventService;
    private $eventcategoryService;
    public function __construct(EventService $eventService,EventCategoryService $eventcategoryService)
    {
        $this->eventService = $eventService;
        $this->eventcategoryService = $eventcategoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('admin.events.index', [
            'events' => $this->eventService->getAll(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.events.create',['eventcategories' => $this->eventcategoryService->getAll()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
            'vendor' => 'required',
        ], [
            'vendor.required' => 'Vendor is required',
        ]);
        $this->eventService->create($request);

        return redirect()->route('admin.events.index')->with('flash_message_success','Event created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.events.edit', [
            'event' => $this->eventService->getOne($id),
            'eventcategories' => $this->eventcategoryService->getAll(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $request->validate([
            'vendor' => 'required',
        ], [
            'vendor.required' => 'Vendor is required',
        ]);
        $this->eventService->update($request, $id);
         return redirect()->route('admin.events.index')->with('flash_message_success','Event updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $this->eventService->delete($id);      
        return redirect()->route('admin.events.index')->with('flash_message_success','Event deleted successfully');
    }
}
