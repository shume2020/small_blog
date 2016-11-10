@extends('layouts.admin')

@section('content')


    <div id="perf-div" style="width:1000px; border: #ecffbe solid;margin-top:195px;background-color: #ecffbe"></div>


    <h3 align="center">Area charts using laravel</h3>

    {{--<div id="pop-div" style="width:1000px; border: #ecffbe solid; background-color: #ecffbe"> </div>--}}

    <?= $lava->render('AreaChart', 'Popularity', 'perf-div') ?>


    <hr>


@endsection

@section('footer')

    {{--<h5>Charts page</h5>--}}
{{----}}
@stop