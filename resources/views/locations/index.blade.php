@extends('layouts.app', ['activePage' => 'locations-management', 'titlePage' => __('Locations Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-info">
                <h4 class="card-title ">{{ __('Kelola Lokasi Anda') }}</h4>
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
                    <a href="{{ route('locations.create') }}" class="btn btn-sm btn-warning">{{ __('Tambahkan   ') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table text-center">
                    <thead>
                        <th>
                            {{ __('Tanggal') }}
                        </th>
                      <th>
                          {{ __('Lokasi') }}
                      </th>
                      {{--  <th>
                        {{ __('Lantai Gedung') }}
                      </th>  --}}
                      <th>
                        {{ __('Keterangan') }}
                      </th>
                      <th>
                        {{ __('Update') }}
                      </th>
                      {{-- <th class="text-right">
                        {{ __('Actions') }}
                      </th> --}}
                    </thead>
                    <tbody>
                      @foreach($locations as $user)
                        <tr>
                            <td>
                                {{ $user->created_at->format('d m Y | h:i:s') }}
                              </td>
                          <td>
                            {{ $user->nama_gedung }}
                          </td>
                          {{--  <td>
                            {{ $user->lantai_gedung }}
                          </td>  --}}
                          <td>
                            {{ $user->keterangan }}
                          </td>
                          <td>
                            {{ $user->updated_at->diffForHumans() }}
                          </td>
                          {{-- <td class="td-actions text-right">
                              <form action="{{ route('locations.destroy', $user->id) }}" method="post">
                                  @csrf
                                  @method('delete')
                              
                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('locations.edit', $user->id) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this location?") }}') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">close</i>
                                      <div class="ripple-container"></div>
                                  </button>
                              </form>
                          </td> --}}
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