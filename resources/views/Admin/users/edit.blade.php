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
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Edit
                            User</h1>
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
                            <li class="breadcrumb-item text-muted">Customers</li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">Edit</li>
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
                    <form action="{{route('admin.users.update',$user->id)}}" method="POST" enctype="multipart/form-data" id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row">
                        @csrf
                        <!--begin::Aside column-->
                        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                           
                            <!--begin::Status-->
                            <div class="card card-flush py-4">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>Status</h2>
                                    </div>
                                    <!--end::Card title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <div class="rounded-circle bg-success w-15px h-15px"
                                            id="kt_ecommerce_add_category_status"></div>
                                    </div>
                                    <!--begin::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Select2-->
                                     <select class="form-select mb-2" data-control="select2" data-hide-search="true"
                                        data-placeholder="Select an option" name="status" id="kt_ecommerce_add_category_status_select">
                                       
                                        <option value="active" @if($user->status =='active') selected @endif >Active</option>
                                        <option value="Inactive" @if($user->status =='Inactive') selected @endif>Inactive</option>
                                    </select>
                                    <!--end::Select2-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">Set the user status.</div>
                                    <!--end::Description-->
                                    <!--begin::Datepicker-->
                                    <div class="d-none mt-10">
                                        <label for="kt_ecommerce_add_category_status_datepicker" class="form-label">Select
                                            publishing date and time</label>
                                        <input class="form-control" id="kt_ecommerce_add_category_status_datepicker"
                                            placeholder="Pick date & time" />
                                    </div>
                                    <!--end::Datepicker-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Status-->
                            
                        </div>
                        <!--end::Aside column-->
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
                                <div class="card-body pt-0">
                                    <!--begin::Input group-->
                                    <div class="fv-row">
                                        <label class="required form-label">Full Name</label>
                                        <input type="text" name="name" class="form-control mb-2" placeholder="User name" value="{{$user->name}}" />
                                    </div>
                                </div>
                                <!--end::Card header-->

                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Input group-->
                                    <div class="fv-row">
                                        <label class="required form-label">Email Address</label>
                                        <input type="text" name="email" class="form-control mb-2" placeholder="User Email" value="{{$user->email}}" />
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Input group-->
                                    <div class="fv-row">
                                        <label class="required form-label">Phone Number</label>
                                        <input type="number" name="phone" class="form-control mb-2" placeholder="User Phone" value="{{$user->phone_number}}" />
                                    </div>
                                </div>
                                @if($user->role =='player')
                                <!--end::Card header-->
                                 <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Input group-->
                                    <div class="fv-row">
                                        <label class="form-label">Country</label>
                                        <select class="form-select" name="country">
                                                <option>Select</option>
                                                @foreach($countries as $coun)
                                                <option value="{{ $coun->id }}" @if($coun->id == $user->country) selected @endif>{{ $coun->name}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Input group-->
                                    <div class="fv-row">
                                        <label class="form-label">City</label>
                                        <input type="text" name="city" class="form-control mb-2" placeholder="User City" value="{{$user->city}}" />
                                    </div>
                                </div>
                                <!--end::Card header-->
                                 <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Input group-->
                                    <div class="fv-row">
                                        <label class="form-label">Postal code</label>
                                        <input type="text" name="postal_code" class="form-control mb-2" placeholder="User postal code" value="{{$user->postal_code}}" />
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Input group-->
                                    <div class="fv-row">
                                        <label class="form-label">Address</label>
                                        <input type="text" name="address" class="form-control mb-2" placeholder="User postal code" value="{{$user->address}}" />
                                    </div>
                                </div>
                                @endif
                   
                                @if($user->role =='organizer')
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Input group-->
                                    <div class="fv-row">
                                        <label class="form-label">Organization Name</label>
                                        <input type="text" name="org_name" class="form-control mb-2" placeholder="User Email" value="{{$user->org_name}}" />
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Input group-->
                                    <div class="fv-row">
                                        <label class="form-label">Organization Website</label>
                                        <input type="text" name="org_website" class="form-control mb-2" placeholder="User Email" value="{{$user->org_website}}" />
                                    </div>
                                </div>
                                <!--end::Card header-->
                                 <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Input group-->
                                    <div class="fv-row">
                                        <label class="form-label">Mailing Address</label>
                                        <input type="text" name="org_mailing_address" class="form-control mb-2" placeholder="User Email" value="{{$user->org_mailing_address}}" />
                                    </div>
                                </div>
                                <!--end::Card header-->
                                 <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Input group-->
                                    <div class="fv-row">
                                        <label class="form-label">Preferred Communication Method</label>
                                         <select class="form-select" name="org_communication_method">
                                                <option>Select</option>
                                                <option value="email" @if($user->org_communication_method == 'email') selected @endif>Email</option>
                                                <option value="phone" @if($user->org_communication_method == 'phone') selected @endif>Phone</optio>      
                                                <option value="Messaging app" @if($user->org_communication_method == 'Messaging app') selected @endif>Messaging App</option>
                                            </select>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Input group-->
                                    <div class="fv-row">
                                        <label class="form-label">Time Zone</label>
                                        <input type="text" name="org_timezone" class="form-control mb-2" placeholder="Time Zone" value="{{$user->org_timezone}}" />
                                    </div>
                                </div>
                                @endif
                                
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Input group-->
                                    <div class="fv-row">
                                        <label class="form-label">Password</label>
                                        <input type="text" name="password" class="form-control mb-2" placeholder="Password" />
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Input group-->
                                    <div class="fv-row">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="text" name="confirm_password" class="form-control mb-2" placeholder="Password"/>
                                    </div>
                                </div>
                                <!--end::Card header-->

                                  {{-- <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Input group-->
                                    <div class="fv-row">
                                        <label class="required form-label">Role</label>
                                         <select class="form-select" name="role">
                                                <option>Select Role</option>
                                                <option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>
                                                <option value="player" @if($user->role == 'player') selected @endif>player</option>       
                                            </select>
                                    </div>
                                </div>
                                <!--end::Card header--> --}}
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
@endsection
