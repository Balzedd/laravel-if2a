@extends('main')
@section('title', 'BALZEDD PEMILIK PEMEROGRMAN WEB')
@section('content')
<img src="gambar/wony.jpg" alt="" width="200" height="100">
@foreach ($result as $item)
{{$item->nama_fakultas}}-{{$item->singkatan}}<br>    
@endforeach
@endsection

