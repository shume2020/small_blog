@extends('layouts.admin')


@section('content')

<div class="row">
   <div class="col-sm-6"> <h3>Media page</h3>
   </div>

    <div class="col-sm-6">
        <div class="search_box pull-right">
            <form action="/media" method="POST" role="search">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" name="q"
                           placeholder="Search media"> <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                <span class="glyphicon glyphicon-search"></span>
                                 </button>
                                </span>
                </div>
            </form>
        </div>
    </div>
</div>
@if(Session::has('media_downloded'))
  <p class="bg-info pull-right" >{{session('media_downloded')}}</p>

  @endif
    @if($photos)

    <table class="table" style="width: 95%">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
              <th>Photo</th>
            <th>created at</th>
              <th>Updated    at      </th>
              <th>Download</th>
              <th>Delete</th>

          </tr>
        </thead>
        <tbody>

        @foreach($photos as $photo)
          <tr class="bg-info">
              <td>{{$photo->id}}</td>
               <td><a href="{{route('admin.media.index')}}">{{$photo->file}}</a></td>
                {{--<td><img src="{{public_path().$photo->file}}" alt="">--}}
                    <td><img src="{{ URL::to('/images/' . $photo=='image/x-jg')? URL::to('/images/' . $photo->file):"Applications" }}" height="50"  alt="{{ $photo->file }}" /></td>
               <td>{{str_limit($photo->created_at?$photo->created_at->diffForHumans():'no date',6)}}</td>
               <td>{{str_limit($photo->updated_at?$photo->updated_at->diffForHumans():'No date',6)}}</td>
              <td> <a href="/admin/download/{{$photo->file}}"  class="btn btn-large pull-right"><i class="fa fa-download"> </i> Download </a></td>
              {{--<td>--}}

              {{--{!! Form::open(['method'=>'PATCH','action'=>'AdminMediasController@download']) !!}--}}

              {{--<div class="form-group">--}}

                  {{--{!! Form::submit('Download',['class'=>'btn primary']) !!}--}}

              {{--</div>--}}

              {{--{!! Form::close() !!}--}}
              {{--</td>--}}
              {{--<td>{!! Form::open(['method'=>'PATCH','action'=>['AdminMediasController@getDownload',$photo->id]]) !!}--}}

                  {{--<div class="form-group">--}}

                      {{--{!! Form::submit('Download',['class'=>'btn btn-primary']) !!}--}}


                  {{--</div>--}}
                  {{--{!! Form::close() !!}</td>--}}
               <td>
                  {!! Form::open(['method'=>'DELETE','action'=>['AdminMediasController@destroy',$photo->id]]) !!}

                      <div class="form-group">

                          {!! Form::submit('Delete Photo',['class'=>'btn btn-danger']) !!}

                      </div>
                        {!! Form::close() !!}
               </td>
          </tr>
        @endforeach
        </tbody>
      </table>


@endif

<div class="row">

    <div class="col-sm-8 col-sm-offset-3">

        {{$photos->render()}}
    </div>
    <div class="row">
{{--videos--}}
        {{--<iframe width="560" height="315" src="https://www.youtube.com/embed/iZQQvkmAwwo" frameborder="0" allowfullscreen></iframe>    </div>--}}
{{----}}
</div>
    @endsection
