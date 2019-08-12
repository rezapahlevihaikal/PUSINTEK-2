@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])
<style type="text/css">
    .baru{
        width: 210px;
        height : 120px;
    }
</style>

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                 @foreach($users as $user)
                <div class="col-md-3">
                    <div class="card card-chart">
                        <div class="card-header card-header-warning">
                         <img class="card-img-top baru" src="{{asset('portfolio/cabin.png')}}"alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title" style="text-align: center;">{{$user->name}}</h4>
                             <span class="text-success"><i class="fa fa-circle"></i> available </span>
                            <p class="card-category">
                                saya diatas
                            </p>

                            <a href="#" data-id=".$user['id']" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalMd">
                                Detail
                            </a>
                            
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">access_time</i>  {{ $user->updated_at->diffForHumans() }}
                            </div>
                        </div>
                    </div>
                </div>
             @endforeach

            </div>
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
<!-- Modal -->
<div class="modal fade" id="modalMd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="modalMdTitle"></h4>
                  </div>
                  <div class="modal-body">
                            <div class="row">
 <div class="col-lg-12">
  <table class="table table-bordered table-hover">
   <thead>
    <tr>
     <th>Nama</th>
     <td>{{ $user->name }}</td>
    </tr>
    <tr>
     <th>Judul</th>
     <td></td>
    </tr>
    <tr>
     <th>Tanggal</th>
     <td></td>
    </tr>
    <tr>
     <th>Isi</th>
     <td></td>
    </tr>
    <tr>
     <th>Status</th>
     <td></td>
    </tr>
   </thead>
  </table>
 </div>
</div>
                  </div>
                      <div class="modalError"></div>
                      <div id="modalMdContent"></div>
                  </div>
              </div>
          </div>
        </div>