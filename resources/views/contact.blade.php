


@extends('layouts.layouts')

@section('content')
    <div style="margin-left: 364px">
    <h3>Contact us</h3>
    <ul class="errors alert-danger" style="width: 40%" >

        @foreach($errors->all() as $error)

            <li>{{$error}}</li>
            @endforeach

            @if(Session::has('message'))
                <div class="alert-success">
                    {{Session::get('message')}}
                </div>
            @endif
    </ul></div>
    {!! Form::open(['method'=>'POST','action'=>'AboutController@store','files'=>true]) !!}
    <table style=" align-self: center;width: 50%; margin-left: 300px;">

          <tr><td><div class="form-group">
                    {!! Form::label('name','Name') !!}
                    {!! Form::text('name',null,['class'=>'form-control']) !!}
                </div></td></tr>
            <td>
                <div class="form-group">
                    {!! Form::label('from','From') !!}
                    {!! Form::text('from',null,['class'=>'form-control']) !!}
                </div></td>
              </tr>
          <tr>
            <td><div class="form-group">
                    {!! Form::label('subject','Subject') !!}
                    {!! Form::text('subject',null,['class'=>'form-control']) !!}
                </div></td>
              </tr>
        <tr>
              <td>
              <div class="form-group">
              {!! Form::label('body','Body') !!}
              {!! Form::textarea('body',null,['class'=>'form-control','rows'=>6]) !!}
              </div>
              </td>

          </tr>
          <tr >
            <td><div>

                    {!! Form::submit('Send',['class'=>'btn btn-primary']) !!}

                </div></td>
          </tr>
      </table>





{!! Form::close() !!}

    @endsection


