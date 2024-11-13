<section class="slide1">
    <div class="wrap-slick1">
        <div class="slick1">
            @foreach ($listslider as $item_slider)          
            <div class="item-slick1 item1-slick1" style="background-image: url({{ asset('images/banners/' .$item_slider->image)}}); background-size: 1420px 570px; margin-top: 80px;">
                <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                    <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" style="color: red;" data-appear="fadeInDown">
                        Bộ sưu tập 2024
                    </span>

                    <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" style="color: #f0ae4c;" data-appear="fadeInUp">
                        Điểm đến mới
                    </h2>

                    <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
                        <!-- Button -->
                        <a href="{{ route('site.product') }}" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                            Mua ngay
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>