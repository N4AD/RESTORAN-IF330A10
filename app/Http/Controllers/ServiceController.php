<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Service List";
        $services = Service::all();

        return view('service.index', compact('page_title', 'services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = "Service Create";

        return view('service.create', compact('page_title'));
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
            'title' => 'required',
            'thumbnail' => 'required|mimes:jpg,jpeg,png',
            'description' => 'required'
        ]);

        $image = $request->file('thumbnail');
        $path = 'uploads/service/';

        Service::create([
            'title' => $request->title,
            'thumbnail' => uploadImage($image, $path),
            'description' => $request->description
        ]);

        return redirect()->route('service.index')->with('toast_success', 'Service Added Successfully.');
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
    public function edit(Service $service)
    {
        $page_title = "Service Edit";

        return view('service.edit', compact('page_title', 'service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required',
            'thumbnail' => 'mimes:jpg,jpeg,png',
            'description' => 'required'
        ]);

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $path = 'uploads/service/';
            $old_path = public_path($service->thumbnail);
        }

        $service->update([
            'title' => $request->title,
            'thumbnail' => $request->hasFile('thumbnail') ? uploadImage($image, $path, $old_path):$service->thumbnail,
            'description' => $request->description
        ]);

        return redirect()->route('service.index')->with('toast_success', 'Service Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        if (file_exists(public_path($service->thumbnail))) {
            unlink(public_path($service->thumbnail));
        }
        $service->delete();
        return back()->with('toast_success', 'Service Deleted Successfully.');
    }
}
