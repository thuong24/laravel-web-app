<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $list_contact = Contact::where('contact.status','!=',0)
            ->leftJoin('user','contact.user_id','=','user.id')
            ->orderBy('contact.created_at','DESC')
            ->select("contact.id","contact.name","contact.email","contact.status","contact.phone","contact.title","contact.content")
            ->paginate(5);
        $contactid = "";
            foreach ($list_contact as $item) {
                $contactid .= "<option value='" . $item->id . "'>" . $item->title . "</option>";
            }
        return view('frontend.Contact',compact('contactid'));
    }
    public function storeContact(Request $request)
    {
        $contact = new contact();
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->title = $request->title;
        $contact->content = $request->content;
        $contact->status = 2;
        $contact->created_at = date('Y-m-d H:i:s');
        $contact->updated_by = Auth::id() ?? 1;
        $contact->save();

        return redirect()->back()->with('success', 'Bình luận của bạn đã được gửi thành công.');
    }
}
