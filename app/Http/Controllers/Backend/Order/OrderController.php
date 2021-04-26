<?php

namespace App\Http\Controllers\Backend\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{   
    private $order;
    private $customer;

    public function __construct(Order $order, Customer $customer)
    {
        $this->order = $order;
        $this->customer = $customer;

    }
    public function index(){
        $orders = $this->order->latest()->paginate(5);
        return view('backend.orders.order', compact('orders'));
    }

    public function update($id){
        $this->order->find($id)->update([
            'status' => 1,
        ]);
        
        return redirect()->route('order.index');
    }

    public function delete($id){
        try {
            $order = $this->order->find($id);
            $this->customer->where('id', $order->customer_id)->delete();
            $order->delete();
            
            return response()->json([
                'code' => 200,
                'message' => 'success',
            ], 200);

        } catch (\Exception $exception) {
            Log::error('Message: '.$exception->getMessage(). ' Line '.$exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail',
            ], 500);
        }
    }
}
