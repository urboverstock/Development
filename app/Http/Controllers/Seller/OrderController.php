<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Crypt;

class OrderController extends Controller
{
    //Get All order list
    public function orderList(Request $request)
    {
        $search = $request->search;

        if(!empty($search) && isset($search))
        {
            $orders = Order::with('getUserDetail')
            ->whereHas('getUserDetail', function($query) use($search)
            {
                $query->where('first_name', 'LIKE', '%'.$search.'%')
                    ->orWhere('last_name', 'LIKE', '%'.$search.'%');

            })
            ->orWhere('order_number', 'LIKE', '%' . $search . '%');
        }
        else
        {
    	   $orders = Order::with('getUserDetail');
        }

        $orders = $orders->latest()->get()->toArray();
    	// print_r($orders);die();
    	return view('seller.order.orderList', compact('orders'));
    }

    //View particular order details
    public function viewOrder($id)
    {
        $id = Crypt::decrypt($id);
    	$order = Order::with('getOrderDetail.getProductDetails', 'getUserAddress.getUserDetail')->find($id);
    	// print_r($order);die();
        return view('seller.order.orderDetail', compact('order'));
    }

    //Change the order status
    public function updateOrderStatus($orderId, $orderStatus)
    {
        $order = Order::find($orderId);
        
        if(!empty($order))
        {
            $order->status = $orderStatus;
            $order->save();

            if($order->status == ORDER_COMPLETED)
            {
                $order_detail = OrderDetail::where('order_id', $order->id)->update(['status' => ORDER_COMPLETED]);
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
