<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class OrderController extends Controller
{

    // public function saveOrder(Request $request)
    // {
    //     $request->validate([
    //         'payment_amount' => 'required',
    //         // 'subtotal' => 'required',
    //         'tax' => 'required',
    //         'discount' => 'required',
    //         'service_charge' => 'required',
    //         'total' => 'required',
    //         'payment_method' => 'required',
    //         'total_item' => 'required',
    //         // 'kasir_id' => 'required',
    //         // 'kasir_name' => 'required',
    //         'transaction_time' => 'required',
    //         'order_items' => 'nullable'
    //     ]);

    //     $order = Order::create([
    //         'payment_amount' => $request->payment_amount,
    //         'sub_total' => $request->sub_total,
    //         'tax' => $request->tax,
    //         'discount' => $request->discount,
    //         'service_charge' => $request->service_charge,
    //         'total' => $request->total,
    //         'payment_method' => $request->payment_method,
    //         'total_item' => $request->total_item,
    //         'id_kasir' => $request->id_kasir,
    //         'nama_kasir' => $request->nama_kasir,
    //         'transaction_time' => $request->transaction_time,
    //     ]);

    //     foreach ($request->order_items as $item){
    //         OrderItem::create([
    //             'id_order' => $order->id,
    //             'id_product' => $item['id_product'],
    //             'quantity' => $item['quantity'],
    //             'price' => $item['price'],
    //             'total' => 0
    //         ]);
    //     }
    //     return response(['message' => 'success', 'data'=>$order], 200);
    // }


    public function saveOrder(Request $request)
    {
        $request->validate([
            'payment_amount' => 'required',
            'sub_total' => 'required', // Sesuaikan dengan kebutuhan
            'tax' => 'required',
            'discount' => 'required',
            'service_charge' => 'required',
            'total' => 'required',
            'payment_method' => 'required',
            'total_item' => 'required',
            'transaction_time' => 'required',
            'order_items' => 'nullable',
            'id_reservasi' => 'nullable',
            'order_type' => 'nullable'
        ]);

        $orderData = [
            'payment_amount' => $request->payment_amount,
            'sub_total' => $request->sub_total,
            'tax' => $request->tax,
            'discount' => $request->discount,
            'service_charge' => $request->service_charge,
            'total' => $request->total,
            'payment_method' => $request->payment_method,
            'total_item' => $request->total_item,
            'id_kasir' => $request->id_kasir,
            'nama_kasir' => $request->nama_kasir,
            'transaction_time' => $request->transaction_time,
            'id_reservasi' => $request->id_reservasi,
            'order_type' => $request->order_type
        ];

        if ($request->order_type == 'reservation') {
            $reservation = Reservation::create([
                'customer_name' => $request->customer_name,
                'customer_phone' => $request->customer_phone,
                'reservation_date' => $request->reservation_date,
                'reservation_time' => $request->reservation_time,
                'notes' => $request->notes,
                'table_number' => $request->table_number,
                'status' => $request->status,
                'reservation_code' => $this->generateReservaitonCode()
            ]);

            $orderData['id_reservasi'] = $reservation->id;
        }

        $order = Order::create($orderData);

        foreach ($request->order_items as $item) {
            OrderItem::create([
                'id_order' => $order->id,
                'id_product' => $item['id_product'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'total' => 0
            ]);
        }

        return response(['message' => 'success', 'data' => $order], 200);
    }

    function generateReservaitonCode()
    {
        // Generate random string of 6 characters
        $randomString = Str::random(6);

        // Combine with current timestamp to ensure uniqueness
        $timestamp = now()->format('Ymd');

        return 'RSV-' . $timestamp . '-' . $randomString;
    }

    public function getOrderDetail()
    {

        $orderItem = OrderItem::all();
        $orderItem->load(['product', 'order']);

        return response(['message' => 'success', 'data' => $orderItem], 200);
    }
}
