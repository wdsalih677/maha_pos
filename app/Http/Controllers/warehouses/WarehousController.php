<?php

namespace App\Http\Controllers\warehouses;

use App\Http\Controllers\Controller;
use App\Models\Categories\Category;
use App\Models\warehouses\Warehous;
use Illuminate\Http\Request;

class WarehousController extends Controller
{

    public function index()
    {
        $warehouses = Warehous::get();
        $categories = Category::get();
        return view('warehouses.warehous' , compact('warehouses' , 'categories'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                'warehous_name' => 'required|unique:warehouses,warehous_name',
                'phone' => 'required|unique:warehouses,phone',
                'email' => 'required|unique:warehouses,email',
                'country' => 'required',
                'city' => 'required',
                'zip_code' => 'required|numeric',
            ]);
    
            $warehous = new Warehous();
            $warehous->warehous_name = $request->warehous_name;
            $warehous->phone = $request->phone;
            $warehous->email = $request->email;
            $warehous->country = $request->country;
            $warehous->city = $request->city;
            $warehous->zip_code = $request->zip_code;
            $warehous->save();
            toastr()->success(__('warehous.add_warehous_success'));
            return redirect()->route('warehouses.index');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' , $e->getMessage()]);
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
                'warehous_name' => 'required|unique:warehouses,warehous_name,'.$id,
                'phone' => 'required|unique:warehouses,phone,'.$id,
                'email' => 'required|unique:warehouses,email,'.$id,
                'country' => 'required',
                'city' => 'required',
                'zip_code' => 'required|numeric'
            ]);
    
            $warehous = Warehous::findOrFail($id);
            $warehous->warehous_name = $request->warehous_name;
            $warehous->phone = $request->phone;
            $warehous->email = $request->email;
            $warehous->country = $request->country;
            $warehous->city = $request->city;
            $warehous->zip_code = $request->zip_code;
            $warehous->save();
            toastr()->success(__('warehous.edit_warehous_success'));
            return redirect()->route('warehouses.index');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' , $e->getMessage()]);
        }
    }

    public function destroy(string $id)
    {
        try{
            Warehous::findOrFail($id)->delete();
            toastr()->success(__('warehous.delete_warehous_success'));
            return redirect()->route('warehouses.index');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' , $e->getMessage()]);
        }
    }
}
