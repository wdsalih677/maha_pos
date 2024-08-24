<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\Categories\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();
        return view('categories.category',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'name_ar' => 'required|unique:categories,name,',
                'name_en' => 'required|unique:categories,name,',
            ]);
            $category = new Category();
            $category->name = ['en' => $request->name_en , 'ar' => $request->name_ar];
            $category->save();
            toastr()->success(__('category.add_category_success'));
            return redirect()->route('categories.index');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $request->validate([
                'name_ar' => 'required|unique:categories,name,'.$id,
                'name_en' => 'required|unique:categories,name,'.$id,
            ]);

            $category = Category::findOrFail($id);
            $category->update([
                'name' => ['en' => $request->name_en , 'ar' => $request->name_ar],
            ]);
            toastr()->success(__('category.edit_category_success'));
            return redirect()->route('categories.index');
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
            Category::findOrFail($id)->delete();
            toastr()->success(__('category.delete_category_success'));
            return redirect()->route("categories.index");
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
