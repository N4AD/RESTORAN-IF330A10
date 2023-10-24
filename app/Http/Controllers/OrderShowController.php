<?php

namespace App\Http\Controllers;

use App\Mail\Reservation;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderShowController extends Controller
{
    public function index()
    {
        $page_title = "All Orders";
        $orders = Order::all();

        return view('order.index', compact('page_title', 'orders'));
    }

    public function confirmation($type, Order $order)
    {
        if ($type === 'accept') {
            $data = [
                'title' => 'hotfood.com',
                'message' => 'Hi, '. $order->name .' Your order has confirmed!'
            ];

            $order->order_status = 1;
            $order->update();

            Mail::to($order->email)->send(new Reservation($data));
            return back()->with('toast_success', "Order confirmed!");
        }

        $data = [
            'title' => 'hotfood.com',
            'message' => 'Hi, '. $order->name .' Your order has cancelled!'
        ];
        $order->order_status = 2;
        $order->update();
        Mail::to($order->email)->send(new Reservation($data));
        return back()->with('toast_success', "Yoyr order has cancelled!");
    }

    public function delete(Order $order)
    {
        $order->details->each->delete();
        $order->delete();

        return back()->with('toast_success', "Item Deleted Successfully!");
    }
}
