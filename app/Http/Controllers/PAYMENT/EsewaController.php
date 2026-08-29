<?php

namespace App\Http\Controllers\PAYMENT;
use App\Http\Controllers\Controller;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EsewaController extends Controller
{
    public function initiate(Order $order)
    {
        // eSewa v2 requires a signed payload — sandbox creds from esewa merchant portal
        $data = [
            'amount' => $order->total_price,
            'tax_amount' => 0,
            'total_amount' => $order->total_price,
            'transaction_uuid' => $order->order_number,
            'product_code' => config('services.esewa.product_code'),
            'product_service_charge' => 0,
            'product_delivery_charge' => 0,
            'success_url' => route('payments.esewa.success'),
            'failure_url' => route('payments.esewa.failure'),
            'signed_field_names' => 'total_amount,transaction_uuid,product_code',
        ];

        $signatureString = "total_amount={$data['total_amount']},transaction_uuid={$data['transaction_uuid']},product_code={$data['product_code']}";
        $data['signature'] = base64_encode(hash_hmac('sha256', $signatureString, config('services.esewa.secret'), true));

        return view('payments.esewa-redirect', [
            'action' => config('services.esewa.gateway_url'), // sandbox: https://rc-epay.esewa.com.np/api/epay/main/v2/form
            'data' => $data,
        ]);
    }

    public function success(Request $request)
    {
        // eSewa returns base64-encoded JSON in `data` query param
        $decoded = json_decode(base64_decode($request->query('data')), true);
        $order = Order::where('order_number', $decoded['transaction_uuid'] ?? null)->firstOrFail();

        if (($decoded['status'] ?? null) === 'COMPLETE') {
            $order->update([
                'status' => 'confirmed',
                'payment_status' => 'paid',
                'transaction_id' => $decoded['transaction_code'] ?? null,
                'payment_meta' => $decoded,
            ]);
        }

        return redirect()->route('orders.success', $order);
    }

    public function failure(Request $request)
    {
        return redirect()->route('rooms.index')->withErrors(['payment' => 'Payment was not completed. Your booking was not confirmed.']);
    }
}