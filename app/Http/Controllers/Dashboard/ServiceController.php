<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

use function Flasher\Prime\flash;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::latest()->paginate(env('PAGE_SIZE'));
        return view('dashboard.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required',
            'title_ar' => 'required',
            'content_en' => 'required',
            'content_ar' => 'required',
            'icon' => 'required'
        ]);
        $service=Service::create([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar
            ],
            'content' => [
                'en' => $request->input('content_en'),
                'ar' => $request->input('content_ar')
            ],
            'icon' => $request->icon
        ]);
        flash()->success('Service created successfully');
        return redirect()->route('dashboard.services.index');
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
    public function edit(Service $service)
    {
        return view('dashboard.services.edit', compact('service'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title_en' => 'required',
            'title_ar' => 'required',
            'content_en' => 'required',
            'content_ar' => 'required',
            'icon' => 'required'
        ]);
        $service->update([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar
            ],
            'content' => [
                'en' => $request->input('content_en'),
                'ar' => $request->input('content_ar')
            ],
            'icon' => $request->icon
        ]);
        flash()->info('Service updated successfully');
        return redirect()->route('dashboard.services.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        flash()->warning('Service deleted successfully');
        return redirect()->route('dashboard.services.index');
    }
}