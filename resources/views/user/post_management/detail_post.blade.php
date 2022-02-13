<!doctype html>
<html class="no-js" lang="zxx">

<!-- Mirrored from d29u17ylf1ylz9.cloudfront.net/boighor-v2/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Aug 2018 23:58:59 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Blog-Details</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/icon.png') }}">

    <!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

    <!-- Main wrapper -->
    <div class="wrapper" id="wrapper">

        <!-- Header -->
        <header id="wn__header" class="oth-page header__area header__absolute sticky__header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-7 col-lg-2">
                        <div class="logo">
                            <a href="{{ route('home.index') }}">
                                <img src="{{ asset('images/logo/logo.png') }}" alt="logo images">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 d-none d-lg-block">
                        <nav class="mainmenu__nav">
                            <ul class="meninmenu d-flex justify-content-start">
                                <li class="drop with--one--item">
                                    <a href="{{ route('home.index') }}">Blog Online</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-8 col-sm-8 col-5 col-lg-3">
                        <ul class="header__sidebar__right d-flex justify-content-between align-items-center">
                            @if (!Auth::check())
                                <li><a href="{{ route('login') }}" class="text-white">Login</a></li>
                                <li><a href="{{ route('register') }}" class="text-white">Register</a></li>
                            @else
                                <li class="text-white">
                                    <i class="fas fa-user"></i><span class="ml-1">{{ Auth::user()->email }}</span>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" class="text-white"
                                        onclick="event.preventDefault();
                                        document.getElementById('form-logout').submit();">
                                        Logout
                                    </a>
                                    <form id="form-logout" action="{{ route('logout') }}" method="post">@csrf</form>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- //Header -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--extra">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">Blog Details</h2>
                            <nav class="bradcaump-content">
                                <a class="breadcrumb_item" href="#">Home</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb_item active">Blog-Details</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <div class="page-blog-details section-padding--lg bg--white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-12">
                        <div class="blog-details content">
                            <article class="blog-post-details">
                                <div class="post-thumbnail">
                                    <img src="{{ asset('storage/storage/' . $post->img) }}" alt="blog images">
                                </div>
                                <div class="post_wrapper">
                                    <div class="post_header">
                                        <h2>{{ $post->title }}</h2>
                                        <div class="blog-date-categori">
                                            <ul>
                                                <li>Updated at: {{ $post->updated_at }}</li>
                                                <li><a href="#">{{ $post->user->email }}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="post_content">{!! $post->content !!}</div>
                                </div>
                            </article>
                            <div class="comments_area">
                                @if (count($comments) == 0)
                                    <h3 class="comment__title"><span class="cmt-count">0</span> comment</h3>
                                @else
                                    <h3 class="comment__title"><span class="cmt-count">{{ count($comments) }}</span> comment</h3>
                                @endif
                                    <ul class="comment__list">
                                        @foreach ($comments as $cmt)
                                            <li>
                                                <div class="wn__comment cmt-display" id="{{ $cmt->id }}">
                                                    <div class="thumb">
                                                        <img src="{{ asset('images/anonymous_user.jpg') }}" alt="comment images">
                                                    </div>
                                                    <div class="content">
                                                        <div class="comnt__author d-block d-sm-flex">
                                                            <span><a href="#">{{ $cmt->user->email }}</a></span>
                                                            <span>{{ $cmt->updated_at }}</span>
                                                            @if (Auth::check() && Auth::user()->email == $cmt->user->email)
                                                                <span><a href="#" class="edit-cmt" id="{{ $cmt->id }}">Edit</a></span>
                                                                <span><a href="#" class="delete-cmt" id="{{ $cmt->id }}">Delete</a></span>
                                                            @endif
                                                        </div>
                                                        <p>{{ $cmt->content }}</p>
                                                    </div>
                                                </div>
                                                <div class="wn__comment form-edit-cmt" id="{{ $cmt->id }}" style="display: none;">
                                                    <div class="thumb">
                                                        <img src="{{ asset('images/anonymous_user.jpg') }}" alt="comment images">
                                                    </div>
                                                    <div class="content">
                                                        <div class="comnt__author d-block d-sm-flex">
                                                            <span><a href="#" class="cmt-email" id="{{ $cmt->id }}">{{ $cmt->user->email }}</a></span>
                                                        </div>
                                                        <br>
                                                        <textarea class="cmt-content" id="{{ $cmt->id }}">{{ $cmt->content }}</textarea>
                                                        <div class="submite__btn">
                                                            <a href="#" class="btn-save-edit-cmt" id="{{ $cmt->id }}">Save</a>
                                                            <a href="#" class="btn-cancel-edit-cmt" id="{{ $cmt->id }}">Cancel</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wn__comment cmt-content-edited" id="{{ $cmt->id }}"></div>
                                            </li>
                                        @endforeach
                                    </ul>
                            </div>
                            <div class="comment_respond">
                                <h3 class="reply_title">Leave a Reply</h3>
                                <form class="comment__form" action="#">
                                    <div class="input__box">
                                        @if (!Auth::check())
                                            <textarea disabled="disabled" name="comment" id="cmt-area" placeholder="Your comment here"></textarea>
                                        @else
                                            <textarea name="comment" id="cmt-area" placeholder="Your comment here"></textarea>
                                        @endif
                                    </div>
                                    <div class="submite__btn">
                                        <a href="#" class="btn-cmt">Post Comment</a>
                                    </div>
                                    <input type="hidden" id="post_id" value="{{ $post->id }}">
                                    @if (Auth::check())
                                        <input type="hidden" id="user_id" value="{{ Auth::id() }}">
                                        <input type="hidden" id="auth_email" value="{{ Auth::user()->email }}">
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
                        <div class="wn__sidebar">
                        <!-- Start Single Widget -->
                        <aside class="widget search_widget">
                            <h3 class="widget-title">Search</h3>
                            <form action="{{ route('posts.find_by_name') }}" method="get">
                                <div class="form-input">
                                    <input type="text" name="name" placeholder="Search...">
                                    <button><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </aside>
                        <!-- End Single Widget -->
                        <!-- Start Single Widget -->
                        <aside class="widget category_widget">
                            <h3 class="widget-title">Categories</h3>
                            <ul>
                                @foreach ($categories as $cate)
                                    <li><a href="{{ route('posts.find_by_cate_id', $cate) }}">{{ $cate->name }}</a></li>
                                @endforeach
                            </ul>
                        </aside>
                        <!-- End Single Widget -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Area -->
        <footer id="wn__footer" class="footer__area bg__cat--8 brown--color">
            <div class="footer-static-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer__widget footer__menu">
                                <div class="ft__logo">
                                    <a href="{{ route('home.index') }}">
                                        <img src="{{ asset('images/logo/3.png') }}" alt="logo">
                                    </a>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered duskam alteration variations of passages</p>
                                </div>
                                <div class="footer__content">
                                    <ul class="social__net social__net--2 d-flex justify-content-center">
                                        <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                                        <li><a href="#"><i class="bi bi-google"></i></a></li>
                                        <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                                        <li><a href="#"><i class="bi bi-linkedin"></i></a></li>
                                        <li><a href="#"><i class="bi bi-youtube"></i></a></li>
                                    </ul>
                                    <ul class="mainmenu d-flex justify-content-center">
                                        <li><a href="index.html">Trending</a></li>
                                        <li><a href="index.html">Best Seller</a></li>
                                        <li><a href="index.html">All Product</a></li>
                                        <li><a href="index.html">Wishlist</a></li>
                                        <li><a href="index.html">Blog</a></li>
                                        <li><a href="index.html">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright__wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="copyright">
                                <div class="copy__right__inner text-left">
                                    <p>Copyright <i class="fa fa-copyright"></i> <a href="#">Boighor.</a> All Rights Reserved</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="payment text-right">
                                <img src="{{ asset('images/icons/payment.png') }}" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- //Footer Area -->

    </div>
    <!-- //Main wrapper -->



<!-- JS Files -->
<script src="{{ asset('bower_components/adminLTE/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('bower_components/adminLTE/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/active.js') }}"></script>
<script src="../js/popper.min.js"></script>
<script src="{{ asset('js/comment.js') }}"></script>

</body>

<!-- Mirrored from d29u17ylf1ylz9.cloudfront.net/boighor-v2/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Aug 2018 23:59:01 GMT -->
</html>