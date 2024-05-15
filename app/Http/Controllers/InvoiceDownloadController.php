<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use PDF;

class InvoiceDownloadController extends Controller
{
    function InvoiceDownload($order_id){
        $order = Order::where('order_id', $order_id)->first();
        $orderproducts = OrderProduct::where('order_id', $order->order_id)->get();
        $data = [
            'order' => $order,
            'order_id' => $order->order_id,
        ];

        $pdf = PDF::loadView('frontend.customer.download_invoice', $data);

        return $pdf->download('invoice_'.$order_id.'.pdf');
    }
}
