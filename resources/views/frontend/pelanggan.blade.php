@extends('frontend.layout')
@section('content')
<h1>{{ Auth::user()->nama_pelanggan}}</h1>
@endsection