@extends('layouts.admin')



@section('content')
    <div class="container" style="width: 100%">
        @if(Auth::check())
            @if(isset($details))
                <p> The Search results for your query <b> {{ $query }} </b> are :</p>
                <h3>Searched user details</h3>
                <table class="table table-bordered bg-info">
                    <thead>
                    <tr>
                        <th>Users ID</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created by</th>

                        <th>Created at</th>
                        <th>Updated at</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($details as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>
                                <img height="10" width="30" src="{{$user->photo? URL::to('/images/' .$user->photo->file):URL::to('/images/1478243356sample_01.jpg')}}" alt="" class="img-responsive img-rounded">
                            </td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role->name}}</td>
                            <td>{{$user->created_at->diffForHumans()}}</td>
                            <td>{{$user->updated_at->diffForHumans()}}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-5">
                        {{$details->render()}}

                    </div>
                    @else
                        <h4 STYLE="text-align: left; font-style: oblique;color: #2e6da4">...no search result!</h4>
                        {{--{{$message}}--}}
                    @endif
                    @else
                        <h4 class="bg-warning pull-right" style="font-style: italic">Please login first</h4>
                    @endif

@endsection
