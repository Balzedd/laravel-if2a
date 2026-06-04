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
                <a href="{{ route('periode.edit', $item->id) }}" class="btn btn-xs btn-info btn-rounded"
                            data-toggle="tooltip" title='Edit'>Ubah</a>

                        <form method="POST" action="{{ route('periode.destroy', $item->id) }}" class="d-inline">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-xs btn-danger btn-rounded show_confirm"
                                data-toggle="tooltip" title='Delete' data-nama='{{ $item->tahun_akademik }}'>Hapus</button>
                        </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
