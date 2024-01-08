@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <a href="{{route('cabang.create')}}" class="btn btn-primary py-8 fs-4 mb-4 rounded-2">Tambah Cabang</a>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark">
                    <th>No</th>
                    <th>Nama Cabang</th>
                    <th>Alamat Cabang</th>
                    <th>No Telepon Cabang</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($cabang as $data)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$data->nama_cabang}}</td>
                        <td>{{$data->alamat_cabang}}</td>
                        <td>{{$data->no_telepon_cabang}}</td>
                        <td>
                            <div class="d-flex">
                                <form action="{{route('cabang.destroy', $data->id)}}" method="post">
                                    <a href="{{route('cabang.edit', $data->id)}}"
                                        class="btn btn-sm btn-warning rounded-2 mx-1">Edit</a>

                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger rounded-2 mx-1">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection