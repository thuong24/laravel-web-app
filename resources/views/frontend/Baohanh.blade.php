@extends('layouts.site')
@section('title', 'Chính sách bảo hành')
@section('section')
<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({{ asset('asset/images/heading-pages-06.jpg') }}); margin-top:130px;">
    <h2 class="l-text2 t-center text-danger">
        Chính sách bảo hành
    </h2>
</section>

<!-- Content page -->
<section class="bgwhite p-t-66 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-12 p-b-30">
                <h3 class="m-text26 p-b-36 p-t-15">
                    Chính sách bảo hành của chúng tôi
                </h3>
                <p class="p-b-28">
                    Chúng tôi cam kết cung cấp dịch vụ bảo hành chất lượng tốt nhất cho tất cả các sản phẩm được mua tại Fashe. Các chính sách bảo hành được áp dụng nhằm đảm bảo quyền lợi của khách hàng và duy trì chất lượng sản phẩm.
                </p>

                <h3 class="m-text26 p-b-36 p-t-15">
                    Điều khoản bảo hành
                </h3>

                <h4 class="p-b-11">
                    1. Thời gian bảo hành
                </h4>
                <p class="p-b-28">
                    - Tất cả các sản phẩm được mua tại Fashe đều được bảo hành theo thời gian quy định của nhà sản xuất, tối thiểu là 3 tháng kể từ ngày mua hàng.
                </p>

                <h4 class="p-b-11">
                    2. Điều kiện bảo hành
                </h4>
                <p class="p-b-28">
                    - Sản phẩm còn trong thời hạn bảo hành.
                    - Sản phẩm quần áo nếu khách hàng nhận được, nhưng bị lỗi: rách vải, phai màu (không có sự can thiệp của chất tẩy ) sẽ được Fashe kiểm tra và đổi/hoàn trả cho khách hàng.
                    - Sản phẩm có phiếu bảo hành và hóa đơn mua hàng hợp lệ.
                    - Sản phẩm bị lỗi do quá trình vận chuyển, Fashe sẽ thu hồi và đổi hàng mới cho khách.
                </p>

                <h4 class="p-b-11">
                    3. Quy trình bảo hành
                </h4>
                <p class="p-b-28">
                    - Quý khách vui lòng liên hệ với trung tâm bảo hành của Fashe qua số điện thoại hoặc email để được hướng dẫn chi tiết.
                    - Sau khi tiếp nhận yêu cầu bảo hành, chúng tôi sẽ kiểm tra sản phẩm và tiến hành các bước bảo hành cần thiết.
                    - Thời gian bảo hành thường dao động từ 7 đến 15 ngày làm việc tùy thuộc vào mức độ hư hỏng và điều kiện bảo hành.
                </p>

                <h4 class="p-b-11">
                    4. Phí bảo hành
                </h4>
                <p class="p-b-28">
                    - Đối với các trường hợp bảo hành hợp lệ, Fashe sẽ chịu hoàn toàn chi phí bảo hành và vận chuyển sản phẩm.
                    - Đối với các trường hợp không thuộc diện bảo hành, chúng tôi sẽ thông báo chi tiết về chi phí sửa chữa trước khi tiến hành bảo hành.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
    <!-- Vendor Scripts -->
    <script type="text/javascript" src="{{ asset('asset/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/vendor/animsition/js/animsition.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/vendor/bootstrap/js/popper.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/vendor/select2/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(".selection-1").select2({
            minimumResultsForSearch: 20,
            dropdownParent: $('#dropDownSelect1')
        });
    </script>
    <script type="text/javascript" src="{{ asset('asset/vendor/slick/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/js/slick-custom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/vendor/countdowntime/countdowntime.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/vendor/lightbox2/js/lightbox.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/vendor/sweetalert/sweetalert.min.js') }}"></script>
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

    <!-- Main Script -->
    <script src="{{ asset('asset/js/main.js') }}"></script>
@endsection
