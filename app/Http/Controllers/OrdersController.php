<?php

namespace App\Http\Controllers;

use App\Models\Addres;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Part;
use App\Models\User;
use App\Services\Midtrans\CreateSnapTokenService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Ramsey\Uuid\Uuid;

class OrdersController extends Controller
{

    public function show(Order $order)
    {
        $part = Part::with('brand')->where('id', $order->parts_id)->first();
        $address = Addres::where('id', $order->address_id)->first();
        $snapToken = $order->snap_token;
        if (empty($snapToken)) {
            $midtrans = new CreateSnapTokenService($order, $address, $part);
            $snapToken = $midtrans->getSnapToken();

            $order->snap_token = $snapToken;
            $order->save();
        }
        $user = User::where('id', session('id'))->first();
        $carts = Cart::leftjoin('parts', 'carts.parts_id', '=', 'parts.id')->where('user_id', session('id'))->get();
        $count = Cart::leftjoin('parts', 'carts.parts_id', '=', 'parts.id')->where('user_id', session('id'))->count();
        return view('user.order.index', compact('order', 'snapToken', 'part', 'carts', 'count', 'user'));
    }

    public function storeOrders(Request $request)
    {
        $address_id = Uuid::uuid4()->toString();
        Addres::create([
            'id' => $address_id,
            'users_id' => session('id'),
            'name' => $request->input('nama'),
            'phone' => $request->input('numberphone'),
            'provinsi_id' => $request->input('provinsi_id'),
            'kota_id' => $request->input('kota_id'),
            'kode_pos' => $request->input('kodepos'),
            'detail' => $request->input('alamat'),
            'rincian' => $request->input('details')
        ]);


        $id = Uuid::uuid4()->toString();
        Order::create([
            'id' => $id,
            'parts_id' => $request->input('parts_id'),
            'user_id' => session('id'),
            'address_id' => $address_id,
            'kurir' => $request->input('kurir'),
            'nama_layanan' => $request->input('nama_layanan'),
            'harga_layanan' => $request->input('harga_layanan'),
            'estimasi' => $request->input('estimasi'),
            'subtotal' => $request->input('total_belanja'),
            'payment_status' => 1
        ]);

        Session::flash('success', 'Pesanan berhasil dibuat, Silahkan lakukan pembayaran!');
        return redirect('/order/detail/'. $id);
    }
}
