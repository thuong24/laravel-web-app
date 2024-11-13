@extends('layouts.admin')
@section('title','Chi tiết liên hệ')
@section('content')
  <section class="content">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-12 text-right">
            <a class="btn btn-sm btn-info" href="{{ route('admin.contact.index') }}">
                <i class="fa fa-arrow-left"></i> Về danh sách
              </a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center" style="width:120px;">Họ tên KH</th>
                    <th class="text-center" style="width:120px;">Slug</th>
                    <th class="text-center">Mô tả</th>
                    <th class="text-center">Parent id</th>
                    <th>Sort order</th>
                    <th>Status</th>
                    <th>Ngày thêm</th>
                    <th>Ngày chỉnh sửa</th>
                    <th class="text-center" style="width:30px;">ID</th>
                </tr>
            </thead>
            <tbody>                      
                <tr>
                  <td>
                    {{ $contact->name }}
                  </td>
                  <td>
                    {{ $contact->slug }}
                  </td>
                  <td>
                    {{ $contact->description }}
                  </td>
                  <td>
                    {{ $contact->parent_id }}
                  </td>
                  <td>
                    {{ $contact->sort_order }}
                  </td>
                  <td>
                    {{ $contact->status }}
                  </td>
                  <td>
                    {{ $contact->created_at }}
                  </td>
                  <td>
                    {{ $contact->updated_at }}
                  </td>
                  <td class="text-center">{{ $contact->id }}</td>
                </tr>
              </tbody>
        </table>
    </div>
</div>
</section>
@endsection
