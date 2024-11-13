@extends('layouts.site')
@section('title', 'Giới thiệu')
@section('section')
<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({{ asset('asset/images/heading-pages-06.jpg')}}); margin-top:130px;">
    <h2 class="l-text2 t-center text-danger">
        Giới thiệu fashe
    </h2>
</section>

<!-- content page -->
<section class="bgwhite p-t-66 p-b-38">
    <div class="container">
        <p class="p-b-28">
            Thương hiệu thời trang nam Fashe được thành lập từ tháng 5 năm 2024, là thương hiệu thời trang uy tín hàng đầu tại Việt Nam dành riêng cho phái mạnh.
        </p>
        <div class="row">
            <div class="col-md-4 p-b-30">
                <div class="hov-img-zoom">
                    <img src="{{ asset('asset/images/banner-14.jpg')}}" alt="IMG-ABOUT">
                </div>
            </div>

            <div class="col-md-8 p-b-30">
                <h3 class="m-text26 p-t-15 p-b-16">
                    SỨ MỆNH
                </h3>

                <p class="p-b-28">
                    Không ngừng sáng tạo và tỉ mỉ từ công đoạn sản xuất đến các khâu dịch vụ, nhằm mang đến cho Quý Khách Hàng những trải nghiệm mua sắm đặc biệt nhất: sản phẩm chất lượng - dịch vụ hoàn hảo - xu hướng thời trang mới mẻ và tinh tế. Thông qua các sản phẩm thời trang, Fashe luôn mong muốn truyền tải đến bạn những thông điệp tốt đẹp cùng với nguồn cảm hứng trẻ trung và tích cực.
                </p>

                <h3 class="m-text26 p-t-15 p-b-16">
                    TẦM NHÌN
                </h3>
                <div class="bo13 p-l-29 m-l-9 p-b-10">
                    <p class="p-b-11">
                        Với mục tiêu xây dựng và phát triển những giá trị bền vững, trong 10 năm tới, Fashe sẽ trở thành thương hiệu dẫn đầu về thời trang phái mạnh trên thị trường Việt Nam.                    </p>

                </div>
                <h3 class="m-text26 p-t-15 p-b-16">
                    THÔNG ĐIỆP FASHE GỬI ĐẾN BẠN
                </h3>
                <div class="bo13 p-l-29 m-l-9 p-b-10">
                    <p class="p-b-11">
                        Fashe muốn truyền cảm hứng tích cực đến các chàng trai: Việc mặc đẹp rất quan trọng, nó thể hiện được cá tính, sự tự tin và cả một phần lối sống, cách suy nghĩ của bản thân. Mặc thanh lịch, sống thanh lịch.
                    </p>
                </div>
                <h3 class="m-text26 p-t-15 p-b-16">
                    Chọn Fashe, chính là bạn đang lựa chọn sự hoàn hảo cho điểm nhấn thời trang của chính mình!
                </h3>
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
