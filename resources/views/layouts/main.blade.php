@include('../frontend/partials.head')
   


    <div id="app">
      
            @include('../frontend/partials.nav')
            @yield('content')
       
    </div>

@include('../frontend/partials/footer')    