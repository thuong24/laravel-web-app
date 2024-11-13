@extends('layouts.admin')
@section('title','Quản lý liên hệ')
@section('content')
<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                    <a class="btn btn-sm btn-info" href="{{ route('admin.contact.index') }}">
                        <i class="fa fa-arrow-left"></i> Về danh sách
                      </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{-- <form id="bulk-action-form" action="{{ route('admin.contact.bulkAction') }}" method="post">
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
                        <a href="{{ route('admin.contact.show', $args) }}" class="btn btn-sm btn-info" style="width: 100px;">Chi tiết
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div>
                        <a href="{{ route('admin.contact.restore', $args) }}" class="btn btn-sm btn-primary" style="width: 100px;">Khôi phục
                            <i class="fas fa-trash-restore" aria-hidden="true"></i>
                          </a>
                    </div>
                    <div>
                        <form action="{{ route('admin.contact.destroy', $args) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger d-inline" name="delete" type="submit" style="width: 100px;">Xoá
                              <i class="fa fa-trash"></i>
                            </button>
                          </form>
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
