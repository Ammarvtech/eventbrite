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
                            Categories</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">Categories</li>
                          
                        </ul>
                    </div>
         
                </div>

            </div>
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <!--begin::Category-->
                    <div class="card card-flush">
                        <!--begin::Card header-->
                        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                            <!--begin::Card title-->
                            <div class="card-title">
                                
                            </div>
                            <!--end::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Add customer-->
                                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Add Category</a>
                                <!--end::Add customer-->
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        @if(\Session::has('flash_message_success'))
                        <div class="row">
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
                                        <th class="min-w-250px">Category</th>
                                        <th class="min-w-150px">Category Type</th>
                                        <th class="min-w-150px">Category Status</th>
                                        <th class="min-w-150px">Created at</th>
                                        <th class="text-end min-w-70px">Actions</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="fw-semibold text-gray-600">
                                    <!--begin::Table row-->

                                    @foreach ($categories as $category)

                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                    <!--begin::Thumbnail-->
                                                    <a href="#" class="symbol symbol-50px">
                                                        <span class="symbol-label"
                                                            style="background-image:url({{ $category->image }});"></span>
                                                    </a>
                                                    <!--end::Thumbnail-->
                                                    <div class="ms-5">
                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1"
                                                            data-kt-ecommerce-category-filter="category_name">{{ $category->name }}</a>
                                                        <!--end::Title-->
                                                        <!--begin::Description-->
                                                        <div class="text-muted fs-7 fw-bold">{{ $category->description }}
                                                        </div>
                                                        <!--end::Description-->
                                                    </div>
                                                </div>
                                            </td>
                                            <!--end::Category=-->
                                            <!--begin::Type=-->
                                            <td>
                                                @if ($category->parent_id != null)
                                                    <div class="badge badge-light-primary">Sub Category</div>
                                                @else
                                                    <div class="badge badge-light-primary">Main Category</div>
                                                @endif
                                            <td>
                                                <!--begin::Badges-->
                                                @if ($category->status == 'active')
                                                    <div class="badge badge-light-success">Active</div>
                                                @else
                                                    <div class="badge badge-light-danger">Inactive</div>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="badge badge-light-primary">{{ $category->created_at }}</div>
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
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                    data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="{{ route('admin.categories.edit', $category->id) }}"
                                                            class="menu-link px-3">Edit</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="javascript::" onclick="deleteRecord('{{ route('admin.categories.destroy', $category->id) }}')"
                                                            class="menu-link px-3"
                                                            data-kt-ecommerce-category-filter="delete_row">Delete</a>
                                                    </div>

                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu-->
                                            </td>
                                            <!--end::Action=-->
                                        </tr>
                                    @endforeach

                                    <!--end::Table row-->
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
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

