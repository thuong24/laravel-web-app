@extends('layouts.admin')
@section('title','Quản lý sản phẩm')
@section('content')
  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-12 text-right">
            <a href="{{ route('admin.product.create') }}" class="btn btn-sm btn-success">
              <i class="fa fa-plus" aria-hidden="true"></i> Thêm
            </a>
            <a href="{{ route('admin.product.trash') }}" class="btn btn-sm btn-danger">
              <i class="fa fa-trash" aria-hidden="true"></i> Thùng rác
            </a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
            {{-- <form id="bulk-action-form" action="{{ route('admin.product.bulkAction') }}" method="post">
                @csrf --}}
                <div class="d-flex mb-3">
                  <select name="bulk_action" class="form-control mr-2" style="width: 200px;">
                    <option value="update">Trạng thái (ẩn or hiện)</option>
                    <option value="delete">Xóa</option>
                  </select>
                  <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th style="width:30px;" class="text-center"><input type="checkbox" id="select-all"></th>
                      <th style="width:90px;" class="text-center">Hình</th>
                      <th>Tên sản phẩm</th>
                      <th>Danh mục</th>
                      <th>Thương hiệu</th>
                      <th>Thời gian khởi tạo</th>
                      <th style="width:180px;">Chức năng</th>
                      <th style="width:30px;">ID</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($list_product as $row)
                    <tr>
                      <td class="text-center">
                        <input type="checkbox" name="ids[]" value="{{ $row->id }}">
                      </td>
                      <td class="text-center">
                        <img src="{{ asset('images/products/' . $row->image) }}" class="img-fluid" alt="{{ $row->image }}">
                      </td>
                      <td>{{ $row->name }}</td>
                      <td>{{ $row->categoryname }}</td>
                      <td>{{ $row->brandname }}</td>
                      <td>{{ $row->created_at }}</td>
                      <td class="text-center">
                        @php
                        $args = ['id' => $row->id];
                        @endphp
                        <div>
                            @if ($row->status == 1)
                            <a href="{{ route('admin.product.status', $args) }}" class="btn btn-sm btn-success" style="width: 100px;">Hiện
                                <i class="fa fa-toggle-on" aria-hidden="true"></i>
                            </a>
                            @else
                            <a href="{{ route('admin.product.status', $args) }}" class="btn btn-sm btn-danger" style="width: 100px;">Ẩn
                                <i class="fa fa-toggle-off" aria-hidden="true"></i>
                            </a>
                            @endif
                        </div>
                        <div>
                            <a href="{{ route('admin.product.show', $args) }}" class="btn btn-sm btn-info" style="width: 100px;">Chi tiết
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div>
                            <a href="{{ route('admin.product.edit', $args) }}" class="btn btn-sm btn-primary" style="width: 100px;">Sửa
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div>
                            <a href="{{ route('admin.product.delete', $args) }}" class="btn btn-sm btn-danger" style="width: 100px;">Xóa
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </div>
                      </td>
                      <td class="text-center">{{ $row->id }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <!-- Pagination Links -->
                <div class="d-flex justify-content-center">
                    {{ $list_product->links() }}
                </div>
              {{-- </form> --}}
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
