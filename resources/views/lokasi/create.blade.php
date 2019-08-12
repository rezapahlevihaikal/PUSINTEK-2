@extends('layouts.app', ['activePage' => 'location-management', 'titlePage' => __('Locations Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('lokasi.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Menambahkan Lokasi') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('lokasi.index') }}" class="btn btn-sm btn-primary">{{ __('Kembali') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Nama Gedung') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('nama_gedung') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('nama_gedung') ? ' is-invalid' : '' }}" name="nama_gedung" id="nama_gedung" type="text" placeholder="{{ __('Nama Gedung') }}" value="{{ old('nama_gedung') }}" required="true" aria-required="true"/>
                      @if ($errors->has('nama_gedung'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('nama_gedung') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Alamat') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('alamat') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" name="alamat" id="input-alamat" type="alamat" placeholder="{{ __('Alamat') }}" value="{{ old('alamat') }}" required />
                      @if ($errors->has('lantai_gedung'))
                        <span id="alamat-error" class="error text-danger" for="input-alamat">{{ $errors->first('alamat') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Tambahkan') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection