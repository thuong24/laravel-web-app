<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_order = Order::where('status','!=',0)
            ->orderBy('created_at','DESC')
            ->select("id","delivery_name","status","delivery_email","delivery_phone","created_at")
            ->paginate(5);
        return view("backend.order.index",compact('list_order'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::find($id);
        if($order == null){
            return redirect()->route('admin.order.index');
        }
        return view("backend.order.show",compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function status(string $id)
    {
        $order = Order::find($id);
        if($order == null){
            return redirect()->route('admin.order.index');
        }
        $order->status = ($order->status == 1) ? 2 : 1;
        $order->updated_at = date('Y-m-d H:i:s');
        $order->updated_by = Auth::id() ?? 1;
        $order->save();
        return redirect()->route('admin.order.index');
    }
    // public function bulkAction(Request $request)
    // {
    //     $ids = $request->input('ids');
    //     $action = $request->input('bulk_action');

    //     if (empty($ids) || empty($action)) {
    //         return redirect()->route('admin.order.index')->with('error', 'Chưa chọn giỏ hàng hoặc hành động.');
    //     }

    //     switch ($action) {
    //         case 'update':
    //             foreach ($ids as $id) {
    //                 $order = order::find($id);
    //                 if ($order != null) {
    //                     $order->status = ($order->status == 1) ? 2 : 1;
    //                     $order->updated_at = now();
    //                     $order->updated_by = Auth::id() ?? 1;
    //                     $order->save();
    //                 }
    //             }
    //             return redirect()->route('admin.order.index')->with('success', 'Cập nhật trạng thái thành công.');

    //         case 'delete':
    //             foreach ($ids as $id) {
    //                 $order = order::find($id);
    //                 if ($order != null) {
    //                     $order->status = 0;
    //                     $order->updated_at = now();
    //                     $order->updated_by = Auth::id() ?? 1;
    //                     $order->save();
    //                 }
    //             }
    //             return redirect()->route('admin.product.index')->with('success', 'Xóa sản phẩm thành công.');

    //         default:
    //             return redirect()->route('admin.product.index')->with('error', 'Hành động không hợp lệ.');
    //     }
    // }

}
