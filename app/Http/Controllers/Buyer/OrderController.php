<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Cart;
use App\Models\Product;
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

        $out_off_stock_item_array = [];
        $out_off_stock_items = "";
        $out_off_stock_item_count = 0;
        if(isset($order->getOrderDetail) && !empty($order->getOrderDetail)){
            $userId = Auth::user()->id;
            foreach ($order->getOrderDetail as $key => $item) {
                if($item->getProductDetails->quantity == 0 || $item->getProductDetails->status == 0){
                    $out_off_stock_item_array[] = $item->getProductDetails->name;
                }
            }
        }

        $out_off_stock_item_count = sizeof($out_off_stock_item_array);
        if(sizeof($order->getOrderDetail) != sizeof($out_off_stock_item_array)){
            $out_off_stock_items = implode(', ', $out_off_stock_item_array);
        }else{
            $out_off_stock_items = "All";
        }

        return view('buyer.order.orderDetail', compact('order','out_off_stock_items','out_off_stock_item_count'));
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

    public function reOrder($id)
    {
        $id = Crypt::decrypt($id);
    	$order = Order::with('getOrderDetail')->find($id);
        $order = $order->toArray();  
    	//echo "<pre>";print_r($order);die();
        if(isset($order['get_order_detail']) && !empty($order['get_order_detail'])){
            $userId = Auth::user()->id;
            foreach ($order['get_order_detail'] as $key => $item) {
                //echo $item['product_id'];die;
                //echo "<pre>";print_r($item);die();
                $product = Product::find($item['product_id']);
                $check = Cart::where(['product_id'=>$item['product_id'],'user_id'=>$userId])
                ->first();
                if($product->quantity != 0){
                    if(empty($check)){
                        $cart = new Cart;
                        $cart->user_id = Auth::user()->id;
                        $cart->product_id = $item['product_id'];
                        $cart->quantity = isset($item['quantity']) ? $item['quantity'] : 1;
                        $cart->save();
                    }else{
                        if($check->quantity >= $product->quantity){
                            
                        }else{
                            $cart = Cart::find($check->id);
                            $cart->quantity = $check->quantity + 1;
                            $cart->save();
                        }
                    }
                }
            }
        }
        return redirect()->route('carts')->with('success', 'Ordered items added to cart successfully.');
    }
}
