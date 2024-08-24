<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    // function __construct()
    // {

    // $this->middleware('permission:قائمة المستخدمين', ['only' => ['index']]);
    // $this->middleware('permission:إضافة مستخدم', ['only' => ['create','store']]);
    // $this->middleware('permission:تعديل مستخدم', ['only' => ['edit','update']]);
    // $this->middleware('permission:حذف مستخدم', ['only' => ['destroy']]);

    // }
    
    
    public function index()
    {
        $users = User::get();
        $roles = Role::get();
        return view('users.user' , compact('users' , 'roles'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|same:confirm-password',
                'role_name' => 'required',
                'status' => 'required',
            ]);
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role_name = $request->role_name;
            $user->status = $request->status;
            $user->save();
            $user->assignRole($request->role_name);
            toastr()->success(__('users.add_user_success'));
            return redirect()->route('users.index');
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
        try{
            $user = User::findOrFail($id);
            $roles = Role::all();
            $userRole = $user->roles->pluck('name','name')->all();
            return view('users.edit' ,compact('user','roles','userRole'));
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, string $id)
    {
        try{
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.$id,
                'password' => 'required|same:confirm-password',
                'role_name' => 'required',
                'status' => 'required',
            ]);
            $users = User::findOrFail($id);
            $users->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'status'=> $request->status,
                'role_name'=>$request->role_name,
            ]);
            DB::table('model_has_roles')->where('model_id',$id)->delete();
            $users->assignRole($request->input('role_name'));
            toastr()->success(__('users.edit_user_success'));
            return redirect()->route('users.index');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        try{
            User::findOrFail($request->id)->delete();
            toastr()->success(__('users.delete_user_success'));
            return redirect()->route('users.index');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}
