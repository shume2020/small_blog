@extends('layouts.layouts')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                    {{--Welcome{{$users->name}} wait until the user authenticates--}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
