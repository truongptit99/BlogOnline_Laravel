<!doctype html>
<html class="no-js" lang="zxx">

<!-- Mirrored from d29u17ylf1ylz9.cloudfront.net/boighor-v2/my-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Aug 2018 23:57:32 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Edit Post</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/icon.png') }}">

    <!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>

<body>
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

    <!-- Main wrapper -->
    <div class="wrapper" id="wrapper">
        <!-- Header -->
        <header id="wn__header" class="oth-page header__area header__absolute sticky__header is-sticky">
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
                                <li class="drop with--one--item"><a href="{{ route('home.index') }}">Blog Online</a></li>
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
        <!-- Start My Account Area -->
        <section class="my_account_area pt--80 pb--55 bg--white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-12 text-center m-auto">
                        <div class="my__account__wrapper">
                            <h3 class="account__title">Edit post</h3>
                            <form action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="account__form">
                                    <div class="input__box">
                                        <label>Category <span>*</span></label>
                                        <select name="category_id">
                                            @foreach ($categories as $cate)
                                                <option value="{{ $cate->id }}" @php if ($cate->id == $post->category_id) echo "selected"; @endphp>{{ $cate->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger font-italic">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input__box">
                                        <label>Title <span>*</span></label>
                                        <input type="text" name="title" value="{{ $post->title }}">
                                        @error('title')
                                            <span class="text-danger font-italic">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input__box">
                                        <img src="{{ asset('storage/storage/' . $post->img) }}" alt="blog image">
                                        <label>Image </label>
                                        <input type="file" name="img" id="img-input">
                                        @error('img')
                                            <span class="text-danger font-italic">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input__box">
                                        <label>Content <span>*</span></label>
                                        <textarea id="summernote" name="content">{!! $post->content !!}</textarea>
                                        @error('content')
                                            <span class="text-danger font-italic">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <input type="hidden" name="user_id" value="{{ $post->user_id }}">
                                    <div class="form__btn">
                                        <button class="d-block m-auto">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End My Account Area -->
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
                    </div>
                </div>
            </div>
        </footer>
        <!-- //Footer Area -->
    
    </div>
<!-- //Main wrapper -->

<!-- JS Files -->
<script src="{{ asset('bower_components/adminLTE/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('bower_components/adminLTE/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            placeholder: 'Enter content...',
            tabsize: 2,
            height: 500,
            focus: true,
            tabDisable: true,
            });
    });
</script>

</body>

<!-- Mirrored from d29u17ylf1ylz9.cloudfront.net/boighor-v2/my-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Aug 2018 23:57:32 GMT -->
</html>
