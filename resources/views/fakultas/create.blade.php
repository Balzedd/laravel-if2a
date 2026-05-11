@extends('main')

@section('title', 'tambah fakultas')

@section('content')
<form action="{{ route('fakultas.store') }}" method="post">
    <div class="form-group">
        <label for="">Nama Fakultas</label>
        <input type="text"
        name=nama_fakultas class="form-control" value="{{ old('nama_fakultas') }}">
    </div>
    @error('nama_fakultas')
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

     <button type="submit" class="btn btn-primary">Simpan</button>
</form>
   
@endsection