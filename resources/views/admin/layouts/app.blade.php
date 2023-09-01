

    
@include('../admin/partials.head')
   
@include('../admin/partials.navbar')
@include('../admin/partials.sidebar')
 
<!--====== Start Main Wrapper Section======-->
<section class="d-flex" id="wrapper">
  
    <div class="page-content-wrapper">
        {{-- @include('../admin/partials.breadcrumb') --}}

        {{-- <x-breadcrumb /> --}}

          <!--  main-content -->   
        <div class="main-content">

            @yield('content')

        </div>  
        <!--  main-content -->   
    </div> 

</section>

<!--====== End Main Wrapper Section======-->


@include('../admin/partials.footer')  