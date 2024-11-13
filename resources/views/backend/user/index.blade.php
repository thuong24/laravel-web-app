@extends('layouts.admin')
@section('title','Quản lý thành viên')
@section('content')
<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                    <a class="btn btn-sm btn-success" href="{{ route('admin.user.create') }}">
                        <i class="fas fa-plus"></i> Thêm
                    </a>
                    <a class="btn btn-sm btn-danger" href="{{ route('admin.user.trash') }}">
                        <i class="fas fa-trash"></i> Thùng rác
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{-- <form id="bulk-action-form" action="{{ route('admin.user.bulkAction') }}" method="post">
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
                        <th class="text-center" style="width:90px;">Hình</th>
                        <th>Họ tên</th>
                        <th>Điện thoại</th>
                        <th>Email</th>
                        <th>Quyền</th>
                        <th class="text-center" style="width:200px;">Chức năng</th>
                        <th class="text-center" style="width:30px;">ID</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list_user as $row_user)
                    <tr>
                      <td class="text-center">
                        <input type="checkbox" name="ids[]" value="{{ $row_user->id }}">
                      </td>
                      <td class="text-center">
                        <img src="{{ asset('images/users/' . $row_user->image) }}" class="img-fluid" alt="{{ $row_user->image }}">
                      </td>
                      <td>
                        {{ $row_user->name }}
                      </td>
                      <td>
                        {{ $row_user->phone }}
                      </td>
                      <td>
                        {{ $row_user->email }}
                      </td>
                      <td>
                        {{ $row_user->roles }}
                      </td>
                      <td class="text-center">
                        @php
                        $args = ['id' => $row_user->id];
                        @endphp
                        <div>
                            @if ($row_user->status == 1)
                            <a href="{{ route('admin.user.status', $args) }}" class="btn btn-sm btn-success" style="width: 100px;">Hiện
                                <i class="fa fa-toggle-on" aria-hidden="true"></i>
                            </a>
                            @else
                            <a href="{{ route('admin.user.status', $args) }}" class="btn btn-sm btn-danger" style="width: 100px;">Ẩn
                                <i class="fa fa-toggle-off" aria-hidden="true"></i>
                            </a>
                            @endif
                        </div>
                        <div>
                            <a href="{{ route('admin.user.show', $args) }}" class="btn btn-sm btn-info" style="width: 100px;">Chi tiết
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div>
                            <a href="{{ route('admin.user.edit', $args) }}" class="btn btn-sm btn-primary" style="width: 100px;">Sửa
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div>
                            <a href="{{ route('admin.user.delete', $args) }}" class="btn btn-sm btn-danger" style="width: 100px;">Xóa
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </div>
                    </td>

                      <td class="text-center">{{ $row_user->id }}</td>
                    </tr>
                    @endforeach
                  </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $list_user->links() }}
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