<?php
 
namespace App\Services\Midtrans;
 
use Midtrans\Snap;
 
class CreateSnapTokenService extends Midtrans
{
    protected $order;
 
    public function __construct($order, $address, $part)
    {
        parent::__construct();
 
        $this->order = $order;
        $this->address = $address;
        $this->part = $part;

    }
 
    public function getSnapToken()
    {
        $params = [
            'transaction_details' => [
                'order_id' => $this->order->id,
                'gross_amount' => $this->order->subtotal,
            ],
            'item_details' => [
                [
                    'id' => $this->order->parts_id,
                    'price' => $this->part->price,
                    'quantity' => 1,
                    'name' => $this->part->merk,
                ],
            ],
            'customer_details' => [
                'first_name' => $this->address->name,
                'phone' => $this->address->phone,
            ]
        ];
 
        $snapToken = Snap::getSnapToken($params);
 
        return $snapToken;
    }
}