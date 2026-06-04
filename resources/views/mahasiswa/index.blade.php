@extends('main')
@section('title', 'BALZEDD PEMILIK PEMEROGRMAN WEB')
@section('content')
    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">Tambah
        Mahasiswa</a>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>NPM</th>
            <th>Nama</th>
            <th>Foto</th>
            <th>Program Studi</th>
            <th>Aksi</th>
        </tr>
        @foreach ($mahasiswas as $key => $mhs)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $mhs->npm }}</td>
                <td>{{ $mhs->nama }}</td>
                <td>
                    @if ($mhs->foto)
                        <img src="{{ asset('storage/fotos/' . $mhs->foto) }}" alt="Foto {{ $mhs->nama }}" width="100">
                    @else
                        <p>Foto tidak tersedia</p>
                    @endif
                </td>
                <td>{{ $mhs->prodi->nama_prodi ?? '-' }}</td>
                <td>
                      <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="btn btn-xs btn-info btn-rounded"
                            data-toggle="tooltip" title='Edit'>Ubah</a>

                        <form method="POST" action="{{ route('mahasiswa.destroy', $mhs->id) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-xs btn-danger btn-rounded show_confirm"
                                data-toggle="tooltip" title='Delete' data-nama='{{ $mhs->nama }}'>Hapus</button>
                        </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
