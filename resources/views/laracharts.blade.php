@extends('layouts.admin')

@section('content')
<div class="col-sm-6" style="width: 80%; margin-left: -148px;">

    <h1 align="center">Geocharts using laravel</h1>
</div>
<div id="pov-div" style="width: 80%;" class="col-sm-9 col-sm-offset-5" ></div>

<?= $lava->render('GaugeChart', 'Popularity', 'pov-div') ?>


@endsection




