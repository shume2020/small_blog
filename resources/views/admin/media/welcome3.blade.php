@extends('layouts.admin')



@section('content')
    <div class="container">
        @if(Auth::check())
            @if(isset($details))
                <p> The Search results for your query <b> {{ $query }} </b> are :</p>
                <h2>Searched Media details</h2>
                <table class="table bg-info" style="width: 70%; align-self: center">
                    <thead>
                    <tr>
                        <th>Photo id ID</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Created at</th>
                        <th>Updtaed</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($details as $photo)
                        <tr>
                            <td>{{$photo->id}}</td>
                            <td><img src="{{ URL::to('/images/' . $photo->file) }}" height="50"  alt="{{ $photo->file }}" /></td>
                            <td>{{$photo->file}}</td>
                            <td>{{$photo->created_at->diffForHumans()}}</td>
                            <td>{{$photo->updated_at->diffForHumans()}}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-5">
                        {{$details->render()}}

                    </div>
                    @else
                        <h4 STYLE="text-align: right; font-style: oblique;color: #2e6da4">{{$message}}</h4>
                        {{--{{$message}}--}}
                    @endif
                    @else
                        <h4 class="bg-warning pull-right" style="font-style: italic">Please login first</h4>
                    @endif


    {{--</div>--}}
@endsection
