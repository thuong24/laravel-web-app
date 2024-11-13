@extends('layouts.site')
@section('title', 'Bài viết')
@section('section')
<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({{ asset('asset/images/heading-pages-05.jpg')}}); margin-top:130px">
    <h2 class="l-text2 t-center text-danger">
        Bài viết
    </h2>
</section>

<!-- content page -->
<section class="bgwhite p-t-60">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-9 p-b-75">
                <div class="p-r-50 p-r-0-lg">
                    <!-- item blog -->
                    @foreach ($listpost as $item_post)
                    <div class="item-blog p-b-80">
                        <a href="{{ route('site.blog.detail', ['slug' => $item_post->slug]) }}" class="item-blog-img pos-relative dis-block hov-img-zoom">
                            <img src="{{ asset('images/posts/' .$item_post->image) }}" alt="{{ $item_post->image }}">

                            <span class="item-blog-date dis-block flex-c-m pos1 size17 bg4 s-text1">
                                {{ \Carbon\Carbon::parse($item_post->created_at)->format('d') }}/{{ \Carbon\Carbon::parse($item_post->created_at)->format('m') }}/{{ \Carbon\Carbon::parse($item_post->created_at)->format('Y') }}
                            </span>
                        </a>

                        <div class="item-blog-txt p-t-33">
                            <h4 class="p-b-11">
                                <a href="{{ route('site.blog.detail', ['slug' => $item_post->slug]) }}" class="m-text24">
                                    {{ $item_post->title }}
                                </a>
                            </h4>

                            <div class="s-text8 flex-w flex-m p-b-21">
                                <span>
                                    By Admin
                                    <span class="m-l-3 m-r-6">|</span>
                                </span>

                                <span>
                                    Cooking, Food
                                    <span class="m-l-3 m-r-6">|</span>
                                </span>

                                <span>
                                    {{ $item_post->comments_count }} Bình luận
                                </span>
                            </div>

                            <p class="p-b-12">
                                {{ $item_post->description }}
                            </p>

                            <a href="{{ route('site.blog.detail', ['slug' => $item_post->slug]) }}" class="s-text20">
                                Đọc thêm
                                <i class="fa fa-long-arrow-right m-l-8" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="pagination flex-m flex-w p-r-50 justify-content-center">
                    {{ $listpost->links() }}
                </div>
            </div>

            <div class="col-md-4 col-lg-3 p-b-75">
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
                        Sản phẩm hot
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
