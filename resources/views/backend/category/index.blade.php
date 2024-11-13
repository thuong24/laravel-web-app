@extends('layouts.admin')
@section('title','Quản lý danh mục')
@section('content')
  <section class="content">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-12 text-right">
            <a href="{{ route('admin.category.trash') }}" class="btn btn-sm btn-danger">
              <i class="fa fa-trash" aria-hidden="true"></i>thùng rác
            </a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="mb-3">
                        <label for="name">Tên danh mục</label>
                        <input type="text" value="{{ old('name') }}" name="name" id="name" class="form-control">
                        @error('name')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description">Mô tả</label>
                        <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="parent_id">Danh mục cha</label>
                        <select name="parent_id" id="parent_id" class="form-control">
                          <option value="0">None</option>
                          {!! $parentid !!}
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="sort_order">Sắp xếp</label>
                        <select name="sort_order" id="sort_order" class="form-control">
                            <option value="0">None</option>
                            {!! $sortorder !!}
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status">Trạng thái</label>
                        <select name="status" id="status" class="form-control">
                            <option value="2">Chưa xuất bản</option>
                            <option value="1">Xuất bản</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="create" class="btn btn-success">Thêm danh
                            mục</button>
                    </div>
                </form>
            </div>
            <div class="col-md-9">
                {{-- <form id="bulk-action-form" action="{{ route('admin.category.bulkAction') }}" method="post">
                    @csrf --}}
                    <div class="d-flex mb-3">
                      <select name="bulk_action" class="form-control mr-2" style="width: 200px;">
                        <option value="update">Trạng thái (ẩn or hiện)</option>
                        <option value="delete">Xóa</option>
                      </select>
                      <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:30px;"><input type="checkbox" id="select-all"></th>
                            <th class="text-center">Tên danh mục</th>
                            <th class="text-center">Slug</th>
                            <th class="text-center">Ngày thêm</th>
                            <th class="text-center" style="width:200px;">Chức năng</th>
                            <th class="text-center" style="width:30px;">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_category as $row_cate)
                        <tr>
                          <td class="text-center">
                            <input type="checkbox" name="ids[]" value="{{ $row_cate->id }}">
                          </td>
                          <td>
                            {{ $row_cate->name }}
                          </td>
                          <td>
                            {{ $row_cate->slug }}
                          </td>
                          <td>
                            {{ $row_cate->created_at }}
                          </td>
                          <td class="text-center">
                            @php
                            $args = ['id' => $row_cate->id];
                            @endphp
                            <div>
                                @if ($row_cate->status == 1)
                                <a href="{{ route('admin.category.status', $args) }}" class="btn btn-sm btn-success" style="width: 100px;">Hiện
                                    <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                </a>
                                @else
                                <a href="{{ route('admin.category.status', $args) }}" class="btn btn-sm btn-danger" style="width: 100px;">Ẩn
                                    <i class="fa fa-toggle-off" aria-hidden="true"></i>
                                </a>
                                @endif
                            </div>
                            <div>
                                <a href="{{ route('admin.category.show', $args) }}" class="btn btn-sm btn-info" style="width: 100px;">Chi tiết
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div>
                                <a href="{{ route('admin.category.edit', $args) }}" class="btn btn-sm btn-primary" style="width: 100px;">Sửa
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div>
                                <a href="{{ route('admin.category.delete', $args) }}" class="btn btn-sm btn-danger" style="width: 100px;">Xóa
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </div>
                        </td>

                          <td class="text-center">{{ $row_cate->id }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $list_category->links() }}
                </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
</div>
</section>
<script>
    document.getElementById('select-all').addEventListener('click', function(e) {
        const checkboxes = document.querySelectorAll('input[name="ids[]"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = e.target.checked;
        });
    });
</script>
@endsection
