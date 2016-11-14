@extends('layouts.admin')

@section('content')


    <h1>Edit Users!</h1>
    <div class="row">



                <div class="col-sm-3">


                    <img src="{{$user->photo? URL::to('/images/' . $user->photo->file):URL::to('/images/1478243356sample_01.jpg')}}" alt="Just Sample Change yours!" class="img-responsive img-rounded">

                </div>

                <div class="col-sm-9">



                    {!! Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=>true]) !!}

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
                            {!! Form::select('role_id', $roles,null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">

                            {!! Form::label('is_active','Status') !!}
                            {!! Form::select('is_active',array(1=>'Active' ,0=>'Not Active',3=>'Unknown'),0,['class'=>'form-control']) !!}
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

                            {!! Form::label('password','Password') !!}
                            {!! Form::password('password',null,['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Update Users',['class'=>'btn btn-primary']) !!}
                            {{--{!! Form::submit('Delete Users',['class'=>'btn btn-primary']) !!}--}}
                            {!! Form::close() !!}
                            {!! Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id],'class'=>'pull-right']) !!}

                            <div class="form-group">

                                {!! Form::submit('Delete Users!',['class'=>'btn btn-danger']) !!}

                            </div>
                            {!! Form::close() !!}
                        </div>

                    </div>
                </div>


    </div>

    <div class="row">
        @include('includes/form_errors')

    </div>




@endsection