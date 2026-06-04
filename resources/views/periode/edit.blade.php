@extends('main')

@section('title', 'ubah periode')

@section('content')
    <form action="{{ route('periode.update', $periode->id) }}" method="post">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="">Tahun Ajaran</label>
            <input type="text" name="tahun_akademik" class="form-control"
                value="{{ old('tahun_akademik') ?? $periode->tahun_akademik }}">
        </div>
        @error('tahun_akademik')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="">Semester</label>
            <input type="text" name="semester" id="" class="form-control"
                value="{{ old('semester') ?? $periode->semester }}">
        </div>
        @error('semester')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

@endsection
