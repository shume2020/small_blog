@extends('layouts.layouts')

@section('content')

    <h3 style="margin-left: 105px;margin-top: -20px"> <i>Author Posts Edit Page!!</i> </h3>
    <div class="row" style="margin: 108px; margin-top: -10px;">

        <div class="col-sm-3">

            <img src="{{URL::to('/images/' . $post->photo->file)}}" alt="" class="img-responsive">


        </div>
        <div class="col-sm-9">

            {!! Form::model($post,['method'=>'PATCH','action'=>['AuthorPostsController@update',$post->id],'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('title','Title:') !!}
                {!! Form::text('title',null,['class'=>'form-control']) !!}


            </div>

            <div class="form-group">
                {!! Form::label('category_id','Category') !!}
                {!! Form::select('category_id',$categories,null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">

                {!! Form::label('created_at','Created_at') !!}
                {!! Form::text('created_at',null,['class'=>'form-control','readonly']) !!}
            </div>

            <div class="form-group">

                {!! Form::label('updatedat','Updated_at') !!}
                {!! Form::text('updated_at',null,['class'=>'form-control','readonly']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id','Photo') !!}
                {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('body','Description') !!}
                {!! Form::textarea('body',null,['class'=>'form-control','rows'=>6]) !!}
            </div>
            <div class="form-group">

                {!! Form::submit('Update Post',['class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}

                {!! Form::open(['method'=>'DELETE','action'=>['AuthorPostsController@destroy',$post->id],'class'=>'pull-right']) !!}

                <div class="form-group">

                    {!! Form::submit('Delete Post!',['class'=>'btn btn-danger']) !!}

                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>


    @include('includes.form_errors')

@endsection