<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class NotificationController extends Controller
{
    public function post($order_id)
    {
        try {
            $order = Order::where('id', $order_id)->first();
            if (!$order)
                return ['code' => 0, 'messgae' => 'Terjadi kesalahan | Pembayaran tidak valid'];
            if($order->payment_status == '1') {
                $update = [
                    'payment_status' => '2'
                ];
                DB::table('orders')->where('id', $order_id)->update($update);
                Session::flash('success', 'Pembayaran berhasil dilakukan, Barang anda akan segera dikirim');
                return redirect('order/detail/' . $order_id);
            }
        } catch (\Exception $e) {
            return response('Error', 404)->header('Content-Type', 'text/plain');
        }
    }
}
