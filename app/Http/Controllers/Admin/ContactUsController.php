<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Components\Services\ContactusService;
use App\Http\Requests\PagesStoreRequest;
use App\Models\ContactUsQuery;



class ContactUsController extends Controller
{
    private $contactusService;
    public function __construct(ContactusService $contactusService)
    {
        $this->contactusService = $contactusService;
    }
    public function index()
    {

        return view('admin.contactus.index',
            [
                'data' => $this->contactusService->getAll(),
            ]);
    }
    public function create()
    {
       
    }
    public function store(contactusService $request)
    {
        
    }

    public function edit($id)
    {
        
    }

    public function update(PagesUpdateRequest $request, $id)
    {
       
    }

    public function delete($id)
    {
        $this->contactusService->delete($id);
        return redirect()->route('admin.contactus.index')->with('flash_message_success','Query deleted successfully');
    }

}
