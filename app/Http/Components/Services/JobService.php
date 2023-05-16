<?php

namespace App\Http\Components\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\Job;

class JobService
{
    public function getAll()
    {

        return Job::latest()->get();
    }
    public function getOne($id)
    {
        return Job::find($id);
    }
    public function create($request)
    {

        $job = new Job();
        $job->vendor = $request->vendor;
        $job->date = $request->date;
        $job->hiring = $request->hiring;
        $job->location = $request->location;
        $job->job_description = $request->description;
        $job->save();
    }
    public function update($request, $id)
    {
        $job = Job::find($id);
        $job->vendor = $request->vendor;
        $job->date = $request->date;
        $job->hiring = $request->hiring;
        $job->location = $request->location;
        $job->job_description = $request->description;
        $job->save();
    }
    public function delete($id)
    {
        $job = Job::find($id);
        $job->delete();
    }
}