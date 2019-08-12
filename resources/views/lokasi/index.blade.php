@extends('layouts.app', ['activePage' => 'lokasi-management', 'titlePage' => __('Lokasi Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Lokasi Pegawai') }}</h4>
                <!-- <p class="card-category"> {{ __('Here you can manage Locations') }}</p> -->
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
                    <a href="{{ route('lokasi.create') }}" class="btn btn-sm btn-primary">{{ __('Tambahkan   ') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <th>
                          {{ __('Nama Gedung') }}
                      </th>
                      <th>
                        {{ __('Alamat') }}
                      </th>
                      <th>
                        {{ __('Update') }}
                      </th>
                      <th>
                        {{ __('Action') }}
                      </th>

                    </thead>
                    <tbody>
                      @foreach($data as $user)
                        <tr>
                          <td>
                            {{ $user->nama_gedung }}
                          </td>
                          <td>
                            {{ $user->alamat }}
                          </td>
                          <td>
                            {{ $user->updated_at->diffForHumans() }}
                          </td>
                          <td class="td-actions text-right">
                              <form action="{{ route('lokasi.destroy', $user->id) }}" method="post">
                                  @csrf
                                  @method('delete')
                              
                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('lokasi.edit', $user->id) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this location?") }}') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">close</i>
                                      <div class="ripple-container"></div>
                                  </button>
                              </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection