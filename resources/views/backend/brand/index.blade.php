@extends('layouts.admin')
@section('title','Quản lý thương hiệu')
@section('content')
<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                    <a class="btn btn-sm btn-danger" href="{{ route('admin.brand.trash') }}">
                        <i class="fas fa-trash"></i> Thùng rác
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <form action="{{ route('admin.brand.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name">Tên thương hiệu</label>
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
                            <label for="sort_order">Sắp xếp</label>
                            <select name="sort_order" id="sort_order" class="form-control">
                                <option value="0">None</option>
                                {!! $sortorder !!}
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="image">Hình</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="status">Trạng thái</label>
                            <select name="status" id="status" class="form-control">
                                <option value="2">Chưa xuất bản</option>
                                <option value="1">Xuất bản</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="create" class="btn btn-success">Thêm thương hiệu</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-9">
                    {{-- <form id="bulk-action-form" action="{{ route('admin.brand.bulkAction') }}" method="post">
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
                                <th>Tên thương hiêu</th>
                                <th>Slug</th>
                                <th class="text-center" style="width:200px;">Chức năng</th>
                                <th class="text-center" style="width:30px;">ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_brand as $row)
                            <tr>
                              <td class="text-center">
                                <input type="checkbox" name="ids[]" value="{{ $row->id }}">
                              </td>
                              <td class="text-center">
                                <img src="{{ asset('images/brands/' . $row->image) }}" class="img-fluid" alt="{{ $row->image }}">
                              </td>
                              <td>
                                {{ $row->name }}
                              </td>
                              <td>
                                {{ $row->slug }}
                              </td>
                              <td class="text-center">
                                @php
                                $args = ['id' => $row->id];
                                @endphp
                                <div>
                                    @if ($row->status == 1)
                                    <a href="{{ route('admin.brand.status', $args) }}" class="btn btn-sm btn-success" style="width: 100px;">Hiện
                                        <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                    </a>
                                    @else
                                    <a href="{{ route('admin.brand.status', $args) }}" class="btn btn-sm btn-danger" style="width: 100px;">Ẩn
                                        <i class="fa fa-toggle-off" aria-hidden="true"></i>
                                    </a>
                                    @endif
                                </div>
                                <div>
                                    <a href="{{ route('admin.brand.show', $args) }}" class="btn btn-sm btn-info" style="width: 100px;">Chi tiết
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ route('admin.brand.edit', $args) }}" class="btn btn-sm btn-primary" style="width: 100px;">Sửa
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ route('admin.brand.delete', $args) }}" class="btn btn-sm btn-danger" style="width: 100px;">Xóa
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </td>

                              <td class="text-center">{{ $row->id }}</td>
                            </tr>
                            @endforeach
                          </tbody>

                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $list_brand->links() }}
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
