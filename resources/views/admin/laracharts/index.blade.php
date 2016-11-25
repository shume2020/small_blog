@extends('layouts.admin')

@section('content')


    <div id="perf-div" style="width:80%;margin-left: -100px"></div>


    <h3 align="center">Our users description using areachart</h3>

    {{--<div id="pop-div" style="width:1000px; border: #ecffbe solid; background-color: #ecffbe"> </div>--}}

    <?= $lava->render('AreaChart', 'Popularity', 'perf-div') ?>


    <hr>


@endsection

@section('footer')

    {{--<h5>Charts page</h5>--}}
{{----}}
@stop