@extends('main')
@section('title', 'BALZEDD PEMILIK PEMEROGRMAN WEB')
@section('content')
<a href="{{ route('periode.create') }}" class="btn btn-primary">Tambah</a>
<table class="table
table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Periode</th>
            <th>Tahun Ajaran</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($result as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->tahun_akademik }}</td>
            <td>{{ $item->semester }}</td>
            <td>
                <a href="{{ route('periode.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('periode.destroy', $item->id) }}" method="POST" style="display:inline-block;">
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
