<section class="saleproduct bgwhite p-t-45 p-b-105">
    <div class="container">
        <div class="sec-title p-b-60">
            <h3 class="m-text5 t-center">
                Siêu khuyến mãi
            </h3>
        </div>

        <!-- Slide2 -->
        <div class="wrap-slick2">
            <div class="slick2">
                @foreach ($listproduct_sale as $product_sale)
                <div class="item-slick2 p-l-15 p-r-15">
                    <!-- Block2 -->
                    <div class="block2" id="product-{{ $product_sale->id }}">
                        <div class="block2-img hov-img-zoom wrap-pic-w of-hidden pos-relative">
                            <img src="{{ asset('images/products/' .$product_sale->image)}}" alt="{{ $product_sale->image }}" width="720" height="360">

                            @php
                                $sale = round((($product_sale->price - $product_sale->pricesale) / $product_sale->price) * 100);
                            @endphp
                            <span class="pos-absolute" style="top: 10px; left: 10px; background-color: rgb(49, 100, 75); color: white; padding: 5px; border-radius: 50%;">
                                -{{ $sale }}%
                            </span>
                            <div class="block2-overlay trans-0-4">
                                <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                    <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                    <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                </a>

                                <div class="block2-btn-addcart w-size1 trans-0-4">
                                    <!-- Button -->
                                    <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" onclick="handleAddCart({{ $product_sale->id }})" >
                                        Chọn mua
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="block2-txt p-t-20">
                            <a href="{{ route('site.product.detail', ['slug' => $product_sale->slug]) }}" class="block2-name dis-block s-text3 p-b-5">
                                {{ $product_sale->name }}
                            </a>

                            <span class="block2-oldprice m-text7 p-r-5">
                                {{-- {{ $product_sale->price }} --}}
                                {{ number_format($product_sale->price, 0, ',', '.') }} VND
                            </span>

                            <span class="block2-newprice m-text8 p-r-5">
                                {{-- {{ $product_sale->pricesale }}$ --}}
                                {{ number_format($product_sale->pricesale, 0, ',', '.') }} VND
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</section>
@section('footer')
<script>
    function handleAddCart(productid){
        // Lấy ô nhập liệu số lượng tương ứng với sản phẩm
        let qtyInput = document.getElementById("qty");
        // Nếu không có ô nhập liệu hoặc giá trị của nó không hợp lệ, đặt mặc định là 1
        let qty = qtyInput && qtyInput.value ? qtyInput.value : 1;

        $.ajax({
            type: "GET",
            data: {
                productid: productid,
                qty: qty
            },
            url: "{{ route('site.addcart') }}",
            success: function(result, status, xhr){
                document.getElementById("showcount").innerHTML = result;
                console.log(result);
            },
            error: function(xhr, status, error){
                console.error(xhr.responseText);
                alert("Đã xảy ra lỗi khi thêm sản phẩm vào giỏ hàng. Vui lòng thử lại.");
            }
        });
    }
</script>
@endsection
