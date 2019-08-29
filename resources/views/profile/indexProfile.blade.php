@extends('layouts.app', ['activePage' => '', 'titlePage' => __('User Profile')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-info">
                <h4 class="card-title ">{{ __('Profile') }}</h4>
              </div>
              <div class="card-body">
                     @if (session('status'))
                            <div class="row">
                              <div class="col-sm-12">
                                  <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <i class="material-icons">close</i>
                                    </button>
                                    <span>{{ session('status') }}</span>
                                  </div>
                                </div>
                            </div>
                     @endif
                      <div class="row">
                          <div class="col-12 text-right">
                      </div>
                      </div>
              <div class="row">
                      <div class="col-sm-6 col-md-3" >
                          <img src="{{asset('images/'.auth()->user()->image)}}" alt="no photo" class="img-fluid" />
                      </div>
                      
                          <div class="col-sm-6 col-md-8                                                         ">
                            <h4>{{strtoupper(auth()->user()->name)}}</h4>
                            
                            <h4>{{(auth()->user()->email)}}</h4>
                            <h4>{{strtoupper(Auth::user()->rolesDetail->name)}}</h4>
                            <h4>{{strtoupper(auth()->user()->created_at->format('d M Y'))}}</h4>
                            
                </div>
              </div>
         </div>
       </div>
     </div>
    </div>
    </div>
  
@endsection