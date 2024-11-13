@extends('layouts.admin')
@section('title','Chi tiết đơn hàng')
@section('content')
  <section class="content">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-12 text-right">
            <a class="btn btn-sm btn-info" href="{{ route('admin.order.index') }}">
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
                    <th class="text-center" style="width:120px;">Giới tính</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Ghi chú</th>
                    <th>Ngày thêm</th>
                    <th class="text-center" style="width:30px;">ID</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                  <td>
                    {{ $order->delivery_name }}
                  </td>
                  <td>
                        @if ($order->delivery_gender == 1)
                            Nam
                        @else
                            Nữ
                        @endif
                  </td>
                  <td>
                    {{ $order->delivery_email }}
                  </td>
                  <td>
                    {{ $order->delivery_phone }}
                  </td>
                  <td>
                    {{ $order->delivery_address }}
                  </td>
                  <td>
                    {{ $order->note }}
                  </td>
                  <td>
                    {{ $order->created_at }}
                  </td>
                  <td class="text-center">{{ $order->id }}</td>
                </tr>
              </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $list_order->links() }}
        </div>
    </div>
</div>
</section>
@endsection
