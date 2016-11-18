@extends('layouts.layouts')

@section('content')
    <h1 style="margin-left: 100px">Services Lists</h1>
    <table class="table" style="margin-left: 100px;margin-right: 10px;">
        <thead>
        <tr>
            <th>Service title</th>
            <th>Service Description</th>
            <th>contact address</th>
        </tr> </thead>
    @if(count($users)>0)

       @foreach($users as $user)
                 <tr class="info">
                   <td>{{$user->title}}</td>
                   <td>{{str_limit($user->body),10}}</td>
                   <td>{{$user->user->email}}</td>
                 </tr>
           @endforeach

        </table>

    @endif



    @endsection