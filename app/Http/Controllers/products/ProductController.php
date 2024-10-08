<?php

namespace App\Http\Controllers\products;

use App\Http\Controllers\Controller;
use App\Models\Categories\Category;
use App\Models\Products\Product;
use App\Models\warehouses\Warehous;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $warehouses = Warehous::get();
        $categories = Category::get();
        
        $query = Product::query();

        if ($request->has('category_id') && $request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        $products = $query->paginate(10);

        foreach ($products as $product) {
            $product->profit = $product->sell_price - $product->buy_price;
            $product->profit = $product->profit * 100 / $product->buy_price;
            $product->profit = number_format($product->profit , 2);
        }

        return view('products.product', compact('categories' , 'products', 'warehouses'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        // return $request;
        try{
            $request->validate([
                'name_ar' =>'required|unique:products,name',
                'name_en' =>'required|unique:products,name',
                'category_id' => 'required',
                'warehous_id' => 'required',
                'sell_price' => 'required|numeric',
                'buy_price' => 'required|numeric',
                'description_ar' => 'required',
                'description_en' => 'required',
                'image' => 'required',
            ]);

            $product = new Product();
            $product->name = ['en' => $request->name_en , 'ar' => $request->name_ar];
            $product->description = ['en' => $request->description_ar , 'ar' => $request->description_en];
            $product->category_id = $request->category_id;
            $product->warehous_id = $request->warehous_id;
            $product->sell_price = $request->sell_price;
            $product->buy_price = $request->buy_price;
            $product->stock = $request->stock;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = $image->getClientOriginalName();
                $image->storeAs( 'products', $name, 'public');
                $product->image = $name;
            }
            $product->save();
            toastr()->success(__('product.add_product_success'));
            return redirect()->route('products.index');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        // return $request;
        try{
            $request->validate([
                'name_ar' => 'required|unique:products,name->ar,' . $id,
                'name_en' => 'required|unique:products,name->en,' . $id,
                'category_id' => 'required',
                'warehous_id' => 'required',
                'sell_price' => 'required|numeric',
                'buy_price' => 'required|numeric',
                'description_ar' => 'required',
                'description_en' => 'required',
            ]);
            
            $product = Product::findOrFail($id);

            $product->name = ['en' => $request->name_en , 'ar' => $request->name_ar];
            $product->description = ['en' => $request->description_ar , 'ar' => $request->description_en];
            $product->category_id = $request->category_id;
            $product->warehous_id = $request->warehous_id;
            $product->sell_price = $request->sell_price;
            $product->buy_price = $request->buy_price;
            $product->stock = $request->stock;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = $image->getClientOriginalName();
                $image->storeAs( 'products' , $name, 'public');
                $product->image = $name;
            }

            $product->save();
            toastr()->success(__('product.edit_product_success'));
            return redirect()->route('products.index');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(string $id)
    {
        try {
    
            $product = Product::findOrFail($id);
            
            if ($product->image) {
                Storage::disk('public')->delete('products/' . $product->image);
            }
            $product->delete();
            toastr()->success(__('product.delete_product_success'));
            return redirect()->route('products.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
