<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $success_message = __('validation.created');
        $request->validate([
            'icon' => ['required','not_in:empty'],
            'name' => ['required','max:100','unique:categories,name'],
            'status' => ['required']
        ]);
        $category = new Category();
        $category->icon = $request->icon;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;
        $category->save();
        toastr($success_message,"success");
        return redirect()->route('admin.category.index');
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
        $category = Category::findOrFail($id);
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $success_message = __('validation.updated');
        $request->validate([
            'icon' => ['required','not_in:empty'],
            'name' => ['required','max:100','unique:categories,name,'.$id],
            'status' => ['required']
        ]);
        $category = Category::findOrFail($id);
        $category->icon = $request->icon;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;
        $category->save();
        toastr($success_message,"success");
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response(["status"=>"success","message"=>"Xoá Thành Công"]);
    }
    public function changeStatus(Request $request){
        $category = Category::findOrFail($request->id);
        $category->status = $request->isChecked == "true" ? 1:0;
        $category->save();
        return;
    }
}
