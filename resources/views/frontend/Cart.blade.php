@extends('layouts.site')
@section('title', 'Giỏ hàng')
@section('section')
<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({{ asset('asset/images/heading-pages-01.jpg')}}); margin-top: 130px;">
    <h2 class="l-text2 t-center text-danger">
        Chi tiết giỏ hàng
    </h2>
</section>

<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
    <form action="{{ route('site.cart.update') }}" method="post">
        @csrf
    <div class="container">
        <!-- Cart item -->
        <div class="container-table-cart pos-relative">
            <div class="wrap-table-shopping-cart bgwhite">
                <table class="table-shopping-cart">
                    <tr class="table-head">
                        <th class="column-1"></th>
                        <th class="column-2">Tên sản phẩm</th>
                        <th class="column-3">Giá tiền</th>
                        <th class="column-3">Số lượng</th>
                        <th class="column-4">Tổng tiền</th>
                        <th class="column-5">Xoá</th>
                    </tr>
                    @php $total = 0; @endphp
                    @if (is_array($cart_list) && count($cart_list) > 0)
                    @foreach ($cart_list as $item)
                    <tr class="table-row">
                        <td class="column-1">
                            <div class="cart-img-product b-rad-4 o-f-hidden">
                                <img src="{{ asset('images/products/' .$item['image']) }}" alt="{{ $item['image'] }}">
                            </div>
                        </td>
                        <td class="column-2">{{ $item['name'] }}</td>
                        <td class="column-3">{{ number_format($item['price'], 0, ',', '.') }} VND</td>
                        <td class="column-3">
                            <input type="number" name="qty[{{ $item['id'] }}]" value="{{ $item['qty'] }}">
                        </td>
                        <td class="column-4">{{ number_format($item['qty'] * $item['price'], 0, ',', '.') }} VND</td>
                        <td class="column-5"><a href="{{ route('site.cart.delete', ['id'=>$item['id']]) }}" class="btn btn-danger btn-sm">xoá</a></td>
                    </tr>
                    @php $total += $item['qty'] * $item['price']; @endphp
                    @endforeach
                    @endif
                </table>
            </div>
        </div>

        <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
            <div class="size10 trans-0-4 m-t-10 m-b-10">
                <!-- Button -->
                <a href="{{ route('site.product') }}" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                    Mua thêm
                </a>
            </div>
            <div class="size10 trans-0-4 m-t-10 m-b-10">
                <!-- Button -->
                <button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                    Cập nhật giỏ hàng
                </button>
            </div>
        </div>

        <!-- Total -->
        <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
            <h5 class="m-text20 p-b-24">
                Cart Totals
            </h5>
            <div class="flex-w flex-sb-m p-t-26 p-b-30">
                <span class="m-text22 w-size19 w-full-sm">
                    Thành tiền:
                </span>

                <span class="m-text21 w-size20 w-full-sm">
                    {{ number_format($total, 0, ',', '.') }} VND
                    {{-- {{ $total }}$ --}}
                </span>
            </div>

            <div class="size15 trans-0-4">
                <a class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" href="{{ route('site.cart.checkout') }}">
                    Thanh toán
                </a>
            </div>
        </div>
    </div>
</form>
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
