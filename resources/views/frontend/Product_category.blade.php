@extends('layouts.site')
@section('title', 'Sản phẩm theo danh mục')
@section('section')
<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url({{ asset('asset/images/heading-pages-02.jpg')}}')}}); margin-top: 100px;">
    <h2 class="l-text2 t-center text-danger">
        Fashe
    </h2>
    <p class="m-text13 t-center text-danger">
        New Arrivals Collection 2024
    </p>
</section>


<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                <div class="leftbar p-r-20 p-r-0-sm">
                    <!--  -->
                    <h4 class="m-text14 p-b-7">
                        Danh mục
                    </h4>

                    <ul>
                        @foreach ($list_category as $item_catego)
                        <li class="p-t-6 p-b-8 bo6">
                            <a href="{{ $item_catego->slug }}" class="s-text13 p-t-5 p-b-5">
                                {{ $item_catego->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>

                    <!--  -->
                    <h4 class="m-text14 p-b-32">
                        Filters
                    </h4>

                    <div class="filter-price p-t-22 p-b-50 bo3">
                        <div class="m-text15 p-b-17">
                            Price
                        </div>

                        <div class="wra-filter-bar">
                            <div id="filter-bar"></div>
                        </div>

                        <div class="flex-sb-m flex-w p-t-16">
                            <div class="w-size11">
                                <!-- Button -->
                                <button class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4">
                                    Filter
                                </button>
                            </div>

                            <div class="s-text3 p-t-10 p-b-10">
                                Range: $<span id="value-lower">610</span> - $<span id="value-upper">980</span>
                            </div>
                        </div>
                    </div>

                    <div class="filter-color p-t-22 p-b-50 bo3">
                        <div class="m-text15 p-b-12">
                            Color
                        </div>

                        <ul class="flex-w">
                            <li class="m-r-10">
                                <input class="checkbox-color-filter" id="color-filter1" type="checkbox" name="color-filter1">
                                <label class="color-filter color-filter1" for="color-filter1"></label>
                            </li>

                            <li class="m-r-10">
                                <input class="checkbox-color-filter" id="color-filter2" type="checkbox" name="color-filter2">
                                <label class="color-filter color-filter2" for="color-filter2"></label>
                            </li>

                            <li class="m-r-10">
                                <input class="checkbox-color-filter" id="color-filter3" type="checkbox" name="color-filter3">
                                <label class="color-filter color-filter3" for="color-filter3"></label>
                            </li>

                            <li class="m-r-10">
                                <input class="checkbox-color-filter" id="color-filter4" type="checkbox" name="color-filter4">
                                <label class="color-filter color-filter4" for="color-filter4"></label>
                            </li>

                            <li class="m-r-10">
                                <input class="checkbox-color-filter" id="color-filter5" type="checkbox" name="color-filter5">
                                <label class="color-filter color-filter5" for="color-filter5"></label>
                            </li>

                            <li class="m-r-10">
                                <input class="checkbox-color-filter" id="color-filter6" type="checkbox" name="color-filter6">
                                <label class="color-filter color-filter6" for="color-filter6"></label>
                            </li>

                            <li class="m-r-10">
                                <input class="checkbox-color-filter" id="color-filter7" type="checkbox" name="color-filter7">
                                <label class="color-filter color-filter7" for="color-filter7"></label>
                            </li>
                        </ul>
                    </div>

                    <div class="search-product pos-relative bo4 of-hidden">
                        <input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search Products...">

                        <button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
                            <i class="fs-12 fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
                <!--  -->
                <div class="flex-sb-m flex-w p-b-35">
                    <div class="flex-w">
                        <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                            <select class="selection-2" name="sorting">
                                <option>Default Sorting</option>
                                <option>Popularity</option>
                                <option>Price: low to high</option>
                                <option>Price: high to low</option>
                            </select>
                        </div>

                        <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                            <select class="selection-2" name="sorting">
                                <option>Price</option>
                                <option>$0.00 - $50.00</option>
                                <option>$50.00 - $100.00</option>
                                <option>$100.00 - $150.00</option>
                                <option>$150.00 - $200.00</option>
                                <option>$200.00+</option>

                            </select>
                        </div>
                    </div>

                    <span class="s-text8 p-t-5 p-b-5">
                        Showing 1–12 of 16 results
                    </span>
                </div>

                <!-- Product -->
                <div class="row">
                    @foreach ($product_list as $product_item)
                        <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                            <x-product-card :productitem="$product_item"/>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="pagination flex-m flex-w p-t-26 justify-content-center">
                    {{ $product_list->links() }}
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
                document.getElementById("showitem").innerHTML = result;
                console.log(result);
            },
            error: function(xhr, status, error){
                console.error(xhr.responseText);
                alert("Đã xảy ra lỗi khi thêm sản phẩm vào giỏ hàng. Vui lòng thử lại.");
            }
        });
    }
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
@endsection
