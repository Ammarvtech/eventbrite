@extends('admin.layouts.app')
@section('content')
    @include('admin.partials.header')
    @include('admin.partials.sidebar')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Customers</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">Customers</li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">All Customers</li>
                        </ul>
                    </div>
                </div>

            </div>
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <!--begin::Category-->
                    <div class="card card-flush">

                        @if(\Session::has('flash_message_success'))
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-md-6" style="margin-left: 30px;">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{!! session('flash_message_success') !!}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div> 
                        @endif
                        <div class="card-body pt-0">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="min-w-250px">Name</th>
                                        <th class="min-w-150px">Email</th>
                                        <th class="min-w-150px">Role</th>
                                        <th class="min-w-150px">Status</th>
                                        
                                        <th class="min-w-150px">Created at</th>
                                        <th class="text-end min-w-70px">Actions</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="fw-semibold text-gray-600">
                                    <!--begin::Table row-->

                                    @foreach ($data as $user)

                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                              
                                                    <div class="ms-5">
                                                        
                                                        <a href="#"
                                                            class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1"
                                                            data-kt-ecommerce-category-filter="category_name">{{ $user->name }}</a>
                                                        <p>{{ $user->verify_token }}</p>
                                                    
                                    
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                {{ $user->email }}
                                            </td>
                                            <td>
                                                {{ $user->role }}
                                            </td>
                                            <td>
                                                @if ($user->status == 'active')
                                                    <div class="badge badge-light-success">Active</div>
                                                @else
                                                    <div class="badge badge-light-danger">Inactive</div>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="badge badge-light-primary">{{ $user->created_at }}</div>
                                            </td>
                                            <!--end::Type=-->
                                            <!--begin::Action=-->
                                            <td class="text-end">
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                                                    data-kt-menu-trigger="click"
                                                    data-kt-menu-placement="bottom-end">Actions
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                    <span class="svg-icon svg-icon-5 m-0">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </a>

                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                    data-kt-menu="true">
                                           
                                                    <div class="menu-item px-3">
                                                         <a href="{{ route('admin.users.edit', $user->id) }}"
                                                            class="menu-link px-3">Edit</a> 
                                                       {{-- <p class="menu-link px-3">Edit</p> --}}
                                                    </div>
                                            
                                                    <div class="menu-item px-3">
                                                         <a href="javascript::" onclick="deleteRecord('{{ route('admin.users.destroy', $user->id) }}')"
                                                            class="menu-link px-3"
                                                            data-kt-ecommerce-category-filter="delete_row">Delete</a>
                                                        {{--<a href="javascript::"
                                                            class="menu-link px-3"
                                                            data-kt-ecommerce-category-filter="delete_row">Delete</a> --}}
                                                    </div>

                                                </div>
                          
                                            </td>
                                
                                        </tr>
                                    @endforeach

                                    <!--end::Table row-->
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                            {{-- <div class="row">
                                <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                                    <div class="dataTables_length" id="kt_customers_table_length">
                                        <label>
                                            <p class="form-select form-select-sm form-select-solid">
                                             
                                            </p>
                                        </label>
                                    </div>
                                    </div>
                                    <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                                        <div class="dataTables_paginate paging_simple_numbers" id="kt_customers_table_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous disabled" id="kt_customers_table_previous">
                                                    <a href="#" aria-controls="kt_customers_table" data-dt-idx="0" tabindex="0" class="page-link">
                                                        <i class="previous"></i>
                                                    </a>
                                                </li>
                                                <li class="paginate_button page-item active">
                                                    <a href="#" aria-controls="kt_customers_table" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    {{ $data->links() }}
                            </div> --}}
                                
                            </div>
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Category-->
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>

    </div>
@endsection
<!-- Add the Sweet Alert library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.all.min.js"></script>
<!-- Add an event listener to the delete button -->
<script>
  function deleteRecord(url) {
    // Show the confirmation dialog box
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Send an AJAX request to the delete URL
            $.ajax({
                url: url,
                type: 'GET',
                success: function(result) {
                    // Display a success message
                    Swal.fire({
                        title: 'Deleted!',
                        text: 'The record has been deleted.',
                        icon: 'success'
                    }).then((result) => {
                        // Reload the page
                        location.reload();
                    });
                }
            });
        }
    });
}
</script>

