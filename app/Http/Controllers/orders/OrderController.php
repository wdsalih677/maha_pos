<?php

namespace App\Http\Controllers\orders;

use App\Http\Controllers\Controller;
use App\Models\clients\Client;
use App\Models\clients\Order;
use App\Models\Products\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::get();

        return view('orders.order',compact('orders'));
    }

    public function getOrderDetails($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.show' , compact('order'));
    }

    public function getProductsByCategory($id)
{
    $products = Product::where('category_id', $id)->get();

    // Return a JSON response with translations for both languages
    $productsWithTranslations = $products->map(function ($product) {
        return [
            'id' => $product->id,
            'name_ar' => $product->getTranslation('name', 'ar'),
            'name_en' => $product->getTranslation('name', 'en'),
        ];
    });

    return response()->json($productsWithTranslations);
}
}