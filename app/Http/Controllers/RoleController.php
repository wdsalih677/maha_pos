<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    // function __construct()
    // {

    // $this->middleware('permission:صلاحيات المستخدمين', ['only' => ['index']]);
    // $this->middleware('permission:إضافة صلاحيه', ['only' => ['create','store']]);
    // $this->middleware('permission:تعديل صلاحيه', ['only' => ['edit','update']]);
    // $this->middleware('permission:حذف صلاحيه', ['only' => ['destroy']]);

    // }

    public function index()
    {
        $roles = Role::get();
        $permissions = Permission::get();
        return view('permissions.permission', compact('roles','permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::get();
        return view('permissions.add',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required|unique:roles,name',
            ]);
            $roles = Role::create(['name'=>$request->name]);
            $roles->syncPermissions($request->get('permission'));
            toastr()->success(__('permission.permission_add_successfuly'));
            return redirect()->route('role.index');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try{
            $role = Role::findOrFail($id);
            $permissions = Permission::get();
            $rolePermissions = DB::table("role_has_permissions")
            ->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id')
            ->all();
            return view('permissions.edit', compact('role', 'permissions', 'rolePermissions'));
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // return $request;
        try{
            $request->validate([
                'name' => 'required|unique:roles,name,'.$id,
            ]);
            $role = Role::find($id);
            $role->name = $request->input('name');
            $role->save();
            $role->syncPermissions($request->input('permission'));
            toastr()->success(__('permission.permission_edit_successfuly'));
            return redirect()->route('role.index');
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
            DB::table("roles")->where('id',$id)->delete();
            toastr()->success(__('permission.permission_delete_successfuly'));
            return redirect()->route('role.index');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
