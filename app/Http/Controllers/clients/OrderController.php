<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Notifications\OrderCreated;
use App\Models\Categories\Category;
use App\Models\clients\Client;
use App\Models\clients\Order;
use App\Models\Products\Product;
use App\Traits\OrderNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{

use OrderNumber;
    public function index()
    {
        
    }


    public function create($id)
    {
        $categories = Category::with('products')->get();
        $cilent = Client::findOrFail($id);
        return view('clients.orders.add' , compact('categories','cilent'));
    }

    public function store(Request $request , $id)
    {
        $request->validate([
            'product_ids' => 'required|array',
            'quantities' => 'required|array',
        ]);
        $client = Client::findOrFail($id);

        $orderNumber = $this->generateRandomNumber();//function to generate Random number for order

        $order = $client->orders()->create([
            'ordernumber' => $orderNumber,
        ]);

        $total_price = 0;

        foreach($request->product_ids as $index=>$product_id){

            $product = Product::findOrFail($product_id);

            $quantity = $request->quantities[$index];

            $total_price += $product->sell_price * $quantity;

            $order->products()->attach($product_id ,['quantity' => $request->quantities[$index]]);
        
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
        $order->update([
            'total_price' => $total_price,
        ]);
        
        $client->notify(new OrderCreated($order , $client));
        toastr()->success(__('order.add_order_success'));
        return redirect()->route('getAllOrders');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $order = Order::findOrFail($id);

        $client = $order->clients;

        $categories = Category::get();

        return view('clients.orders.edit', compact('order','categories', 'client'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_ids' => 'required|array',
            'quantities' => 'required|array',
        ]);
        $client = Client::findOrFail($id);

        $order = $client->orders()->where('ordernumber', $request->ordernumber)->firstOrFail();

        $total_price = 0;

        foreach($request->product_ids as $index=>$product_id){

            $product = Product::findOrFail($product_id);

            $quantity = $request->quantities[$index];

            $existing_quantity = $order->products()->where('product_id', $product_id)->first()->pivot->quantity;
        
            if ($product->stock + $existing_quantity >= $quantity) {

                $product->update([
                   'stock' => $product->stock + $existing_quantity - $quantity,
                ]);
                $total_price += $product->sell_price * $quantity;

                // Update the quantity in the pivot table
                $order->products()->updateExistingPivot($product_id, ['quantity' => $quantity]);
                if ($product->stock < 5) {
                    toastr()->warning(__('product.product_run_out'));
                }
                
            }else{
                return redirect()->back()->withErrors([__('product.warning_stock_product')]);
            }
        }
        $order->update([
            'total_price' => $total_price,
        ]);
        toastr()->success(__('order.edit_order_success'));
        return redirect()->route('getAllOrders');
    }

    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        foreach($order->products as $product){
            $product->update([
                'stock' => $product->stock + $product->pivot->quantity,
            ]);
        }
        $order->delete();
        toastr()->success(__('order.delete_order_success'));
        return redirect()->route('getAllOrders');
    }

    //function to get all client orders
    public function show_client_orders($id)
    {
        $client = Client::findOrFail($id);
        $orders = $client->orders()->paginate(2);
        return view('clients.orders.show_chient_orders' , compact('client' , 'orders'));
    }
}
