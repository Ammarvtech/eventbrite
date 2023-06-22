@extends('admin.layouts.app')
@section('content')
    @include('admin.partials.header')
    @include('admin.partials.sidebar')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
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
                            <li class="breadcrumb-item text-muted">Tournaments</li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">All Tournaments</li>
                        </ul>
                    </div>
                </div>

            </div>
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-fluid">
                    <!--begin::Category-->
                    <div class="card card-flush">

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
                   
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table">
                           
                                <thead>
                             
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="min-w-250px">Title</th>
                                        <th class="min-w-150px">Category</th>
                                        <th class="min-w-150px">Start Date</th>
                                        <th class="min-w-150px">End Date</th>
                                        <th class="min-w-50px">Teams</th>
                                        <th class="min-w-50px">Status</th>
                                        <th class="min-w-50px">is_featured</th>
                                        <th class="min-w-150px">Created at</th>
                                        <th class="text-end min-w-70px">Actions</th>
                                    </tr>
                          
                                </thead>
            
                                <tbody class="fw-semibold text-gray-600">
                           

                                    @foreach ($data as $tournament)

                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                              
                                                    <div class="ms-5">
                                                        
                                                        <a href="#"
                                                            class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1"
                                                            data-kt-ecommerce-category-filter="category_name">{{ $tournament->title }}</a>
                                                    
                                    
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                {{ isset($tournament->category->name) ? $tournament->category->name : 'N/A' }}
                                            </td>
                                            <td>
                                                {{ $tournament->start_date }}
                                            </td>
                                            <td>
                                                {{ $tournament->end_date }}
                                            </td>
                                            <td>
                                                <i class="fa fa-users"></i>
                                                <strong>
                                                {{ $tournament->number_of_teams }}
                                                </strong>
                                                
                                            </td>
                                            <td>
                                                <div class="badge badge-light-primary">{{ $tournament->created_at }}</div>
                                            </td>
                                            <td>
                                            <label class="toggle-button">
                                                    <input type="checkbox" class="is_featured"  onclick="toggleButton('{{ $tournament->id }}')" id="toggle_{{ $tournament->id }}"
                                                    <?php if($tournament->is_featured == 1) { echo "checked"; } ?>
                                                     >
                                                    <span class="slider"></span>
                                                </label>
                                            </td>
                                            <td>
                                                @if($tournament->is_active == 1)
                                                <div class="badge badge-light-success">Active</div>
                                                @else
                                                <div class="badge badge-light-danger">Inactive</div>
                                                @endif
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
                                                        <a href="{{ route('admin.tournaments.show', $tournament->id) }}"
                                                            class="menu-link px-3">Show</a>
                                                    </div>
                                            
                                                    <div class="menu-item px-3">
                                                        @if ($tournament->is_active == 1)
                                                        <a href="javascript::" onclick="deleteRecord('{{ route('admin.tournaments.destroy', $tournament->id) }}')"
                                                            class="menu-link px-3"
                                                            data-kt-ecommerce-category-filter="delete_row">DeActivate</a>
                                                        @else
                                                            <a href="javascript::" onclick="activateRecord('{{ route('admin.tournaments.activate', $tournament->id) }}')"
                                                            class="menu-link px-3"
                                                            data-kt-ecommerce-category-filter="delete_row">Activate</a>
                                                        @endif

                                                     
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
<style>
   .btn-sm{
        padding: 5px 10px !important;
        font-size: 12px;
        width: 80px;
    }
    .checkbox-input{
        width: 30px;
        height: 30px;
    }
    .status-square {
        background: #1ca0f278;
        border: #1ca0f278;
    }
    .w-full{
        width: 100px;
        padding: 5px;
    }
    .status-times {
        background: #ea535378;
        border: #ea535378;
    }

    .nav-link {
        color: rgb(var(--base));
    }
    .toggle-button {
  position: relative;
  display: inline-block;
  width: 40px;
  height: 40px;
}

.toggle-button input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    width: 30px;
    height: 30px;
    padding-left: 47px;
    border-radius: 20px;
}

.slider:before {
  position: absolute;
  content: "";
  height: 24px;
  width: 24px;
  left: 4px;
  top: 4px;
  background-color: white;
  border-radius: 50%;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:checked + .slider:before {
  transform: translateX(16px);
}
</style>
<!-- Add an event listener to the delete button -->
<script>
function activateRecord(url) {
    // Show the confirmation dialog box
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to Activate this Tournament!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',

        confirmButtonText: 'Yes, Activate it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Send an AJAX request to the delete URL
            $.ajax({
                url: url,
                type: 'GET',
                success: function(result) {
                    // Display a success message
                    Swal.fire({
                        title: 'Activated!',
                        text: 'The record has been Activated.',
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
  function deleteRecord(url) {
    // Show the confirmation dialog box
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, DeActivate it!'
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
                        text: 'The record has been DeActivated.',
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
function toggleButton(tournamentId) {
    var url = "{{ route('admin.tournaments.featured', ['id' => ':id']) }}";
    url = url.replace(':id', tournamentId);
    var toggle = document.querySelector("#toggle_" + tournamentId);
    toggle.classList.toggle("active");
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            "_token": "{{ csrf_token() }}",
            "tournamentId": tournamentId,
            "is_featured": toggle.checked ? "1" : "0",
        },
        success: function(result) {
            // Display a success message
            Swal.fire({
                title: 'Success!',
                text: 'The record has been updated.',
                icon: 'success'
            }).then((result) => {
                // Reload the page
                location.reload();
            });
        }
    })
}

</script>

