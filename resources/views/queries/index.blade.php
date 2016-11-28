

@extends('layouts.layouts')
@section('content')
@if($pots)


    @foreach($pots as $post)

        {{$post->title}}



      @endforeach
    @endif

@endsection