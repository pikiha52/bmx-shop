<?php

namespace App\Http\Controllers;

use App\Models\Addres;
use App\Models\Checkout;
use App\Models\Cart;
use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use Ramsey\Uuid\Uuid;

class CheckoutController extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            $getIdOrder = Uuid::uuid4()->toString();
            $carts = Cart::leftjoin('parts', 'carts.parts_id', '=', 'parts.id')->where('user_id', session('id'))->get();
            $count = Cart::leftjoin('parts', 'carts.parts_id', '=', 'parts.id')->where('user_id', session('id'))->count();
            $address = Addres::where('users_id', session('id'))->first();
            $checkout = Checkout::with('part')->where('users_id', session('id'))->get();
            $provinces = Province::pluck('name', 'province_id');

            return view('user.cart.check_out', compact('getIdOrder', 'address', 'checkout',  'carts', 'count', 'provinces'));
        } else {
            echo 'belum login';
        }
    }

    public function get_province()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: dca5743a20947c3997738557ea0cfe76"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            //ini kita decode data nya terlebih dahulu
            $response = json_decode($response, true);
            //ini untuk mengambil data provinsi yang ada di dalam rajaongkir resul
            $data_pengirim = $response['rajaongkir']['results'];
            return $data_pengirim;
        }
    }

    public function get_city($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=$id",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: dca5743a20947c3997738557ea0cfe76"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response = json_decode($response, true);
            $data_kota = $response['rajaongkir']['results'];
            return json_encode($data_kota);
        }
    }

    public function get_ongkir($origin, $destination, $weight, $courier)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=$origin&destination=$destination&weight=$weight&courier=$courier",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: dca5743a20947c3997738557ea0cfe76"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response = json_decode($response, true);
            $data_ongkir = $response['rajaongkir']['results'];
            return json_encode($data_ongkir);
        }
    }

    public function getCities($id)
    {
        $city = City::where('province_id', $id)->pluck('name', 'city_id');
        return response()->json($city);
    }


    public function storeCheck(Request $request)
    {
        $id = Uuid::uuid4()->toString();
        $user_id = $request->input('users_id', []);
        $parts_id = $request->input('parts_id');
        $carts_id = $request->input('carts_id');
        $qty     = $request->input('qty');

        for ($i = 0; $i < count($user_id); $i++) {
            $data = array(
                'id' => $id,
                'users_id' => $user_id[$i],
                'parts_id' => $parts_id[$i],
                'carts_id' => $carts_id[$i],
                'qty'         => $qty[$i]
            );

            Checkout::create($data);
        }

        if ($data) {
            //redirect dengan pesan sukses
            Session::flash('success', 'Cart berhasil');
            return redirect('/checkouts/index');
        }
    }
}
