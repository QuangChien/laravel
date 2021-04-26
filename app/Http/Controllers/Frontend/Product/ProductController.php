<?php

namespace App\Http\Controllers\Frontend\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Comment;
use App\Models\Customer;
use App\Models\Order;
use Carbon\Carbon;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{      
    private $product;
    private $productImage;
    private $comment;
    private $customer;
    private $order;
    public function __construct(Product $product, ProductImage $productImage, Comment $comment, Customer $customer, Order $order)
    {
        $this->product = $product;
        $this->productImage = $productImage;
        $this->comment = $comment;
        $this->customer = $customer;
        $this->order = $order;
    }

    public function list(){
        $products = $this->product->all();
        return view('frontend.product.product_list',compact('products'));
    }

    public function index($id){
        // dd($id);
        $comments = $this->comment->where('product_id', $id)->where('status', 1)->get();
        $now = Carbon::now();
        $laguage = Carbon::setLocale('vi');
        // $counts = [];
        // foreach ($comments as $key => $commentItem) {
        //     $end_date = $commentItem->created_at;
        //     $cDate = Carbon::parse($end_date);
        //     array_push($counts, $now->diffInDays($cDate ));
        // }
        // dd($counts);
        $productAll = $this->product->all();
        $product = $this->product->find($id);
        return view('frontend.product.product_item',['product'=>$product, 'productAll'=>$productAll, 'comments'=>$comments, 'language'=>$laguage]);


    }

    public function store(Request $request, $id){
        
        try {
            $product = $this->product->find($id);
            $product->comments()->create([
                'comment_user' => $request->comment_user, //This Code coming from ajax request
                'content' => $request->content,
                'star' => $request->star,
            ]);

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

    public function storeOrder(OrderRequest $request, $id){
        try {
            DB::beginTransaction();
            $product = $this->product->find($id);
            //insert Customer
            $customer = $this->customer->create([
                'fullname' => $request->fullname,
                'phone' => $request->phone,
                'email' => $request->email,
            ]);

            //insert order
            $this->order->create([
                'customer_id' => $customer->id,
                'product_id' => $product->id,
                'receive_date' => $request->receive_date,
                'pay_date' => $request->pay_date,
                'total_price' => $request->total_price,
                'total_product' => $request->total_product,
            ]);
            DB::commit();
            return redirect()->route('product.item',['id' =>$product->id ])->with('success', 'Đặt phòng thành công! Chúng tôi sẽ liên hệ lại với bạn để xác nhận!');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: '.$exception->getMessage(). ' Line '.$exception->getLine());
        }

    }
}
