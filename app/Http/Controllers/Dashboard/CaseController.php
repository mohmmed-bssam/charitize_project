<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Cause;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cases = Cause::with('image')->latest()->paginate(env('PAGE_SIZE'));
        return view('dashboard.cases.index', compact('cases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        $case = new Cause();
        $categories = Category::select('id', 'title')->get();
        return view('dashboard.cases.create', compact('case', 'categories'));
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
            'goal' => 'required',
            'status' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required'
        ]);
        $case = Cause::create([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar
            ],
            'content' => [
                'en' => $request->input('content_en'),
                'ar' => $request->input('content_ar')
            ],
            'goal' => $request->goal,
            'category_id' => $request->category_id,

        ]);
        $path = $request->file('image')
            ->store('uploads/cases', 'custom');
        $case->image()->create([
            'path' => $path,

        ]);
        if ($request->has('gallery')) {
            foreach ($request->gallery as $img) {
                $path = $img
                    ->store('uploads/cases', 'custom');
                $case->gallery()->create([
                    'path' => $path,
                    'type' => 'gallery',

                ]);
            }
        }
        flash()->success('Case added successfully');
        return redirect()->route('dashboard.cases.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cause $case)
    {
        $categories = Category::select('id', 'title')->get();

        return view('dashboard.cases.edit', compact('case', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cause $case)
    {
        $request->validate([
            'title_en' => 'required',
            'title_ar' => 'required',
            'content_en' => 'required',
            'content_ar' => 'required',
            'goal' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);
        $case->update([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar
            ],
            'content' => [
                'en' => $request->input('content_en'),
                'ar' => $request->input('content_ar')
            ],
            'goal' => $request->goal,
            'status' => $request->status,
            'category_id' => $request->category_id,


        ]);
        if ($request->hasFile('image')) {
            File::delete(public_path($case->image->path));
            $path = $request->file('image')
                ->store('uploads/cases', 'custom');
            $case->image()->update([
                'path' => $path,

            ]);
        }
        if ($request->has('gallery')) {
            foreach ($request->gallery as $img) {
                $path = $img
                    ->store('uploads/cases', 'custom');
                $case->gallery()->create([
                    'path' => $path,
                    'type' => 'gallery',

                ]);
            }
        }
        flash()->info('Case updated successfully');
        return redirect()->route('dashboard.cases.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cause $case)
    {
        File::delete(public_path($case->image->path));
        $case->image()->delete();
        $case->delete();

        flash()->warning('Case deleted successfully');
        return redirect()->route('dashboard.cases.index');
    }
    function delete_image(Cause $cause, Image $image)
    {
        File::delete(public_path($image->path));
        $image->delete();

        return[
            'status' => 'true',
            'message' => 'Image deleted successfully'

        ];
    }
}
