
{{--<div class="panel-group category-products" id="accordian" ><!--category-productsr-->--}}
    {{--<div class="brands-name">--}}


<div class="panel-group" id="accordian" ><!--category-productsr-->
        <h2 style="margin-top: 24px">Category</h2>
        <div class="brands-name" style="background-color: white;border-color: #2ca02c">
            <ul class="nav nav-pills " style="margin: 30px;margin-top: 20px;margin-left: 20px">

                <ul class="nav navbar-top-links navbar-right">

                    @if($categories)
                        @foreach($categories as $category)

                            <li><a href='{{route('welcome.edit',$category->id)}}'> <span class="pull-right color bg-primary"></span>{{$category->name}}<sup>

                                        @if($category->created_at > \Carbon\Carbon::now()->subHours(4))
                                            <i style="background-color: wheat; color: red;align-self: center">latest</i>
                                        @endif


                                    </sup></a>

                            </li>
                            <li class="dropdown">

                      @endforeach

                @endif
                <!-- /.dropdown -->

                </ul>

            </ul>

        </div>
        </div><!--/brands_products-->
   {{--@endif--}}
<div class="shipping text-center"><!--shipping-->
    {{--<img src="{{asset('images/main/2.png')}}" alt="" />--}}
</div><!--/shipping-->