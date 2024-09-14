<?php

namespace App\Http\Controllers\suppliers;

use App\Http\Controllers\Controller;
use App\Models\suppliers\Supplier;
use Exception;
use Illuminate\Http\Request;

class SupplierController extends Controller
{

    public function index()
    {
        $suppliers = Supplier::get();
        return view('suppliers.supplier' , compact('suppliers'));
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
                'name' => 'required',
                'phone' => 'required|numeric|unique:suppliers,phone',
                'email' => 'required|email|unique:suppliers,email',
                'address' => 'required',
                'country' => 'required',
                'city' => 'required',
            ]);
    
            $supplier = new Supplier();
            $supplier->name = $request->name;
            $supplier->phone = $request->phone;
            $supplier->email = $request->email;
            $supplier->address = $request->address;
            $supplier->country = $request->country;
            $supplier->city = $request->city;
            $supplier->save();
    
            toastr()->success(__('supplier.add_supplier_success'));
            return redirect()->route('suppliers.index');
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
        try{
            $request->validate([
                'name' => 'required',
                'phone' => 'required|numeric|unique:suppliers,phone,'.$id,
                'email' => 'required|email|unique:suppliers,email,'.$id,
                'address' => 'required',
                'country' => 'required',
                'city' => 'required',
            ]);

            $supplier = Supplier::findOrFail($id);
            $supplier->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'country' => $request->country,
                'city' => $request->city,
            ]);
            toastr()->success(__('supplier.edit_supplier_success'));
            return redirect()->route('suppliers.index');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(string $id)
    {
        try{
            Supplier::findOrFail($id)->delete();
            toastr()->success( __('supplier.delete_supplier_success'));
            return redirect()->route('suppliers.index');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
