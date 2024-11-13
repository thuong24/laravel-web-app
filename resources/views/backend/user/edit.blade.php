@extends('layouts.admin')
@section('title','Chỉnh sửa thành viên')
@section('content')
<form action="{{ route('admin.user.update', $user->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 text-right">
                        <button type="submit" name="update" class="btn btn-sm btn-success">
                            <i class="fa fa-save"></i> Lưu
                        </button>
                        <a class="btn btn-sm btn-info" href="{{ route('admin.user.index') }}">
                            <i class="fa fa-arrow-left"></i> Về danh sách
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name">Họ tên</label>
                            <input type="text" value="{{ $user->name }}" name="name" id="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="phone">Điện thoại</label>
                            <input type="text" value="{{ $user->phone }}" name="phone" id="phone" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="text" value="{{ $user->email }}" name="email" id="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="gender">Giới tính</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="1" {{ $user->gender == 1 ? 'selected' : '' }}>Nam</option>
                                <option value="0" {{ $user->gender == 0 ? 'selected' : '' }}>Nữ</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="address">Địa chỉ</label>
                            <input type="text" value="{{ $user->address }}" name="address" id="address" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="image">Hình</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="username">Tên đăng nhập</label>
                            <input type="text" value="{{ $user->username }}" name="username" id="username" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="password">Mật khẩu</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="password_re">Xác nhận mật khẩu</label>
                            <input type="password" name="password_re" id="password_re" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="roles">Quyền</label>
                            <select name="roles" id="roles" class="form-control">
                                <option value="customer" {{ $user->roles == 'customer' ? 'selected' : '' }}>Khách hàng</option>
                                <option value="admin" {{ $user->roles == 'admin' ? 'selected' : '' }}>Quản lý</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status">Trạng thái</label>
                            <select name="status" id="status" class="form-control">
                                <option value="2" {{ $user->status == 2 ? 'selected' : '' }}>Chưa xuất bản</option>
                                <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Xuất bản</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
@endsection
