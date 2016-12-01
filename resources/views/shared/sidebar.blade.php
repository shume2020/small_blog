
{{--<div class="panel-group category-products" id="accordian" ><!--category-productsr-->--}}
    {{--<div class="brands-name">--}}


<div class="panel-group" id="accordian" ><!--category-productsr-->
        <h2 style="margin-top: 34px">Category</h2>
        <div class="brands-name">
            <ul class="nav nav-pills " style="margin: 30px;margin-top: -40px;margin-left: -10px">

                <ul class="nav navbar-top-links navbar-right">

                    @if($categories || $posts)
                        @foreach($categories as $category)

                            @foreach($posts as $post)
                                @if($post->category->name==$category->name)
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    {{$category->name}}<i class="fa fa-caret-down"></i>
                                </a><br>


                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="{{route('home.post',$post->id)}}"><i class=" "></i>    {{ $post->title}} </a>
                                    </li><br/>
                                    @endif

                                    @endforeach
                                    {{--<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="#"><i class="fa fa-gear fa-fw"></i> Role {{Auth::user()->role->name}}</a>--}}
                                    {{--</li>--}}
                                    {{--<li class="divider"></li>--}}
                                    {{--<li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>--}}
                                    {{--</li>--}}
                                </ul>
                                <!-- /.dropdown-user -->
                            </li><br/>

                    @endforeach

                @endif
                <!-- /.dropdown -->

                </ul>

                    {{--@if($posts)--}}
                            {{--@foreach($posts as $post)--}}

                                    {{--<li><a href='{{route('home.post',$post->id)}}'> <span class="pull-right color bg-primary"></span>{{$post->category->name}}<tab> ..</tab>{{str_limit($post->created_at->diffForHumans(),10)}}</a></li>--}}

                            {{--@endforeach--}}
                    {{--@endif--}}
                            {{--{{$posts->render()}}--}}
            </ul>

        </div>
        </div><!--/brands_products-->
   {{--@endif--}}
<div class="shipping text-center"><!--shipping-->
    {{--<img src="{{asset('images/main/2.png')}}" alt="" />--}}
</div><!--/shipping-->