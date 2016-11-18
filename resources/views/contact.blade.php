


@extends('layouts.layouts')

@section('content')
    {!! Form::open(['method'=>'POST','action'=>'AdminPostsController@store','files'=>true]) !!}
    <table style=" align-self: center;width: 50%; margin-left: 300px;">

          <tr><td><div class="form-group">
                    {!! Form::label('to','To') !!}
                    {!! Form::text('to',null,['class'=>'form-control']) !!}
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
              {!! Form::label('body','Message') !!}
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


