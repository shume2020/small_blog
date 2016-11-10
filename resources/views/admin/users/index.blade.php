
{{--use Carbon\Carbon;--}}
@extends('layouts.admin')


@section('content')

    <h1>Users</h1>
    @if(Session::has('Deleted_user'))

        <p class="bg-danger pull-right">{{session('Deleted_user')}}</p>
        {{--@endif--}}
    {{--@elseif(Session::has('updated_user'))--}}

        {{--<p class="bg-info pull-right">{{session('updated_user')}}</p>--}}
        {{--@endif--}}
    {{--@elseif(Session::has('created_user'))--}}

        {{--<p class="bg-success pull-right">{{session('created_user')}}</p>--}}
        {{--@else--}}
        {{--<p class="pull-right">{{session('created_user')}}</p>--}}

        @endif

  <table class="table">
      <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Active</th>
            <th>Created</th>
            <th>Updated</th>

            {{--<th>Password</th>--}}
        </tr>
      </thead>
      <tbody>

      @if($users)

        @foreach($users as $user)
        <tr class="success">
            <td>{{$user->id}}</td>
            {{--<td> <img height="150" width="150" src="{{$user->photo ? public_path('images').$user->photo->file:"/images/1477024514HD-White-Pigeon.jpg"}}" alt="" class="img-responsive img-rounded">--}}
                <td>

                    <img height="10" width="30" src="{{$user->photo? URL::to('/images/' .$user->photo->file):URL::to('/images/1478243356sample_01.jpg')}}" alt="" class="img-responsive img-rounded">
                </td>
            <td><a href="{{route('admin.users.edit',$user->id)}}">{{$user->name}}</a></td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->is_active==1 ?'Active': 'Not Active'}}</td>

            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
            {{--<td>{{$user->password}}</td>--}}
        </tr>

          @endforeach
        @endif

      </tbody>
    </table>


    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
           {{$users->render()}}
        </div>


    </div>
    @endsection