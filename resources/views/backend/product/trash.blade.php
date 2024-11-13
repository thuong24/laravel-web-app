@extends('layouts.admin')
@section('title','Sản phẩm đã cũ')
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
            {{-- <form id="bulk-action-form" action="{{ route('admin.product.bulkAction') }}" method="post">
                @csrf --}}
                <div class="d-flex mb-3">
                  <select name="bulk_action" class="form-control mr-2" style="width: 200px;">
                    <option value="restore">Khôi phục</option>
                <option value="destroy">Xóa</option>
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
                  @foreach ($list_product as $row_pro)


                  <tr>
                    <td class="text-center">
                        <input type="checkbox" name="ids[]" value="{{ $row_pro->id }}">
                    </td>
                    <td class="text-center">
                      <img src="{{ asset('images/products/' . $row_pro->image) }}" class="img-fluid" alt="{{ $row_pro->image }}">
                    </td>
                    <td>
                      {{ $row_pro->name }}
                    </td>
                    <td>
                      {{ $row_pro->categoryname }}
                    </td>
                    <td>
                      {{ $row_pro->brandname }}
                    </td>
                    <td>
                      {{ $row_pro->created_at }}
                    </td>
                    <td class="text-center">
                      @php
                      $args = ['id' => $row_pro->id];
                  @endphp
               <div>
                <a href="{{ route('admin.product.show', $args) }}" class="btn btn-sm btn-info" style="width: 100px;">Chi tiết
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </a>
            </div>
            <div>
                <a href="{{ route('admin.product.restore', $args) }}" class="btn btn-sm btn-primary" style="width: 100px;">Khôi phục
                    <i class="fas fa-trash-restore" aria-hidden="true"></i>
                  </a>
            </div>
            <div>
                <form action="{{ route('admin.product.destroy', $args) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-sm btn-danger d-inline" name="delete" type="submit" style="width: 100px;">Xoá
                      <i class="fa fa-trash"></i>
                    </button>
                  </form>
            </div>
                 </td>
                 <td class="text-center">{{ $row_pro->id }}</td>
               </tr>
                  @endforeach
                </tbody>
              </table>
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
