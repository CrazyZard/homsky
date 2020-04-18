@extends('manage.layout.app')

@section('content')
    <iframe src='{{route('manage.home.env')}}' frameborder="0" scrolling="yes" class="x-iframe"></iframe>
@endsection