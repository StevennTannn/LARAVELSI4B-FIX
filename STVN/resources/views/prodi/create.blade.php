@extends('layout.main')

@section('title', 'Tambah Prodi')
    
@section('content')
<div class="row">
    {{-- formulir tambah fakultas --}}
    <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tambah Prodi</h4>
                  <p class="card-description">
                    Formulir Tambah Prodi
                  </p>
                  <form method="POST" action="{{ route('prodi.store') }}" 
                  class="forms-sample">
                  @csrf
                    <div class="form-group">
                      <label for="nama">Nama Prodi</label>
                      <input type="text" class="form-control" name="nama" value="{{ old('nama') }}" placeholder="Nama Prodi">
                      @error('nama')
                        <span class="text-danger">{{ $message }} </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="singkatan">Singkatan</label>
                      <input type="text" class="form-control" name="singkatan" value="{{ old('singkatan') }}"placeholder="SI,IF,...">
                      @error('singkatan')
                        <span class="text-danger">{{ $message }} </span>
                      @enderror
                    </div>
                     <div class="form-group">
                      <label for="fakultas_id">Nama Fakultas</label>
                      <select name="fakultas_id" class="form-control">
                        @foreach ($fakultas as $item)
                            <option value="{{ $item['id'] }}">
                              {{ $item['nama']}}
                            </option>
                        @endforeach
                      </select>
                      @error('fakultas.id')
                        <span class="text-danger">{{ $message }} </span>
                      @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                    <a href="{{ url('prodi') }}" class="btn btn-light">Batal</button>
                  </form>
                </div>
              </div>
            </div>
</div>
@endsection