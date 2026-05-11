@extends('main')
@section('title', 'BALZEDD PEMILIK PEMEROGRMAN WEB')
@section('content')
<a href="{{ route('fakultas.create') }}" class="btn btn-primary">Tambah</a>
<table class="table
table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Fakultas</th>
            <th>Singkatan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($result as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama_fakultas }}</td>
            <td>{{ $item->singkatan }}</td>
            <td>
                <a href="{{ route('fakultas.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('fakultas.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

