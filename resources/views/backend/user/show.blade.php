@extends('layouts.admin')
@section('title','Quản lý thành viên')
@section('content')
<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                    <a class="btn btn-sm btn-info" href="{{ route('admin.user.index') }}">
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
                            <th class="text-center" style="width:90px;">Hình</th>
                            <th class="text-center" style="width:30px;">Họ tên</th>
                            <th class="text-center">Tên đăng nhập</th>
                            <th class="text-center">Giới tính</th>
                            <th class="text-center">Điện thoại</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Quyền</th>
                            <th class="text-center">Địa chỉ</th>
                            <th class="text-center">Remember_token</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Ngày thêm</th>
                            <th class="text-center">Ngày chỉnh sửa</th>
                            <th class="text-center" style="width:30px;">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <td class="text-center">
                            <img src="{{ asset('images/users/' . $user->image) }}" class="img-fluid" alt="{{ $user->image }}">
                          </td>
                          <td class="text-center">
                            {{ $user->name }}
                          </td>
                          <td class="text-center">
                            {{ $user->username }}
                          </td>
                          <td class="text-center">
                            @if ($user->gender == 1)
                                Nam
                            @else
                                Nữ
                            @endif
                          </td class="text-center">
                          <td>
                            {{ $user->phone }}
                          </td>
                          <td class="text-center">
                            {{ $user->email }}
                          </td>
                          <td class="text-center">
                            {{ $user->roles }}
                          </td>
                          <td class="text-center">
                            {{ $user->address }}
                          </td>
                          <td class="text-center">
                            {{ $user->remember_token }}
                          </td>
                          <td class="text-center">
                            {{ $user->status }}
                          </td>
                          <td class="text-center">
                            {{ $user->created_at }}
                          </td>
                          <td class="text-center">
                            {{ $user->updated_at }}
                          </td>
                          <td class="text-center">{{ $user->id }}</td>
                        </tr>
                      </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection
