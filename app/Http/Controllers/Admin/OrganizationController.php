<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Components\Services\OrganizationService;

class OrganizationController extends Controller
{
    private $organizationService;
    public function __construct(OrganizationService $organizationService)
    {
        $this->organizationService = $organizationService;
    }
    public function index()
    {

        return view('admin.organization.index',
            [
                'data' => $this->organizationService->getAll(),
            ]);
    }
}
