<?php

namespace App\Http\Controllers\api;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function index()
    {
        return Order::all();
    }

    public function store(Request $request)
    {
        $orderid = [];
        $qty = [];
        $price = [];
        $carts = $request->carts;
        $user_id = $request->user_id;
        $method = $request->method;
        $total = 0;

        foreach ($carts as $cart) {
            $orderid[] = $cart['cart']['id'];
            $qty[] = $cart['qty'];
            $price[] = $cart['cart']['api']['retailprice'];
            $total += $cart['qty'] * $cart['cart']['api']['retailprice'];
        }
        // return $total;
        $all_order = implode(',', $orderid);
        $all_qty = implode(',', $qty);
        $all_price = implode(',', $price);

        $order = new Order;
        $order->user_id = $user_id;
        $order->product_id = $all_order;
        $order->method = $method;
        $order->qty = $all_qty;
        $order->price = $all_price;
        $order->total = $total;
        $order->status = 'pending';
        $order->save();

        if ($method == 'COD') {
            return response()->json($method);
        } else {
            $response = Http::post('https://sandbox.shurjopayment.com/api/get_token', [
                'username' => 'sp_sandbox',
                'password' => 'pyyk97hu&6u6'
            ]);
            $jsonresponse = $response->json();
            $token = $jsonresponse['token'];
            $url = $jsonresponse['execute_url'];
            $do_payment = Http::post($url . "/?token=" . $token, [
                'store_id' => "1",
                'amount' => "$total",
                'order_id' => "$order->id",
                'currency' => "BDT",
                'customer_name' => "Masum",
                'customer_address' => "Mirpur, Dhaka",
                'customer_city' => "Dhaka",
                'customer_phone' => "01816941466",
                'customer_email' => "masum@gmail.com",
                'client_ip' => "127.0.0.1",
                'prefix' => "city_",
                'return_url' => "https://admindash.comcitybd.com/api/return_url",
                'cancel_url' => "https://admindash.comcitybd.com/api/cancel_url",
            ]);
            $checkout_url = $do_payment->json();
            return response()->json($checkout_url['checkout_url']);
        }
    }

    public function return_url(Request $request)
    {
        $order_id = $request->order_id;
        $oresponse = Http::post('https://sandbox.shurjopayment.com/api/get_token', [
            'username' => 'sp_sandbox',
            'password' => 'pyyk97hu&6u6'
        ]);

        $jsonresponse = $oresponse->json();
        $token = $jsonresponse['token'];

        $success = Http::post('https://sandbox.shurjopayment.com/api/verification' . '/?token=' . $token, [
            'order_id' => $order_id
        ]);

        $customer_order_id = $success[0]['customer_order_id'];
        $order = Order::findOrFail($customer_order_id);
        $order->txnid = $success[0]['invoice_no'];
        $order->status = $success[0]['sp_massage'];
        $order->save();
        return Redirect::away('http://localhost:3000/cart');
    }

    public function cancel_url(Request $request)
    {
        $order_id = $request->order_id;
        $oresponse = Http::post('https://sandbox.shurjopayment.com/api/get_token', [
            'username' => 'sp_sandbox',
            'password' => 'pyyk97hu&6u6'
        ]);

        $jsonresponse = $oresponse->json();
        $token = $jsonresponse['token'];

        $success = Http::post('https://sandbox.shurjopayment.com/api/verification' . '/?token=' . $token, [
            'order_id' => $order_id
        ]);

        $customer_order_id = $success[0]['customer_order_id'];
        $order = Order::findOrFail($customer_order_id);
        if ($order->total != $success[0]['amount']) {
            $order->status == 'Fruad Alert';
            return Redirect::away('http://localhost:3000/cart');
        }

        $order->txnid = $success[0]['invoice_no'];
        $order->status = $success[0]['sp_massage'];
        $order->save();
        return Redirect::away('http://localhost:3000/cart');
    }
}
