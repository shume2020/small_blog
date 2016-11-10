@extends('layouts.admin')

@section('content')
<div class="col-sm-6">

    <h1 align="center">Geocharts using laravel</h1>
</div>
<div id="pov-div" style="width:1000px; border: #ff1521 solid; background-color: #9d9d9d ;margin-left: 16px;margin-top: -10px" class="col-sm-9 col-sm-offset-5"></div>

<?= $lava->render('GaugeChart', 'Popularity', 'pov-div') ?>


@endsection




