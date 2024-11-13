@extends('layouts.admin')
@section('title','Quản lý bài viết')
@section('content')
<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                    <a href="{{ route('admin.post.create') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-plus"></i> Thêm
                    </a>
                    <a href="{{ route('admin.post.trash') }}" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Thùng rác
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{-- <form id="bulk-action-form" action="{{ route('admin.post.bulkAction') }}" method="post">
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
                        <th>Tiêu đề bài viết</th>
                        <th>Chủ đề</th>
                        <th>Kiểu</th>
                        <th class="text-center" style="width:200px;">Chức năng</th>
                        <th class="text-center" style="width:30px;">ID</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list_post as $row_post)
                    <tr>
                      <td class="text-center">
                        <input type="checkbox" name="ids[]" value="{{ $row_post->id }}">
                      </td>
                      <td class="text-center">
                        <img src="{{ asset('images/posts/' . $row_post->image) }}" class="img-fluid" alt="{{ $row_post->image }}">
                      </td>
                      <td>
                        {{ $row_post->title }}
                      </td>
                      <td>
                        {{ $row_post->detail }}
                      </td>
                      <td>
                        {{ $row_post->type }}
                      </td>
                      <td class="text-center">
                        @php
                        $args = ['id' => $row_post->id];
                        @endphp
                        <div>
                            @if ($row_post->status == 1)
                            <a href="{{ route('admin.post.status', $args) }}" class="btn btn-sm btn-success" style="width: 100px;">Hiện
                                <i class="fa fa-toggle-on" aria-hidden="true"></i>
                            </a>
                            @else
                            <a href="{{ route('admin.post.status', $args) }}" class="btn btn-sm btn-danger" style="width: 100px;">Ẩn
                                <i class="fa fa-toggle-off" aria-hidden="true"></i>
                            </a>
                            @endif
                        </div>
                        <div>
                            <a href="{{ route('admin.post.show', $args) }}" class="btn btn-sm btn-info" style="width: 100px;">Chi tiết
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div>
                            <a href="{{ route('admin.post.edit', $args) }}" class="btn btn-sm btn-primary" style="width: 100px;">Sửa
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div>
                            <a href="{{ route('admin.post.delete', $args) }}" class="btn btn-sm btn-danger" style="width: 100px;">Xóa
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </div>
                    </td>

                      <td class="text-center">{{ $row_post->id }}</td>
                    </tr>
                    @endforeach
                  </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $list_post->links() }}
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
