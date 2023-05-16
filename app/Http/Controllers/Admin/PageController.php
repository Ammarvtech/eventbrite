<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Components\Services\PageService;

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
                'pages' => $this->pageService->getAll(),
            ]);
    }

}
