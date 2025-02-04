@extends('layouts.admin')
@section('title','Danh mục đã cũ')
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
        {{-- <form id="bulk-action-form" action="{{ route('admin.category.bulkAction') }}" method="post">
            @csrf --}}
            <div class="d-flex mb-3">
              <select name="bulk_action" class="form-control mr-2" style="width: 200px;">
                <option value="restore">Khôi phục</option>
                <option value="destroy">Xóa</option>
              </select>
              <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        <table class="table table-bordered table-striped table-hover">
          <thead>
              <tr>
                  <th class="text-center" style="width:30px;"><input type="checkbox" id="select-all"></th>
                  <th>Tên danh mục</th>
                  <th>Slug</th>
                  <th>Ngày thêm</th>
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
                <a href="{{ route('admin.category.show', $args) }}" class="btn btn-sm btn-info" style="width: 100px;">Chi tiết
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </a>
            </div>
            <div>
                <a href="{{ route('admin.category.restore', $args) }}" class="btn btn-sm btn-primary" style="width: 100px;">Khôi phục
                    <i class="fas fa-trash-restore" aria-hidden="true"></i>
                  </a>
            </div>
            <div>
                <form action="{{ route('admin.category.destroy', $args) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-sm btn-danger d-inline" name="delete" type="submit" style="width: 100px;">Xoá
                      <i class="fa fa-trash"></i>
                    </button>
                  </form>
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
