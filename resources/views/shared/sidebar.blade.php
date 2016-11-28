
<div class="panel-group category-products" id="accordian" ><!--category-productsr-->
    {{--<div class="panel panel-default">--}}
        {{----}}
        {{--<ul class="nav nav-pills nav-stacked" style="margin-top: -43px">--}}


        {{--@if($posts)--}}
            {{--@foreach($posts as $post)--}}
                {{--<li><a href='{{route('home.post',$post->id)}}'> <span class="pull-right color bg-primary"></span>{{$post->category->name}}</a></li>--}}
            {{--@endforeach--}}
            {{--@endif--}}
        {{--</ul>--}}
    {{--</div>--}}
<h2 style="margin-top: 34px">Category</h2>
<div class="brands-name">
    <ul class="nav nav-pills nav-stacked" style="margin: 30px;margin-top: -40px">
        @if($posts)
            @foreach($posts as $post)

                <li><a href='{{route('home.post',$post->id)}}'> <span class="pull-right color bg-primary"></span>{{$post->category->name}}</a></li>

            @endforeach
        @endif
    </ul>
</div>
</div><!--/category-products-->

<div class="brands_products"><!--brands_products-->
    <h2 style="margin-top: -36px">Post Lists</h2>
    <div class="brands-name">
        <ul class="nav nav-pills nav-stacked" style="margin: 34px;margin-top:-41px">
            @if($posts)
                @foreach($posts as $pos)

                    <li><a href='{{route('home.post',$pos->id)}}'> <span class="pull-right color bg-primary"></span>{{str_limit($pos->title,10)}}</a></li>

                    @endforeach
                @endif
        </ul>
    </div>
</div><!--/brands_products-->

<div class="shipping text-center"><!--shipping-->
    {{--<img src="{{asset('images/main/2.png')}}" alt="" />--}}
</div><!--/shipping-->