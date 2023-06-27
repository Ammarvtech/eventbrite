@extends('admin.layouts.app')
@section('content')
    @include('admin.partials.header')
    @include('admin.partials.sidebar')
    <div class="content d-flex flex-column flex-column-fluid mt-10" id="kt_content">
     
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid " id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Layout-->
                <div class="d-flex flex-column flex-xl-row">
                    <!--begin::Sidebar-->
                    <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
                        <!--begin::Card-->
                        <div class="card mb-5 mb-xl-8">
                            <!--begin::Card body-->
                            <div class="card-body pt-15">
                                <!--begin::Summary-->
                                <div class="d-flex flex-center flex-column mb-5">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-100px symbol-circle mb-7">
                                        @if(isset($tournament->images[0]->image))
                                        <img src="{{ asset('storage/' . $tournament->images[0]->image) }}" alt="image" />
                                        @else
                                        <img src="https://via.placeholder.com/150" alt="image" />
                                        @endif
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Name-->
                                    <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-1">{{$tournament->title}}</a>
                                    <!--end::Name-->
                                    <!--begin::Position-->
                                    <div class="fs-5 fw-bold text-muted mb-6"></div>
                                    <!--end::Position-->
                                    <!--begin::Info-->
                                    <div class="d-flex flex-wrap flex-center">
                                        <!--begin::Stats-->
                                        <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                            <div class="fs-4 fw-bolder text-gray-700">
                                                <span class="w-20px">
                                                    {{ Carbon\Carbon::parse($tournament->start_date)->format('Y-m-d') }}
                                                </span>
                                                
                                            </div>
                                            <div class="fw-bold text-muted">Start Date</div>
                                        </div>
                                        <div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-4 mb-3">
                                            <div class="fs-4 fw-bolder text-gray-700">
                                           
                                                {{ Carbon\Carbon::parse($tournament->end_date)->format('Y-m-d') }}
                                               
                                            </div>
                                            <div class="fw-bold text-muted">End Date</div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-wrap flex-center">
                          
                                        <div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-4 mb-3">
                                            <div class="fs-4 fw-bolder text-gray-700">
                                           
                                                {{ Carbon\Carbon::parse($tournament->registration_dead_line)->format('Y-m-d') }}
                                               
                                            </div>
                                            <div class="fw-bold text-muted">Registration Deadline</div>
                                        </div>
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::Summary-->
                                <!--begin::Details toggle-->
                                <div class="d-flex flex-stack fs-4 py-3">
                                    <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse" href="#kt_customer_view_details" role="button" aria-expanded="false" aria-controls="kt_customer_view_details">Details
                                    <span class="ms-2 rotate-180">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span></div>
                                   
                                </div>
                              
                                <div class="separator separator-dashed my-3"></div>

                                <div id="kt_customer_view_details" class="collapse show">
                                    <div class="py-5 fs-6">
                                       
                                        <div class="fw-bolder">Category</div>
                                        <div class="text-gray-600">
                                            {{ isset($tournament->category->name) ? $tournament->category->name : 'N/A' }}
                                        </div>
                                    
                                        <div class="fw-bolder mt-5">Type</div>
                                        <div class="text-gray-600">
                                            {{  isset($tournament->type->name) ? $tournament->type->name : 'N/A' }}
                                        </div>
                                   
                                        <div class="fw-bolder mt-5">Country</div>
                                        <div class="text-gray-600">
                                            {{ isset($tournament->country->name) ? $tournament->country->name : 'N/A' }}
                                        </div>
                                    
                                        <div class="fw-bolder mt-5">City</div>
                                        <div class="text-gray-600">
                                            {{ isset($tournament->city) ? $tournament->city : 'N/A' }}
                                        </div>
                                       
                                        <div class="fw-bolder mt-5">Postal Code</div>
                                        <div class="text-gray-600">
                                            {{ isset($tournament->postal_code) ? $tournament->postal_code : 'N/A' }}
                                        </div>
                                    
                                        <div class="fw-bolder mt-5">Address</div>
                                        <div class="text-gray-600">
                                            {{ isset($tournament->address) ? $tournament->address : 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                    </div>
                    <!--end::Sidebar-->
                    <!--begin::Content-->
                    <div class="flex-lg-row-fluid ms-lg-15">
               
                        <!--end:::Tabs-->
                        <!--begin:::Tab content-->
                        <div class="tab-content" id="myTabContent">
                            <!--begin:::Tab pane-->
                            <div class="tab-pane fade show active" id="kt_customer_view_overview_tab" role="tabpanel">
            
                                <div class="card pt-4 mb-6 mb-xl-9">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2 class="fw-bolder mb-0">Event Details</h2>
                                        </div>
                                       
                                    </div>
                                   
                                    <div id="kt_customer_view_payment_method" class="card-body pt-0">
                                        <!--begin::Option-->
                                        <div class="py-0" data-kt-customer-payment-method="row">
                                            <!--begin::Header-->
                                            <div class="py-3 d-flex flex-stack flex-wrap">
                                                <!--begin::Toggle-->
                                                <div class="d-flex align-items-center collapsible rotate" data-bs-toggle="collapse" href="#kt_customer_view_payment_method_1" role="button" aria-expanded="false" aria-controls="kt_customer_view_payment_method_1">
                                                    <!--begin::Arrow-->
                                                    <div class="me-3 rotate-90">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                                                        <span class="svg-icon svg-icon-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                             
                                                    <img src="assets/media/svg/card-logos/mastercard.svg" class="w-40px me-3" alt="" />
                                            
                                                </div>
                                          
                                            
                                            </div>
                                      
                                            <div id="kt_customer_view_payment_method_1" class="collapse show fs-6 ps-10" data-bs-parent="#kt_customer_view_payment_method">
                                                <!--begin::Details-->
                                                <div class="d-flex flex-wrap py-5">
                                                    <!--begin::Col-->
                                                    <div class="flex-equal me-5">
                                                        <table class="table table-flush fw-bold gy-1 gx-1">
                                                            <tr>
                                                                <td class="text-muted min-w-125px w-125px">Number of Teams:</td>
                                                                <td class="text-gray-800">{{ $tournament->number_of_teams }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted min-w-125px w-125px">Format</td>
                                                                <td class="text-gray-800">{{ $tournament->format }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted min-w-125px w-125px">Prize Distribution</td>
                                                                <td class="text-gray-800">{{ $tournament->prize_distribution }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted min-w-125px w-125px">Level</td>
                                                                <td class="text-gray-800">{{ $tournament->level }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted min-w-125px w-125px">Entry Fee</td>
                                                                <td class="text-gray-800">{{ $tournament->entry_fee }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted min-w-125px w-125px">Rules</td>
                                                                <td class="text-gray-800"><?=$tournament->rules;?></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="flex-equal">
                                                        <table class="table table-flush fw-bold gy-1">
                                                           
                                                            <tr>
                                                                <td class="text-muted min-w-125px w-125px">Age</td>
                                                                <td class="text-gray-800">{{ $tournament->age }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted min-w-125px w-125px">Equipment Requirmenets</td>
                                                                <td class="text-gray-800">
                                                                    <a href="#" class="text-gray-900 text-hover-primary">{{ $tournament->equipment_requirements }}</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted min-w-125px w-125px">Contact Information</td>
                                                                <td class="text-gray-800">
                                                                    <a href="#" class="text-gray-900 text-hover-primary">{{ $tournament->contact_information }}</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted min-w-125px w-125px">Roles and Responsiblities</td>
                                                                <td class="text-gray-800">
                                                                    <a href="#" class="text-gray-900 text-hover-primary">{{ $tournament->roles_and_responsibilities }}</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted min-w-125px w-125px">Code of conduct</td>
                                                                <td class="text-gray-800"><?=$tournament->code_of_conduct?></td>
                                                            </tr>
                                                           
                                                        </table>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                       
                                        </div>
                               
                                    </div>
                                    <!--end::Card body-->
                                </div>
                          
                            </div>
                            <div class="tab-pane fade" id="kt_customer_view_overview_events_and_logs_tab" role="tabpanel">
                                <div class="card pt-4 mb-6 mb-xl-9 px-4">
                                    <div class="py-0" data-kt-customer-payment-method="row">
                                        <div class="py-3 d-flex flex-stack flex-wrap">
                                            <div class="d-flex align-items-center collapsible collapsed rotate" data-bs-toggle="collapse" href="#kt_customer_view_payment_method_2" role="button" aria-expanded="false" aria-controls="kt_customer_view_payment_method_2">
                                                <div class="me-3 rotate-90">
                                                    <span class="svg-icon svg-icon-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="black" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <img src="assets/media/svg/card-logos/visa.svg" class="w-40px me-3" alt="" />
                                                <div class="me-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="text-gray-800 fw-bolder">Match 01 Details</div>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Body-->
                                        <div id="kt_customer_view_payment_method_2" class="collapse fs-6 ps-10" data-bs-parent="#kt_customer_view_payment_method">
                                            <!--begin::Details-->
                                            <div class="d-flex flex-wrap py-5">
                                                <!--begin::Col-->
                                                <div class="flex-equal me-5">
                                                    <table class="table table-flush fw-bold gy-1">
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Schedule Date</td>
                                                            <td class="text-gray-800">{{ isset($tournament->schedule_date) ? Carbon\Carbon::parse($tournament->schedule_date)->format('d M Y') : '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Schedule Time</td>
                                                            <td class="text-gray-800">{{ isset($tournament->schedule_time) ? Carbon\Carbon::parse($tournament->schedule_time)->format('h:i A') : '' }}</td>
                                                        </tr>
                                                    
                                                    </table>
                                                </div>
                                            
                                                <div class="flex-equal">
                                                    <table class="table table-flush fw-bold gy-1">
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Schedule Breaks</td>
                                                            <td class="text-gray-800">{{ isset($tournament->schedule_breaks) ? $tournament->schedule_breaks: 'N/A'  }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Venue Availability</td>
                                                            <td class="text-gray-800">{{ isset($tournament->venue_availability) ? $tournament->venue_availability : '' }}</td>
                                                        </tr>
                                                    
                                                    </table>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <div class="py-0" data-kt-customer-payment-method="row">
                                        <div class="py-3 d-flex flex-stack flex-wrap">
                                            <div class="d-flex align-items-center collapsible collapsed rotate" data-bs-toggle="collapse" href="#kt_customer_view_payment_method_3" role="button" aria-expanded="false" aria-controls="kt_customer_view_payment_method_2">
                                                <div class="me-3 rotate-90">
                                                    <span class="svg-icon svg-icon-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="black" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <img src="assets/media/svg/card-logos/visa.svg" class="w-40px me-3" alt="" />
                                                <div class="me-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="text-gray-800 fw-bolder">Match 02 Details</div>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Body-->
                                        <div id="kt_customer_view_payment_method_3" class="collapse fs-6 ps-10" data-bs-parent="#kt_customer_view_payment_method">
                                            <!--begin::Details-->
                                            <div class="d-flex flex-wrap py-5">
                                                <!--begin::Col-->
                                                <div class="flex-equal me-5">
                                                    <table class="table table-flush fw-bold gy-1">
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Schedule Date</td>
                                                            <td class="text-gray-800">{{ isset($tournament->second_match_date) ? Carbon\Carbon::parse($tournament->second_match_date)->format('d M Y') : '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Schedule Time</td>
                                                            <td class="text-gray-800">{{ isset($tournament->second_match_time) ? Carbon\Carbon::parse($tournament->second_match_time)->format('h:i A') : '' }}</td>
                                                        </tr>
                                                    
                                                    </table>
                                                </div>
                                            
                                                <div class="flex-equal">
                                                    <table class="table table-flush fw-bold gy-1">
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Schedule Breaks</td>
                                                            <td class="text-gray-800">{{ isset($tournament->second_match_breaks) ? $tournament->second_match_breaks: 'N/A'  }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Venue Availability</td>
                                                            <td class="text-gray-800">{{ isset($tournament->second_venue_availability) ? $tournament->second_venue_availability : '' }}</td>
                                                        </tr>
                                                    
                                                    </table>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <div class="py-0" data-kt-customer-payment-method="row">
                                        <div class="py-3 d-flex flex-stack flex-wrap">
                                            <div class="d-flex align-items-center collapsible collapsed rotate" data-bs-toggle="collapse" href="#kt_customer_view_payment_method_4" role="button" aria-expanded="false" aria-controls="kt_customer_view_payment_method_2">
                                                <div class="me-3 rotate-90">
                                                    <span class="svg-icon svg-icon-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="black" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <img src="assets/media/svg/card-logos/visa.svg" class="w-40px me-3" alt="" />
                                                <div class="me-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="text-gray-800 fw-bolder">Match 03 Details</div>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Body-->
                                        <div id="kt_customer_view_payment_method_4" class="collapse fs-6 ps-10" data-bs-parent="#kt_customer_view_payment_method">
                                            <!--begin::Details-->
                                            <div class="d-flex flex-wrap py-5">
                                                <!--begin::Col-->
                                                <div class="flex-equal me-5">
                                                    <table class="table table-flush fw-bold gy-1">
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Schedule Date</td>
                                                            <td class="text-gray-800">{{ isset($tournament->third_match_date) ? Carbon\Carbon::parse($tournament->third_match_date)->format('d M Y') : '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Schedule Time</td>
                                                            <td class="text-gray-800">{{ isset($tournament->third_match_time) ? Carbon\Carbon::parse($tournament->third_match_time)->format('h:i A') : '' }}</td>
                                                        </tr>
                                                    
                                                    </table>
                                                </div>
                                            
                                                <div class="flex-equal">
                                                    <table class="table table-flush fw-bold gy-1">
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Schedule Breaks</td>
                                                            <td class="text-gray-800">{{ isset($tournament->third_match_breaks) ? $tournament->third_match_breaks: 'N/A'  }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Venue Availability</td>
                                                            <td class="text-gray-800">{{ isset($tournament->third_venue_availability) ? $tournament->third_venue_availability : '' }}</td>
                                                        </tr>
                                                    
                                                    </table>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <div class="py-0" data-kt-customer-payment-method="row">
                                        <div class="py-3 d-flex flex-stack flex-wrap">
                                            <div class="d-flex align-items-center collapsible collapsed rotate" data-bs-toggle="collapse" href="#kt_customer_view_payment_method_5" role="button" aria-expanded="false" aria-controls="kt_customer_view_payment_method_2">
                                                <div class="me-3 rotate-90">
                                                    <span class="svg-icon svg-icon-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="black" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <img src="assets/media/svg/card-logos/visa.svg" class="w-40px me-3" alt="" />
                                                <div class="me-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="text-gray-800 fw-bolder">Match 04 Details</div>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Body-->
                                        <div id="kt_customer_view_payment_method_5" class="collapse fs-6 ps-10" data-bs-parent="#kt_customer_view_payment_method">
                                            <!--begin::Details-->
                                            <div class="d-flex flex-wrap py-5">
                                                <!--begin::Col-->
                                                <div class="flex-equal me-5">
                                                    <table class="table table-flush fw-bold gy-1">
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Schedule Date</td>
                                                            <td class="text-gray-800">{{ isset($tournament->fourth_match_date) ? Carbon\Carbon::parse($tournament->fourth_match_date)->format('d M Y') : '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Schedule Time</td>
                                                            <td class="text-gray-800">{{ isset($tournament->fourth_match_time) ? Carbon\Carbon::parse($tournament->fourth_match_time)->format('h:i A') : '' }}</td>
                                                        </tr>
                                                    
                                                    </table>
                                                </div>
                                            
                                                <div class="flex-equal">
                                                    <table class="table table-flush fw-bold gy-1">
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Schedule Breaks</td>
                                                            <td class="text-gray-800">{{ isset($tournament->fourth_match_breaks) ? $tournament->fourth_match_breaks: 'N/A'  }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">Venue Availability</td>
                                                            <td class="text-gray-800">{{ isset($tournament->fourth_venue_availability) ? $tournament->fourth_venue_availability : '' }}</td>
                                                        </tr>
                                                    
                                                    </table>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                </div>  
                            </div>

                            <div class="tab-pane fade" id="teams" role="tabpanel">
                            <!--begin::Card-->
                                <div class="card pt-4 mb-6 mb-xl-9">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2 class="fw-bolder mb-0">Teams & Teams Memebrs</h2>
                                        </div>
                                        <!--end::Card title-->
                                       
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    @foreach($tournament->teams as $key => $team)
                                    <div id="kt_customer_view_payment_method_{{ $key }}" class="card-body pt-0">
                            

                                        <div class="py-0" data-kt-customer-payment-method="row">
                                            <div class="py-3 d-flex flex-stack flex-wrap">
                                                <div class="d-flex align-items-center collapsible rotate collapsed" data-bs-toggle="collapse" href="#kt_customer_view_payment_method_{{ $key }}_details" role="button" aria-expanded="false" aria-controls="kt_customer_view_payment_method_{{ $key }}_details">
                                                    <div class="me-3 rotate-90">
                                                        <span class="svg-icon svg-icon-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="black" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                        
                                                   @if($team->logo)
                                                        <img src="{{ asset('storage/uploads/' . $team->logo) }}" class="w-40px me-3" alt="" />
                                                    @else
                                                        <img src="{{ asset('storage/uploads/default.png') }}" class="w-40px me-3" alt="" />
                                                    @endif
                                               
                                                    <div class="me-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="text-gray-800 fw-bolder">Team Name: {{ $team->team_name }}</div>
                                                            <div class="ms-5">Team Affiliation: <span class="badge badge-light-primary">{{ $team->affiliation }}</span></div>
                                                        </div>
                                                        <div class="text-muted">Created At: {{ $team->created_at }}</div>
                                                    </div>
                                                </div>
                                        
                                                <div class="d-flex my-3 ms-9">
                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold w-150px py-3" data-kt-menu="true">
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3" data-kt-payment-mehtod-action="set_as_primary">Set as Primary</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--end::Header-->
                                            <!--begin::Body-->
                                            <div id="kt_customer_view_payment_method_{{ $key }}_details" class="collapse fs-6 ps-10" data-bs-parent="#kt_customer_view_payment_method">
                                                <!--begin::Details-->
                                                <div class="d-flex flex-wrap py-5">
                                                    <!--begin::Col-->
                                                    <div class="flex-equal me-5">
                                                        <table class="table table-flush fw-bold gy-1">
                                                            <tbody><tr>
                                                                <td class="text-muted min-w-125px w-125px">Team Color</td>
                                                                <td class="text-gray-800"> {{ $team->team_color }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted min-w-125px w-125px">Skill</td>
                                                                <td class="text-gray-800">{{ $team->skill }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted min-w-125px w-125px">Waivers Email</td>
                                                                <td class="text-gray-800">{{ $team->waivers_email }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted min-w-125px w-125px">Waivers File</td>
                                                                <td class="text-gray-800">{{ $team->waivers_file }}</td>
                                                            </tr>
                                                            
                                                        </tbody></table>
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="flex-equal">
                                                        <table class="table table-flush fw-bold gy-1">
                                                            <tbody>
                                                            <tr>
                                                                <td class="text-muted min-w-125px w-125px">Captain Name</td>
                                                                <td class="text-gray-800">{{ $team->full_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted min-w-125px w-125px">Captain Email</td>
                                                                <td class="text-gray-800">{{ $team->email }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted min-w-125px w-125px">Captain Phone</td>
                                                                <td class="text-gray-800">{{ $team->phone }}</td>
                                                            </tr>
                                                           
                                                        
                                                        </tbody>
                                                    </table>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <div class="d-flex flex-wrap py-5">
                                                    <!--begin::Col-->
                                                    <div class="flex-equal me-5">
                                                        <table class="table table-flush fw-bold gy-1">
                                                       
                                                        <tr>
                                                            <th class="text-gray-800">#</th>
                                                            <th class="text-gray-800">Member Name</th>
                                                            <th class="text-gray-800">Member Email</th>
                                                            <th class="text-gray-800">Member Phone</th>
                                                            <th class="text-gray-800">Emergency Name</th>
                                                            <th class="text-gray-800">Emergency Phone</th>
                                                            
                                                            
                                                        </tr>
                                                        @php
                                                            $teamMembers = DB::table('team_members')->where('team_id',$team->id)->get()
                                                        @endphp
                                                         @foreach($teamMembers as $key => $teamMember)
                                                        <tr>
                                                           <td class="text-muted min-w-25px w-25px">
                                                                {{ $key + 1 }}
                                                            </td>
                                                           <td class="text-muted min-w-125px w-125px">
                                                           
                                                            {{ isset($teamMember->mem_name) ? $teamMember->mem_name : 'N/A' }}
                                                           </td>
                                                           <td class="text-muted min-w-125px w-125px">
                                                            {{ isset($teamMember->mem_email) ? $teamMember->mem_email : 'N/A' }}
                                                            </td>
                                                           <td class="text-muted min-w-125px w-125px">
                                                            
                                                             {{ isset($teamMember->mem_phone) ? $teamMember->mem_phone : 'N/A' }}
                                                           </td>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                
                                                                {{ isset($teamMember->emergency_name) ? $teamMember->emergency_name : 'N/A' }}
                                                            </td>
                                                            <td class="text-muted min-w-125px w-125px">
                                                               
                                                                {{ isset($teamMember->emergency_phone) ? $teamMember->emergency_phone : 'N/A' }}
                                                            </td>
                                                        </tr>
                                                       @endforeach
                                                    </table>
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Option-->
                                        <div class="separator separator-dashed"></div>
                                       
                                    </div>
                                    @endforeach
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card--> 
                            </div>


                          
                        </div>
                        <!--end:::Tab content-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Layout-->
                <!--begin::Modals-->
                <!--begin::Modal - Add Payment-->
                <div class="modal fade" id="kt_modal_add_payment" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bolder">Add a Payment Record</h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div id="kt_modal_add_payment_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->
                            <!--begin::Modal body-->
                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                <!--begin::Form-->
                                <form id="kt_modal_add_payment_form" class="form" action="#">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold form-label mb-2">
                                            <span class="required">Invoice Number</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="The invoice number must be unique."></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" name="invoice" value="" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-bold form-label mb-2">Status</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-select form-select-solid fw-bolder" name="status" data-control="select2" data-placeholder="Select an option" data-hide-search="true">
                                            <option></option>
                                            <option value="0">Approved</option>
                                            <option value="1">Pending</option>
                                            <option value="2">Rejected</option>
                                            <option value="3">In progress</option>
                                            <option value="4">Completed</option>
                                        </select>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-bold form-label mb-2">Invoice Amount</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" name="amount" value="" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-15">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold form-label mb-2">
                                            <span class="required">Additional Information</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Information such as description of invoice or product purchased."></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <textarea class="form-control form-control-solid rounded-3" name="additional_info"></textarea>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="text-center">
                                        <button type="reset" id="kt_modal_add_payment_cancel" class="btn btn-light me-3">Discard</button>
                                        <button type="submit" id="kt_modal_add_payment_submit" class="btn btn-primary">
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>
                <!--end::Modal - New Card-->
                <!--begin::Modal - Adjust Balance-->
                <div class="modal fade" id="kt_modal_adjust_balance" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bolder">Adjust Balance</h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div id="kt_modal_adjust_balance_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->
                            <!--begin::Modal body-->
                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                <!--begin::Balance preview-->
                                <div class="d-flex text-center mb-9">
                                    <div class="w-50 border border-dashed border-gray-300 rounded mx-2 p-4">
                                        <div class="fs-6 fw-bold mb-2 text-muted">Current Balance</div>
                                        <div class="fs-2 fw-bolder" kt-modal-adjust-balance="current_balance">US$ 32,487.57</div>
                                    </div>
                                    <div class="w-50 border border-dashed border-gray-300 rounded mx-2 p-4">
                                        <div class="fs-6 fw-bold mb-2 text-muted">New Balance
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enter an amount to preview the new balance."></i></div>
                                        <div class="fs-2 fw-bolder" kt-modal-adjust-balance="new_balance">--</div>
                                    </div>
                                </div>
                                <!--end::Balance preview-->
                                <!--begin::Form-->
                                <form id="kt_modal_adjust_balance_form" class="form" action="#">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-bold form-label mb-2">Adjustment type</label>
                                        <!--end::Label-->
                                        <!--begin::Dropdown-->
                                        <select class="form-select form-select-solid fw-bolder" name="adjustment" aria-label="Select an option" data-control="select2" data-dropdown-parent="#kt_modal_adjust_balance" data-placeholder="Select an option" data-hide-search="true">
                                            <option></option>
                                            <option value="1">Credit</option>
                                            <option value="2">Debit</option>
                                        </select>
                                        <!--end::Dropdown-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-bold form-label mb-2">Amount</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input id="kt_modal_inputmask" type="text" class="form-control form-control-solid" name="amount" value="" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold form-label mb-2">Add adjustment note</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <textarea class="form-control form-control-solid rounded-3 mb-5"></textarea>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Disclaimer-->
                                    <div class="fs-7 text-muted mb-15">Please be aware that all manual balance changes will be audited by the financial team every fortnight. Please maintain your invoices and receipts until then. Thank you.</div>
                                    <!--end::Disclaimer-->
                                    <!--begin::Actions-->
                                    <div class="text-center">
                                        <button type="reset" id="kt_modal_adjust_balance_cancel" class="btn btn-light me-3">Discard</button>
                                        <button type="submit" id="kt_modal_adjust_balance_submit" class="btn btn-primary">
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>
                <!--end::Modal - New Card-->
                <!--begin::Modal - New Address-->
                <div class="modal fade" id="kt_modal_update_customer" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Form-->
                            <form class="form" action="#" id="kt_modal_update_customer_form">
                                <!--begin::Modal header-->
                                <div class="modal-header" id="kt_modal_update_customer_header">
                                    <!--begin::Modal title-->
                                    <h2 class="fw-bolder">Update Customer</h2>
                                    <!--end::Modal title-->
                                    <!--begin::Close-->
                                    <div id="kt_modal_update_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                        <span class="svg-icon svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Close-->
                                </div>
                                <!--end::Modal header-->
                                <!--begin::Modal body-->
                                <div class="modal-body py-10 px-lg-17">
                                    <!--begin::Scroll-->
                                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_customer_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_customer_header" data-kt-scroll-wrappers="#kt_modal_update_customer_scroll" data-kt-scroll-offset="300px">
                                        <!--begin::Notice-->
                                        <!--begin::Notice-->
                                        <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                                            <!--begin::Icon-->
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                                            <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
                                                    <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black" />
                                                    <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <!--end::Icon-->
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-stack flex-grow-1">
                                                <!--begin::Content-->
                                                <div class="fw-bold">
                                                    <div class="fs-6 text-gray-700">Updating customer details will receive a privacy audit. For more info, please read our
                                                    <a href="#">Privacy Policy</a></div>
                                                </div>
                                                <!--end::Content-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Notice-->
                                        <!--end::Notice-->
                                        <!--begin::User toggle-->
                                        <div class="fw-bolder fs-3 rotate collapsible mb-7" data-bs-toggle="collapse" href="#kt_modal_update_customer_user_info" role="button" aria-expanded="false" aria-controls="kt_modal_update_customer_user_info">User Information
                                        <span class="ms-2 rotate-180">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span></div>
                                        <!--end::User toggle-->
                                        <!--begin::User form-->
                                        <div id="kt_modal_update_customer_user_info" class="collapse show">
                                            <!--begin::Input group-->
                                            <div class="mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-bold mb-2">
                                                    <span>Update Avatar</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Allowed file types: png, jpg, jpeg."></i>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Image input wrapper-->
                                                <div class="mt-1">
                                                    <!--begin::Image input-->
                                                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/avatars/blank.png)">
                                                        <!--begin::Preview existing avatar-->
                                                        <div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/avatars/150-2.jpg)"></div>
                                                        <!--end::Preview existing avatar-->
                                                        <!--begin::Edit-->
                                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                                            <i class="bi bi-pencil-fill fs-7"></i>
                                                            <!--begin::Inputs-->
                                                            <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                                            <input type="hidden" name="avatar_remove" />
                                                            <!--end::Inputs-->
                                                        </label>
                                                        <!--end::Edit-->
                                                        <!--begin::Cancel-->
                                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                                            <i class="bi bi-x fs-2"></i>
                                                        </span>
                                                        <!--end::Cancel-->
                                                        <!--begin::Remove-->
                                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                                            <i class="bi bi-x fs-2"></i>
                                                        </span>
                                                        <!--end::Remove-->
                                                    </div>
                                                    <!--end::Image input-->
                                                </div>
                                                <!--end::Image input wrapper-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-bold mb-2">Name</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid" placeholder="" name="name" value="Sean Bean" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-bold mb-2">
                                                    <span>Email</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Email address must be active"></i>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="email" class="form-control form-control-solid" placeholder="" name="email" value="sean@dellito.com" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-15">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-bold mb-2">Description</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid" placeholder="" name="description" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::User form-->
                                        <!--begin::Billing toggle-->
                                        <div class="fw-bolder fs-3 rotate collapsible collapsed mb-7" data-bs-toggle="collapse" href="#kt_modal_update_customer_billing_info" role="button" aria-expanded="false" aria-controls="kt_modal_update_customer_billing_info">Shipping Information
                                        <span class="ms-2 rotate-180">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span></div>
                                        <!--end::Billing toggle-->
                                        <!--begin::Billing form-->
                                        <div id="kt_modal_update_customer_billing_info" class="collapse">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column mb-7 fv-row">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-bold mb-2">Address Line 1</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input class="form-control form-control-solid" placeholder="" name="address1" value="101, Collins Street" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column mb-7 fv-row">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-bold mb-2">Address Line 2</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input class="form-control form-control-solid" placeholder="" name="address2" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column mb-7 fv-row">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-bold mb-2">Town</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input class="form-control form-control-solid" placeholder="" name="city" value="Melbourne" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="row g-9 mb-7">
                                                <!--begin::Col-->
                                                <div class="col-md-6 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-bold mb-2">State / Province</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input class="form-control form-control-solid" placeholder="" name="state" value="Victoria" />
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-md-6 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-bold mb-2">Post Code</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input class="form-control form-control-solid" placeholder="" name="postcode" value="3000" />
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column mb-7 fv-row">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-bold mb-2">
                                                    <span>Country</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Country of origination"></i>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select name="country" aria-label="Select a Country" data-control="select2" data-placeholder="Select a Country..." data-dropdown-parent="#kt_modal_update_customer" class="form-select form-select-solid fw-bolder">
                                                    <option value="">Select a Country...</option>
                                                    <option value="AF">Afghanistan</option>
                                                    <option value="AX">Aland Islands</option>
                                                    <option value="AL">Albania</option>
                                                    <option value="DZ">Algeria</option>
                                                    <option value="AS">American Samoa</option>
                                                    <option value="AD">Andorra</option>
                                                    <option value="AO">Angola</option>
                                                    <option value="AI">Anguilla</option>
                                                    <option value="AG">Antigua and Barbuda</option>
                                                    <option value="AR">Argentina</option>
                                                    <option value="AM">Armenia</option>
                                                    <option value="AW">Aruba</option>
                                                    <option value="AU">Australia</option>
                                                    <option value="AT">Austria</option>
                                                    <option value="AZ">Azerbaijan</option>
                                                    <option value="BS">Bahamas</option>
                                                    <option value="BH">Bahrain</option>
                                                    <option value="BD">Bangladesh</option>
                                                    <option value="BB">Barbados</option>
                                                    <option value="BY">Belarus</option>
                                                    <option value="BE">Belgium</option>
                                                    <option value="BZ">Belize</option>
                                                    <option value="BJ">Benin</option>
                                                    <option value="BM">Bermuda</option>
                                                    <option value="BT">Bhutan</option>
                                                    <option value="BO">Bolivia, Plurinational State of</option>
                                                    <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                                    <option value="BA">Bosnia and Herzegovina</option>
                                                    <option value="BW">Botswana</option>
                                                    <option value="BR">Brazil</option>
                                                    <option value="IO">British Indian Ocean Territory</option>
                                                    <option value="BN">Brunei Darussalam</option>
                                                    <option value="BG">Bulgaria</option>
                                                    <option value="BF">Burkina Faso</option>
                                                    <option value="BI">Burundi</option>
                                                    <option value="KH">Cambodia</option>
                                                    <option value="CM">Cameroon</option>
                                                    <option value="CA">Canada</option>
                                                    <option value="CV">Cape Verde</option>
                                                    <option value="KY">Cayman Islands</option>
                                                    <option value="CF">Central African Republic</option>
                                                    <option value="TD">Chad</option>
                                                    <option value="CL">Chile</option>
                                                    <option value="CN">China</option>
                                                    <option value="CX">Christmas Island</option>
                                                    <option value="CC">Cocos (Keeling) Islands</option>
                                                    <option value="CO">Colombia</option>
                                                    <option value="KM">Comoros</option>
                                                    <option value="CK">Cook Islands</option>
                                                    <option value="CR">Costa Rica</option>
                                                    <option value="CI">Côte d'Ivoire</option>
                                                    <option value="HR">Croatia</option>
                                                    <option value="CU">Cuba</option>
                                                    <option value="CW">Curaçao</option>
                                                    <option value="CZ">Czech Republic</option>
                                                    <option value="DK">Denmark</option>
                                                    <option value="DJ">Djibouti</option>
                                                    <option value="DM">Dominica</option>
                                                    <option value="DO">Dominican Republic</option>
                                                    <option value="EC">Ecuador</option>
                                                    <option value="EG">Egypt</option>
                                                    <option value="SV">El Salvador</option>
                                                    <option value="GQ">Equatorial Guinea</option>
                                                    <option value="ER">Eritrea</option>
                                                    <option value="EE">Estonia</option>
                                                    <option value="ET">Ethiopia</option>
                                                    <option value="FK">Falkland Islands (Malvinas)</option>
                                                    <option value="FJ">Fiji</option>
                                                    <option value="FI">Finland</option>
                                                    <option value="FR">France</option>
                                                    <option value="PF">French Polynesia</option>
                                                    <option value="GA">Gabon</option>
                                                    <option value="GM">Gambia</option>
                                                    <option value="GE">Georgia</option>
                                                    <option value="DE">Germany</option>
                                                    <option value="GH">Ghana</option>
                                                    <option value="GI">Gibraltar</option>
                                                    <option value="GR">Greece</option>
                                                    <option value="GL">Greenland</option>
                                                    <option value="GD">Grenada</option>
                                                    <option value="GU">Guam</option>
                                                    <option value="GT">Guatemala</option>
                                                    <option value="GG">Guernsey</option>
                                                    <option value="GN">Guinea</option>
                                                    <option value="GW">Guinea-Bissau</option>
                                                    <option value="HT">Haiti</option>
                                                    <option value="VA">Holy See (Vatican City State)</option>
                                                    <option value="HN">Honduras</option>
                                                    <option value="HK">Hong Kong</option>
                                                    <option value="HU">Hungary</option>
                                                    <option value="IS">Iceland</option>
                                                    <option value="IN">India</option>
                                                    <option value="ID">Indonesia</option>
                                                    <option value="IR">Iran, Islamic Republic of</option>
                                                    <option value="IQ">Iraq</option>
                                                    <option value="IE">Ireland</option>
                                                    <option value="IM">Isle of Man</option>
                                                    <option value="IL">Israel</option>
                                                    <option value="IT">Italy</option>
                                                    <option value="JM">Jamaica</option>
                                                    <option value="JP">Japan</option>
                                                    <option value="JE">Jersey</option>
                                                    <option value="JO">Jordan</option>
                                                    <option value="KZ">Kazakhstan</option>
                                                    <option value="KE">Kenya</option>
                                                    <option value="KI">Kiribati</option>
                                                    <option value="KP">Korea, Democratic People's Republic of</option>
                                                    <option value="KW">Kuwait</option>
                                                    <option value="KG">Kyrgyzstan</option>
                                                    <option value="LA">Lao People's Democratic Republic</option>
                                                    <option value="LV">Latvia</option>
                                                    <option value="LB">Lebanon</option>
                                                    <option value="LS">Lesotho</option>
                                                    <option value="LR">Liberia</option>
                                                    <option value="LY">Libya</option>
                                                    <option value="LI">Liechtenstein</option>
                                                    <option value="LT">Lithuania</option>
                                                    <option value="LU">Luxembourg</option>
                                                    <option value="MO">Macao</option>
                                                    <option value="MG">Madagascar</option>
                                                    <option value="MW">Malawi</option>
                                                    <option value="MY">Malaysia</option>
                                                    <option value="MV">Maldives</option>
                                                    <option value="ML">Mali</option>
                                                    <option value="MT">Malta</option>
                                                    <option value="MH">Marshall Islands</option>
                                                    <option value="MQ">Martinique</option>
                                                    <option value="MR">Mauritania</option>
                                                    <option value="MU">Mauritius</option>
                                                    <option value="MX">Mexico</option>
                                                    <option value="FM">Micronesia, Federated States of</option>
                                                    <option value="MD">Moldova, Republic of</option>
                                                    <option value="MC">Monaco</option>
                                                    <option value="MN">Mongolia</option>
                                                    <option value="ME">Montenegro</option>
                                                    <option value="MS">Montserrat</option>
                                                    <option value="MA">Morocco</option>
                                                    <option value="MZ">Mozambique</option>
                                                    <option value="MM">Myanmar</option>
                                                    <option value="NA">Namibia</option>
                                                    <option value="NR">Nauru</option>
                                                    <option value="NP">Nepal</option>
                                                    <option value="NL">Netherlands</option>
                                                    <option value="NZ">New Zealand</option>
                                                    <option value="NI">Nicaragua</option>
                                                    <option value="NE">Niger</option>
                                                    <option value="NG">Nigeria</option>
                                                    <option value="NU">Niue</option>
                                                    <option value="NF">Norfolk Island</option>
                                                    <option value="MP">Northern Mariana Islands</option>
                                                    <option value="NO">Norway</option>
                                                    <option value="OM">Oman</option>
                                                    <option value="PK">Pakistan</option>
                                                    <option value="PW">Palau</option>
                                                    <option value="PS">Palestinian Territory, Occupied</option>
                                                    <option value="PA">Panama</option>
                                                    <option value="PG">Papua New Guinea</option>
                                                    <option value="PY">Paraguay</option>
                                                    <option value="PE">Peru</option>
                                                    <option value="PH">Philippines</option>
                                                    <option value="PL">Poland</option>
                                                    <option value="PT">Portugal</option>
                                                    <option value="PR">Puerto Rico</option>
                                                    <option value="QA">Qatar</option>
                                                    <option value="RO">Romania</option>
                                                    <option value="RU">Russian Federation</option>
                                                    <option value="RW">Rwanda</option>
                                                    <option value="BL">Saint Barthélemy</option>
                                                    <option value="KN">Saint Kitts and Nevis</option>
                                                    <option value="LC">Saint Lucia</option>
                                                    <option value="MF">Saint Martin (French part)</option>
                                                    <option value="VC">Saint Vincent and the Grenadines</option>
                                                    <option value="WS">Samoa</option>
                                                    <option value="SM">San Marino</option>
                                                    <option value="ST">Sao Tome and Principe</option>
                                                    <option value="SA">Saudi Arabia</option>
                                                    <option value="SN">Senegal</option>
                                                    <option value="RS">Serbia</option>
                                                    <option value="SC">Seychelles</option>
                                                    <option value="SL">Sierra Leone</option>
                                                    <option value="SG">Singapore</option>
                                                    <option value="SX">Sint Maarten (Dutch part)</option>
                                                    <option value="SK">Slovakia</option>
                                                    <option value="SI">Slovenia</option>
                                                    <option value="SB">Solomon Islands</option>
                                                    <option value="SO">Somalia</option>
                                                    <option value="ZA">South Africa</option>
                                                    <option value="KR">South Korea</option>
                                                    <option value="SS">South Sudan</option>
                                                    <option value="ES">Spain</option>
                                                    <option value="LK">Sri Lanka</option>
                                                    <option value="SD">Sudan</option>
                                                    <option value="SR">Suriname</option>
                                                    <option value="SZ">Swaziland</option>
                                                    <option value="SE">Sweden</option>
                                                    <option value="CH">Switzerland</option>
                                                    <option value="SY">Syrian Arab Republic</option>
                                                    <option value="TW">Taiwan, Province of China</option>
                                                    <option value="TJ">Tajikistan</option>
                                                    <option value="TZ">Tanzania, United Republic of</option>
                                                    <option value="TH">Thailand</option>
                                                    <option value="TG">Togo</option>
                                                    <option value="TK">Tokelau</option>
                                                    <option value="TO">Tonga</option>
                                                    <option value="TT">Trinidad and Tobago</option>
                                                    <option value="TN">Tunisia</option>
                                                    <option value="TR">Turkey</option>
                                                    <option value="TM">Turkmenistan</option>
                                                    <option value="TC">Turks and Caicos Islands</option>
                                                    <option value="TV">Tuvalu</option>
                                                    <option value="UG">Uganda</option>
                                                    <option value="UA">Ukraine</option>
                                                    <option value="AE">United Arab Emirates</option>
                                                    <option value="GB">United Kingdom</option>
                                                    <option value="US">United States</option>
                                                    <option value="UY">Uruguay</option>
                                                    <option value="UZ">Uzbekistan</option>
                                                    <option value="VU">Vanuatu</option>
                                                    <option value="VE">Venezuela, Bolivarian Republic of</option>
                                                    <option value="VN">Vietnam</option>
                                                    <option value="VI">Virgin Islands</option>
                                                    <option value="YE">Yemen</option>
                                                    <option value="ZM">Zambia</option>
                                                    <option value="ZW">Zimbabwe</option>
                                                </select>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Wrapper-->
                                                <div class="d-flex flex-stack">
                                                    <!--begin::Label-->
                                                    <div class="me-5">
                                                        <!--begin::Label-->
                                                        <label class="fs-6 fw-bold">Use as a billing adderess?</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <div class="fs-7 fw-bold text-muted">If you need more info, please check budget planning</div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Label-->
                                                    <!--begin::Switch-->
                                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                                        <!--begin::Input-->
                                                        <input class="form-check-input" name="billing" type="checkbox" value="1" id="kt_modal_update_customer_billing" checked="checked" />
                                                        <!--end::Input-->
                                                        <!--begin::Label-->
                                                        <span class="form-check-label fw-bold text-muted" for="kt_modal_update_customer_billing">Yes</span>
                                                        <!--end::Label-->
                                                    </label>
                                                    <!--end::Switch-->
                                                </div>
                                                <!--begin::Wrapper-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Billing form-->
                                    </div>
                                    <!--end::Scroll-->
                                </div>
                                <!--end::Modal body-->
                                <!--begin::Modal footer-->
                                <div class="modal-footer flex-center">
                                    <!--begin::Button-->
                                    <button type="reset" id="kt_modal_update_customer_cancel" class="btn btn-light me-3">Discard</button>
                                    <!--end::Button-->
                                    <!--begin::Button-->
                                    <button type="submit" id="kt_modal_update_customer_submit" class="btn btn-primary">
                                        <span class="indicator-label">Submit</span>
                                        <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                    <!--end::Button-->
                                </div>
                                <!--end::Modal footer-->
                            </form>
                            <!--end::Form-->
                        </div>
                    </div>
                </div>
                <!--end::Modal - New Address-->
                <!--begin::Modal - New Card-->
                <div class="modal fade" id="kt_modal_new_card" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header">
                                <!--begin::Modal title-->
                                <h2>Add New Card</h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->
                            <!--begin::Modal body-->
                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                <!--begin::Form-->
                                <form id="kt_modal_new_card_form" class="form" action="#">
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-7 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Name On Card</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a card holder's name"></i>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" class="form-control form-control-solid" placeholder="" name="card_name" value="Max Doe" />
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-7 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-bold form-label mb-2">Card Number</label>
                                        <!--end::Label-->
                                        <!--begin::Input wrapper-->
                                        <div class="position-relative">
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder="Enter card number" name="card_number" value="4111 1111 1111 1111" />
                                            <!--end::Input-->
                                            <!--begin::Card logos-->
                                            <div class="position-absolute translate-middle-y top-50 end-0 me-5">
                                                <img src="assets/media/svg/card-logos/visa.svg" alt="" class="h-25px" />
                                                <img src="assets/media/svg/card-logos/mastercard.svg" alt="" class="h-25px" />
                                                <img src="assets/media/svg/card-logos/american-express.svg" alt="" class="h-25px" />
                                            </div>
                                            <!--end::Card logos-->
                                        </div>
                                        <!--end::Input wrapper-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-10">
                                        <!--begin::Col-->
                                        <div class="col-md-8 fv-row">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-bold form-label mb-2">Expiration Date</label>
                                            <!--end::Label-->
                                            <!--begin::Row-->
                                            <div class="row fv-row">
                                                <!--begin::Col-->
                                                <div class="col-6">
                                                    <select name="card_expiry_month" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Month">
                                                        <option></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                    </select>
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-6">
                                                    <select name="card_expiry_year" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Year">
                                                        <option></option>
                                                        <option value="2021">2021</option>
                                                        <option value="2022">2022</option>
                                                        <option value="2023">2023</option>
                                                        <option value="2024">2024</option>
                                                        <option value="2025">2025</option>
                                                        <option value="2026">2026</option>
                                                        <option value="2027">2027</option>
                                                        <option value="2028">2028</option>
                                                        <option value="2029">2029</option>
                                                        <option value="2030">2030</option>
                                                        <option value="2031">2031</option>
                                                    </select>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                <span class="required">CVV</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Enter a card CVV code"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input wrapper-->
                                            <div class="position-relative">
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid" minlength="3" maxlength="4" placeholder="CVV" name="card_cvv" />
                                                <!--end::Input-->
                                                <!--begin::CVV icon-->
                                                <div class="position-absolute translate-middle-y top-50 end-0 me-3">
                                                    <!--begin::Svg Icon | path: icons/duotune/finance/fin002.svg-->
                                                    <span class="svg-icon svg-icon-2hx">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path d="M22 7H2V11H22V7Z" fill="black" />
                                                            <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19ZM14 14C14 13.4 13.6 13 13 13H5C4.4 13 4 13.4 4 14C4 14.6 4.4 15 5 15H13C13.6 15 14 14.6 14 14ZM16 15.5C16 16.3 16.7 17 17.5 17H18.5C19.3 17 20 16.3 20 15.5C20 14.7 19.3 14 18.5 14H17.5C16.7 14 16 14.7 16 15.5Z" fill="black" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </div>
                                                <!--end::CVV icon-->
                                            </div>
                                            <!--end::Input wrapper-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Label-->
                                        <div class="me-5">
                                            <label class="fs-6 fw-bold form-label">Save Card for further billing?</label>
                                            <div class="fs-7 fw-bold text-muted">If you need more info, please check budget planning</div>
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Switch-->
                                        <label class="form-check form-switch form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" checked="checked" />
                                            <span class="form-check-label fw-bold text-muted">Save Card</span>
                                        </label>
                                        <!--end::Switch-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="text-center pt-15">
                                        <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-light me-3">Discard</button>
                                        <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>
                <!--end::Modal - New Card-->
                <!--end::Modals-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
@endsection
