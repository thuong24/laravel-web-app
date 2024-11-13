@extends('layouts.site')
@section('title', 'Chính sách đổi trả')
@section('section')
<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({{ asset('asset/images/heading-pages-06.jpg') }}); margin-top:130px;">
    <h2 class="l-text2 t-center text-danger">
        Chính sách đổi trả
    </h2>
</section>

<!-- Content Page -->
<section class="bgwhite p-t-66 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-12 p-b-30">
                <h3 class="m-text26 p-b-36 p-t-15">
                    Chính sách đổi trả của chúng tôi
                </h3>

                <p class="p-b-11">
                    Chúng tôi cam kết mang đến cho khách hàng những sản phẩm chất lượng và dịch vụ chăm sóc tốt nhất. Nếu có bất kỳ sự cố nào xảy ra, chúng tôi sẵn sàng hỗ trợ đổi trả sản phẩm theo các điều khoản và điều kiện sau:
                </p>

                <h4 class="p-b-11">
                    1. Điều kiện đổi trả
                </h4>
                <p class="p-b-11">
                    - Sản phẩm phải còn nguyên vẹn, không bị hư hỏng do lỗi của khách hàng.
                    <br>
                    - Sản phẩm phải còn đầy đủ các phụ kiện, tem, mác và hóa đơn mua hàng.
                    <br>
                    - Sản phẩm phải được gửi trả lại trong vòng 7 ngày kể từ ngày nhận hàng.
                </p>

                <h4 class="p-b-11">
                    2. Các trường hợp được đổi trả
                </h4>
                <p class="p-b-11">
                    - Sản phẩm bị lỗi hoặc hư hỏng do nhà sản xuất.
                    <br>
                    - Sản phẩm không đúng với mô tả hoặc hình ảnh trên website.
                    <br>
                    - Sản phẩm giao nhầm kích cỡ, màu sắc hoặc số lượng so với đơn hàng đã đặt.
                </p>

                <h4 class="p-b-11">
                    3. Quy trình đổi trả
                </h4>
                <p class="p-b-11">
                    - Bước 1: Liên hệ với bộ phận chăm sóc khách hàng của chúng tôi qua số điện thoại hoặc email để thông báo về vấn đề và yêu cầu đổi trả.
                    <br>
                    - Bước 2: Đóng gói sản phẩm cẩn thận và gửi về địa chỉ được cung cấp bởi bộ phận chăm sóc khách hàng.
                    <br>
                    - Bước 3: Chúng tôi sẽ kiểm tra và xác nhận tình trạng sản phẩm. Nếu sản phẩm đáp ứng điều kiện đổi trả, chúng tôi sẽ tiến hành đổi mới hoặc hoàn tiền cho khách hàng trong vòng 7 ngày làm việc.
                </p>

                <h4 class="p-b-11">
                    4. Chi phí vận chuyển
                </h4>
                <p class="p-b-11">
                    - Trong trường hợp lỗi do nhà sản xuất hoặc chúng tôi giao nhầm, chúng tôi sẽ chịu mọi chi phí vận chuyển.
                    <br>
                    - Trong các trường hợp khác, chi phí vận chuyển sẽ do khách hàng chịu.
                </p>

                <h4 class="p-b-11">
                    5. Liên hệ hỗ trợ
                </h4>
                <p class="p-b-11">
                    - Nếu quý khách có bất kỳ thắc mắc hoặc cần hỗ trợ về vấn đề đổi trả, xin vui lòng liên hệ với bộ phận chăm sóc khách hàng của chúng tôi qua số điện thoại hoặc email được cung cấp trên trang web.
                </p>
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
