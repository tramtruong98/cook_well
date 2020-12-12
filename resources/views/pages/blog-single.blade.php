<!DOCTYPE html>
<html lang="en">

<head>
    <title>CookWell</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('front/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('front/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('front/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('front/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/jquery.timepicker.css') }}">


    <link rel="stylesheet" href="{{ asset('front/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <link href="{{ asset('front/form/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet"
        media="all">
    <link href="{{ asset('front/form/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet"
        media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{ asset('front/form/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('front/form/vendor/datepicker/daterangepicker.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('front/form/css/main.css') }}" rel="stylesheet" media="all">

</head>

<body class="goto-here">
    @include('layouts.header')
    <!-- END nav -->
    <div class="hero-wrap hero-bread" style="background-image: url({{ URL::asset('front/images/bg_1.jpg') }});">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="/home">Home</a></span> <span>Blog</span></p>
                    <h1 class="mb-0 bread">COOL RECIPE</h1>
                    @auth
                    <p>@if(Auth::user()->is($author)) 
                        <a href="#" type="submit" class="btn btn-primary py-2 px-3" data-toggle="modal" data-backdrop="static"
                                                    data-keyboard="false" data-target="#myModalEdit">Edit this recipe</a>
                        @endif
                    </p>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ftco-animate">
                    <h2 class="mb-3">{{ $post->course->name }}</h2>
                    <p><i class="flaticon-wall-clock"></i> {{ $post->recipe->minutes }} minutes</p>
                    <p>Ingredients:
                        <br>
                        {{ $post->recipe->ingredients }}
                    </p>
                    <p>
                        <img src="{{asset("img/products/$post->image")}}" alt="image" class="img-fluid">
                    </p>
                    <h2 class="mb-3 mt-5">How to make this</h2>
                    <p>{{ $post->recipe->description }}</p>
                    <p>
                        <img src="images/image_2.jpg" alt="" class="img-fluid">
                    </p>
                    <div class="tag-widget post-tag-container mb-5 mt-5">
                        <div class="tagcloud">
                            @foreach ($post->tags as $tag)
                            <a href="/tag/{{ $tag->id }}" class="tag-cloud-link">{{ $tag->tag }}</a>
                            @endforeach
                        </div>
                    </div>

                    <div class="about-author d-flex p-4 bg-light">
                        <div class="bio align-self-md-center mr-4">
                            <img src="{{ $author->profile->avatar }}" alt="Image placeholder" class="img-fluid mb-4" width="100"
                                height="100">
                        </div>
                        <div class="desc align-self-md-center">
                            <a href="/{{ $author->id }}/blog"><h3>{{ $author->name }}</h3></a>
                            @auth
                                 @unless(Auth::user()
                                    ->is($author)) 
                                    <form method="POST" action="/profiles/{{ $author->id }}/follow">
                                        @csrf
                                        <button type="submit"
                                            class="btn btn-primary">
                                            {{ Auth::user()->isFollowing($author)
                                               ? 'Unfollow'
                                               : 'Follow' }}
                                        </button>
                                    </form>
                                 @endunless
                            @endauth
                            <p>{{ $author->profile->manifesto }}</p>
                        </div>
                    </div>


                    <div class="pt-5 mt-5" data-id="{{ $post->id }}">
                        @auth
                        <span id = "heart"><i class="fa fa-heart-o fa-lg" aria-hidden="true" ></i>
                            @if ($post->isLikedBy(Auth::user()))
                                You and {{ $post->likers()->count() - 1 }} others like this
                            @else
                            {{ $post->likers()->count() }} like this
                            @endif
                        </span> 
                        @endauth
                        <br>
                        <br>
                        <h3 class="mb-5">{{ $comments->count() }} Comments</h3>
                        <ul class="comment-list">
                            @foreach ($comments as $comment)
                            <li class="comment">
                                <div class="vcard bio">
                                    @php
                                        $picture = $comment->user->profile
                                    @endphp
                                    <img src="{{ $picture->avatar }}" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>{{ $comment->user->name }}</h3>
                                    <div class="meta">{{ $comment->created_at->format('d M Y') }} at {{ $comment->created_at->format('h:m') }}</div>
                                    <p>{{ $comment->content }}</p>
                                    {{-- <p><a href="#" class="reply">Reply</a></p> --}}
                                </div>
                            </li>   
                            @endforeach
                        </ul>
                        <!-- END comment-list -->
                        @auth
                        <div class="comment-form-wrap pt-5">
                            <h3 class="mb-5">Leave a comment</h3>
                            <form action="/{{ $post->id }}/post-comment" class="p-5 bg-light" method="post">
                                @csrf
                                <div class="form-group">
                                    <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Post Comment" class="btn btn-primary">
                                </div>

                            </form>
                        </div>
                        @endauth
                    </div>
                </div> <!-- .col-md-8 -->
                <div class="col-lg-4 sidebar ftco-animate">
                    <div class="sidebar-box ftco-animate">
                        <h3 class="heading">Categories</h3>
                        <ul class="categories">
                            @foreach ($categories as $category)
                            <li><a href="/category/{{ $category->id }}">{{ $category->name }} <span>({{ $category->recipes->count() }})</span></a></li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- <div class="sidebar-box ftco-animate">
                        <h3 class="heading">Recent Blog</h3>
                        @php
                            $list = $posts->where('id', '<=' , $latestID)->sortByDesc('id')->take(5);
                        @endphp
                        @foreach ($list as $item)
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url({{ URL::asset("front/images/bg_1.jpg") }});"></a>
                            <div class="text">
                                <h3 class="heading-1"><a href="#">{{ $item->course->name }}</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> {{ $item->created_at->format('d M Y') }}</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 3</a></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div> --}}


                    <div class="sidebar-box ftco-animate">
                        <h3 class="heading">Tag Cloud</h3>
                        <div class="tagcloud">
                            @foreach ($tags as $tag)
                            <a href="/tag/{{ $tag->id }}" class="tag-cloud-link">{{ $tag->tag }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section> <!-- .section -->
    <div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="page-wrapper font-robo">
                    <div class="wrapper">
                        <div class="card card-2">
                            <div class="card-body">
                                <h2 class="title">Edit your own</h2>
                                <form method="POST" action="/blog/post" enctype="multipart/form-data">
                                    <div class="input-group">
                                        <input class="input--style-2" type="text" placeholder="Name of course"
                                            name="nameEdit" value="{{ $post->course->name }}">
                                    </div>
                                    <div class="input-group">
                                        <input class="input--style-2" type="text" placeholder="Tittle" name="titleEdit" value="{{ $post->recipe->title }}">
                                    </div>
                                    <label for="exampleFormControlTextarea1">List of ingredients</label>
                                    <div class="input-group">
                                        <textarea class="form-control" id="example"
                                            rows="3">{{ $post->recipe->ingredients }}</textarea>
                                    </div>
                                    <label for="exampleFormControlTextarea1">How to make this?</label>
                                    <div class="input-group">
                                        <textarea class="form-control" id="exampleForm"
                                            rows="3">{{ $post->recipe->description }}</textarea>
                                    </div>
                                    <div class="input-group">
                                        <div class="file-upload">
                                            <div class="image-upload-wrap">
                                                <input class="file-upload-input" type='file' onchange="readURL(this);"
                                                    accept="image/*" />
                                                <div class="drag-text">
                                                    <h3>Drag and drop a file or select add Image</h3>
                                                </div>
                                            </div>
                                            <div class="file-upload-content">
                                                <img class="file-upload-image" src="#" alt="your image" />
                                                <div class="image-title-wrap">
                                                    <button type="button" onclick="removeUpload()"
                                                        class="remove-image">Remove <span class="image-title">Uploaded
                                                            Image</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-t-30">
                                        <span class="btn btn--radius btn-outline-secondary" data-dismiss="modal" aria-label="Close">cancel</span>
                                        <button class="btn btn--radius btn-outline-success" type="submit">Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" />
        </svg></div>


    <script src="{{ asset('front/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('front/js/popper.min.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('front/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('front/js/aos.js') }}"></script>
    <script src="{{ asset('front/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('front/js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
    </script>
    <script src="{{ asset('front/js/google-map.js') }}"></script>
    <script src="{{ asset('front/js/main.js') }}"></script>
    <script src="{{ asset('js/blog-single.js') }}"></script>
    <script src="{{ asset('front/form/js/global.js') }}"></script>

</body>

</html>
