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
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Add
                            Review</h1>
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
                            <li class="breadcrumb-item text-muted">Review</li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">Create</li>
                            <!--end::Item-->
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
                    <form action="{{route('admin.reviews.store')}}" method="POST"  enctype="multipart/form-data" id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row">
                         @csrf
                       
                        <!--begin::Main column-->
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
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                     <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="required form-label">Tournaments</label>
                                        <!--end::Label-->
                                        <!--begin::Select-->
                                        <select class="form-control" name="tournament_id">
                                            <option value="">Select Tournament</option>
                                            @foreach ($tournaments as $tournament)
                                                <option value="{{$tournament->id}}">{{ $tournament->title }}</option>
                                            @endforeach    
                                        </select>
                                        
                                        <!--end::Select-->
                                        
                                    </div>
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="required form-label">Users</label>
                                        <!--end::Label-->
                                        <!--begin::Select-->
                                        <select class="form-control" name="user_id">
                                            <option value="">Select User</option>
                                            @foreach ($users as $user)
                                                <option value="{{$user->id}}">{{ $user->name }}</option>
                                            @endforeach    
                                        </select>
                                        
                                        <!--end::Select-->
                                        
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label">Rating</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="number" name="rating" class="form-control mb-2"
                                            placeholder="Ratingat" value="" />
                                        <!--end::Input-->
                                        
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                     <!--begin::Input group-->
                                    <div>
                                        <!--begin::Label-->
                                        <label class="form-label">Comment</label>
                                        <!--end::Label-->
                                        <!--begin::Editor-->
                                        <div id="kt_ecommerce_add_category_description"
                                            name="kt_ecommerce_add_category_description" class="min-h-200px mb-2">
                                                 <textarea class="form-control" name="comment" id="editor"></textarea>
                                            </div>
                                        <!--end::Editor-->
                                        
                                    </div>
                                    <!--end::Input group-->
                                    
                                    <!--end::Input group-->
                                </div>
                                <!--end::Card header-->
                            </div>
                            <!--end::General options-->
                           
                          
                            <div class="d-flex justify-content-end">
                                <!--begin::Button-->
                                <a href="../../demo1/dist/apps/ecommerce/catalog/products.html"
                                    id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Cancel</a>
                                <!--end::Button-->
                                <!--begin::Button-->
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
