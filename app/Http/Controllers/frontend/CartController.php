<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Orderdetail;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart_list = session('cart', []);
        return view('frontend.Cart',compact('cart_list'));
    }
    public function addcart()
    {
        $productid = $_GET['productid'];
        $qty = $_GET['qty'];
        $product = Product::find($productid);
        $cartitem = array(
            'id'=>$productid,
            'name'=>$product->name,
            'image'=>$product->image,
            'price'=>($product->pricesale > 0) ? $product->pricesale:$product->price,
            'qty'=>$qty
        );
        $cart = session('cart', []);

        if(is_array($cart) && count($cart)==0)
        {
            array_push($cart, $cartitem);
        }
        else
        {
            $check_exist = true;
            foreach($cart as $key=>$item)
            {
                if(in_array($productid,$item))
                {
                    $cart[$key]['qty'] += $qty;
                    $check_exist = false;
                    break;
                }
            }
            if($check_exist == true)
            {
                array_push($cart, $cartitem);
            }
        }
        session(['cart' => $cart]);
        // echo count(sesion('cart', []));
        return count($cart);
    }

    public function update(Request $request)
    {
        $cart = session('cart', []);
        $list_qty = $request->qty;
        foreach($cart as $key=>$item)
        {
            foreach($list_qty as $productid=>$qtyvalue)
            {
                if($cart[$key]['id']==$productid)
                {
                    $cart[$key]['qty']=$qtyvalue;
                }
            }
        }
        session(['cart' => $cart]);
        return redirect()->route('site.cart.index');
    }

    public function delete($id)
    {
        $cart = session('cart', []);
        foreach($cart as $key=>$item)
        {
            if($cart[$key]['id']==$id)
            {
                unset($cart[$key]);
            }
        }
        session(['cart' => $cart]);
        return redirect()->route('site.cart.index');
    }

    public function checkout()
    {
        $cart_list = session('cart', []);
        return view('frontend.Checkout',compact('cart_list'));
    }
    public function docheckout(Request $request)
    {
        $user = Auth::user();
        $cart = session('cart', []);
        if(count($cart)>0)
        {
        $order = new Order();
        $order->user_id = $user->id;
        $order->delivery_name = $request->name;
        $order->delivery_gender = $user->gender;
        $order->delivery_email = $request->email;
        $order->delivery_phone = $request->phone;
        $order->delivery_address = $request->address;
        $order->note = $request->note;
        $order->created_at = now();
        $order->type = 'online';
        $order->status = 2;
        if($order->save())
        {
            foreach ($cart as $item) {
                $orderdetail = new Orderdetail();
                $orderdetail->order_id = $order->id;
                $orderdetail->product_id = $item['id'];
                $orderdetail->price = $item['price'];
                $orderdetail->qty = $item['qty'];
                $orderdetail->discount = 0;
                $orderdetail->amount = $item['price'] * $item['qty'];
                $orderdetail->save();
            }

        }
        session(['cart' => []]);
    }
    return view('frontend.checkout_message');
    }
}
