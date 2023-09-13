<!DOCTYPE html>
<html lang="en">

<head>
    <base href="../" />
    <title>Admin</title>

    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="{{ url('admin/assets/media/logos/favicon.ico') }}" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{ url('admin/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('admin/assets/plugins/custom/vis-timeline/vis-timeline.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ url('admin/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!--end::Global Stylesheets Bundle-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.all.min.js"></script>


</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-theme-mode");
            } else {
                if (localStorage.getItem("data-theme") !== null) {
                    themeMode = localStorage.getItem("data-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-theme", themeMode);
        }
    </script>
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    @yield('content')
                </div>
                @if (Auth::check())
                    @include('admin.partials.footer')
                @endif

            </div>

        </div>

    </div>
</body>
<script>
    var hostUrl = "assets/";
</script>
<script src="{{ url('admin/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ url('admin/assets/js/scripts.bundle.js') }}"></script>
<script src="{{ url('admin/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ url('admin/assets/plugins/custom/vis-timeline/vis-timeline.bundle.js') }}"></script>
<script src="{{ url('admin/assets/js/widgets.bundle.js') }}"></script>
<script src="{{ url('admin/assets/js/custom/widgets.js') }}"></script>
<script src="{{ url('admin/assets/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ url('admin/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
<script src="{{ url('admin/assets/js/custom/utilities/modals/users-search.js') }}"></script>
</body>
<!--end::Body-->

</html>
