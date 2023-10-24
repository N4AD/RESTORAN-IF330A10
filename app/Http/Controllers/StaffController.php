<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Staff List";
        $staffs = Staff::all();

        return view('staff.index', compact('page_title', 'staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = "Staff Create";

        return view('staff.create', compact('page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'thumbnail' => 'required|mimes:jpg,jpeg,png',
            'designation' => 'required'
        ]);

        $image = $request->file('thumbnail');
        $path = 'uploads/staffs/';

        Staff::create([
            'name' => $request->name,
            'thumbnail' => uploadImage($image, $path),
            'designation' => $request->designation
        ]);

        return redirect()->route('staff.index')->with('toast_success', 'Staff Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        $page_title = "Staff Edit";

        return view('staff.edit', compact('page_title', 'staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        $request->validate([
            'name' => 'required',
            'thumbnail' => 'mimes:jpg,jpeg,png',
            'designation' => 'required'
        ]);

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $path = 'uploads/staffs/';
            $old_path = public_path($staff->thumbnail);
        }

        $staff->update([
            'name' => $request->name,
            'thumbnail' => $request->hasFile('thumbnail') ? uploadImage($image, $path, $old_path):$staff->thumbnail,
            'designation' => $request->designation
        ]);

        return redirect()->route('staff.index')->with('toast_success', 'Staff Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        if (file_exists(public_path($staff->thumbnail))) {
            unlink(public_path($staff->thumbnail));
        }
        $staff->delete();
        return back()->with('toast_success', 'Staff Deleted Successfully.');
    }
}
