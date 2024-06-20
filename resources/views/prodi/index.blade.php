@extends('layout.main')

@section('title', 'Prodi')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Prodi</h4>
            <p class="card-description">
            List data Prodi
            </p>
            @can('create', App\Prodi::class)
            <a href="{{route('prodi.create')}}" class="btn btn-rounded btn-primary">Tambah</a>
            @endcan
            
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Singkatan</th>
                    <th>Nama Prodi</th>
                    <th>Nama Fakultas</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($prodi as $item)
                        <tr>
                            <td>{{ $item["singkatan"] }}</td>
                            <td>{{ $item["nama"] }}</td>
                            <td>{{ $item["fakultas"] ["nama"]}}</td>
                        </tr>
                     @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</div>
@if (session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      Swal.fire({
        title: "Good job!",
        text: "{{session('success')}}",
        icon: "success"
      });
    </script>
@endif
@endsection
