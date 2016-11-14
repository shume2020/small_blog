@extends('layouts.blog-post')


@section('content')


    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{URL::to('/images/' . $post->photo->file)}}" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead">{!! nl2br(e($post->body)) !!}</p>


    {{--<p class="lead">Catagory   <tab>  </tab>{{$post->category->name}}</p>--}}
    <hr>

    @if(\Illuminate\Support\Facades\Session::has('comment_message'))

        <p class="bg-success">{{session('comment_message')}}</p>



        @endif

    <!-- Blog Comments -->

    @if(Auth::check())

    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>

        {!! Form::open(['method'=>'POST','action'=>'PostCommentsController@store']) !!}

            <input type="hidden" name="post_id" value="{{$post->id}}">
        <input type="hidden" name="author" value="{{$post->user->name}}">
           
            <div class="form-group">
                {!! Form::label('body','Body:') !!}
                {!! Form::textarea('body',null,['class'=>'form-control','rows'=>3]) !!}


            </div>
            <div class="form-group">

                {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}

            </div>
              {!! Form::close() !!}



    </div>
    @endif

    <hr>

    <!-- Posted Comments -->
    @if(count($comments)>0)
        @foreach($comments as $comment)

            <div class="media">
                     <a class="pull-left" href="#">
                     <img class="media-object" height="64" src={{URL::to('/images/' . $post->user->photo->file)}}>

                      </a>
                <div class="media-body">
                            <h4 class="media-heading">{{$comment->title}} By {{$comment->author}}
                                <small>{{$comment->updated_at}}</small>
                            </h4>
                            <p>{{$comment->body}}</p>

                        <!-- Nested Comment -->
                       @if(count($comment->replies)>0)

                           @foreach($comment->replies as $reply)

                              @if($reply->is_active==1)


                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object" height="64" src={{URL::to('/images/' . $reply->photo->file)}}>
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$reply->title}} By {{$reply->author}}
                                            <small>{{$reply->updated_at}}</small>
                                        </h4>
                                      <p>{{$reply->body}}</p>
                                    </div>
                                    {!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@createReply']) !!}

                                    <div class="form-group">
                                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                        {!! Form::label('body','Body:') !!}
                                        {!! Form::textarea('body',null,['class'=>'form-control','rows'=>1]) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
                                    </div>
                                    {!! Form::close() !!}



                                 </div>
                               @endif
                             @endforeach
                           @endif


                        <!-- End Nested Comment -->

                </div>
            </div>
        @endforeach
    @endif


    <!-- Comment -->





    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="media">--}}
    {{--<a class="pull-left" href="#">--}}
    {{--<img class="media-object" height="50" src={{URL::to('/images/' . $post->user->photo->file)}}--}}
    {{--</a>--}}
    {{--<div class="media-body">--}}
    {{--<h4 class="media-heading">Start Bootstrap--}}
    {{--<small>August 25, 2014 at 9:30 PM</small>--}}
    {{--</h4>--}}
    {{--{{$comment->body}}--}}
    {{--<!-- Nested Comment-->--}}
    {{--@if(count($comment->replies)>0)--}}


    {{--@foreach($comment->replies as $reply)--}}

    {{--@if($reply->is_active == 1)--}}

    {{--<div class="media">--}}
    {{--<a class="pull-left" href="#">--}}
    {{--<img height="50" class="media-object" src="{{URL::to('/images/' . $reply->photo->file)}}"--}}
    {{--</a>--}}
    {{--<div class="media-body">--}}
    {{--<h4 class="media-heading">{{$reply->author}}--}}
    {{--<small>{{$reply->created_at->diffForHumans()}}</small>--}}
    {{--</h4>--}}
    {{--{{$reply->body}}--}}

    {{--</div>--}}
    {{--</div>--}}
    {{--<h4 class="media-heading">--}}
    {{--<small>{{$reply->created_at->diffForHumans()}}</small>--}}
    {{--</h4>--}}

    {{--<small>{{$reply->updated_at}}</small>--}}


    {{--@endif--}}


    {{--@endforeach--}}



    {{--@endif--}}
    {{--</div>--}}
    {{--@endforeach--}}
    {{--@endif--}}


   <!-- Comment -->


   <!-- Posted Comments -->

   {{--<!-- Comment -->--}}
         {{--<div class="media">--}}
            {{--<a class="pull-left" href="#">--}}
                {{--<img class="media-object" height="50" src={{URL::to('/images/' . $post->user->photo->file)}} alt="">--}}
                {{--<img class="media-object" height="50" src={{Auth::user()->gravatar}} alt="">--}}

            {{--</a>--}}
            {{--<div class="media-body">--}}
                {{--<h5 class="media-heading">{{$comment->title}} By {{$comment->author}}--}}
                    {{--<small>{{$comment->updated_at}}</small>--}}

                {{--</h5>--}}
                {{--<p>{{$comment->body}}</p>--}}
                {{--<!-- Nested Comment -->--}}
                {{--@if(count($comment->replies)>0)--}}

                    {{--@foreach($comment->replies as $reply)--}}
                        {{--@if($reply->is_active == 1)--}}
                     {{--<div class="media">--}}
                        {{--<a class="pull-left" href="#">--}}
                        {{--<img height="50" class="media-object" src="{{URL::to('/images/' . $reply->photo->file)}}" alt="">--}}
                        {{--<img class="media-object" height="40" src={{URL::to('/images/' . $post->photo->file)}} alt="">--}--}}
                        {{--</a>--}}
                        {{--<div class="media-body">--}}
                            {{--<h4 class="media-heading">--}}
                                {{--<h4 class="media-heading">{{$reply->author}}--}}
                                    {{--<small>{{$reply->created_at->diffForHumans()}}</small>--}}
                                {{--</h4>--}}

                                {{--<small>{{$reply->updated_at}}</small>--}}

                            {{--</h4>--}}
                            {{--<div class="comment-reply-container">--}}
                                {{--{{$reply->body}}--}}
                            {{--<div class="comment-reply col-sm-6"  >--}}
                            {{--{!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@createReply']) !!}--}}
                                {{--<button class="toggle-reply btn btn-info pull-right">Reply</button>--}}
                            {{--<div class="form-group">--}}

                                {{--<input type="hidden" name="comment_id" value="{{$comment->id}}">--}}
                                {{--<input type="hidden" name="author" value="{{$comment->user->name}}">--}}
                                {{--<input type="hidden" name="author" value="{{$comment->author}}">--}}
                                {{--{!! Form::label('body','Body:') !!}--}}



                                {{--{!! Form::textarea('body',null,['class'=>'form-control','rows'=>1]) !!}--}}


                            {{--</div>--}}
                            {{--{{$reply->body}}--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                    {{--</div>--}}

                        {{--@endif--}}
                      {{--@endforeach--}}
                {{--@endif--}}
                {{--<!-- End Nested Comment -->--}}
                {{--@if(count($comment->replies)>0)--}}

                    {{--@foreach($comment->replies as $reply)--}}

                        {{--<!-- Nested Comment -->--}}
                        {{--@if($reply->is_active == 1)--}}

                        {{--<div id="nested-comment" class="media">--}}
                            {{--<a class="pull-left" href="#">--}}
                                {{--<img class="media-object" height="40" src={{URL::to('/images/' . $user->photo->file)}} alt="">--}}
                            {{--</a>--}}
                            {{--<div class="media-body">--}}
                                {{--<h4 class="media-heading">{{$reply->author}}--}}
                                    {{--<small>{{$reply->created_at->diffForHumans()}}</small>--}}
                                {{--</h4>--}}
                                {{--<p>{{$reply->body}}</p>--}}
                            {{--</div>--}}

                            {{--<div class="comment-reply-container">--}}
                                {{--<button class="toggle-reply btn btn-primary pull-right">Reply</button>--}}

                                {{--<div class="comment-reply col-sm-6"  >--}}
                                    {{--{!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@createReply']) !!}--}}
                                    {{--<div class="form-group">--}}

                                        {{--<input type="hidden" name="comment_id" value="{{$comment->id}}">--}}
                                        {{--<input type="hidden" name="author" value="{{$comment->user->name}}">--}}
                                        {{--<input type="hidden" name="author" value="{{$comment->author}}">--}}
                                        {{--{!! Form::label('body','Body:') !!}--}}
                                        {{--{!! Form::textarea('body',null,['class'=>'form-control','rows'=>1]) !!}--}}
                                    {{--</div>--}}

                                    {{--<div class="form-group">--}}

                                        {{--{!! Form::submit('submit',['class'=>'btn btn-primary']) !!}--}}

                                    {{--</div>--}}
                                    {{--{!! Form::close() !!}--}}
                                {{--</div>--}}
                            {{--</div>--}}


                        {{--</div>--}}
                            {{--@endif--}}
                        {{--@endforeach--}}



                  {{--@else--}}
                    {{--<h1>No comments</h1>--}}



                   {{--@endif--}}

                {{--<!-- End Nested Comment -->--}}
            {{--</div>--}}
         {{--</div>--}}
        {{--@endforeach--}}
{{--@endif--}}


@stop

@section('scripts')

    <script>

        $(".comment-reply-container .toggle-reply").click(function () {
            $(this).next().slideToggle("slow");

        });



    </script>

@stop