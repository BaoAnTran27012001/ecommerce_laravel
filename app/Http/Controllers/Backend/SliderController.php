<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SliderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Traits\ImageUploadTraits;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    use ImageUploadTraits;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $trans_message = __('validation.created');
        $request->validate([
            'banner' =>['required','image','max:2048'],
            'type' => ['string','max:200'],
            'title' => ['required','max:200'],
            'preferential' => ['max:200'],
            'btn_url' =>['url'],
            'order'=>['required','integer'],
            'status'=>['required']
        ]);
        $slider = new Slider();
        // Handle File Upload
        $imagePath = $this->uploadImage($request,'banner','uploads');
        $slider->banner = $imagePath;
        $slider->type = $request->type;
        $slider->title = $request->title;
        $slider->preferential= $request->preferential;
        $slider->btn_url= $request->btn_url;
        $slider->order= $request->order;
        $slider->btn_url= $request->btn_url;
        $slider->status= $request->status;
        $slider->save();
        toastr()->success($trans_message,'success');
        return redirect()->back();
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
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $trans_message = __('validation.updated');
        $request->validate([
            'banner' =>['nullable','image','max:2048'],
            'type' => ['string','max:200'],
            'title' => ['required','max:200'],
            'preferential' => ['max:200'],
            'btn_url' =>['url'],
            'order'=>['required','integer'],
            'status'=>['required']
        ]);
        $slider =  Slider::findOrFail($id);
        // Handle File Upload
        if($request->banner != null){
            $imagePath = $this->updateImage($request,'banner','uploads',$slider->banner);
            $slider->banner = $imagePath;
        }
        $slider->type = $request->type;
        $slider->title = $request->title;
        $slider->preferential= $request->preferential;
        $slider->btn_url= $request->btn_url;
        $slider->order= $request->order;
        $slider->btn_url= $request->btn_url;
        $slider->status= $request->status;
        $slider->save();
        toastr()->success($trans_message,'success');
        return redirect()->route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
