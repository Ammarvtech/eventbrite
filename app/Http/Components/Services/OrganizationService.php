<?php

namespace App\Http\Components\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\Organization;

class OrganizationService
{
    public function getAll()
    {
        return Organization::latest()->get();
    }
    public function getById($id)
    {
        return Organization::find($id);
    }
    public function create($request)
    {
        $organization = new Organization();
        $organization->user_id = Auth::user()->id;
        $organization->name = $request->name;
        $organization->website = $request->website;
        $organization->email = $request->email;
        $organization->communication_method = $request->communication_method;
        $organization->timezone = $request->timezone;
        $organization->save();
    
    }
    public function update($request, $id)
    {
        $organization = Organization::find($id);
        $organization->name = $request->name;
        $organization->website = $request->website;
        $organization->email = $request->email;
        $organization->communication_method = $request->communication_method;
        $organization->timezone = $request->timezone;
        $organization->save();
    }
    public function delete($id)
    {
        $organization = Organization::find($id);
        $organization->delete();
    }
}