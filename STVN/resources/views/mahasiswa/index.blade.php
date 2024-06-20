@extends('layout.main')
 
@section('title','Mahasiswa')
 
@section('content')
<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Mahasiswa</h4>
                  <p class="card-description">
                    List data Mahasiswa
                  </p>
                  @can('create',App\Mahasiswa::class)
                  <a href="{{ route('mahasiswa.create')}}" class="btn btn-primary">tambah</a>
                  @endcan
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>NPM</th>
                          <th>Nama</th>
                          <th>Foto</th>
                          <th>Tempat Lahir</th>
                          <th>Tanggal Lahir</th>
                          <th>Alamat</th>
                          <th>Prodi ID</th>
                          <th>URL Foto</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($mahasiswa as $item)
                        <tr>
                            <td>{{$item["npm"]}}</td>
                            <td>{{$item["nama"]}}</td>
                            <td><img src="{{ url('foto/'. $item["url_foto"]) }}"></td>
                            <td>{{$item["tempat_lahir"]}}</td>
                            <td>{{$item["tanggal_lahir"]}}</td>
                            <td>{{$item["alamat"]}}</td>
                            <td>{{$item["prodi"]["nama"]}}</td>
                            <td>{{$item["url_foto"]}}</td>
                            <td>
                              @can('delete',$item)
                              <form action="{{ route('mahasiswa.destroy', $item["id"]) }}" method="post" style="display: inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-rounded btn-danger show_confirm" data-name="{{ $item["nama"]}}">Hapus</button>
                              </form>
                              @endcan
                              @can('update',$item)
                              <a href="{{ route('mahasiswa.edit', $item["id"])}}"
                              class="btn btn-sm btn-rounded btn-warning">Ubah</a>
                              @endcan
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
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('success'))
    <script>
      Swal.fire({
          title: "Good job!",
          text: "{{ session('success') }}",
          icon: "success"
      });
    </script>
@endif
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          let form =  $(this).closest("form");
          let name = $(this).data("name");
          event.preventDefault();
          Swal.fire({
            title: "Anda Yakin Ingin menghapus data?",
            text: "Sesudah dihapus data tidak bisa dikembalikan lagi ",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus!"
          })
          .then((willDelete) => {
            if (willDelete.isConfirmed) {
              form.submit();
            }
          });
      });
</script>
@endsection