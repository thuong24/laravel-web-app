@extends('layouts.site')
@section('title', 'Chính sách vận chuyển')
@section('section')
<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({{ asset('asset/images/heading-pages-06.jpg') }}); margin-top:130px;">
    <h2 class="l-text2 t-center text-danger">
        Chính sách vận chuyển
    </h2>
</section>

<!-- Content Page -->
<section class="bgwhite p-t-66 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-12 p-b-30">
                <h3 class="m-text26 p-b-36 p-t-15">
                    Chính sách vận chuyển của chúng tôi
                </h3>

                <p class="p-b-11">
                    Chúng tôi cam kết cung cấp dịch vụ vận chuyển nhanh chóng và đáng tin cậy cho tất cả các đơn hàng. Chính sách vận chuyển của chúng tôi bao gồm các điều khoản và điều kiện sau:
                </p>

                <h4 class="p-b-11">
                    1. Thời gian xử lý đơn hàng
                </h4>
                <p class="p-b-11">
                    - Thời gian xử lý đơn hàng từ 1-2 ngày làm việc sau khi đơn hàng được xác nhận.
                </p>

                <h4 class="p-b-11">
                    2. Phí vận chuyển
                </h4>
                <p class="p-b-11">
                    - Miễn phí vận chuyển cho các đơn hàng có giá trị trên 1.000.000 VNĐ.
                    <br>
                    - Đối với các đơn hàng dưới 1.000.000 VNĐ, phí vận chuyển sẽ được tính dựa trên địa chỉ giao hàng và trọng lượng của đơn hàng.
                </p>

                <h4 class="p-b-11">
                    3. Thời gian giao hàng
                </h4>
                <p class="p-b-11">
                    - Thời gian giao hàng trong nội thành từ 1-2 ngày làm việc.
                    <br>
                    - Thời gian giao hàng tại các khu vực ngoại thành và tỉnh thành khác từ 3-5 ngày làm việc.
                    <br>
                    - Đơn hàng của quý khách sẽ được giao tối đa trong 2 lần (trường hợp lần đầu giao hàng không thành công, sẽ có nhân viên liên hệ để sắp xếp lịch giao hàng lần 2 với quý khách. Chúng tôi sẽ cố gắng liên hệ lại trong 2 ngày làm việc tiếp theo kể từ khi nhận lại hàng từ đơn vị vận chuyển, trong trường hợp vẫn không thể liên lạc lại được hoặc không nhận được bất kì phản hồi nào từ phía quý khách, đơn hàng sẽ không còn hiệu lực.
                </p>

                <h4 class="p-b-11">
                    4. Theo dõi đơn hàng
                </h4>
                <p class="p-b-11">
                    - Sau khi đơn hàng được gửi đi, chúng tôi sẽ cung cấp mã theo dõi để quý khách có thể theo dõi quá trình vận chuyển của đơn hàng.
                </p>

                <h4 class="p-b-11">
                    5. Liên hệ hỗ trợ
                </h4>
                <p class="p-b-11">
                    - Nếu quý khách có bất kỳ thắc mắc hoặc cần hỗ trợ về vấn đề vận chuyển, xin vui lòng liên hệ với bộ phận chăm sóc khách hàng của chúng tôi qua số điện thoại hoặc email được cung cấp trên trang web.
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
