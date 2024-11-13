@extends('layouts.admin')
@section('title','Chi tiết bài viết')
@section('content')
  <section class="content">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-12 text-right">
            <a class="btn btn-sm btn-info" href="{{ route('admin.post.index') }}">
                <i class="fa fa-arrow-left"></i> Về danh sách
              </a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th style="width:90px;" class="text-center">Hình</th>
                    <th class="text-center" style="width:140px;">Tiêu đề bài viết</th>
                    <th class="text-center" style="width:100px;">Chủ đề</th>
                    <th class="text-center">Slug</th>                  
                    <th>Chi tiết</th>
                    <th>Mô tả</th>
                    <th>Kiểu</th>
                    <th>Status</th>
                    <th>Ngày thêm</th>
                    <th>Ngày chỉnh sửa</th>
                    <th class="text-center" style="width:30px;">ID</th>
                </tr>
            </thead>
            <tbody>                      
                <tr>
                    <td class="text-center">
                        <img src="{{ asset('images/posts/' . $post->image) }}" class="img-fluid" alt="{{ $post->image }}">
                    </td>
                  <td>
                    {{ $post->title }}
                  </td>
                  <td>
                    @foreach ($list_topic as $item_topic)
                        @if ($item_topic->id == $post->topic_id)
                        {{ $item_topic->name }}
                        @endif
                    @endforeach
                  </td>
                  <td>
                    {{ $post->slug }}
                  </td>
                  <td>
                    {{ $post->detail }}
                  </td>
                  <td>
                    {{ $post->description }}
                  </td>
                  <td>
                    {{ $post->type }}
                  </td>
                  <td>
                    {{ $post->status }}
                  </td>
                  <td>
                    {{ $post->created_at }}
                  </td>
                  <td>
                    {{ $post->updated_at }}
                  </td>
                  <td class="text-center">{{ $post->id }}</td>
                </tr>
              </tbody>
        </table>
    </div>
</div>
</section>
@endsection
