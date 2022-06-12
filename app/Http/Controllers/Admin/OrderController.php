<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Status;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('created_at', 'DESC')->get();
        return view('Admin.Orders.orders', compact('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::where('id', $id)->first();
        $orderItems = OrderItem::where('order_id', $id)->get();
        return view('Admin.Orders.orderDetails', compact('order', 'orderItems'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $order = Order::find($id);
        $order->delete();
        session()->flash('delete', 'تم حذف الطلب بنجاح');
        return redirect('/admin/orders');
    }

    public function update(Request $request)
    {
        $order = Order::find($request->id);

        if ($request->order_status === 'wait_shimp') {

            $order->update([
                'order_status' => $request->order_status,
            ]);
        } //
        elseif ($request->order_status === 'shimp') {
            $order->update([
                'order_status' => $request->order_status,
            ]);
        }
        //
        elseif ($request->order_status === 'done') {
            $order->update([
                'order_status' => $request->order_status,
            ]);
        }
        //
        elseif ($request->order_status === 'canceled') {
            $order->update([
                'order_status' => $request->order_status,
            ]);
        }
        session()->flash('تم تعديل حالة الطلب');
        return redirect()->back();
    }


    public function paying_order()
    {
        $orders = Order::where('order_status', 'paid')->orderBy('created_at', 'DESC')->get();
        return view('Admin.Orders.paying_orders', compact('orders'));
    }

    public function wait_shimp()
    {
        $orders = Order::where('order_status', 'wait_shimp')->orderBy('created_at', 'DESC')->get();
        return view('Admin.Orders.whait_shimp_orders', compact('orders'));
    }

    public function shimp()
    {
        $orders = Order::where('order_status', 'shimp')->orderBy('created_at', 'DESC')->get();
        return view('Admin.Orders.shimp', compact('orders'));
    }

    public function done()
    {
        $orders = Order::where('order_status', 'done')->orderBy('created_at', 'DESC')->get();
        return view('Admin.Orders.done', compact('orders'));
    }

    public function canceled()
    {
        $orders = Order::where('order_status', 'canceled')->orderBy('created_at', 'DESC')->get();
        return view('Admin.Orders.canceled', compact('orders'));
    }
}
