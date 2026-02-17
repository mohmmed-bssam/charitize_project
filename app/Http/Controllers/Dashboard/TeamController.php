<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::with('image')->latest()->get();
        return view('dashboard.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required',
            'title_ar' => 'required',
            'image' => 'required|image',
        ]);
        $team = Team::create([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ],
            'position' => $request->position,
            'facebook' => $request->facebook,
            'linkedin' => $request->linkedin,
            'x' => $request->x,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,

        ]);
        $path = $request->file('image')->store('uploads/teams', 'custom');
        $team->image()->create([
            'path' => $path,
        ]);
        flash()->success('team created successfully');
        return redirect()->route('dashboard.teams.index');
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
    public function edit(team $team)
    {
        return view('dashboard.teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, team $team)
    {
            $request->validate([
            'title_en' => 'required',
            'title_ar' => 'required',
            
        ]);




        $team->update([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ],
            'position' => $request->position,
            'facebook' => $request->facebook,
            'linkedin' => $request->linkedin,
            'x' => $request->x,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,

        ]);
        if ($request->hasFile('image')) {
            File::delete(public_path($team->image->path));
            $path = $request->file('image')->store('uploads/teams', 'custom');
            $team->image()->update([
                'path' => $path,
            ]);
        }
        flash()->info('team updated successfully');
        return redirect()->route('dashboard.teams.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(team $team)
    {
        File::delete(public_path($team->image->path));
        $team->image()->delete();
        $team->delete();
        flash()->warning('team deleted successfully');
        return redirect()->route('dashboard.teams.index');
    }
}
