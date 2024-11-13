@extends('layouts.site')
@section('title', 'Chính sách mua hàng')
@section('section')
<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({{ asset('asset/images/heading-pages-06.jpg') }}); margin-top:130px;">
    <h2 class="l-text2 t-center text-danger">
        Chính sách mua hàng
    </h2>
</section>

<!-- Content page -->
<section class="bgwhite p-t-66 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-12 p-b-30">
                <h3 class="m-text26 p-b-36 p-t-15">
                    Chính sách mua hàng của chúng tôi
                </h3>
                <p class="p-b-28">
                    Chính sách mua hàng áp dụng cho Quý Khách Hàng mua hàng thông qua website. Fashe cung cấp sản phẩm đến tất cả các khách hàng có nhu cầu mua sắm tiêu dùng có địa chỉ giao hàng trong lãnh thổ Việt Nam.
                    Tất cả các đơn hàng vi phạm điều khoản mua hàng (điều 2 của chính sách mua hàng), Fashe sẽ liên hệ với Quý Khách hàng và thực hiện hủy đơn sau đó. Fashe hiện tại chưa áp dụng chính sách bán sỉ. Vì vậy, đối với tất cả các đơn hàng của quý khách có dấu hiệu mua sỉ hoặc vượt quá yêu cầu cho phép, Fashe sẽ liên hệ với Quý Khách hàng & chuyển thông tin đơn hàng của quý khách sang bộ phận bán sỉ để được tiếp tục giải quyết và xử lý.
                </p>

                <h3 class="m-text26 p-b-36 p-t-15">
                    Điều khoản mua hàng áp dụng
                </h3>

                <h4 class="p-b-11">
                    1. Số lượng sản phẩm
                </h4>
                <p class="p-b-28">
                    - Tổng số lượng sản phẩm trên 1 đơn hàng không quá 10 sản phẩm.<br>
                    - Tổng số lượng trên mỗi sản phẩm không quá 5 sản phẩm.
                </p>

                <h4 class="p-b-11">
                    2. Giá trị đơn hàng
                </h4>
                <p class="p-b-28">
                    - Đối với các đơn hàng có giá trị dưới 5.000.000 VNĐ: Có thể sử dụng tất cả các phương thức thanh toán.<br>
                    - Đối với các đơn hàng có giá trị trên 5.000.000 VNĐ: Không áp dụng hình thức thanh toán thu hộ (COD).
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
