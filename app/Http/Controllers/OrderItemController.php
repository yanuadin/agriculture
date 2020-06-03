<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Models\Item;
use App\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class OrderItemController extends Controller
{
    public function addToCart(Request $request, $id){
        $request->validate([
            'qty' => 'required'
        ], ['qty.required' => 'Jumlah barang wajib diisi']);

        $item = Item::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->addItem($request->input('qty'),$item, $item->id);

        $request->session()->put('cart', $cart);

        return redirect('/')->with(['message' => 'Barang berhasil ditambahkan ke dalam keranjang', 'alert-type' => 'success']);
    }

    public function detailCart(){
        return view('cart');
    }

    public function deleteItemCart($id){
        $cartSession = Session::get('cart');

        $cartSession->totalQty--;
        $cartSession->totalPrice -= $cartSession->items[$id]['price'];
        unset($cartSession->items[$id]);
        if(count($cartSession->items) == 0)
            Session::forget('cart');
        else
            Session::put('cart', $cartSession);

        return redirect()->route('detail-cart')->with(['message' => 'Berang berhasil di hapus dari keranjang', 'alert-type' => 'success']);
    }

    public function buyItems(Request $request){
        if(Session::has('cart')){
            $cart = Session::get('cart');

            OrderItem::create([
                'code' => Str::random(5),
                'customer_id' => Auth::user()->id,
                'item' => json_encode($cart->items),
                'totalPrice' => $cart->totalPrice,
                'totalQty' => $cart->totalQty,
                'status' => 'Proses'
            ]);
            Session::forget('cart');

            return redirect('/')->with(['message' => 'Permintaan anda telah diproses', 'alert-type' => 'success']);
        }

        return redirect('/')->with(['message' => 'Permintaan anda gagal', 'alert-type' => 'error']);
    }
}
