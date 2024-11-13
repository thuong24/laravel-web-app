@extends('layouts.admin')
@section('title','Quản lý bình luận')
@section('content')
<section class="content">
    <div class="card">
        <div class="card-body">
            <div class="row">
                {{-- <form id="bulk-action-form" action="{{ route('admin.comment.bulkAction') }}" method="post">
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
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Bài viết bình luận</th>
                            <th>Bình luận</th>
                            <th class="text-center" style="width:200px;">Chức năng</th>
                            <th class="text-center" style="width:30px;">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_comment as $row_comment)
                        <tr>
                          <td class="text-center">
                            <input type="checkbox" name="ids[]" value="{{ $row_comment->id }}">
                          </td>
                          <td>
                            {{ $row_comment->name }}
                          </td>
                          <td>
                            {{ $row_comment->email }}
                          </td>
                          <td>
                            @foreach ($list_post as $post_item)
                               @if ($row_comment->post_id == $post_item->id)
                            {{ $post_item->title }}
                            @endif
                            @endforeach
                          </td>
                          <td>
                            {{ $row_comment->comment }}
                          </td>
                          <td class="text-center">
                            @php
                            $args = ['id' => $row_comment->id];
                            @endphp
                            <div>
                                @if ($row_comment->status == 1)
                                <a href="{{ route('admin.comment.status', $args) }}" class="btn btn-sm btn-success" style="width: 100px;">Hiện
                                    <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                </a>
                                @else
                                <a href="{{ route('admin.comment.status', $args) }}" class="btn btn-sm btn-danger" style="width: 100px;">Ẩn
                                    <i class="fa fa-toggle-off" aria-hidden="true"></i>
                                </a>
                                @endif
                            </div>
                            <div>
                                <form action="{{ route('admin.topic.destroy', $args) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-danger d-inline" name="delete" type="submit" style="width: 100px;">Xoá
                                      <i class="fa fa-trash"></i>
                                    </button>
                                  </form>
                            </div>
                        </td>
                        <td class="text-center">{{ $row_comment->id }}</td>
                        @endforeach
                      </tbody>

                </table>
                <div class="d-flex justify-content-center">
                    {{ $list_comment->links() }}
                </div>
                </form>
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
