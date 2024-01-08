@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <a href="{{route('pengguna.create')}}" class="btn btn-primary py-8 fs-4 mb-4 rounded-2">Tambah Pengguna</a>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($pengguna as $data)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->alamat}}</td>
                        <td>{{$data->no_telepon}}</td>
                        <td>{{$data->email}}</td>
                        <td>
                            @if ($data->role == 1)
                            <span class="badge text-bg-success">Admin</span>
                            @else
                            <span class="badge text-bg-primary">User</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex">
                                <form action="{{route('pengguna.destroy', $data->id)}}" method="post">
                                    <a href="{{route('pengguna.edit', $data->id)}}"
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