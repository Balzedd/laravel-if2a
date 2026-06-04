@extends('main')

@section('title', 'Tambah Program Studi')

@section('content')
<form action="{{ route('prodi.store') }}" method="post">
    <div class="form-group">
        <label for="">Nama Prodi</label>
        <input type="text"
        name=nama_prodi class="form-control" value="{{ old('nama_prodi') }}">
    </div>
    @error('nama_prodi')
    <div class="alert alert-danger">{{ 
    $message }}</div>@enderror
    
    <div class="form-group">
        <label for="">Singkatan</label>
        <input type="text"
         name="singkatan" id="" class="form-control" value="{{ old('singkatan') }}">
    </div>
    @error('singkatan')
    <div class="alert alert-danger">{{
     $message }}</div>@enderror

      <div class="form-group">
        <label for="">Kaprodi</label>
        <input type="text"
         name="kaprodi" id="" class="form-control" value="{{ old('kaprodi') }}">
    </div>
    @error('kaprodi')
    <div class="alert alert-danger">{{
     $message }}</div>@enderror

      <div class="form-group">
        <label for="">fakultas_id</label>
        <select name="fakultas_id" id="" class="form-control">
            <option value="">Pilih Fakultas</option>
            @foreach ($fakultas as $row)
                <option value="{{ $row->id }}" {{ old('fakultas_id') == $row->id ? 'selected' : '' }}>
                    {{ $row->nama_fakultas }}
                </option>
            @endforeach
        </select>
    </div>
    @error('fakultas_id')
    <div class="alert alert-danger">{{
     $message }}</div>@enderror

     <button type="submit" class="btn btn-primary">Simpan</button>
</form>
   
@endsection