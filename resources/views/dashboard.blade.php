@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      
      <div class="row">
        @foreach ($users as $item)
          <div class="col-md-4">
            <div class="card card-profile ml-auto mr-auto" style="max-width: 200px">
              <div class="card-header card-header-image">
                    <a href="#pablo">
                        <img class="img" src="{{asset('images/'.$item->image)}}" style="width: 100px; border-radius: 100%;">
                    </a>
                </div>

                <div class="card-body ">
                    <h5 class="card-title">{{strtoupper($item->name)}}</span></h5>
                    <h6 class="card-category text-gray">{{$item->rolesDetail->name}}</h6>
                </div>
                <div class="card-footer justify-content-center">
                    <a href="#pablo" class="btn btn-just-icon btn-twitter btn-round">
                        <i class="fa fa-twitter"></i>
                    </a>
                </div>
            </div>
          </div>
        @endforeach
      </div>
      <div class="text-center" style="align-item : center;">
          {!! $users->links() !!}
      </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush