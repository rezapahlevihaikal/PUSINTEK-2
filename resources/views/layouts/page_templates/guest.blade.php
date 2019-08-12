@include('layouts.navbars.navs.guest')
<div class="wrapper wrapper-full-page">
<<<<<<< HEAD
  <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('{{ asset('material') }}/img/cover.jpg'); background-size: cover; background-position: top center;align-items: center;" data-color="purple">
=======
  <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('{{ asset('material') }}/img/background-login.jpg'); background-size: cover; background-position: top center;align-items: center;" data-color="purple">
>>>>>>> efbe4d1359d92a8bd07041819124c4b4e1d7c152
  <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
    @yield('content')
    @include('layouts.footers.guest')
  </div>
</div>
