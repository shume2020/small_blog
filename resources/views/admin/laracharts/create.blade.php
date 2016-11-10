@extends('layouts.admin')

@section('content')

    <h3 align="center">Geocharts using laravel</h3>
    <div id="perf-div" style="width:1000px; border: #ecffbe solid; background-color: #ecffbe"></div>
    {{--<div id="pop-div" style="width:1000px; border: #ecffbe solid; background-color: #ecffbe"> </div>--}}

    <?= $lavas->render('GeoChart', 'Our Service Users', 'perf-div') ?>

        <hr>


@endsection

@section('footer')



    @stop