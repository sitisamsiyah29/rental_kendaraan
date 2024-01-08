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
                                <form action="{{route('selesaikan', $data->id)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                        class="btn btn-sm btn-success rounded-2 mx-1">Selesaikan</button>
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