<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\clients\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::get();
        return view('clients.client' , compact('clients'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required|unique:clients,name',
                'email' => 'required|unique:clients,email',
                'phone' => 'required|numeric|unique:clients,phone',
                'address' => 'required',
                'country' => 'required',
                'city' => 'required',
                'd_o_b' => 'required',
            ]);
            $client = new Client();
            $client->name = $request->name;
            $client->email = $request->email;
            $client->phone = $request->phone;
            $client->address = $request->address;
            $client->country = $request->country;
            $client->city = $request->city;
            $client->d_o_b = $request->d_o_b;
            $client->save();
            toastr()->success(__('client.add_client_success'));
            return redirect()->route('clients.index');
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
                'name' => 'required|unique:clients,name,'.$id,
                'email' => 'required|unique:clients,email,'.$id,
                'phone' => 'required|numeric|unique:clients,phone,'.$id,
                'address' => 'required',
                'country' => 'required',
                'city' => 'required',
                'd_o_b' => 'required',
            ]);
            $client = Client::findOrFail($id);
            $client->name = $request->name;
            $client->email = $request->email;
            $client->phone = $request->phone;
            $client->address = $request->address;
            $client->country = $request->country;
            $client->city = $request->city;
            $client->d_o_b = $request->d_o_b;
            $client->save();
            toastr()->success(__('client.edit_client_success'));
            return redirect()->route('clients.index');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            Client::findOrFail($id)->delete();
            toastr()->success(__('client.delete_client_success'));
            return redirect()->route('clients.index');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
