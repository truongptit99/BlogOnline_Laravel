<!doctype html>
<html class="no-js" lang="zxx">

<!-- Mirrored from d29u17ylf1ylz9.cloudfront.net/boighor-v2/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Aug 2018 23:58:34 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Blog Homepage</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
                                @if (Auth::check())
                                    <li class="drop with--one--item"><a href="{{ route('posts.find_by_user_id', Auth::user()) }}">My Posts</a></li>
                                @else
                                    <li class="drop with--one--item"><a href="{{ route('home.index') }}">Blog Online</a></li>
                                @endif
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
                            <h2 class="bradcaump-title">Blog Page</h2>
                            <nav class="bradcaump-content">
                                <a class="breadcrumb_item" href="#">Home</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb_item active">Blog</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->

        <!-- Start Blog Area -->
        <div class="page-blog bg--white section-padding--lg blog-sidebar right-sidebar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-12">
                        <div class="blog-page">
                            <div class="page__header d-flex justify-content-between">
                                @if (isset($listPostByCateMess))
                                    <h2>{{ $listPostByCateMess }}</h2>
                                @elseif (isset($listPostByUserMess))
                                    <h2>{{ $listPostByUserMess }}</h2>
                                @else
                                    <h2>Posts</h2>
                                @endif
                                <div>
                                    <a href="{{ route('posts.create') }}" class="create-post text-white">Create new post</a>
                                </div>
                            </div>

                            <!-- Start Single Post -->
                            @foreach ($posts as $key => $post)
                                <article class="blog__post d-flex flex-wrap">
                                    <div class="thumb">
                                        <a href="{{ route('posts.show', $post) }}">
                                            <img src="{{ asset('storage/storage/' . $post->img) }}" alt="blog images">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h4><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h4>
                                        <ul class="post__meta">
                                            <li>Posts by : <a href="{{ route('posts.find_by_user_id', $post->user) }}" onmouseover="this.style.color='#e59285'" onmouseout="this.style.color='#333'">{{ $post->user->email }}</a></li>
                                            @if (Auth::check() && Auth::user()->email == $post->user->email)
                                                <li class="post_separator">/</li>
                                                <li><a href="{{ route('posts.edit', $post) }}" onmouseover="this.style.color='#e59285'" onmouseout="this.style.color='#333'">Edit</a></li>
                                                <li class="post_separator">/</li>
                                                <li><a href="{{ route('posts.destroy', $post) }}" class="delete-post btn-delete" onmouseover="this.style.color='#e59285'" onmouseout="this.style.color='#333'">Delete</a></li>
                                            @endif
                                        </ul>
                                        <ul class="post__meta">
                                            <li>Created at: {{ $post->created_at }}</li>
                                        </ul>
                                        <ul class="post__meta">
                                            <li>Category: <a href="{{ route('posts.find_by_cate_id', $post->category) }}" onmouseover="this.style.color='#e59285'" onmouseout="this.style.color='#333'">{{ $post->category->name }}</a></li>
                                        </ul>
                                        <div class="blog__btn">
                                            <a href="{{ route('posts.show', $post) }}">read more</a>
                                        </div>
                                    </div>
                                    <form id="form-delete" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </article>
                            @endforeach
                            <!-- End Single Post -->
                        </div>
                        <br>
                        <div>
                            {{ $posts->links() }}
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
        <!-- End Blog Area -->

        <!-- Footer Area -->
        <footer id="wn__footer" class="footer__area bg__cat--8 brown--color">
            <div class="footer-static-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer__widget footer__menu">
                                <div class="ft__logo">
                                    <a href="index.html">
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
    <script src="{{ asset('js/delete.js') }}"></script>

</body>

<!-- Mirrored from d29u17ylf1ylz9.cloudfront.net/boighor-v2/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Aug 2018 23:58:58 GMT -->
</html>
