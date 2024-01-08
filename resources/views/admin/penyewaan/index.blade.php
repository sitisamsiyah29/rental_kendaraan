@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark">
                    <th>No</th>
                    <th>Nama Pengguna</th>
                    <th>Merek Kendaraan</th>
                    <th>Model Kendaraan</th>
                    <th>No Telepon Pengguna</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($penyewaan as $data)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$data->pengguna->nama}}</td>
                        <td>{{$data->kendaraan->merek}}</td>
                        <td>{{$data->kendaraan->model}}</td>
                        <td>{{$data->pengguna->no_telepon}}</td>
                        <td>
                            <div class="d-flex">
                                <form action="{{route('penyewaan.update', $data->id)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="status" value="1" hidden>
                                    <button type="submit" class="btn btn-sm btn-success rounded-2 mx-1">Terima</button>
                                </form>
                                <form action="{{route('penyewaan.update', $data->id)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="status" value="0" hidden>
                                    <button type="submit" class="btn btn-sm btn-danger rounded-2 mx-1">Tolak</button>
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