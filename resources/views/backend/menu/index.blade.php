@extends('layouts.admin')
@section('title','Quản lý menu')
@section('content')
<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                    <a class="btn btn-sm btn-danger" href="{{ route('admin.menu.trash') }}">
                        <i class="fas fa-trash"></i> Thùng rác
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <form action="{{ route('admin.menu.store') }}" method="post">
                        @csrf
                        <div class="accordion" id="accordionExample">
                            <div class="card p-3">
                                <label for="position">Vị trí</label>
                                <select name="position" id="position" class="form-control">
                                    <option value="mainmenu">Main menu</option>
                                    <option value="footermenu">Footer menu</option>
                                </select>
                            </div>
                            <div class="card p-3">
                                <label for="status">Trạng thái</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="2">Chưa xuất bản</option>
                                    <option value="1">Xuất bản</option>
                                </select>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingCategory">
                                    <a class="d-block" data-toggle="collapse"
                                        data-target="#collapseCategory" aria-expanded="true"
                                        aria-controls="collapseCategory">
                                        Danh mục
                                    </a>
                                </div>
                                <div id="collapseCategory" class="collapse"
                                    aria-labelledby="headingCategory" data-parent="#accordionExample">
                                    <div class="card-body">
                                        @foreach ($list_category as $category)
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" name="categoryid[]" type="checkbox" value="{{ $category->id }}" id="category{{ $category->id }}">
                                            <label class="form-check-label" for="category{{ $category->id }}">
                                              {{ $category->name }}
                                            </label>
                                        </div>
                                        @endforeach

                                        <div class="mb-3">
                                            <input type="submit" name="createCategory" class="btn btn-success" value="Thêm menu">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                            <div class="card">
                                <div class="card-header" id="headingBrand">
                                    <a class="d-block" data-toggle="collapse"
                                        data-target="#collapseBrand" aria-expanded="true"
                                        aria-controls="collapseBrand">
                                        Thương hiệu
                                    </a>
                                </div>
                                <div id="collapseBrand" class="collapse"
                                    aria-labelledby="headingBrand" data-parent="#accordionExample">
                                    <div class="card-body">
                                        @foreach ($list_brand as $brand)
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" name="brandid[]" type="checkbox" value="{{ $brand->id }}" id="brand{{ $brand->id }}">
                                            <label class="form-check-label" for="brand{{ $brand->id }}">
                                              {{ $brand->name }}
                                            </label>
                                        </div>
                                        @endforeach
                                        <div class="mb-3">
                                            <input type="submit" name="createBrand" class="btn btn-success" value="Thêm menu">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                            <div class="card">
                                <div class="card-header" id="headingTopic">
                                    <a class="d-block" data-toggle="collapse"
                                        data-target="#collapseTopic" aria-expanded="true"
                                        aria-controls="collapseTopic">
                                       Chủ đề
                                    </a>
                                </div>
                                <div id="collapseTopic" class="collapse"
                                    aria-labelledby="headingTopic" data-parent="#accordionExample">
                                    <div class="card-body">
                                        @foreach ($list_topic as $topic)
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" name="topicid[]" type="checkbox" value="{{ $topic->id }}" id="topic{{ $topic->id }}">
                                            <label class="form-check-label" for="topic{{ $topic->id }}">
                                              {{ $topic->name }}
                                            </label>
                                        </div>
                                        @endforeach
                                        <div class="mb-3">
                                            <input type="submit" name="createTopic" class="btn btn-success" value="Thêm menu">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                            <div class="card">
                                <div class="card-header" id="headingPage">
                                    <a class="d-block" data-toggle="collapse"
                                        data-target="#collapsePage" aria-expanded="true"
                                        aria-controls="collapsePage">
                                        Trang đơn
                                    </a>
                                </div>
                                <div id="collapsePage" class="collapse"
                                    aria-labelledby="headingPage" data-parent="#accordionExample">
                                    <div class="card-body">
                                        @foreach ($list_page as $page)
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" name="pageid[]" type="checkbox" value="{{ $page->id }}" id="page{{ $page->id }}">
                                            <label class="form-check-label" for="page{{ $page->id }}">
                                              {{ $page->title }}
                                            </label>
                                        </div>
                                        @endforeach
                                        <div class="mb-3">
                                            <input type="submit" name="createPage" class="btn btn-success" value="Thêm menu">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                            <div class="card">
                                <div class="card-header" id="headingCustom">
                                    <a class="d-block" data-toggle="collapse"
                                        data-target="#collapseCustom" aria-expanded="true"
                                        aria-controls="collapseCustom">
                                        Tùy liên kết
                                    </a>
                                </div>
                                <div id="collapseCustom" class="collapse"
                                    aria-labelledby="headingCustom" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="name">Tên menu</label>
                                            <input type="text" value="" name="name" id="name" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="link">Liên kết</label>
                                            <input type="text" value="" name="link" id="link" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <input type="submit" name="createCustom" class="btn btn-success" value="Thêm menu">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                    </form>
                </div>
                <div class="col-md-9">
                    {{-- <form id="bulk-action-form" action="{{ route('admin.menu.bulkAction') }}" method="post">
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
                                <th>Tên menu</th>
                                <th>Liên kết</th>
                                <th>Vị trí</th>
                                <th class="text-center" style="width:200px;">Chức năng</th>
                                <th class="text-center" style="width:30px;">ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_menu as $row_menu)
                            <tr>
                              <td class="text-center">
                                <input type="checkbox" name="ids[]" value="{{ $row_menu->id }}">
                              </td>
                              <td>
                                {{ $row_menu->name }}
                              </td>
                              <td>
                                {{ $row_menu->link }}
                              </td>
                              <td>
                                {{ $row_menu->position }}
                              </td>
                              <td class="text-center">
                                @php
                                $args = ['id' => $row_menu->id];
                                @endphp
                                <div>
                                    @if ($row_menu->status == 1)
                                    <a href="{{ route('admin.menu.status', $args) }}" class="btn btn-sm btn-success" style="width: 100px;">Hiện
                                        <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                    </a>
                                    @else
                                    <a href="{{ route('admin.menu.status', $args) }}" class="btn btn-sm btn-danger" style="width: 100px;">Ẩn
                                        <i class="fa fa-toggle-off" aria-hidden="true"></i>
                                    </a>
                                    @endif
                                </div>
                                <div>
                                    <a href="{{ route('admin.menu.show', $args) }}" class="btn btn-sm btn-info" style="width: 100px;">Chi tiết
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ route('admin.menu.edit', $args) }}" class="btn btn-sm btn-primary" style="width: 100px;">Sửa
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ route('admin.menu.delete', $args) }}" class="btn btn-sm btn-danger" style="width: 100px;">Xóa
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </td>

                              <td class="text-center">{{ $row_menu->id }}</td>
                            </tr>
                            @endforeach
                          </tbody>

                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $list_menu->links() }}
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
