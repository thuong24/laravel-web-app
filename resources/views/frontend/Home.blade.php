@extends('layouts.site')

@section('title', 'Trang chủ')
@section('section')
    <!-- Slide1 -->
    <x-slider/>

    <!-- Banner -->
    <x-benner/>

    <!-- New Product -->
    <x-product-new/>
    <x-product-sale/>

    <!-- Banner2 -->
    <section class="banner2 bg5 p-t-55 p-b-55">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-md-8 col-lg-6 m-l-r-auto p-t-15 p-b-15">
                    <div class="hov-img-zoom pos-relative">
                        <img src="{{ asset('asset/images/db7cb957-6273-0300-7b32-001a4f32ce27.jpg')}}" alt="IMG-BANNER">

                        <div class="ab-t-l sizefull flex-col-c-m p-l-15 p-r-15">
                            <span class="m-text9 p-t-45 fs-20-sm text-danger">
                                The Beauty
                            </span>

                            <h3 class="l-text1 fs-35-sm text-danger">
                                Lookbook
                            </h3>

                            <a href="#" class="s-text4 hov2 p-t-20 text-danger">
                                View Collection
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-md-8 col-lg-6 m-l-r-auto p-t-15 p-b-15">
                    <div class="bgwhite hov-img-zoom pos-relative p-b-20per-ssm">
                        <img src="{{ asset('asset/images/fee9ebce-b414-7500-7c2f-0018fa33211e.jpg')}}" alt="IMG-BANNER">

                        <div class="ab-t-l sizefull flex-col-c-b p-l-15 p-r-15 p-b-20">
                            <div class="t-center">
                                <a href="product-detail.html" class="dis-block s-text3 p-b-5">
                                    Gafas sol Hawkers one
                                </a>

                                <span class="block2-oldprice m-text7 p-r-5">
                                    $29.50
                                </span>

                                <span class="block2-newprice m-text8">
                                    $15.90
                                </span>
                            </div>

                            <div class="flex-c-m p-t-44 p-t-30-xl">
                                <div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
                                    <span class="m-text10 p-b-1 days">
                                        69
                                    </span>

                                    <span class="s-text5">
                                        days
                                    </span>
                                </div>

                                <div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
                                    <span class="m-text10 p-b-1 hours">
                                        04
                                    </span>

                                    <span class="s-text5">
                                        hrs
                                    </span>
                                </div>

                                <div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
                                    <span class="m-text10 p-b-1 minutes">
                                        32
                                    </span>

                                    <span class="s-text5">
                                        mins
                                    </span>
                                </div>

                                <div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
                                    <span class="m-text10 p-b-1 seconds">
                                        05
                                    </span>

                                    <span class="s-text5">
                                        secs
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <x-product-category-home/>


    <!-- Instagram -->
    <x-post-new/>

    <!-- Blog -->
    <x-posts/>

    <!-- Shipping -->
    <section class="shipping bgwhite p-t-62 p-b-46">
        <div class="flex-w p-l-15 p-r-15">
            <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
                <h4 class="m-text12 t-center">
                    Giao hàng miễn phí trên toàn quốc
                </h4>

                <a href="#" class="s-text11 t-center">
                    Bấm vào đây để biết thêm
                </a>
            </div>

            <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
                <h4 class="m-text12 t-center">
                    Hoàn trả trong 30 ngày
                </h4>

                <span class="s-text11 t-center">
                    Đơn giản chỉ cần trả lại trong vòng 30 ngày để trao đổi
                </span>
            </div>

            <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
                <h4 class="m-text12 t-center">
                    Khai trương cửa hàng
                </h4>

                <span class="s-text11 t-center">
                    Cửa hàng mở cửa từ thứ Hai đến Chủ nhật
                </span>
            </div>
        </div>
    </section>
    @yield('footer')
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
    <script>
        document.querySelector('.search-input').addEventListener('input', function(e) {
        // Handle search input changes, e.g., show search suggestions
        const query = e.target.value;
        if (query.length > 2) {
            // Fetch search suggestions
            fetch(`/search/suggestions?query=${query}`)
                .then(response => response.json())
                .then(data => {
                    // Show suggestions to user
                });
        }
    });
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('asset/js/main.js')}}"></script>
@endsection
