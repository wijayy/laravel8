@extends('layout.main')

@section('container')
    <h2>{{ $name }}</h2>
    <h6>
        <a href="http://{{ $site }}">Site</a>
    </h6>
    <img src="img/{{ $img }}" alt="" srcset="">
@endsection
