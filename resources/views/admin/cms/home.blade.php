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
                            <li class="breadcrumb-item text-muted">Home Page</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <form 
                        action="{{route('admin.cms.homeSubmit', $home->id)}}"
                        method="POST"  
                        enctype="multipart/form-data" 
                        id="kt_ecommerce_add_category_form" 
                        class="form d-flex flex-column flex-lg-row">
                         @csrf
                     
                        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2 class="required">Banner Image</h2>
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
                                    <div class="image-input-wrapper w-150px h-150px" style="background-image: url('/{{ $home->banner_img }}')">
                                    </div>
                                       
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Change Image">
                                        
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            
                                            <input type="file" name="banner_img" accept=".png, .jpg, .jpeg" />
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
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2 class="required">Resource Image</h2>
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
                                    <div class="image-input-wrapper w-150px h-150px" style="background-image: url('/{{ $home->resource_img }}')">
                                    </div>
                             
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Change Image">
                                        
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            
                                            <input type="file" name="resource_img" accept=".png, .jpg, .jpeg" />
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
                                        <label class="required form-label">Banner Title</label>
                                        <input type="text" name="banner_title" class="form-control mb-2"
                                            placeholder="Page title" value="{{$home->banner_title}}"  />     
                                    </div>
                                    <div>
                                        <label class="required form-label">Description</label>
                                        <div id="kt_ecommerce_add_category_description"
                                            name="description" class="min-h-100px mb-2">
                                                 <textarea class="form-control" name="banner_des">{{$home->banner_des}}</textarea>
                                            </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Gamer Section</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div>
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control mb-2" name="gamers_title"
                                            placeholder="" value="{{$home->gamers_title}}"/>
                                    </div>
                                     <div>
                                        <label class="form-label">Sub Title</label>
                                        <input type="text" class="form-control mb-2" name="gamers_sub_title"
                                            placeholder="" value="{{$home->gamers_sub_title}}"/>
                                    </div>
                                    <div>
                                        <label class="required form-label">Description</label>
                                        <div id="kt_ecommerce_add_category_description" name="gamers_des" class="min-h-100px mb-2">
                                            <textarea class="form-control" name="gamers_des">{{$home->gamers_des}}</textarea>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-flush py-4">    
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Resource Section</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div>
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control mb-2" name="resource_title"
                                            placeholder="" value="{{$home->resource_title}}"/>
                                    </div>
                                    <div>
                                        <label class="form-label">Sub Title</label>
                                        <input type="text" class="form-control mb-2" name="resource_sub_title"
                                            placeholder="" value="{{$home->resource_sub_title}}"/>
                                    </div>
                                    <div>
                                        <label class="required form-label">Description</label>
                                        <div id="kt_ecommerce_add_category_description" name="resource_des" class="min-h-100px mb-2">
                                            <textarea class="form-control" name="resource_des">{{$home->resource_des}}</textarea>
                                            </div>
                                    </div>
                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">Button Text</label>
                                        <input type="text" name="resource_btn_txt" class="form-control mb-2"
                                            placeholder="Button Text" value="{{$home->resource_btn_txt}}"  />
                                    </div>
                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">Button Link</label>
                                        <input type="text" name="resource_btn_link" class="form-control mb-2"
                                            placeholder="Button Link" value="{{$home->resource_btn_link}}"  />
                                    </div>
                                </div>
                            </div>

                             <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Tournament Section</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div>
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control mb-2" name="tournament_title"
                                            placeholder="" value="{{$home->tournament_title}}"/>
                                    </div>
                                     <div>
                                        <label class="form-label">Sub Title</label>
                                        <input type="text" class="form-control mb-2" name="tournament_des"
                                            placeholder="" value="{{$home->tournament_des}}"/>
                                    </div>
                                   
                                </div>
                            </div>
                             <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Social Media Section</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div>
                                        <label class="form-label">Facebook</label>
                                        <input type="text" class="form-control mb-2" name="facebook"
                                            placeholder="" value="{{$home->facebook}}"/>
                                    </div>
                                     <div>
                                        <label class="form-label">Instagram</label>
                                        <input type="text" class="form-control mb-2" name="insta"
                                            placeholder="" value="{{$home->insta}}"/>
                                    </div>
                                    <div>
                                        <label class="form-label">Twitter</label>
                                        <input type="text" class="form-control mb-2" name="twiter"
                                            placeholder="" value="{{$home->twiter}}"/>
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
