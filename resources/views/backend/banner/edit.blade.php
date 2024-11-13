@extends('layouts.admin')
@section('title','Chỉnh sửa banner')
@section('content')
  <!-- Main content -->
  <section class="content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                    <a class="btn btn-sm btn-info" href="{{ route('admin.banner.index') }}">
                        <i class="fa fa-arrow-left"></i> Về danh sách
                      </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.banner.update', ['id' =>$banner->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="name">Tên banner</label>
                    <input type="text" value="{{ old('name',$banner->name) }}" name="name" id="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="link">Liên kết</label>
                    <input type="text" value="{{ old('link',$banner->link) }}" name="link" id="link" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="description">Mô tả</label>
                    <textarea name="description" id="description" class="form-control">{{ old('description',$banner->description) }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="postion">Vị trí</label>
                    <select name="position" id="position" class="form-control">
                        <option value="slideshow" {{ $banner->position == 'slideshow' ? 'selected' : '' }}>Slider</option>
                        <option value="banner" {{ $banner->position == 'banner' ? 'selected' : '' }}>Banner</option>
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
                    <button type="submit" name="create" class="btn btn-success">Cập nhật banner</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
