@extends('layouts.app', ['activePage' => 'location-management', 'titlePage' => __('Locations Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('locations.store') }}" autocomplete="off" class="form-horizontal">
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
                      <a href="{{ route('locations.index') }}" class="btn btn-sm btn-primary">{{ __('Kembali') }}</a>
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
                    <label class="col-sm-2 col-form-label">{{ __('Status') }}</label>
                    <div class="col-sm-7">
                        <select class="form-control {{ $errors->has('role_id') ? 'is-invalid' : '' }}" name="status" id="input-role_id">
                            <option value="" disabled selected>Select your option</option>
                            <option value="1">Available</option>
                            <option value="2">Busy</option>
                            <option value="3">Cuti</option>
                        </select>
                    </div>
                  </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Lantai Gedung') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('lantai_gedung') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('lantai_gedung') ? ' is-invalid' : '' }}" name="lantai_gedung" id="input-lantai_gedung" type="lantai_gedung" placeholder="{{ __('Lantai Gedung') }}" value="{{ old('lantai_gedung') }}" required />
                      @if ($errors->has('lantai_gedung'))
                        <span id="lantai_gedung-error" class="error text-danger" for="input-lantai_gedung">{{ $errors->first('lantai_gedung') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Keterangan') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('keterangan') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('keterangan') ? ' is-invalid' : '' }}" name="keterangan" id="input-keterangan" type="keterangan" placeholder="{{ __('Keterangan') }}" value="{{ old('keterangan') }}" required />
                      @if ($errors->has('keterangan'))
                        <span id="keterangan-error" class="error text-danger" for="input-keterangan">{{ $errors->first('keterangan') }}</span>
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