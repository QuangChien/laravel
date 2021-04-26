<?php
namespace App\Http\Controllers\Backend\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
use Illuminate\Support\Facades\Storage;
use App\Traits\StorageImageTrait;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{   
    use StorageImageTrait;
    private $product;
    private $productImage;
    public function __construct(Product $product, ProductImage $productImage)
    {
        $this->product = $product;
        $this->productImage = $productImage;
    }

    public function index(){
        $products = $this->product->latest()->paginate(5);
        return view("backend.products.listproduct", compact('products'));
    }

    public function create(){
        return view("backend.products.addproduct");
    }

    public function store(AddProductRequest $request){
        try {
            DB::beginTransaction();
            $productCreate = [
                'name' => $request->name,
                'slug' => $slug = Str::slug($request->name, '-'),
                'price' => $request->price,
                'quantity' => $request->quantity,
                'description' => $request->description,
                'detail' => $request->detail,
                'user_id' => auth()->id(),
            ];
    
            $dataImageUpload = $this->storageTraitUpload($request->img, 'product');
            if($dataImageUpload !==null){
                $productCreate['img'] = $dataImageUpload['name'];
                $productCreate['img_path'] = $dataImageUpload['path'];
    
            }
            $product = $this->product->create($productCreate);
    
            // Insert Product Image
            if($request->hasFile('prd_img_name')){
                foreach ($request->prd_img_name as $key => $productImageItem) {
                    $productImageDetail = $this->storageTraitUpload($productImageItem, 'product');
    
                    $product->images()->create([
                        'prd_img_name' => $productImageDetail['name'],
                        'prd_img_path' => $productImageDetail['path'],
                    ]);
                }
            }
            
            DB::commit();
            return redirect()->route('product.index')->with('success', 'Đã thêm thành công!');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: '.$exception->getMessage(). ' Line '.$exception->getLine());
        }
        
    }

    public function edit($id){
        $product = $this->product->find($id);
        return view("backend.products.editproduct", compact('product'));
    }

    public function update(EditProductRequest $request, $id){
        try {
            DB::beginTransaction();

            $productUpdate = [
                'name' => $request->name,
                'slug' => $slug = Str::slug($request->name, '-'),
                'price' => $request->price,
                'quantity' => $request->quantity,
                'description' => $request->description,
                'detail' => $request->detail,
                'user_id' => auth()->id(),
            ];
    
            $dataImageUpload = $this->storageTraitUpload($request->img, 'product');
            if($dataImageUpload !==null){
                $productUpdate['img'] = $dataImageUpload['name'];
                $productUpdate['img_path'] = $dataImageUpload['path'];
            }
            
            $this->product->find($id)->update($productUpdate);
            $product = $this->product->find($id);
    
            // Insert Product Image
            if($request->hasFile('prd_img_name')){
                $this->productImage->where('product_id', $id)->delete();
                foreach ($request->prd_img_name as $key => $productImageItem) {
                    $productImageDetail = $this->storageTraitUpload($productImageItem, 'product');
                    
                    $product->images()->create([
                        'prd_img_name' => $productImageDetail['name'],
                        'prd_img_path' => $productImageDetail['path'],
                    ]);
                }
            }
            
            DB::commit();
            return redirect()->route('product.index')->with('success', 'Cập nhật thành công!');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: '.$exception->getMessage(). ' Line '.$exception->getLine());
        }
    }

    public function delete($id){
        try {
            $this->product->find($id)->delete();
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
