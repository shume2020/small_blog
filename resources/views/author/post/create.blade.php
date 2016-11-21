@extends('layouts.layouts')

@section('content')
    <h3 style="margin-left: 175px;
    margin-top: -18px;"> <i>Author Posts Creating page!</i></h3>
 <div style="margin: 108px; margin-top: -12px;">
        {!! Form::open(['method'=>'POST','action'=>'AuthorPostsController@store','files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('title','Title:') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}


        </div>

        <div class="form-group">
            {!! Form::label('category_id','Category') !!}
            {!! Form::select('category_id',[''=>'Choose the categories']+$categories,null,['class'=>'form-control']) !!}
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

            {!! Form::submit('Create Post',['class'=>'btn btn-primary']) !!}

        </div>
        {!! Form::close() !!}
 </div>
    @include('includes.form_errors')

@endsection