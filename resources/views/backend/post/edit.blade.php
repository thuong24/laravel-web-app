@extends('layouts.admin')
@section('title','Chỉnh sửa bài viết')
@section('content')
<form action="{{ route('admin.post.update', ['id' =>$post->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 text-right">
                        <button type="submit" name="create" class="btn btn-sm btn-success">
                            <i class="fa fa-save"></i> Cập nhật
                        </button>
                        <a class="btn btn-sm btn-info" href="{{ route('admin.post.index') }}">
                            <i class="fa fa-arrow-left"></i> Về danh sách
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <div class="mb-3">
                            <label for="title">Tiêu đề</label>
                            <input type="text" value="{{ old('title', $post->title) }}" name="title" id="title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="detail">Chi tiết</label>
                            <textarea name="detail" id="detail" rows="8" class="form-control">{{ old('detail', $post->detail) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="description">Mô tả</label>
                            <textarea name="description" id="description" class="form-control">{{ old('description', $post->description) }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="topic_id">Chủ đề</label>
                            <select name="topic_id" id="topic_id" class="form-control">
                                {!! $topicid !!}
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="type">Kiểu</label>
                            <select name="type" id="type" class="form-control">
                                <option value="post" {{ $post->type == 'post' ? 'selected' : '' }}>Bài viết</option>
                                <option value="page" {{ $post->type == 'page' ? 'selected' : '' }}>Trang đơn</option>
                            </select>
                        </div>
                        <div class="mb-3">
                          <label for="image">Hình</label>
                          <input type="file" name="image" id="image" class="form-control">
                      </div>
                        <div class="mb-3">
                            <label for="status">Trạng thái</label>
                            <select name="status" id="status" class="form-control">
                                <option value="2" {{ $post->status == 2 ? 'selected' : '' }}>Chưa xuất bản</option>
                                <option value="1" {{ $post->status == 1 ? 'selected' : '' }}>Xuất bản</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
@endsection
