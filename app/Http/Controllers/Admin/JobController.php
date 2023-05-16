<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Components\Services\JobService;

class JobController extends Controller
{
    private $jobService;
    public function __construct(JobService $jobService)
    {
        $this->jobService = $jobService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.jobs.index', [
            'jobs' => $this->jobService->getAll(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.jobs.create');
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
        $this->jobService->create($request);

        return redirect()->route('admin.jobs.index')->with('flash_message_success','Job created successfully');
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
        return view('admin.jobs.edit', [
            'job' => $this->jobService->getOne($id),
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
        $this->jobService->update($request, $id);
        return redirect()->route('admin.jobs.index')->with('flash_message_success','Job updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $this->jobService->delete($id);      
        return redirect()->route('admin.events.index')->with('flash_message_success','Job deleted successfully');
    }
}
