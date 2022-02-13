<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Payment;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Crypt;
use Stripe;
use Config;
use Auth;

class OrderController extends Controller
{
    //Get All order list
    public function orderList(Request $request)
    {
        $search = $request->search;

        if(!empty($search) && isset($search))
        {
            $orders = Order::where('user_id', Auth::id())->with('getUserDetail')
            ->whereHas('getUserDetail', function($query) use($search)
            {
                $query->where('first_name', 'LIKE', '%'.$search.'%')
                    ->orWhere('last_name', 'LIKE', '%'.$search.'%');

            })
            ->orWhere('order_number', 'LIKE', '%' . $search . '%');
        }
        else
        {
    	   $orders = Order::where('user_id', Auth::id())->with('getUserDetail');
        }

        $orders = $orders->latest()->paginate(20);
    	// print_r($orders);die();
    	return view('buyer.order.orderList', compact('orders'));
    }

    //View particular order details
    public function viewOrder($id)
    {
        $id = Crypt::decrypt($id);
    	$order = Order::with('getOrderDetail.getProductDetails', 'getUserAddress.getUserDetail')->find($id);
    	// print_r($order);die();
        return view('buyer.order.orderDetail', compact('order'));
    }

    //Change the order status
    public function updateOrderStatus($orderId, $orderStatus)
    {
        $order = Order::find($orderId);
        
        if(!empty($order))
        {
            if($orderStatus == ORDER_CANCEL){
                $payment_details = Payment::where(['user_id' => Auth::id(),'order_id' => $orderId])->first();
                /*if($payment_details){
                    $stripe = new \Stripe\StripeClient(Config::get('services.stripe.secret'));
                    $refund = $stripe->refunds->create([
                        'charge' => $payment_details->charge_id,
                    ]);
                }*/
            }

            $order->status = $orderStatus;
            $order->save();

            if($orderStatus == ORDER_CANCEL)
            {
                $order_detail = OrderDetail::where('order_id', $order->id)->update(['status' => ORDER_CANCEL]);
            }

            $result['status'] = 1;
            return response()->json($result, 200);
        }
        else
        {
            $result['status'] = API_FAILURE_RESPONSE;
            return response()->json($result, 200);
        }
    }
}
