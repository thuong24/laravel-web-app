<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;

class ContactController extends Controller
{

    public function index()
    {
        $list_contact = Contact::where('contact.status','!=',0)
            ->leftJoin('user','contact.user_id','=','user.id')
            ->orderBy('contact.created_at','DESC')
            ->select("contact.id","contact.name","contact.email","contact.status","contact.phone","contact.title","contact.content")
            ->paginate(5);
        return view("backend.contact.index",compact('list_contact'));
    }
    public function trash()
    {
        $list_contact = Contact::where('contact.status','=',0)
            ->leftJoin('user','contact.user_id','=','user.id')
            ->orderBy('contact.created_at','DESC')
            ->select("contact.id","contact.name","contact.email","contact.status","contact.phone","contact.title","contact.content")
            ->paginate(5);
        return view("backend.contact.trash",compact('list_contact'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        $contact = Contact::find($id);
        if($contact == null){
            return redirect()->route('admin.contact.index');
        }
        return view("backend.contact.show",compact('contact'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(UpdateContactRequest $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
    public function status(string $id)
    {
        $contact = Contact::find($id);
        if($contact == null){
            return redirect()->route('admin.contact.index');
        }
        $contact->status = ($contact->status == 1) ? 2 : 1;
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->updated_by = Auth::id() ?? 1;
        $contact->save();
        return redirect()->route('admin.contact.index');
    }
    public function delete(string $id)
    {
        $contact = contact::find($id);
        if($contact == null){
            return redirect()->route('admin.contact.index');
        }
        $contact->status = 0;
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->updated_by = Auth::id() ?? 1;
        $contact->save();
        return redirect()->route('admin.contact.index');
    }
    public function restore(string $id)
    {
        $contact = contact::find($id);
        if($contact == null){
            return redirect()->route('admin.contact.index');
        }
        $contact->status = 2;
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->updated_by = Auth::id() ?? 1;
        $contact->save();
        return redirect()->route('admin.contact.trash');
    }
    // public function bulkAction(Request $request)
    // {
    //     $ids = $request->input('ids');
    //     $action = $request->input('bulk_action');

    //     if (empty($ids) || empty($action)) {
    //         return redirect()->route('admin.contact.index')->with('error', 'Chưa chọn contact hoặc hành động.');
    //     }

    //     switch ($action) {
    //         case 'update':
    //             foreach ($ids as $id) {
    //                 $contact = contact::find($id);
    //                 if ($contact != null) {
    //                     $contact->status = ($contact->status == 1) ? 2 : 1;
    //                     $contact->updated_at = now();
    //                     $contact->updated_by = Auth::id() ?? 1;
    //                     $contact->save();
    //                 }
    //             }
    //             return redirect()->route('admin.contact.index')->with('success', 'Cập nhật trạng thái thành công.');

    //         case 'delete':
    //             foreach ($ids as $id) {
    //                 $contact = contact::find($id);
    //                 if ($contact != null) {
    //                     $contact->status = 0;
    //                     $contact->updated_at = now();
    //                     $contact->updated_by = Auth::id() ?? 1;
    //                     $contact->save();
    //                 }
    //             }
    //             return redirect()->route('admin.contact.index')->with('success', 'Xóa sản phẩm thành công.');

    //         default:
    //             return redirect()->route('admin.contact.index')->with('error', 'Hành động không hợp lệ.');
    //     }
    // }

}
