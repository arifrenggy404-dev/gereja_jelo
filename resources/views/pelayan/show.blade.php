@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header">
        <h3>Detail Pelayan</h3>
    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th width="200">Nama</th>
                <td>{{ $pelayan->nama }}</td>
            </tr>

            <tr>
                <th>Jabatan</th>
                <td>{{ $pelayan->jabatan }}</td>
            </tr>

            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $pelayan->jenis_kelamin }}</td>
            </tr>

            <tr>
                <th>Telepon</th>
                <td>{{ $pelayan->telepon }}</td>
            </tr>

            <tr>
                <th>Alamat</th>
                <td>{{ $pelayan->alamat }}</td>
            </tr>

        </table>

        <a href="{{ route('pelayan.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </div>

</div>

@endsection