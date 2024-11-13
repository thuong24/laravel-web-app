@extends('layouts.admin')
@section('title','Chi tiết banner')
@section('content')
  <section class="content">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-12 text-right">
            <a class="btn btn-sm btn-info" href="{{ route('admin.banner.index') }}">
                <i class="fa fa-arrow-left"></i> Về danh sách
              </a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center" style="width:120px;">Hình</th>
                    <th>Tên banner</th>
                    <th>Slug</th>
                    <th>Link</th>
                    <th>Mô tả</th>
                    <th>Kiểu hiện</th>
                    <th>Status</th>
                    <th>Ngày thêm</th>
                    <th>Ngày chỉnh sửa</th>
                    <th class="text-center" style="width:30px;">ID</th>
                </tr>
            </thead>
            <tbody>                      
                <tr>
                  <td class="text-center">
                    <img src="{{ asset('images/banners/' . $banner->image) }}" class="img-fluid" alt="{{ $banner->image }}">
                  </td>
                  <td>
                    {{ $banner->name }}
                  </td>
                  <td>
                    {{ $banner->slug }}
                  </td>
                  <td>
                    {{ $banner->link }}
                  </td>
                  <td>
                    {{ $banner->description }}
                  </td>
                  <td>
                    {{ $banner->position }}
                  </td>
                  <td>
                    {{ $banner->status }}
                  </td>
                  <td>
                    {{ $banner->created_at }}
                  </td>
                  <td>
                    {{ $banner->updated_at }}
                  </td>
                  <td class="text-center">{{ $banner->id }}</td>
                </tr>
              </tbody>
        </table>
    </div>
</div>
</section>
@endsection
