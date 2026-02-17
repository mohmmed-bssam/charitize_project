<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Statistic;
use Illuminate\Http\Request;

use function Flasher\Prime\flash;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statistics = Statistic::latest()->paginate(env('PAGE_SIZE'));
        return view('dashboard.statistics.index', compact('statistics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.statistics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title_en' => 'required',
            'title_ar' => 'required',
            'number' => 'required',
            'icon' => 'required',

        ]);
        Statistic::create([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ],

            'number' => $request->number,
            'icon' => $request->icon,
        ]);
        flash()->success('Statistic created successfully.');
        return redirect()->route('dashboard.statistics.index');
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
    public function edit(Statistic $statistic)
    {
        return view('dashboard.statistics.edit', compact('statistic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Statistic $statistic)
    {
        $request->validate([
            'title_en' => 'required',
            'title_ar' => 'required',
            'number' => 'required',
            'icon' => 'required',

        ]);
        $statistic->update([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ],
            'number' => $request->number,
            'icon' => $request->icon,
        ]);
        flash()->info('Statistic updated successfully.');
        return redirect()->route('dashboard.statistics.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Statistic $statistic)
    {
        $statistic->delete();
        flash()->warning('Statistic deleted successfully.');
        return redirect()->route('dashboard.statistics.index');
    }
}
