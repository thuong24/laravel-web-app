<section class="banner bgwhite p-t-40 p-b-40">
    <div class="container">
        <div class="row">
            @foreach ($listbenner as $item_benner)
            <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                <div class="block1 hov-img-zoom pos-relative m-b-30">
                    <img src="{{ asset('images/banner/' .$item_benner->image)}}" alt="{{ $item_benner->image }}" width="720" height="660">

                    <div class="block1-wrapbtn w-size2">
                        <!-- Button -->
                        <a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                            {{ $item_benner->name }}
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                <div class="block2 wrap-pic-w pos-relative m-b-30">
                    <img src="{{ asset('asset/images/icons/bg-01.jpg')}}" alt="IMG">

                    <div class="block2-content sizefull ab-t-l flex-col-c-m">
                        <h4 class="m-text4 t-center w-size3 p-b-8">
                            Đăng kí tài khoản để được giảm giá 20%
                        </h4>

                        <p class="t-center w-size4">
                            Hãy là người đầu tiên biết về những tin tức thời trang mới nhất và nhận những ưu đãi độc quyền
                        </p>

                        <div class="w-size2 p-t-25">
                            <!-- Button -->
                            <a href="" class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
                                Đăng kí ngay
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
