<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Traits\ImageUploadTraits;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    use ImageUploadTraits;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $success_message = __('validation.created');
        $request->validate(
            [
                'logo' =>['image','required','max:2048'],
                'name' =>['required','max:100'],
                'is_featured'=>['required'],
                'status'=>['required'],
            ]
            );
        $logoPath = $this->uploadImage($request,'logo','uploads');
        $brand = new Brand();

        $brand->logo =$logoPath;
        $brand->name = $request->name;
        $brand->is_featured = $request->is_featured;
        $brand->status = $request->status;
        $brand->save();
        toastr($success_message);
        return redirect()->route('admin.brand.index');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
