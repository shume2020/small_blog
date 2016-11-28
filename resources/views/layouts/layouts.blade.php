<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--<meta name="description" content="{{$description}}">--}}
    <meta name="author" content="Rodrick Kazembe">
    <title>Blog Posts</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('css/form.css')}}" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <link href="{{asset('css/libs.css')}}" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="{{asset('js/html5shiv.js')}}"></script>
    <script src="{{asset('js/respond.min.js')}}"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{asset('images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('images/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->
@yield('styles')
<body>





<header id="header"><!--header-->
    <div class="header_top" style="margin-top: -73px"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> 00819063758507</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> shume@key-p.co.jp</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle" style="background-color: palegreen"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{url('')}}"><img src="{{asset('images/main/logo.png')}}" alt="" /></a>
                    </div>
                </div>

                <div class="col-sm-8">
                    <div class="pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-user"></i> {{Auth::check() ? Auth::user()->name : 'Account'}}</a></li>
                            <li><a href="{{url('/register')}}"><i class="fa fa-crosshairs"></i>{{Auth::check()? 'Registered':'Register'}}</a></li>
                            <li><a href="{{url('/home')}}"><i class="fa fa-coffee"></i>Service</a></li>
                            <li><a href="{{Auth::check() ? url('/logout') : url('/login')}}"><i class="fa fa-lock"></i> {{Auth::check() ? 'Logout' : 'Login'}}</a></li>
                            {{--<li><a href="{{ url('/register') }}">{{$post->title}}</a></li>--}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->
    <div>

    </div>

    <div class="header-bottom" style="margin-top: -33px"><!--header-bottom-->
        <div class="container">
            <div class="row" style="background-color: greenyellow">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    @if(Auth::check())
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{url('home')}}" class="active">Home</a></li>
                            <li><a href="{{url('/service')}}">Services</a></li>
                            <li><a href="{{url('/post/1')}}">Blog</a></li>
                            <li><a href="{{url('/contact')}}" >Contact Us</a></li>
                            <li><a href="{{url('/welcome/photolist')}}">Media</a></li>
                                @if(Auth::user()->role->name=='author')
                                <li><a href="{{route('author.post.create')}}">Create Posts</a></li>
                                <li><a href="{{route('author.post.index')}}">Posts</a></li>

                                {{--<a href="{{url('/service')}}"><i class="fa fa-coffee"></i>Service</a>--}}
                                @endif
                            @if(Auth::user()->role->name=='administrator' && Auth::user()->is_active==1)
                                <li><a href="{{route('admin.index')}}">Admin page</a></li>

                                @endif




                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <form action="/posts" method="POST" role="search">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input type="text" class="form-control" name="q"
                                       placeholder="Search Posts"> <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                <span class="glyphicon glyphicon-search"></span>
                                 </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>

                @endif


                </div>


            </div>


            </div>
    </div><!--/header-bottom-->
</header><!--/header-->

@yield('content')

<footer id="footer" style="    margin-right: -140px;margin-left: -140px;margin-top: 300px;margin-bottom: -24px"><!--Footer-->
    <div class="footer-top" >
        <div class="container">
            <div class="row">
            </div>
        </div>
    </div>

    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><span>B</span>-Posts</h2>
                        <p>This is the blog page that we post our issues freely!z<li><a href="#"></a></p>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Service</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Online Help</a></li>
                            <li><a href="#">Contact Us</a></li>

                        </ul>
                    </div>
                </div>


                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Company Information</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Store Location</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="address">
                        <img src="{{asset('images/home/map.png')}}" alt="" />
                        <p>Kobe Sannomiya Motomachi</p>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1 pull-right" style="    margin-top: -160px" >
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Your email address" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Get the most recent updates from <br />our site and be updated your self...</p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © {{date('Y')}} BLOG_POST</p>
                  <span><a target="_blank" href="http://www.shume.com" class="pull-right"> |  Designed by Shume Enjoy</a></span></p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->



<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('js/price-range.js')}}"></script>
<script src="{{asset('js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
</body>
</html>
