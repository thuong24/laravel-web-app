<div class="block2">
        <div class="block2-img hov-img-zoom wrap-pic-w of-hidden pos-relative">
            <img src="{{ asset('images/products/' .$product->image) }}" alt="{{ $product->image }}">

            <div class="block2-overlay trans-0-4">
                <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                    <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                    <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                </a>

                <div class="block2-btn-addcart w-size1 trans-0-4">
                    <!-- Button -->
                    <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" onclick="handleAddCart({{ $product->id }})">
                        Chọn mua
                    </button>
                </div>
            </div>
        </div>

        <div class="block2-txt p-t-20">
            <a href="{{ route('site.product.detail', ['slug' => $product->slug]) }}" class="block2-name dis-block s-text3 p-b-5">
                {{ $product->name }}
            </a>
            @if($product->pricesale > 0)
                <span class="block2-oldprice m-text7 p-r-5">
                    {{-- {{ $product->price }}$ --}}
                    {{ number_format($product->price, 0, ',', '.') }} VND
                </span>
                <span class="block2-newprice m-text8 p-r-5">
                    {{-- {{ $product->pricesale }}$ --}}
                    {{ number_format($product->pricesale, 0, ',', '.') }} VND
                </span>
            @else
                <span class="block2-price m-text6 p-r-5">
                    {{-- {{ $product->price }}$ --}}
                    {{ number_format($product->price, 0, ',', '.') }} VND
                </span>
            @endif
        </div>
</div>
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
