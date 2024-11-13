@extends('layouts.site')
@section('title', 'Chi tiết bài viết')
@section('section')
<!-- breadcrumb -->
<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm" style="margin-top:100px">
    <a href="{{ route('site.home') }}" class="s-text16">
        Home
        <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
    </a>

    <a href="{{ route('site.blog') }}" class="s-text16">
        Blog
        <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
    </a>

    <span class="s-text17">
        {{ $post->detail }}
    </span>
</div>

<!-- content page -->
<section class="bgwhite p-t-60 p-b-25">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-9 p-b-80">
                <div class="p-r-50 p-r-0-lg">
                    <div class="p-b-40">
                        <div class="blog-detail-img wrap-pic-w">
                            <img src="{{ asset('images/posts/' .$post->image) }}" alt="{{ $post->image }}">
                        </div>

                        <div class="blog-detail-txt p-t-33">
                            <h4 class="p-b-11 m-text24">
                               {{ $post->title }}
                            </h4>

                            <div class="s-text8 flex-w flex-m p-b-21">
                                <span>
                                    By Admin
                                    <span class="m-l-3 m-r-6">|</span>
                                </span>

                                <span>
                                    {{ \Carbon\Carbon::parse($post->created_at)->format('d') }} tháng {{ \Carbon\Carbon::parse($post->created_at)->format('m') }} năm {{ \Carbon\Carbon::parse($post->created_at)->format('Y') }}
                                    <span class="m-l-3 m-r-6">|</span>
                                </span>

                                <span>
                                    Cooking, Food
                                    <span class="m-l-3 m-r-6">|</span>
                                </span>

                                <span>
                                    {{ $post->$comment_count }} Bình luận
                                </span>
                            </div>

                            <p class="p-b-25">
                                {{ $post->detail }}
                            </p>

                            <p class="p-b-25">

                            </p>
                        </div>

                        <div class="flex-m flex-w p-t-20">
                            <span class="s-text20 p-r-20">
                                Tags
                            </span>

                            <div class="wrap-tags flex-w">
                                <a href="#" class="tag-item">
                                    Streetstyle
                                </a>

                                <a href="#" class="tag-item">
                                    Crafts
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Leave a comment -->
                    <form class="leave-comment" action="{{ route('comment.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <h4 class="m-text25 p-b-14">
                            Để lại bình luận
                        </h4>

                        <p class="s-text8 p-b-40">
                            Địa chỉ email của bạn sẽ không được công bố. Các trường bắt buộc được đánh dấu *
                        </p>

                        <textarea class="dis-block s-text7 size18 bo12 p-l-18 p-r-18 p-t-13 m-b-20" name="comment" placeholder="Comment..."></textarea>

                        <div class="bo12 of-hidden size19 m-b-20">
                            <input class="sizefull s-text7 p-l-18 p-r-18" type="text" name="name" placeholder="Name *">
                        </div>

                        <div class="bo12 of-hidden size19 m-b-20">
                            <input class="sizefull s-text7 p-l-18 p-r-18" type="text" name="email" placeholder="Email *">
                        </div>

                        <div class="w-size24">
                            <!-- Button -->
                            <button class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                Đăng bình luận
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-4 col-lg-3 p-b-80">
                <div class="rightbar">
                    <!-- Search -->
                    <div class="pos-relative bo11 of-hidden">
                        <input class="s-text7 size16 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search">

                        <button class="flex-c-m size5 ab-r-m color1 color0-hov trans-0-4">
                            <i class="fs-13 fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>

                    <!-- Categories -->
                    <h4 class="m-text23 p-t-56 p-b-34">
                        Chủ đề
                    </h4>

                    <ul>
                        @foreach ($list_topic as $item_topic)
                        <li class="p-t-6 p-b-8 bo6">
                            <a href="chu-de/{{ $item_topic->slug }}" class="s-text13 p-t-5 p-b-5">
                                {{ $item_topic->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>

                    <!-- Featured Products -->
                    <h4 class="m-text23 p-t-65 p-b-34">
                        Featured Products
                    </h4>

                    <ul class="bgwhite">
                        <li class="flex-w p-b-20">
                            <a href="product-detail.html" class="dis-block wrap-pic-w w-size22 m-r-20 trans-0-4 hov4">
                                <img src="{{ asset('asset/images/item-16.jpg')}}" alt="IMG-PRODUCT">
                            </a>

                            <div class="w-size23 p-t-5">
                                <a href="product-detail.html" class="s-text20">
                                    White Shirt With Pleat Detail Back
                                </a>

                                <span class="dis-block s-text17 p-t-6">
                                    $19.00
                                </span>
                            </div>
                        </li>

                        <li class="flex-w p-b-20">
                            <a href="product-detail.html" class="dis-block wrap-pic-w w-size22 m-r-20 trans-0-4 hov4">
                                <img src="{{ asset('asset/images/item-17.jpg')}}" alt="IMG-PRODUCT">
                            </a>

                            <div class="w-size23 p-t-5">
                                <a href="product-detail.html" class="s-text20">
                                    Converse All Star Hi Black Canvas
                                </a>

                                <span class="dis-block s-text17 p-t-6">
                                    $39.00
                                </span>
                            </div>
                        </li>

                        <li class="flex-w p-b-20">
                            <a href="product-detail.html" class="dis-block wrap-pic-w w-size22 m-r-20 trans-0-4 hov4">
                                <img src="{{ asset('asset/images/item-08.jpg')}}" alt="IMG-PRODUCT">
                            </a>

                            <div class="w-size23 p-t-5">
                                <a href="product-detail.html" class="s-text20">
                                    Nixon Porter Leather Watch In Tan
                                </a>

                                <span class="dis-block s-text17 p-t-6">
                                    $17.00
                                </span>
                            </div>
                        </li>

                        <li class="flex-w p-b-20">
                            <a href="product-detail.html" class="dis-block wrap-pic-w w-size22 m-r-20 trans-0-4 hov4">
                                <img src="{{ asset('asset/images/item-03.jpg')}}" alt="IMG-PRODUCT">
                            </a>

                            <div class="w-size23 p-t-5">
                                <a href="product-detail.html" class="s-text20">
                                    Denim jacket blue
                                </a>

                                <span class="dis-block s-text17 p-t-6">
                                    $39.00
                                </span>
                            </div>
                        </li>

                        <li class="flex-w p-b-20">
                            <a href="product-detail.html" class="dis-block wrap-pic-w w-size22 m-r-20 trans-0-4 hov4">
                                <img src="{{ asset('asset/images/item-05.jpg')}}" alt="IMG-PRODUCT">
                            </a>

                            <div class="w-size23 p-t-5">
                                <a href="product-detail.html" class="s-text20">
                                    Nixon Porter Leather Watch In Tan
                                </a>

                                <span class="dis-block s-text17 p-t-6">
                                    $17.00
                                </span>
                            </div>
                        </li>
                    </ul>

                    <!-- Archive -->
                    <h4 class="m-text23 p-t-50 p-b-16">
                        Archive
                    </h4>

                    <ul>
                        <li class="flex-sb-m">
                            <a href="#" class="s-text13 p-t-5 p-b-5">
                                July 2018
                            </a>

                            <span class="s-text13">
                                (9)
                            </span>
                        </li>

                        <li class="flex-sb-m">
                            <a href="#" class="s-text13 p-t-5 p-b-5">
                                June 2018
                            </a>

                            <span class="s-text13">
                                (39)
                            </span>
                        </li>

                        <li class="flex-sb-m">
                            <a href="#" class="s-text13 p-t-5 p-b-5">
                                May 2018
                            </a>

                            <span class="s-text13">
                                (29)
                            </span>
                        </li>

                        <li class="flex-sb-m">
                            <a href="#" class="s-text13 p-t-5 p-b-5">
                                April  2018
                            </a>

                            <span class="s-text13">
                                (35)
                            </span>
                        </li>

                        <li class="flex-sb-m">
                            <a href="#" class="s-text13 p-t-5 p-b-5">
                                March 2018
                            </a>

                            <span class="s-text13">
                                (22)
                            </span>
                        </li>

                        <li class="flex-sb-m">
                            <a href="#" class="s-text13 p-t-5 p-b-5">
                                February 2018
                            </a>

                            <span class="s-text13">
                                (32)
                            </span>
                        </li>

                        <li class="flex-sb-m">
                            <a href="#" class="s-text13 p-t-5 p-b-5">
                                January 2018
                            </a>

                            <span class="s-text13">
                                (21)
                            </span>
                        </li>

                        <li class="flex-sb-m">
                            <a href="#" class="s-text13 p-t-5 p-b-5">
                                December 2017
                            </a>

                            <span class="s-text13">
                                (26)
                            </span>
                        </li>
                    </ul>

                    <!-- Tags -->
                    <h4 class="m-text23 p-t-50 p-b-25">
                        Tags
                    </h4>

                    <div class="wrap-tags flex-w">
                        <a href="#" class="tag-item">
                            Fashion
                        </a>

                        <a href="#" class="tag-item">
                            Lifestyle
                        </a>

                        <a href="#" class="tag-item">
                            Denim
                        </a>

                        <a href="#" class="tag-item">
                            Streetstyle
                        </a>

                        <a href="#" class="tag-item">
                            Crafts
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('script')
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{ asset('asset/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{ asset('asset/vendor/animsition/js/animsition.min.js')}}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{ asset('asset/vendor/bootstrap/js/popper.js')}}"></script>
    <script type="text/javascript" src="{{ asset('asset/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{ asset('asset/vendor/select2/select2.min.js')}}"></script>
    <script type="text/javascript">
        $(".selection-1").select2({
            minimumResultsForSearch: 20,
            dropdownParent: $('#dropDownSelect1')
        });
    </script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{ asset('asset/vendor/slick/slick.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('asset/js/slick-custom.js')}}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{ asset('asset/vendor/countdowntime/countdowntime.js')}}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{ asset('asset/vendor/lightbox2/js/lightbox.min.js')}}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{ asset('asset/vendor/sweetalert/sweetalert.min.js')}}"></script>
    <script type="text/javascript">
        $('.block2-btn-addcart').each(function() {
            var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
            $(this).on('click', function() {
                swal(nameProduct, "đã thêm vào giỏ hàng!", "success");
            });
        });

        $('.block2-btn-addwishlist').each(function() {
            var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
            $(this).on('click', function() {
                swal(nameProduct, "đã thêm vào danh sách mong muốn!", "success");
            });
        });
    </script>

    <!--===============================================================================================-->
    <script src="{{ asset('asset/js/main.js')}}"></script>
@endsection
