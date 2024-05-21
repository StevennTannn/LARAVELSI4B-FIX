@extends('layout.main')

@section('title', 'Fakultas')
    
@section('content')
<div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Fakultas</h4>
                    <p class="card-description">
                    List data Fakultas
                    </p>
                    <div class="table-responsive">
                        <table class="table">
                        <thead>
                            <tr>
                            <th>Nama Fakultas</th>
                            <th>Singkatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fakultas as $item)
                            <tr>
                                <td>{{ $item['nama'] }} </td>
                                <td>{{ $item['singkatan'] }} </td>
                            </tr>
            @endforeach
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                </div>
</div>
@endsection