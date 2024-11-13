@extends('layouts.site')
@section('title', 'Kết quả tìm kiếm')
@section('section')
<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({{ asset('asset/images/heading-pages-06.jpg') }}); margin-top:130px;">
    <h2 class="l-text2 t-center text-danger">
        Kết quả tìm kiếm cho "{{ $query }}"
    </h2>
</section>

<!-- Content Page -->
<section class="bgwhite p-t-66 p-b-60">
    <div class="container">
        <!-- Form lọc và sắp xếp -->
        <form action="{{ route('searchproduct') }}" method="GET" class="mb-4">
            <input type="hidden" name="query" value="{{ $query }}">
            <div class="row">
                <div class="col-md-3">
                    <label for="brand">Thương hiệu</label>
                    <select name="brand" id="brand" class="form-control">
                        <option value="">Tất cả</option>
                        @foreach($brands as $brandItem)
                            <option value="{{ $brandItem->id }}" {{ $brand == $brandItem->id ? 'selected' : '' }}>{{ $brandItem->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="price_min">Giá tối thiểu</label>
                    <input type="number" name="price_min" id="price_min" class="form-control" value="{{ $price_min }}">
                </div>
                <div class="col-md-3">
                    <label for="price_max">Giá tối đa</label>
                    <input type="number" name="price_max" id="price_max" class="form-control" value="{{ $price_max }}">
                </div>
                <div class="col-md-3">
                    <label for="sort_by">Sắp xếp</label>
                    <select name="sort_by" id="sort_by" class="form-control">
                        <option value="">Mặc định</option>
                        <option value="price_asc" {{ $sort_by == 'price_asc' ? 'selected' : '' }}>Giá tăng dần</option>
                        <option value="price_desc" {{ $sort_by == 'price_desc' ? 'selected' : '' }}>Giá giảm dần</option>
                        <option value="name_asc" {{ $sort_by == 'name_asc' ? 'selected' : '' }}>Tên A-Z</option>
                        <option value="name_desc" {{ $sort_by == 'name_desc' ? 'selected' : '' }}>Tên Z-A</option>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Lọc kết quả</button>
                </div>
            </div>
        </form>

        <!-- Nút chuyển đổi chế độ hiển thị -->
        <div class="row mb-4">
            <div class="col-md-12 text-right">
                <button class="btn btn-default" id="grid-view"><i class="fa fa-th"></i></button>
                <button class="btn btn-default" id="list-view"><i class="fa fa-list"></i></button>
            </div>
        </div>

        <!-- Kết quả tìm kiếm -->
        @if($products->isEmpty())
            <div class="row">
                <div class="col-md-12 p-b-30">
                    <h3 class="m-text26 p-b-36 p-t-15">
                        Không tìm thấy kết quả nào.
                    </h3>
                </div>
            </div>
        @else
            <div class="row" id="product-container">
                @foreach($products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-50 product-item">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                <img src="{{ asset('images/products/' .$product->image) }}" alt="{{ $product->image }}">

                                <div class="block2-overlay trans-0-4">
                                    <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                        <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                        <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                    </a>

                                    <div class="block2-btn-addcart w-size1 trans-0-4">
                                        <!-- Button -->
                                        <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                            Thêm vào giỏ
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="block2-txt p-t-20">
                                <a href="{{ route('site.product.detail', ['slug' => $product->slug]) }}" class="block2-name dis-block s-text3 p-b-5">
                                    {{ $product->name }}
                                </a>

                                <span class="block2-price m-text6 p-r-5">
                                    {{ number_format($product->price, 0, ',', '.') }} VND
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
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
    <script>
        document.querySelector('.search-input').addEventListener('input', function(e) {
        // Handle search input changes, e.g., show search suggestions
        const query = e.target.value;
        if (query.length > 2) {
            // Fetch search suggestions
            fetch(`/search/suggestions?query=${query}`)
                .then(response => response.json())
                .then(data => {
                    // Show suggestions to user
                });
        }
    });
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('asset/js/main.js')}}"></script>
    <script>

        document.getElementById('grid-view').addEventListener('click', function() {
            document.getElementById('product-container').classList.add('grid-view');
            document.getElementById('product-container').classList.remove('list-view');
        });

        document.getElementById('list-view').addEventListener('click', function() {
            document.getElementById('product-container').classList.add('list-view');
            document.getElementById('product-container').classList.remove('grid-view');
        });
    </script>
@endsection

<style>
    .grid-view .product-item {
        width: 25%;
    }

    .list-view .product-item {
        width: 100%;
    }
</style>
