<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Categories\Category;
use App\Models\clients\Client;
use App\Models\clients\Order;
use App\Models\Products\Product;
use App\Models\seles\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $orders = Order::get()->count();
        $clients = Client::get()->count();
        $category = Category::get()->count();
        $products = Product::get()->count();

        $categories = Category::with('products')->get();


        return view('index' , compact('orders','clients','category','products' , 'categories'));
    }
    public function create()
    {

    }
    public function store(Request $request)
    {
        $request->validate([
            'product_ids' => 'required|array',
            'quantities' => 'required|array',
        ]);
        $seles = Sale::create([]);

        $total_price = 0;

        foreach($request->product_ids as $index=>$product_id){

            $product = Product::findOrFail($product_id);

            $quantity = $request->quantities[$index];

            $total_price += $product->sell_price * $quantity;

            $seles->products()->attach($product_id ,['quantity' => $request->quantities[$index]]);
        
            if ($product->stock >= $quantity) {

                $product->update([
                    'stock' => $product->stock - $quantity,
                ]);
            
                if ( $product->stock < 5 ) {
                    toastr()->warning(__('product.product_run_out'));
                }
                
            }else{
                return redirect()->back()->withErrors([__('product.warning_stock_product')]);
            }
        }
        $seles->update([
            'total_price' => $total_price,
        ]);
        
        toastr()->success(__('order.add_order_success'));
        return redirect()->back();
    }
    public function edit($id)
    {

    }

    public function update(Request $request ,$id)
    {

    }
    public function destroy($id)
    {

    }
}
