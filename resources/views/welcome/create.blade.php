@extends('layouts.layouts')

@section('content')


    <div id="perf-div" style="width:80%;margin-left: 130px"></div>
    {{--<div id="pop-div" style="width:1000px; border: #ecffbe solid; background-color: #ecffbe"> </div>--}}

    <?= $lavas->render('GeoChart', 'Our Service Users', 'perf-div') ?>

    <hr>
    <h3 align="center">Our coustomers description using Geocharts </h3>
    <a  class="fa fa-backward" href="{{url('/service')}} " style="align-self: center" >back</a>
@endsection