<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesbrand.com/skote/layouts/vertical/dashboard-saas.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Dec 2020 16:03:28 GMT -->
@include('themes.header')

    
    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            @include('themes.nav')


            <!-- ========== Left Sidebar Start ========== -->
            @include('themes.sidebar')
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                @yield('content')
                <!-- End Page-content -->

                
                @include('themes.footer')
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- JAVASCRIPT -->
        @include('themes.scripts')
        @yield('scripts')
    </body>
</html>
