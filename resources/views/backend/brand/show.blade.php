@extends('layouts.admin')
@section('title','Chi tiết thương hiệu')
@section('content')
  <section class="content">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-12 text-right">
            <a class="btn btn-sm btn-info" href="{{ route('admin.brand.index') }}">
                <i class="fa fa-arrow-left"></i> Về danh sách
              </a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th style="width:90px;" class="text-center">Hình</th>
                    <th class="text-center" style="width:70px;">Tên thương hiệu</th>
                    <th class="text-center" style="width:50px;">Slug</th>
                    <th class="text-center">Mô tả</th>                  
                    <th>Sort order</th>
                    <th>Status</th>
                    <th>Ngày thêm</th>
                    <th>Ngày chỉnh sửa</th>
                    <th class="text-center" style="width:30px;">ID</th>
                </tr>
            </thead>
            <tbody>                      
                <tr>
                    <td class="text-center">
                        <img src="{{ asset('images/brands/' . $brand->image) }}" class="img-fluid" alt="{{ $brand->image }}">
                    </td>
                  <td>
                    {{ $brand->name }}
                  </td>
                  <td>
                    {{ $brand->slug }}
                  </td>
                  <td>
                    {{ $brand->description }}
                  </td>
                  <td>
                    {{ $brand->sort_order }}
                  </td>
                  <td>
                    {{ $brand->status }}
                  </td>
                  <td>
                    {{ $brand->created_at }}
                  </td>
                  <td>
                    {{ $brand->updated_at }}
                  </td>
                  <td class="text-center">{{ $brand->id }}</td>
                </tr>
              </tbody>
        </table>
    </div>
</div>
</section>
@endsection
