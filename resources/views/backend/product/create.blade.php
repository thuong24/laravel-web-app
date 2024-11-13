@extends('layouts.admin')
@section('title','Thêm sản phẩm')
@section('content')
<form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 text-right">
                        <button type="submit" name="create" class="btn btn-sm btn-success">
                            <i class="fa fa-save"></i> Lưu
                        </button>
                        <a class="btn btn-sm btn-info" href="{{ route('admin.product.index') }}">
                            <i class="fa fa-arrow-left"></i> Về danh sách
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <div class="mb-3">
                            <label for="name">Tên sản phẩm</label>
                            <input type="text" value="{{ old('name') }}" name="name" id="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="detail">Chi tiết</label>
                            <textarea name="detail" id="detail" rows="8" class="form-control">{{ old('detail') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="description">Mô tả</label>
                            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="category_id">Danh mục</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Chọn danh mục</option>
                                {!! $categoryid !!}
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="brand_id">Thương hiệu</label>
                            <select name="brand_id" id="brand_id" class="form-control">
                                <option value="">Chọn thương hiệu</option>
                                {!! $brandid !!}
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="price">Giá</label>
                            <input type="number" value="{{ old('price') }}" name="price" id="price" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="pricesale">Giá khuyến mãi</label>
                            <input type="number" value="{{ old('pricesale') }}" name="pricesale" id="pricesale" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="qty">Số lượng</label>
                            <input type="number" value="{{ old('qty') }}" name="qty" id="qty" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="image">Hình</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="status">Trạng thái</label>
                            <select name="status" id="status" class="form-control">
                                <option value="2">Chưa xuất bản</option>
                                <option value="1">Xuất bản</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
    
@endsection
