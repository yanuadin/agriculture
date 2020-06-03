<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterCustomerRequest;
use App\Models\Item;
use App\OrderItem;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class FrontPageController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function index(){
        $items = Item::paginate(8);
        $count = Item::count();

        return view('front-page', ['items' => $items, 'count' => $count]);
    }

    public function detailProduct($id){
        $item = Item::where('id', $id)->first();

        return view('detail-product', ['item' => $item]);
    }

    public function showRegisterForm(){
        return view('register');
    }

    public function register(RegisterCustomerRequest $request){
        User::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'province_id' => $request->province_id,
            'regency_id' => $request->regency_id,
            'district_id' => $request->district_id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'Customer',
        ]);

        return redirect()->route('login.form');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function logout(){
        Auth::logout();
        Session::forget('cart');

        return redirect('/');
    }

    public function order(){
        return view('order');
    }

    public function findOrder(Request $request){
        return redirect()->route('order-item', $request->code);
    }

    public function orderItem($code){
        $order_item = OrderItem::where('code', $code)->first();
        $order_item->item = json_decode($order_item->item);

        return view('order-item', ['order_item' => $order_item]);
    }

    public function orderItemStore(Request $request, $code){
        $request->validate([
            'file' => 'required'
        ], ['file.required' => 'File tidak boleh kosong']);

        $file = $request->file('file')->store('public/img/'.Auth::user()->id);
        OrderItem::where('code', $code)->update([
           'struct_payment' => $file,
        ]);

        return redirect()->back()->with(['message' => 'Bukti pembayaran berhasil diunggah', 'alert-type' => 'success']);
    }
}
