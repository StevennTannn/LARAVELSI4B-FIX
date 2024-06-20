@extends('layout.main')

@section('title', 'Prodi')
    
@section('content')
    <h1>UMDP</h1>
    <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Program Studi</h4>
                  <p class="card-description">
                  List data program studi
                  </p>
                  {{-- tombol tambah --}}
                  @can('create', App\prodi::class)
                    <a href="{{ route('prodi.create') }}" class="btn btn-rounded btn-primary">tambah</a>    
                  @endcan           
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Nama program studi</th>
                          <th>Singkatan</th>
                          <th>Nama Fakultas
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($prodi as $item)
                            <tr>
                                <td>{{ $item["nama"] }} 
                                <td>{{ $item["singkatan"] }} </td>
                                <td> {{ $item["fakultas"] ["nama"] }}</td>
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
    title: "Sukses",
    text: "{{ session('success') }}",
    icon: "success"
  });
  </script>
@endif

@endsection