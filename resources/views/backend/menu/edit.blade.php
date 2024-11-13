@extends('layouts.admin')
@section('title','Chỉnh sửa menu')
@section('content')
<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                    <a class="btn btn-sm btn-info" href="{{ route('admin.menu.index') }}">
                        <i class="fa fa-arrow-left"></i> Về danh sách
                      </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.menu.update', ['id' =>$menu->id]) }}" method="post">
                @csrf
                @method('put')
                <div class="accordion" id="accordionExample">
                    <div class="card p-3">
                        <label for="position">Vị trí</label>
                        <select name="position" id="position" class="form-control">
                            <option value="mainmenu" {{ $menu->position == 'mainmenu' ? 'selected' : '' }}>Main menu</option>
                            <option value="footermenu" {{ $menu->position == 'footermenu' ? 'selected' : '' }}>Footer menu</option>
                        </select>
                    </div>
                    <div class="card p-3">
                        <label for="status">Trạng thái</label>
                        <select name="status" id="status" class="form-control">
                            <option value="2" {{ $menu->status == 2 ? 'selected' : '' }}>Chưa xuất bản</option>
                            <option value="1" {{ $menu->status == 1 ? 'selected' : '' }}>Xuất bản</option>
                        </select>
                    </div>
                    @if ($menu->type == 'category')
                    <div class="card">
                        <div class="card-header" id="headingCategory">
                            <a class="d-block" data-toggle="collapse"
                                data-target="#collapseCategory" aria-expanded="true"
                                aria-controls="collapseCategory">
                                Danh mục
                            </a>
                        </div>
                        <div id="collapseCategory" class="collapse show"
                            aria-labelledby="headingCategory" data-parent="#accordionExample">
                            <div class="card-body">
                                @foreach ($list_category as $category)
                                <div class="form-check mb-2">
                                    <input class="form-check-input" name="categoryid[]" type="checkbox" value="{{ $category->id }}" id="category{{ $category->id }}" {{ $category->id == $menu->table_id ? 'checked' : '' }}>
                                    <label class="form-check-label" for="category{{ $category->id }}">
                                      {{ $category->name }}
                                    </label>
                                </div>
                                @endforeach
                                <div class="mb-3">
                                    <input type="submit" name="createCategory" class="btn btn-success" value="Cập nhật menu">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- end card -->
                    @if ($menu->type == 'brand')
                    <div class="card">
                        <div class="card-header" id="headingBrand">
                            <a class="d-block" data-toggle="collapse"
                                data-target="#collapseBrand" aria-expanded="true"
                                aria-controls="collapseBrand">
                                Thương hiệu
                            </a>
                        </div>
                        <div id="collapseBrand" class="collapse show"
                            aria-labelledby="headingBrand" data-parent="#accordionExample">
                            <div class="card-body">
                                @foreach ($list_brand as $brand)
                                <div class="form-check mb-2">
                                    <input class="form-check-input" name="brandid[]" type="checkbox" value="{{ $brand->id }}" id="brand{{ $brand->id }}" {{ $brand->id == $menu->table_id ? 'checked' : '' }}>
                                    <label class="form-check-label" for="brand{{ $brand->id }}">
                                      {{ $brand->name }}
                                    </label>
                                </div>
                                @endforeach
                                <div class="mb-3">
                                    <input type="submit" name="createBrand" class="btn btn-success" value="Cập nhật menu">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- end card -->
                    @if ($menu->type == 'topic')
                    <div class="card">
                        <div class="card-header" id="headingTopic">
                            <a class="d-block" data-toggle="collapse"
                                data-target="#collapseTopic" aria-expanded="true"
                                aria-controls="collapseTopic">
                               Chủ đề
                            </a>
                        </div>
                        <div id="collapseTopic" class="collapse show"
                            aria-labelledby="headingTopic" data-parent="#accordionExample">
                            <div class="card-body">
                                @foreach ($list_topic as $topic)
                                <div class="form-check mb-2">
                                    <input class="form-check-input" name="topicid[]" type="checkbox" value="{{ $topic->id }}" id="topic{{ $topic->id }}" {{ $topic->id == $menu->table_id ? 'checked' : '' }}>
                                    <label class="form-check-label" for="topic{{ $topic->id }}">
                                      {{ $topic->name }}
                                    </label>
                                </div>
                                @endforeach
                                <div class="mb-3">
                                    <input type="submit" name="createTopic" class="btn btn-success" value="Cập nhật menu">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- end card -->
                    @if ($menu->type == 'page')
                    <div class="card">
                        <div class="card-header" id="headingPage">
                            <a class="d-block" data-toggle="collapse"
                                data-target="#collapsePage" aria-expanded="true"
                                aria-controls="collapsePage">
                                Trang đơn
                            </a>
                        </div>
                        <div id="collapsePage" class="collapse show"
                            aria-labelledby="headingPage" data-parent="#accordionExample">
                            <div class="card-body">
                                @foreach ($list_page as $page)
                                <div class="form-check mb-2">
                                    <input class="form-check-input" name="pageid[]" type="checkbox" value="{{ $page->id }}" id="page{{ $page->id }}" {{ $page->id == $menu->table_id ? 'checked' : '' }}>
                                    <label class="form-check-label" for="page{{ $page->id }}">
                                      {{ $page->title }}
                                    </label>
                                </div>
                                @endforeach
                                <div class="mb-3">
                                    <input type="submit" name="createPage" class="btn btn-success" value="Cập nhật menu">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- end card -->
                    @if ($menu->type == 'custom')
                    <div class="card">
                        <div class="card-header" id="headingCustom">
                            <a class="d-block" data-toggle="collapse"
                                data-target="#collapseCustom" aria-expanded="true"
                                aria-controls="collapseCustom">
                                Tùy liên kết
                            </a>
                        </div>
                        <div id="collapseCustom" class="collapse show"
                            aria-labelledby="headingCustom" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="name">Tên menu</label>
                                    <input type="text" value="{{ old('name',$menu->name) }}" name="name" id="name" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="link">Liên kết</label>
                                    <input type="text" value="{{ old('name',$menu->link) }}" name="link" id="link" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <input type="submit" name="createCustom" class="btn btn-success" value="Cập nhật menu">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- end card -->
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
