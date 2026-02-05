<?php

namespace App\Http\Controllers;

use App\Models\Cause;
use App\Models\Slider;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $sliders = Slider::with('image')->latest()->take(3)->get();
        $cases = Cause::with(['image','category','donations'])
            ->where('status', 'open')
            ->latest()->take(3)
            ->get();
        return view('front.index', compact('sliders', 'cases'));
    }
    public function about()
    {
        return view('front.about');
    }


    public function services()
    {
        return view('front.service');
    }


    public function donation()
    {
        return view('front.donation');
    }

    public function events()
    {
        return view('front.event');
    }

    public function features()
    {
        return view('front.feature');
    }

    public function teams()
    {
        return view('front.team');
    }

    public function testimonials()
    {
        return view('front.testimonial');
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function contact_data(Request $request)
    {
        dd($request->all());
    }
}
