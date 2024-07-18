<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::where('id','<>',1)->get();
        return view('admin.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $trans_message = __('validation.created');
        $request->validate([
            'name' =>['required']
        ]);
        $role = new Role();
        $role->name = $request->name;
        $role->save();
        toastr()->success($trans_message,'success');
        return redirect()->route('admin.role.index');
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
        $user = User::findOrFail($id);
        $roles = Role::where('id','<>',1)->get();
        return view('admin.role.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $trans_message = __('validation.updated');
        $request->validate([
            'name' =>['required'],
        ]);
        $role =  Role::findOrFail($id);
        $role->name = $request->name;
        $role->save();
        toastr()->success($trans_message,'success');
        return redirect()->route('admin.role.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return response(['status'=>'success','message'=>'Xoá Thành Công']);
    }
}
