@foreach ($list_category as $item_row)
<section class="bgwhite p-t-55 p-b-65">
<div class="container">
    <div class="sec-title p-b-60">
        <h3 class="m-text5 t-center">
            {{ $item_row->name }}
        </h3>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 p-b-50">
            <div class="row">
                <x-product-category :itemrow="$item_row"/>
                <div class="col-12 text-center">
                    <a href="{{ route('site.product.category',['slug'=>$item_row->slug]) }}" class="flex-c-m size1 bo-rad-23 hov1 trans-0-4">xem thêm</a>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endforeach

