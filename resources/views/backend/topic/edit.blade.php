@extends('layouts.admin')
@section('title','Chỉnh sửa chủ đề')
@section('content')
<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                    <a class="btn btn-sm btn-info" href="{{ route('admin.topic.index') }}">
                        <i class="fas fa-arrow-left"></i> Về danh sách
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <form action="{{ route('admin.topic.update', ['id' =>$topic->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name">Tên chủ đề</label>
                            <input type="text" value="{{ old('name', $topic->name) }}" name="name" id="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="description">Mô tả</label>
                            <textarea name="description" id="description" class="form-control">{{ old('description', $topic->description) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="sort_order">Sắp xếp</label>
                            <input type="number" value="{{ old('sort_order', $topic->sort_order) }}" name="sort_order" id="sort_order" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="status">Trạng thái</label>
                            <select name="status" id="status" class="form-control">
                                <option value="2" @if(old('status', $topic->status) == 2) selected @endif>Chưa xuất bản</option>
                                <option value="1" @if(old('status', $topic->status) == 1) selected @endif>Xuất bản</option>
                            </select>
                        </div>
                        <div class="mb-3 text-right">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
