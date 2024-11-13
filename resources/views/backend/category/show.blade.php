@extends('layouts.admin')
@section('title','Chi tiết danh mục')
@section('content')
  <section class="content">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-12 text-right">
            <a class="btn btn-sm btn-info" href="{{ route('admin.category.index') }}">
                <i class="fa fa-arrow-left"></i> Về danh sách
              </a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center" style="width:120px;">Tên danh mục</th>
                    <th class="text-center" style="width:120px;">Slug</th>
                    <th class="text-center">Mô tả</th>
                    <th class="text-center">Parent id</th>
                    <th>Sort order</th>
                    <th>Status</th>
                    <th>Ngày thêm</th>
                    <th>Ngày chỉnh sửa</th>
                    <th class="text-center" style="width:30px;">ID</th>
                </tr>
            </thead>
            <tbody>                      
                <tr>
                  <td>
                    {{ $category->name }}
                  </td>
                  <td>
                    {{ $category->slug }}
                  </td>
                  <td>
                    {{ $category->description }}
                  </td>
                  <td>
                    {{ $category->parent_id }}
                  </td>
                  <td>
                    {{ $category->sort_order }}
                  </td>
                  <td>
                    {{ $category->status }}
                  </td>
                  <td>
                    {{ $category->created_at }}
                  </td>
                  <td>
                    {{ $category->updated_at }}
                  </td>
                  <td class="text-center">{{ $category->id }}</td>
                </tr>
              </tbody>
        </table>
    </div>
</div>
</section>
@endsection
