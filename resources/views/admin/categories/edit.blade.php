@extends('layouts.admin')


@section('content')


    <h1>All Catagories lists</h1>


    <div class="col-sm-6">



        {!! Form::model($category, ['method'=>'PATCH','action'=>['AdminCategoriesController@update',$category->id]]) !!}
        <div class="form-group">
            {!! Form::label('name','Name:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}


        </div>
        <div class="form-group">

            {!! Form::submit('update categories',['class'=>'btn btn-primary col-sm-6']) !!}

        </div>
        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$category->id]]) !!}
        <div class="form-group">

        </div>
        <div class="form-group">

            {!! Form::submit('Delete category',['class'=>'btn btn-danger col-sm-6']) !!}

        </div>
    </div>

    <div class="col-sm-6">


        {!! Form::close() !!}




    </div>
@endsection