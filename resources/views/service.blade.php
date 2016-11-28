@extends('layouts.layouts')

@section('content')
    <h1 style="margin-left: 100px">Services Lists</h1>
    <table class="table" style="margin-left: 100px;margin-right: 10px; width: 80%">
        <thead>
        <tr>
            <th>Service title</th>
            <th>Service Description</th>
            <th>Service location</th>
            <th>Contact address</th>
        </tr> </thead>
    @if(count($users)>0)

       @foreach($users as $user)
                 <tr class="success">
                   <td>{{$user->title}}</td>
                   <td>{{str_limit($user->description),10}}</td>
                   <td>{{$user->location}}</td>
                     <td>{{$user->contact}}</td>
                 </tr>
           @endforeach

        </table>
    <div class="row">
        <div class="col-sm-10 col-md-offset-5" >
            {{$users->render()}}
        </div>

    </div>

    @endif



    <hr>
    <h3 align="center">Our service users description in different countries using chart
    </h3>
    <div class="row">
        <div class="col-sm-10 col-md-offset-5" >
            <a class="fa fa-stack-exchange" href="{{route('welcome.index')}}">our service users by areachart</a><br/>
            <a  class="fa fa-stack-exchange" href="{{route('welcome.create')}}">our service users by geochart</a>


    {{--@include('welcome.index')--}}
        </div>

    </div>


    @endsection