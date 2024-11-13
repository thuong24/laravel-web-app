@extends('layouts.admin')
@section('title', 'Chi tiết chủ đề')
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
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:120px;">Tên chủ đề</th>                           
                            <th class="text-center">Slug</th>
                            <th class="text-center">Mô tả</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Ngày thêm</th>
                            <th class="text-center" style="width:180px;">Ngày chỉnh sửa</th>
                            <th class="text-center" style="width:30px;">ID</th>
                        </tr>
                    </thead>
                    <tbody>                      
                        <tr>
                          <td class="text-center">
                            {{ $topic->name }}
                          </td>
                          <td class="text-center">
                            {{ $topic->slug }}
                          </td>
                          <td class="text-center">
                            {{ $topic->description }}
                          </td>
                          <td class="text-center">
                            {{ $topic->status }}
                          </td>
                          <td>
                            {{ $topic->created_at }}
                          </td>
                          <td>
                            {{ $topic->updated_at }}
                          </td>
                          <td class="text-center">
                            {{ $topic->id }}
                        </td>
                      </tbody>               
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
