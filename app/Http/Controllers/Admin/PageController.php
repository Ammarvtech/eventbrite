<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Components\Services\PageService;
use App\Http\Requests\PagesStoreRequest;
use App\Http\Requests\PagesUpdateRequest;



class PageController extends Controller
{
    private $pageService;
    public function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
    }
    public function index()
    {

        return view('admin.pages.index',
            [
                'data' => $this->pageService->getAll(),
            ]);
    }
    public function create()
    {
        return view('admin.pages.create');
    }
    public function store(PagesStoreRequest $request)
    {
        $this->pageService->create($request);
        return redirect()->route('admin.cms-pages.index')->with('flash_message_success','Page added successfully');
    }

    public function edit($id)
    {
        return view('admin.pages.edit',
            [
                'data' => $this->pageService->getById($id),
            ]);
    }

    public function update(PagesUpdateRequest $request, $id)
    {
        $this->pageService->update($request, $id);
        return redirect()->route('admin.cms-pages.index')->with('flash_message_success','Page updated successfully');
    }

    public function delete($id)
    {
        $this->pageService->delete($id);
        return redirect()->route('admin.cms-pages.index')->with('flash_message_success','Page deleted successfully');
    }

}
