@extends('layouts.admin')
@section('title','Quản lý liên hệ')
@section('content')
<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                    <a class="btn btn-sm btn-danger" href="{{ route('admin.contact.trash') }}">
                        <i class="fas fa-trash"></i> Thùng rác
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{-- <form id="bulk-action-form" action="{{ route('admin.contact.bulkAction') }}" method="post">
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
                        <th>Họ tên</th>
                        <th>Điện thoại</th>
                        <th>Email</th>
                        <th>Tiêu đề</th>
                        <th class="text-center" style="width:200px;">Chức năng</th>
                        <th class="text-center" style="width:30px;">ID</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list_contact as $row_contact)
                    <tr>
                      <td class="text-center">
                        <input type="checkbox" name="ids[]" value="{{ $row_contact->id }}">
                      </td>
                      <td>
                        {{ $row_contact->name }}
                      </td>
                      <td>
                        {{ $row_contact->phone }}
                      </td>
                      <td>
                        {{ $row_contact->email }}
                      </td>
                      <td>
                        {{ $row_contact->title }}
                      </td>
                      <td class="text-center">
                        @php
                        $args = ['id' => $row_contact->id];
                        @endphp
                        <div>
                            @if ($row_contact->status == 1)
                            <a href="{{ route('admin.contact.status', $args) }}" class="btn btn-sm btn-success" style="width: 100px;">Hiện
                                <i class="fa fa-toggle-on" aria-hidden="true"></i>
                            </a>
                            @else
                            <a href="{{ route('admin.contact.status', $args) }}" class="btn btn-sm btn-danger" style="width: 100px;">Ẩn
                                <i class="fa fa-toggle-off" aria-hidden="true"></i>
                            </a>
                            @endif
                        </div>
                        <div>
                            <a href="{{ route('admin.contact.show', $args) }}" class="btn btn-sm btn-info" style="width: 100px;">Chi tiết
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div>
                            <a href="{{ route('admin.contact.edit', $args) }}" class="btn btn-sm btn-primary" style="width: 100px;">Sửa
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div>
                            <a href="{{ route('admin.contact.delete', $args) }}" class="btn btn-sm btn-danger" style="width: 100px;">Xóa
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </div>
                    </td>

                      <td class="text-center">{{ $row_contact->id }}</td>
                    </tr>
                    @endforeach
                  </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $list_contact->links() }}
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
