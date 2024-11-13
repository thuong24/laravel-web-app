<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;

class UserController extends Controller
{
    public function index()
    {
        $list_user = User::where('status','!=',0)
            ->orderBy('created_at','DESC')
            ->select("id","name","phone","email","image","roles","status")
            ->paginate(5);
        return view("backend.user.index",compact('list_user'));
    }
    public function trash()
    {
        $list_user = User::where('status','=',0)
        ->orderBy('created_at','DESC')
        ->select("id","name","phone","email","image","roles","status")
        ->paginate(5);
        return view("backend.user.trash",compact('list_user'));
    }
    public function create()
    {
        return view("backend.user.create");
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        if($request->image){
            $exten = $request->file("image")->extension();
            if(in_array($exten,["png", "jpg", "gif", "webp", "jfif"]))
            {
                $filename = $user->name . "." . $exten;
                $request->image->move(public_path("images/users"), $filename);
                $user->image = $filename;
            }
        }
        $user->roles = $request->roles;
        $user->status = $request->status;
        $user->created_at = date('Y-m-d H:i:s');
        $user->created_by = Auth::id() ?? 1;
        $user->save();
        return redirect()->route('admin.user.index')->with('success', 'Thêm thành viên thành công.');
    }

    public function show(string $id)
    {
        $user = User::find($id);
        if($user == null){
            return redirect()->route('admin.user.index');
        }
        return view("backend.user.show",compact('user'));
    }

    public function edit(string $id)
    {
        $user = User::find($id);
        if($user == null){
            return redirect()->route('admin.user.index');
        }
        return view('backend.user.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if($user == null){
            return redirect()->route('admin.user.index');
        }
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        if($request->image){
            $exten = $request->file("image")->extension();
            if(in_array($exten,["png", "jpg", "gif", "webp", "jfif"]))
            {
                $filename = $user->name . "." . $exten;
                $request->image->move(public_path("images/users"), $filename);
                $user->image = $filename;
            }
        }
        $user->roles = $request->roles;
        $user->status = $request->status;
        $user->updated_at = now();
        $user->updated_by = Auth::id() ?? 1;
        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'Chỉnh sửa thành viên thành công.');
    }


    public function destroy(string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('admin.user.index');
        }
        $user->delete();
        return redirect()->route('admin.user.trash');
    }
    public function status(string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('admin.user.index');
        }
        $user->status = ($user->status == 1) ? 2 : 1;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->updated_by = Auth::id() ?? 1;
        $user->save();
        return redirect()->route('admin.user.index');
    }
    public function delete(string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('admin.user.index');
        }
        $user->status = 0;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->updated_by = Auth::id() ?? 1;
        $user->save();
        return redirect()->route('admin.user.index');
    }
    public function restore(string $id)
    {
        $user = User::find($id);
        if ($prouserduct == null) {
            return redirect()->route('admin.user.index');
        }
        $user->status = 2;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->updated_by = Auth::id() ?? 1;
        $user->save();
        return redirect()->route('admin.user.trash');
    }
    // public function bulkAction(Request $request)
    // {
    //     $ids = $request->input('ids');
    //     $action = $request->input('bulk_action');

    //     if (empty($ids) || empty($action)) {
    //         return redirect()->route('admin.user.index')->with('error', 'Chưa chọn user hoặc hành động.');
    //     }

    //     switch ($action) {
    //         case 'update':
    //             foreach ($ids as $id) {
    //                 $user = user::find($id);
    //                 if ($user != null) {
    //                     $user->status = ($user->status == 1) ? 2 : 1;
    //                     $user->updated_at = now();
    //                     $user->updated_by = Auth::id() ?? 1;
    //                     $user->save();
    //                 }
    //             }
    //             return redirect()->route('admin.user.index')->with('success', 'Cập nhật trạng thái thành công.');

    //         case 'delete':
    //             foreach ($ids as $id) {
    //                 $user = user::find($id);
    //                 if ($user != null) {
    //                     $user->status = 0;
    //                     $user->updated_at = now();
    //                     $user->updated_by = Auth::id() ?? 1;
    //                     $user->save();
    //                 }
    //             }
    //             return redirect()->route('admin.user.index')->with('success', 'Xóa user thành công.');

    //         default:
    //             return redirect()->route('admin.user.index')->with('error', 'Hành động không hợp lệ.');
    //     }
    // }

}
