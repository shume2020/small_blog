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
    <img class="img-responsive" height="10"  width="500" src="{{$post->photo? $post->photo->file : '/images/1477024514HD-White-Pigeon.jpg'}}" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead">{{$post->body}}</p>


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
    <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" height="50" src="/images/1477024514HD-White-Pigeon.jpg" alt="">
        </a>
        <div class="media-body">
            <h5 class="media-heading">{{$comment->title}} By {{$comment->author}}
                <small>{{$comment->updated_at}}</small>

            </h5>
            <p>{{$comment->body}}</p>

            @if(count($comment->replies)>0)

                @foreach($comment->replies as $reply)

            <!-- Nested Comment -->
                            <div id="nested-comment">
                                <a class="pull-left" href="#">
                                    <img class="media-object" height="40" src="/images/1477370871images.jpeg" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{$reply->author}}
                                        <small>{{$reply->updated_at}}</small>
                                    </h4>
                                        <p>{{$reply->body}}</p>
                                </div>

                                <div class="comment-reply-container">
                                    <button class="toggle-reply btn btn-primary pull-right">Reply</button>

                                    <div class="comment-reply" >

                                            {!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@createReply']) !!}
                                                <div class="form-group">
                                                    <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                                    {{--<input type="hidden" name="author" value="{{$comment->user->name}}">--}}
                                                    {{--<input type="hidden" name="author" value="{{$comment->author}}">--}}
                                                    {!! Form::label('body','Body:') !!}
                                                    {!! Form::textarea('body',null,['class'=>'form-control','rows'=>1]) !!}

                                                </div>
                                                <div class="form-group">

                                                    {!! Form::submit('submit',['class'=>'btn btn-primary']) !!}

                                                 </div>
                                            {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>

                 @endforeach
             @endif
            <!-- End Nested Comment -->
        </div>
    </div>
    @endforeach
@endif
    <!-- Comment -->
    {{--<div class="media">--}}
        {{--<a class="pull-left" href="#">--}}
            {{--<img class="media-object" height="50" src="/images/1477370871images.jpeg" alt="">--}}
        {{--</a>--}}
        {{--<div class="media-body">--}}
            {{--<h4 class="media-heading">Replies--}}
                {{--<small>{{$post->updated_at}}</small>--}}
            {{--</h4>--}}


        {{--</div>--}}
    {{--</div>--}}

    @stop

@section('scripts')

    <script>

        $(".comment-reply-container .toggle-reply").click(function () {
            $(this).next().slideToggle("slow");

        });



    </script>

    @stop