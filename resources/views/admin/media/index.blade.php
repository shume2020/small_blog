@extends('layouts.admin')


@section('content')
    <h1>Media page</h1>

    @if($photos)

    <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>created</th>
              <th>Updated</th>
          </tr>
        </thead>
        <tbody>

        @foreach($photos as $photo)
          <tr class="success">
              <td>{{$photo->id}}</td>
               <td><a href="{{route('admin.media.index')}}">{{$photo->file}}</a></td>

               <td>{{$photo->created_at?$photo->created_at->diffForHumans():'no date'}}</td>
               <td>{{$photo->updated_at?$photo->updated_at->diffForHumans():'No date'}}</td>
              <td> <a href="/download" class="btn btn-large pull-right"><i class="icon-download-alt"> </i> DownloadFiles </a></td>
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


    @endsection
