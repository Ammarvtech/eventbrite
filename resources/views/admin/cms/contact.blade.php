@extends('admin.layouts.app')
@section('content')
    @include('admin.partials.header')
    @include('admin.partials.sidebar')

    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
 
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Edit
                            Page</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">    
                            <li class="breadcrumb-item text-muted">
                                <a href="#" class="text-muted text-hover-primary">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">CMS</li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">Contact Us Page</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <form 
                        action="{{route('admin.cms.contactSubmit', $contact->id??null)}}"
                        method="POST"  
                        enctype="multipart/form-data" 
                        id="kt_ecommerce_add_category_form" 
                        class="form d-flex flex-column flex-lg-row">
                         @csrf
                     
                        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2 class="required">Contact Us Image</h2>
                                    </div>
                                </div>
                                <div class="card-body text-center pt-0">
                                   
                                    <style>
                                        .image-input-placeholder {
                                            background-image: url('assets/media/svg/files/blank-image.svg');
                                        }

                                        [data-theme="dark"] .image-input-placeholder {
                                            background-image: url('assets/media/svg/files/blank-image-dark.svg');
                                        }
                                    </style>
                                
                                    <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                        data-kt-image-input="true">
                                    <div class="image-input-wrapper w-150px h-150px" style="background-image: url('/{{ $contact->image }}')">
                                    </div>
                             
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Change Image">
                                        
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            
                                            <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="avatar_remove" />
                                            
                                        </label>
                                      
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                            title="Cancel avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                      
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                            title="Remove avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                       
                                    </div>
                               
                                    <div class="text-muted fs-7">Set the category thumbnail image. Only *.png, *.jpg and
                                        *.jpeg image files are accepted</div>
                                 
                                </div>
                          
                            </div>
                        </div>
                    
                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
          
                            <div class="card card-flush py-4">
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
                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">Title</label>
                                        <input type="text" name="title" class="form-control mb-2"
                                            placeholder="Page title" value="{{$contact->title}}"  />
                                    
                                    </div>
                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">Heading</label>
                                        <input type="text" name="heading" class="form-control mb-2"
                                            placeholder="Heading" value="{{$contact->heading}}"  />
                                    
                                    </div>
                                    <div>
                                        <label class="required form-label">Description</label>
                                        <div id="kt_ecommerce_add_category_description"
                                            name="description" class="min-h-100px mb-2">
                                                 <textarea class="form-control" name="description">{{$contact->description}}</textarea>
                                            </div>
                                  
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card card-flush py-4">
                             
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Footer Details</h2>
                                    </div>
                                </div>
                             
                                <div class="card-body pt-0">
                                    <div class="mb-10">
                                        <label class="required form-label">Address</label>
                                        <div id="kt_ecommerce_add_category_meta_description" class="min-h-50px mb-2">
                                            <textarea class="form-control" name="address">{{$contact->address}}</textarea>
                                        </div>
                                      
                                    </div>

                                    <div class="mb-10">
                                        <label class="required form-label">Email</label>
                                        <input type="text" class="form-control mb-2" name="email"
                                            placeholder="Email" value="{{$contact->email}}"/>
                                        
                                    </div>
                                    <div class="mb-10">
                                        <label class="required form-label">Phone</label>
                                        <input type="text" class="form-control mb-2" name="phone"
                                            placeholder="Phone" value="{{$contact->phone}}"/>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            <div class="card card-flush py-4">
                             
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Meta Options</h2>
                                    </div>
                                </div>
                             
                                <div class="card-body pt-0">
                                    <div class="mb-10">
                                        <label class="form-label">Meta Tag Title</label>
                                        <input type="text" class="form-control mb-2" name="meta_title"
                                            placeholder="Meta tag name" value="{{$contact->meta_title}}"/>
                                        <div class="text-muted fs-7">Set a meta tag title. Recommended to be simple and
                                            precise keywords.</div>
                                    </div>
                                    <div class="mb-10">
                                        <label class="form-label">Meta Tag Description</label>
                                        <div id="kt_ecommerce_add_category_meta_description" class="min-h-100px mb-2">
                                            <textarea class="form-control" name="meta_description">{{$contact->meta_description}}</textarea>
                                        </div>
                                        <div class="text-muted fs-7">Set a meta tag description to the page for
                                            increased SEO ranking.</div>
                                    </div>
                                    <div>
                                        <label class="form-label">Meta Tag Keywords</label>
                                        <input id="kt_ecommerce_add_category_meta_keywords"
                                            name="meta_keywords" class="form-control mb-2" value="{{$contact->meta_keywords}}"/>
                                        <div class="text-muted fs-7">Set a list of keywords that the page is related
                                            to. Separate the keywords by adding a comma
                                            <code>,</code>between each keyword.
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                            <div class="d-flex justify-content-end">
                                <a href="#"
                                    id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Cancel</a>
                                <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                                    <span class="indicator-label">Save Changes</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
