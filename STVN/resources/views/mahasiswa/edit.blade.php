@extends('layout.main')

@section('title', 'Ubah Mahasiswa')
    
@section('content')
<div class="row">
    {{--formuliur tambah fakultas--}}
    <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ubah Mahasiswa</h4>
                  <p class="card-description">
                    Formulir Ubah Mahasiswa
                  </p>
                  <form method="POST" action="{{ route('mahasiswa.update', $mahasiswa['id'])}}" class="forms-sample" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                      <label for="npm">NPM</label>
                      <input type="text" class="form-control" name="npm" placeholder="NPM Mahasiswa" value="{{ old('npm')}}">
                      @error('npm')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" class="form-control" name="nama" placeholder="Nama Mahasiswa" value="{{ old('nama')}}">
                      @error('nama')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="tempat_lahir">Tempat Lahir</label>
                      <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" value="{{ old('tempat_lahir')}}">
                      @error('tempat_lahir')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="tanggal_lahir">Tanggal Lahir</label>
                      <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir" value="{{ old('tanggal_lahir')}}">
                      @error('tanggal_lahir')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <input type="text" class="form-control" name="alamat" placeholder="Alamat Mahasiswa" value="{{ old('alamat')}}">
                      @error('alamat')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="prodi_id">Prodi</label>
                      <select name="prodi_id" class="form-control">
                            @foreach ($prodi as $item){
                                <option value="{{ $item["id"]}}">{{ $item["nama"]}}</option>
                            }
                            @endforeach
                        </select>
                      @error('prodi_id')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="url_foto">URL Foto</label>
                      <input type="file" class="form-control" name="url_foto" placeholder="URL_Foto">
                      @error('url_foto')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                    <a href="{{ url('mahasiswa')}}" class="btn btn-light">Batal</a>
                  </form>
                </div>
              </div>
            </div>
</div>
@endsection