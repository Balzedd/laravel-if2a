@extends('main')

@section('title', 'Tambah Mahasiswa')

@section('content')
<form action="{{ route('mahasiswa.store') }}" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">NPM</label>
        <input type="text"
        name="npm" class="form-control" value="{{ old('npm') }}">
    </div>
    @error('npm')
    <div class="alert alert-danger">{{ 
    $message }}</div>@enderror
    
    <div class="form-group">
        <label for="">Nama</label>
        <input type="text"
         name="nama" id="" class="form-control" value="{{ old('nama') }}">
    </div>
    @error('nama')
    <div class="alert alert-danger">{{
     $message }}</div>@enderror

      <div class="form-group">
        <label for="">foto</label>
        <input type="file"
         name="foto" id="" class="form-control" value="{{ old('foto') }}">
    </div>
    @error('foto')
    <div class="alert alert-danger">{{
     $message }}</div>@enderror

      <div class="form-group">
        <label for="">Program Studi</label>
        <select name="prodi_id" id="" class="form-control">
            <option value="">Pilih Program Studi</option>
            @foreach ($prodis as $row)
                <option value="{{ $row->id }}" {{ old('prodi_id') == $row->id ? 'selected' : '' }}>
                    {{ $row->nama_prodi }}
                </option>
            @endforeach
        </select>
    </div>
    @error('prodi_id')
    <div class="alert alert-danger">{{
     $message }}</div>@enderror

     <button type="submit" class="btn btn-primary">Simpan</button>
</form>
   
@endsection