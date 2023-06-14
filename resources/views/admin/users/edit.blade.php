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
               <!--begin::Post-->
                        <div class="post d-flex flex-column-fluid" id="kt_post">
                            <!--begin::Container-->
                            <div id="kt_content_container" class="container-xxl">
                                <!--begin::Navbar-->
                                <div class="card mb-5 mb-xl-10">
                                    <div class="card-body pt-9 pb-0">
                                        <!--begin::Details-->
                                        <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                                            <!--begin: Pic-->
                                            <div class="me-7 mb-4">
                                                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                                    <img src="{{ url('admin/') }}/assets/media/avatars/300-1.jpg" alt="image" />
                                                    <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px"></div>
                                                </div>
                                            </div>
                                            <!--end::Pic-->
                                            <!--begin::Info-->
                                            <div class="flex-grow-1">
                                                <!--begin::Title-->
                                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                                    <!--begin::User-->
                                                    <div class="d-flex flex-column">
                                                        <!--begin::Name-->
                                                        <div class="d-flex align-items-center mb-2">
                                                            <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{$user->name}}</a>
                                                            <a href="#">
                                                                <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                                                                <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                                                        <path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="#00A3FF" />
                                                                        <path class="permanent" d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </a>
                                                           
                                                        </div>
                                                        <!--end::Name-->
                                                        <!--begin::Info-->
                                                        <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                                                           <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                                            <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                                            <span class="svg-icon svg-icon-4 me-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z" fill="black" />
                                                                    <path d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z" fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->{{$user->role}}</a>
                                                            <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                                            <span class="svg-icon svg-icon-4 me-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="black" />
                                                                    <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->SF, Bay Area</a>
                                                            <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                                            <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                                            <span class="svg-icon svg-icon-4 me-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="black" />
                                                                    <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->{{$user->email}}</a>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                    <!--end::User-->
                                                    
                                                </div>
                                                <!--end::Title-->
                                                <!--begin::Stats-->
                                                <div class="d-flex flex-wrap flex-stack">
                                                    
                                                   
                                                </div>
                                                <!--end::Stats-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Navs-->
                                        <div class="d-flex overflow-auto h-55px">
                                            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder flex-nowrap">
                                                
                                                <!--begin::Nav item-->
                                                <li class="nav-item">
                                                    <a class="nav-link text-active-primary me-6 active" href="../../demo1/dist/account/statements.html">Statements</a>
                                                </li>
                                                <!--end::Nav item-->
                                               
                                            </ul>
                                        </div>
                                        <!--begin::Navs-->
                                    </div>
                                </div>
                                <!--end::Navbar-->
                                <!--begin::Row-->
                                <div class="row g-xxl-9">
                                    <!--begin::Col-->
                                    <div class="col-xxl-12">
                                        <!--begin::Earnings-->
                                        <div class="card card-xxl-stretch mb-5 mb-xxl-10">
                                            <!--begin::Header-->
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h3>Wallets</h3>
                                                </div>
                                            </div>
                                            <!--end::Header-->
                                           <div class="card-body pb-0">
                                            <!--begin::Left Section-->
                                            <div class="d-flex flex-wrap justify-content-between pb-6">
                                                <!--begin::Row-->
                                                <div class="d-flex flex-wrap">
                                                    <!--begin::Col-->
                                                    <div class="border border-dashed border-gray-300 w-200px rounded my-3 p-4 me-6">
                                                        <span class="fs-2x fw-bolder text-gray-800 lh-1">
                                                            <span data-kt-countup="true" data-kt-countup-value="{{$user->wallet->payouts}}" data-kt-countup-prefix="$">0</span>
                                                        </span>
                                                        <span class="fs-6 fw-bold text-gray-400 d-block lh-1 pt-2">PayOuts</span>
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="border border-dashed border-gray-300 w-200px rounded my-3 p-4 me-6">
                                                        <span class="fs-2x fw-bolder text-gray-800 lh-1">
                                                            <span class="" data-kt-countup="true" data-kt-countup-value="{{$user->wallet->current_balance}}" data-kt-countup-prefix="$">0</span>
                                                        </span>
                                                        <span class="fs-6 fw-bold text-gray-400 d-block lh-1 pt-2">Current Balance</span>
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="border border-dashed border-gray-300 w-200px rounded my-3 p-4 me-6">
                                                        <span class="fs-2x fw-bolder text-gray-800 lh-1">
                                                            <span data-kt-countup="true" data-kt-countup-value="{{$user->wallet->total_balance}}" data-kt-countup-prefix="$">0</span>
                                                        </span>
                                                        <span class="fs-6 fw-bold text-gray-400 d-block lh-1 pt-2">Total Balance</span>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->     
                                            </div>
                                            <!--end::Left Section-->
                                        </div>

                                        </div>
                                        <!--end::Earnings-->
                                    </div>
                                    <!--end::Col-->
                                   
                                </div>
                                <!--end::Row-->
                                <!--begin::Statements-->
                                <div class="card">
                                    <!--begin::Header-->
                                    <div class="card-header card-header-stretch">
                                        <!--begin::Title-->
                                        <div class="card-title">
                                            <h3 class="m-0 text-gray-800">Transations</h3>
                                        </div>
                                        <!--end::Title-->
                                       
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Tab Content-->
                                    <div id="kt_referred_users_tab_content" class="tab-content">
                                        <!--begin::Tab panel-->
                                        <div id="kt_referrals_1" class="card-body p-0 tab-pane fade show active" role="tabpanel">
                                            <div class="table-responsive">
                                                <!--begin::Table-->
                                                <table class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9">
                                                    <!--begin::Thead-->
                                                    <thead class="border-gray-200 fs-5 fw-bold bg-lighten">
                                                        <tr>
                                                            <th class="min-w-175px ps-9">Date</th>
                                                            <th class="min-w-125px">Turnament Name</th>
                                                            <th class="min-w-150px px-0">Order ID</th>
                                                            <th class="min-w-125px">Payment Method</th>
                                                            <th class="min-w-125px">Payment Type</th>
                                                            <th class="min-w-125px">Amount</th>
                                                            
                                                            
                                                        </tr>
                                                    </thead>
                                                    <!--end::Thead-->
                                                    <!--begin::Tbody-->
                                                    <tbody class="fs-6 fw-bold text-gray-600">
                                                        @foreach($user->wallet->transaction as $trans)
                                                        <tr>
                                                            <td class="ps-9">{{date('M d, Y', strtotime($trans->created_at))}}</td>
                                                            <td class="ps-0">{{$trans->tournament->title}}</td>
                                                            <td class="ps-0">{{$trans->order_number}}</td>
                                                            <td class="ps-0">{{$trans->payment_method}}</td>
                                                            <td class="ps-0">{{$trans->type}}</td>
                                                           
                                                            <td class="text-success">${{$trans->amount}}</td>
                                                            
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <!--end::Tbody-->
                                                </table>
                                                <!--end::Table-->
                                            </div>
                                        </div>
                                        <!--end::Tab panel-->
                                       
                                    </div>
                                    <!--end::Tab Content-->
                                </div>
                                <!--end::Statements-->
                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Post-->
            </div>
            <!--end::Content-->
        </div>
    </div>
@endsection
