@extends('admin.layouts.app')
@section('content')
    @include('admin.partials.header')
    @include('admin.partials.sidebar')
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                         Dashboard</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Dashboards</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Row-->
                <div class="row g-5 g-xl-10 mb-xl-10">
                    <!--begin::Col-->
                    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                        <!--begin::Card widget 4-->
                        <div class="card card-flush h-md-100 mb-5 mb-xl-10">
                            <div class="card-header pt-5">
                                <div class="card-title d-flex gap-12">
                                    <span class="text-gray-400 pt-1 fw-semibold fs-6">Tournaments</span>
                                    <div class="d-flex align-items-center">
                                        {{-- <span class="fs-4 fw-semibold text-gray-400 me-1 align-self-start">$</span> --}}
                                        <span class="fs-2hx text-dark ms-2 lh-1 ls-n2">200</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                        <!--begin::Card widget 4-->
                        <div class="card card-flush h-md-100 mb-5 mb-xl-10">
                            <div class="card-header pt-5">
                                <div class="card-title d-flex gap-12">
                                    <span class="text-gray-400 pt-1 fw-semibold fs-6">Organizers</span>
                                    <div class="d-flex align-items-center">
                                        {{-- <span class="fs-4 fw-semibold text-gray-400 me-1 align-self-start">$</span> --}}
                                        <span class="fs-2hx text-dark ms-2 lh-1 ls-n2">10</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                        <!--begin::Card widget 4-->
                        <div class="card card-flush h-md-100 mb-5 mb-xl-10">
                            <div class="card-header pt-5">
                                <div class="card-title d-flex gap-12">
                                    <span class="text-gray-400 pt-1 fw-semibold fs-6">Players</span>
                                    <div class="d-flex align-items-center">
                                        {{-- <span class="fs-4 fw-semibold text-gray-400 me-1 align-self-start">$</span> --}}
                                        <span class="fs-2hx text-dark ms-2 lh-1 ls-n2">20</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    

       
                    <!--end::Col-->
                </div>
     
    
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
@endsection
