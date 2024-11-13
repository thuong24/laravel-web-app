@extends('layouts.admin')
@section('title','Chi tiết sản phẩm')
@section('content')
  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-12 text-right">
            <a class="btn btn-sm btn-info" href="{{ route('admin.product.index') }}">
                <i class="fa fa-arrow-left"></i> Về danh sách
              </a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
            <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th style="width:90px;" class="text-center">Hình</th>
                    <th style="width:30px;" class="text-center">Tên sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Thương hiệu</th>
                    <th>Slug</th>
                    <th>Chi tiết</th>
                    <th>Mô tả</th>
                    <th>Giá</th>
                    <th>Giá khuyến mãi</th>
                    <th>Số lượng sp</th>
                    <th>Status</th>
                    <th>Ngày thêm</th>
                    <th style="width:180px;">Ngày chỉnh sửa</th>
                    <th style="width:30px;">ID</th>
                  </tr>
                </thead>
                <tbody>           
                  <tr>
                    <td class="text-center">
                      <img src="{{ asset('images/products/' . $product->image) }}" class="img-fluid" alt="{{ $product->image }}">
                    </td>
                    <td>
                      {{ $product->name }}
                    </td>
                    <td>
                        @foreach ($list_category as $itemc)
                        @if ($product->category_id == $itemc->id)
                        {{ $itemc->name }}
                        @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach ($list_brand as $itemb)
                        @if ($product->category_id == $itemb->id)
                        {{ $itemb->name }}
                        @endif
                        @endforeach
                    </td>
                    <td>
                        {{ $product->slug }}
                      </td>
                      <td>
                        {{ $product->detail }}
                      </td>
                      <td>
                        {{ $product->description }}
                      </td>
                      <td>
                        {{ $product->price }}
                      </td>
                      <td>
                        {{ $product->pricesale }}
                      </td>
                      <td>
                        {{ $product->qty }}
                      </td>
                      <td>
                        {{ $product->status }}
                      </td>
                      <td>
                        {{ $product->created_at }}
                      </td>
                    <td>
                      {{ $product->updated_at }}
                    </td>
                    <td class="text-center">{{ $product->id }}</td>
                  </tr>
                </tbody>
              </table>
        </div>
      </div>
    </div>
  </section>
@endsection
