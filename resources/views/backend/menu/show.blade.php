@extends('layouts.admin')
@section('title','Chi tiết menu')
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
            <div class="row">
              <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center" style="width:100px;">Tên menu</th>
                        <th class="text-center">Liên kết</th>
                        <th class="text-center">Vị trí</th>
                        <th class="text-center">Kiểu</th>
                        <th class="text-center">Table id</th>
                        <th class="text-center">Status</th>
                        <th class="text-center" style="width:170px;">Ngày thêm</th>
                        <th class="text-center" style="width:170px;">Ngày chỉnh sửa</th>
                        <th class="text-center" style="width:30px;">ID</th>
                    </tr>
                </thead>
                <tbody>                      
                    <tr>
                      <td class="text-center">
                        {{ $menu->name }}
                      </td>
                      <td>
                        {{ $menu->link }}
                      </td>
                      <td>
                        {{ $menu->position }}
                      </td>
                      <td class="text-center">
                        {{ $menu->type }}
                      </td>
                      <td class="text-center">
                        {{ $menu->table_id }}
                      </td>
                      <td class="text-center">
                        {{ $menu->status }}
                      </td>
                      <td>
                        {{ $menu->created_at }}
                      </td>
                      <td>
                        {{ $menu->updated_at }}
                      </td>
                      <td class="text-center">{{ $menu->id }}</td>
                    </tr>
                  </tbody>
            
            </table>
            </div>
        </div>
    </div>
</section>
@endsection
