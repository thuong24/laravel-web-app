@extends('layouts.site')
@section('title', 'Thanh toán')
@section('section')
<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({{ asset('asset/images/heading-pages-01.jpg')}}); margin-top: 130px;">
    <h2 class="l-text2 t-center text-danger">
        Thanh toán
    </h2>
</section>

<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
    <div class="container">
        <!-- Cart item -->
        <div class="container-table-cart pos-relative">
            <div class="wrap-table-shopping-cart bgwhite">
                <table class="table-shopping-cart">
                    <tr class="table-head">
                        <th class="column-1"></th>
                        <th class="column-2">Tên sản phẩm</th>
                        <th class="column-3">Giá tiền</th>
                        <th class="column-4">Số lượng</th>
                        <th class="column-5">Tổng tiền</th>
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
                        <td class="column-4">{{ $item['qty'] }}</td>
                        <td class="column-5">{{ number_format($item['qty'] * $item['price'], 0, ',', '.') }} VND</td>
                    </tr>
                    @php $total += $item['qty'] * $item['price']; @endphp
                    @endforeach
                    @endif
                </table>
            </div>
        </div>

        <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
            <div class="flex-w flex-m w-full-sm">
                <div class="size11 bo4 m-r-10">
                    <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code" placeholder="Mã giảm giá">
                </div>

                <div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
                    <!-- Button -->
                    <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                        Áp dụng mã
                    </button>
                </div>
            </div>
        </div>

        <!-- Flex container for side-by-side layout -->
        <div class="flex-container" style="display: flex; justify-content: space-between; width: 100%;">
            @if (!Auth::check())
                <div class="bo9 w-size50 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 p-lr-15-sm" style="width: 50%;">
                    <div class="flex-w flex-sb-m p-t-26 p-b-30">
                        <h4>Đăng nhập để thanh toán</h4>
                    </div>
                    <div class="size15 trans-0-4" style="width: 150px;">
                        <a class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" href="{{ route('auth.getlogin') }}">Đăng nhập</a>
                    </div>
                </div>
            @else
            <form action="{{ route('site.cart.docheckout') }}" method="post" style="width: 50%;">
                @csrf
                <div class="bo9 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 p-lr-15-sm">

                    @php
                        $user = Auth::user();
                    @endphp

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Họ tên</label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                        </div>
                        <div class="col-md-6">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Điện thoại</label>
                            <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
                        </div>
                        <div class="col-md-6">
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" name="address" value="{{ $user->address }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Chú ý</label>
                        <textarea name="note" class="form-control"></textarea>
                    </div>
                    <div class="size15 trans-0-4">
                        <!-- Button -->
                        <button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                            Đặt mua
                        </button>
                    </div>

                </div>
            </form>
            @endif

            <!-- Shipping and Cart Totals section -->
            <div class="bo9 w-size50 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 p-lr-15-sm" style="width: 50%;">
                <h5 class="m-text20 p-b-24">
                    Cart Totals
                </h5>

                <!-- Shipping -->
                <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
                    <span class="s-text18 w-size19 w-full-sm">
                        Shipping:
                    </span>

                    <div class="w-size20 w-full-sm">
                        <p class="s-text8 p-b-23">
                            Không có phương thức vận chuyển có sẵn. Vui lòng kiểm tra lại địa chỉ của bạn hoặc liên hệ với chúng tôi nếu bạn cần bất kỳ trợ giúp nào.
                        </p>

                        <span class="s-text19">
                            Tính toán vận chuyển
                        </span>

                        <div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
                            <select class="selection-2" name="country">
                                <option>Chọn quốc gia...</option>
                                <option>US</option>
                                <option>UK</option>
                                <option>Japan</option>
                            </select>
                        </div>

                        <div class="size13 bo4 m-b-12">
                            <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="state" placeholder="Bang / Tỉnh">
                        </div>

                        <div class="size13 bo4 m-b-22">
                            <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="postcode" placeholder="Mã bưu chính / Zip">
                        </div>
                    </div>
                </div>

                <!-- Total -->
                <div class="flex-w flex-sb-m p-t-26 p-b-30">
                    <span class="m-text22 w-size19 w-full-sm">
                        Thành tiền:
                    </span>

                    <span class="m-text21 w-size20 w-full-sm">
                        {{ number_format($total, 0, ',', '.') }} VND
                    </span>
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
