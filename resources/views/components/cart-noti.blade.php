<div class="header-cart header-dropdown">
    <ul class="header-cart-wrapitem">
        @php $total = 0; @endphp
        @if (is_array($cart_list) && count($cart_list) > 0)
            @foreach ($cart_list as $item)
                <li class="header-cart-item">
                    <div class="header-cart-item-img">
                        <img src="{{ asset('images/products/' . $item['image']) }}" alt="{{ $item['image'] }}">
                    </div>

                    <div class="header-cart-item-txt">
                        <a href="#" class="header-cart-item-name">
                            {{ $item['name'] }}
                        </a>

                        <span class="header-cart-item-info">
                            {{ $item['qty'] }} x {{ $item['price'] }}$
                        </span>
                    </div>
                </li>
                @php $total += $item['qty'] * $item['price']; @endphp
            @endforeach
        @endif
    </ul>

    <div class="header-cart-total">
        Tổng: {{ $total }}$
    </div>

    <div class="header-cart-buttons">
        <div class="header-cart-wrapbtn">
            <!-- Button -->
            <a href="{{ route('site.cart.index') }}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                Gửi đơn hàng
            </a>
        </div>

        {{-- <div class="header-cart-wrapbtn">
            <!-- Button -->
            <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                Check Out
            </a>
        </div> --}}
    </div>
</div>
