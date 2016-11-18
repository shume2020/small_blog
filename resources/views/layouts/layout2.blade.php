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


<header id="header"><!--header-->
    <div class="header_top" style=" margin-left: -77px;"> <!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6" >
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

    <div class="header-middle pull-right" style="margin-right: -60px;margin-top: -27px;"><!--header-middle-->
        <div class="container pull-right" >
            <div class="row">
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-user"></i> {{Auth::check() ? Auth::user()->name : 'Account'}}</a></li>
                            <li><a href="{{url('/register')}}"><i class="fa fa-crosshairs"></i>{{Auth::check()? 'Registered':'Register'}}</a></li>
                            <li><a href="{{url('/home')}}"><i class="fa fa-coffee"></i>Service</a></li>
                            <li><a href="{{Auth::check() ? url('/logout') : url('/login')}}"><i class="fa fa-lock"></i> {{Auth::check() ? 'Logout' : 'Login'}}</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container" style="    margin-left: -1px;margin-top: -15px;">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{url('')}}" class="active">Home</a></li>
                            <li><a href="{{url('products')}}" >Products</a></li>
                            <li><a href="{{url('blog')}}">Blog</a></li>
                            <li><a href="{{url('contact-us')}}" >Contact Us</a></li>

                        </ul>
                    </div>
                </div>

             </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

    <div class="container">

            <div class="row">

                <!-- Blog Post Content Column -->
                <div class="col-lg-8">

                    @yield('content')

                 </div>

                <!-- Blog Sidebar Widgets Column -->
                <div class="col-md-4" style="margin-right: -500px">

                    <!-- Blog Search Well -->
                    <div class="well">
                        <h4>Blog Search</h4>
                        <div class="input-group">
                            <form action="/search" method="POST" role="search">
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

                    <!-- Blog Categories Well -->
                    <div class="well">
                        <h4>Blog Categories</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled">
                                    <li><a href="#">{{$post->category ? $post->category->name:'uncatagorized'}}</a>
                                    </li>
                                    {{--<li><a href="#">{{$post->category ? $post->category->name:'uncatagorized'}}</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="#">{{$post->category ? $post->category->name:'uncatagorized'}}</a>--}}
                                    {{--</li>--}}
                                </ul>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>

                    <!-- Side Widget Well -->
                    <div class="well">
                        <h4>Date</h4>
                        <p>{{\Carbon\Carbon::Now('Japan')}}</p>
                    </div>

                </div>

            </div>
    </div>

<footer id="footer" style="    margin-right: -40px;margin-left: -10px;margin-top: 400px"><!--Footer-->
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
                        <p>This is the blog page that we post our issues freely!</p>
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
</footer>


<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('js/price-range.js')}}"></script>
<script src="{{asset('js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>


