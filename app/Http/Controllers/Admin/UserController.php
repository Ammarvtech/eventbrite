<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Components\Services\OrganizationService;
use App\Models\User;
use App\Models\Country;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);

        return view('admin.users.index',
            [
                'data' => $users,
            ]);
    }
    public function create()
    {
        return view('admin.users.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
            'role' => 'required',
        ]);
        $user = User::create($request->all());
        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }
    public function edit(User $user,$id)
    {
        $user = User::find($id);
        $countries = Country::get();
        return view('admin.users.edit', compact('user','countries'));
    }
    public function update(Request $request, User $user,$id)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'role' => 'required',
        ]);
        if(isset($request->password) && $request->password != " "){
                $request->validate([
                'password' => 'required|min:6',
                'confirm_password' => 'required|min:6|max:20|same:password',
                ]);    
                $userData['password'] = bcrypt($request->password);
        }
        $userData['name']  =  $request->name;
        $userData['phone_number']   =  $request->phone;
        $userData['email']      =  $request->email;
        $userData['status']      =  $request->status;
        $userData['org_name']      =  $request->org_name;
        $userData['org_website']      =  $request->org_website;
        $userData['org_mailing_address']      =  $request->org_mailing_address;
        $userData['org_communication_method']      =  $request->org_communication_method;
        $userData['org_timezone']      =  $request->org_timezone;
        $userData['country']      =  $request->country;
        $userData['city']      =  $request->city;
        $userData['postal_code']      =  $request->postal_code;
        $userData['address']      =  $request->address;
        
        User::where('id',$id)->update($userData);
        return redirect()->route('admin.users.index')->with('flash_message_success', 'User updated successfully');
    }
    public function delete(User $user,$id)
    {

        User::where('id',$id)->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }
}
