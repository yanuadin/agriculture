<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\OrderItem;
use App\User;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function index(){
        return view('super-admin.dashboard');
    }

    public function userAdmin(){
        $users = User::where('role', 'Admin')->get();

        return view('super-admin.user-admin.index', ['users' => $users]);
    }

    public function userCustomer(){
        $users = User::where('role', 'Customer')->get();

        return view('super-admin.user-customer.index', ['users' => $users]);
    }

    public function orderMonitoring(){
        $order_items = OrderItem::get();

        foreach ($order_items as $order_item) {
            $order_item->item = json_decode($order_item->item);
        }

        return view('super-admin.order-monitoring.index', ['order_items' => $order_items]);
    }

    public function orderMonitoringStore(Request $request){
        OrderItem::where('id', $request->id)->update([
            'status' => $request->status
        ]);

        return redirect()->back()->with(['message' => 'Status berhasil diperbarui', 'alert-type' => 'success']);
    }
}
