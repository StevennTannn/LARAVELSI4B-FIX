@extends('layout.main')

@section('title', 'Mahasiswa')
    
@section('content')

<div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Mahasiswa</h4>
                    <p class="card-description">
                    List data Mahasiswa
                    </p>
                    {{--tombol tambah--}}
                    <a href="{{ route('mahasiswa.create')}}" class="btn btn-rounded btn-primary">Tambah</a>
                    <div class="table-responsive">
                        <table class="table">
                        <thead>
                            <tr>
                            <th>NPM</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Prodi</th>
                            <th>URL Foto</th>
                            <th>Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswa as $item)
                            <tr>
                                <td>{{ $item['npm'] }}</td>
                                <td>{{ $item['nama'] }}</td>
                                <td>{{ $item['tempat_lahir'] }}</td>
                                <td>{{ $item['tanggal_lahir'] }}</td>
                                <td>{{ $item['alamat'] }}</td>
                                <td>{{ $item["prodi"]["nama"] }}</td>
                                <td>{{ $item['url_foto'] }}</td>
                                <td><img src="{{ url('foto/'.$item["url_foto"])}}"></td>
                                <td>
                                    <form action="{{ route("mahasiswa.destroy", $item["id"]) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-rounded btn-danger show_confirm" data-name="{{ $item['nama']}}">Hapus</button>
                                        
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

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('success'))
    <script>
        Swal.fire({
            title: "Good job!",
            text: "{{ session('success')}}",
            icon: "success"
        });
    </script>
@endif
{{-- confirm dialog --}}
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          let form =  $(this).closest("form");
          let name = $(this).data("name");
          event.preventDefault();
          Swal.fire({
            title: "Yakin dek?",
            text: "Hilang permanen kalau dihapus",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus"
            })
          .then((willDelete) => {
            if (willDelete.inConfirmed) {
              form.submit();
            }
          });
      });
  
</script>
@endsection
   
