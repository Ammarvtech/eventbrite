@extends('admin.layouts.app')
@section('content')
    @include('admin.partials.header')
    @include('admin.partials.sidebar')

    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Manage Site Settings
                           </h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Dashboard</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">Site Settings</li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                         
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                 
                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <form action="{{route('admin.settings.store')}}" method="POST"  enctype="multipart/form-data" id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row">
                         @csrf
                       
                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                            <!--begin::General options-->
                            <div class="card card-flush py-4">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>General</h2>
                                    </div>
                                </div>
                                <div class="row"> 
                                <div class="col-md-6" style="margin-left:30px"> 
                                 @if(count($errors) > 0)
                                        <div class="alert alert-danger">
                                          <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                          <ul>
                                             @foreach ($errors->all() as $error)
                                               <li>{{ $error }}</li>
                                             @endforeach
                                          </ul>
                                        </div>
                                    @endif
                                </div>
                                </div>
                                <div class="card-body pt-0">
         
                                    <div class="fv-row">
            
                                        <label class="required form-label">Tournament Fee</label>
                                        <input type="text" name="tournament_fee" class="form-control mb-2"
                                            placeholder="Tournament Fee" value="@if(isset($tournament_fee->value)) {{$tournament_fee->value}} @endif" />
                                        
                                    </div>
                                    <div class="fv-row">
            
                                        <label class="required form-label">Social Yelp Link</label>
                                        <input type="text" name="social_yelp" class="form-control mb-2"
                                            placeholder="Social Yelp" value="@if(isset($social_yelp->value)) {{$social_yelp->value}} @endif" />
                                        
                                    </div>
                                    <div class="fv-row">
            
                                        <label class="required form-label">Social Google Store Link</label>
                                        <input type="text" name="social_google_store" class="form-control mb-2"
                                            placeholder="Social Google Store Link" value="@if(isset($social_google_store->value)) {{$social_google_store->value}} @endif" />
                                        
                                    </div>
                                    <div class="fv-row">
            
                                        <label class="required form-label">Social Instagram</label>
                                        <input type="text" name="social_instagram" class="form-control mb-2"
                                            placeholder="Social Instagram" value="@if(isset($social_instagram->value)) {{$social_instagram->value}} @endif" />
                                        
                                    </div>
                                    <div class="fv-row">
            
                                        <label class="required form-label">Social Facebook</label>
                                        <input type="text" name="social_facebook" class="form-control mb-2"
                                            placeholder="Social Facebook" value="@if(isset($social_facebook->value)) {{$social_facebook->value}} @endif" />
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                              
                                <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                                    <span class="indicator-label">Save Changes</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Button-->
                            </div>
                        </div>
                        <!--end::Main column-->
                    </form>
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
