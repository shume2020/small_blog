@extends('layouts.admin')

@section('content')


<h1>Create Users!</h1>

                {!! Form::open(['method'=>'POST','action'=>'AdminUsersController@store','files'=>true]) !!}

                     {{csrf_field()}}
                    <div class="form-group">
                        {!! Form::label('name','Name:') !!}
                        {!! Form::text('name',null,['class'=>'form-control']) !!}


                    </div>
                   <div>



                   <div class="form-group">
                       {!! Form::label('email','Email:') !!}
                       {!! Form::text('email',null,['class'=>'form-control']) !!}


                   </div>
                   <div class="form-group">
                       {!! Form::label('role_id','Role') !!}
                       {!! Form::select('role_id',array('' =>'choose from the list')+$roles,null,['class'=>'form-control']) !!}
                       </div>
                       <div class="form-group">

                   {!! Form::label('is_active','Status') !!}
                   {!! Form::select('is_active',array(1=>'Active' ,0=>'Not Active',3=>'Unknown'),0,['class'=>'form-control']) !!}
                   </div>

                   <div class="form-group">

                       {!! Form::label('created_at','Created_at') !!}
                       {!! Form::text('created_at',null,['class'=>'form-control']) !!}
                   </div>

                   <div class="form-group">

                       {!! Form::label('updatedat','Updated_at') !!}
                       {!! Form::text('updated_at',null,['class'=>'form-control']) !!}
                   </div>



                       <div class="form-group">

                       {!! Form::label('photo_id','photo_id') !!}
                       {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
                   </div>

                       <div class="form-group">

                           {!! Form::label('password','Password') !!}
                           {!! Form::password('password',null,['class'=>'form-control']) !!}
                       </div>

                       <div class="form-group">
                    {!! Form::submit('Create Users',['class'=>'btn btn-primary']) !!}

                           </div>
                {!! Form::close() !!}


      @include('includes/form_errors')
    @endsection