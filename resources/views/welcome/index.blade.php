@extends('layouts.layouts')

@section('content')


    <div id="perf-div" style="width:80%;margin-left: 19px"></div>


    <h3 align="center">Our users description using areachart</h3>

    <?= $lava->render('AreaChart', 'Popularity', 'perf-div') ?>
    <hr>
    <a  class="fa fa-backward" href="{{url('/service')}} " style="align-self: center" >back</a>
@endsection

@section('footer')

    {{--<h5>Charts page</h5>--}}
    {{----}}
@stop