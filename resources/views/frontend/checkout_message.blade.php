@extends('layouts.site')
@section('title', 'Message')
@section('section')
    <div class="container" style="margin-top: 200px">
        <h1>Bạn đã mua hàng thành công</h1>
    </div>
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
