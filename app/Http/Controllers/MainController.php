<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use App\Models\Cause;
use App\Models\Event;
use App\Models\Massage;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Statistic;
use App\Models\Subscription;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function index()
    {
        $sliders = Slider::with('image')->latest()->take(3)->get();
        $cases = Cause::with(['image', 'category', 'donations'])
            ->where('status', 'open')
            ->latest()->take(3)
            ->get();
        $services = Service::latest()->take(6)->get();
        $events = Event::with('image')->latest()->take(6)->get();
        $statistics = Statistic::latest()->take(4)->get();
        $testimonials = Testimonial::with('image')->latest()->take(3)->get();
        $teams = Team::with('image')->latest()->take(3)->get();

        $data = [
            'sliders' => $sliders,
            'cases' => $cases,
            'services' => $services,
            'events' => $events,
            'statistics' => $statistics,
            'testimonials' => $testimonials,
            'teams' => $teams
        ];
        return view('front.index', $data);
    }
    public function about()
    {
        $statistics = Statistic::latest()->take(4)->get();
        $teams = Team::with('image')->latest()->take(3)->get();

        return view('front.about',compact('statistics','teams'));
    }


    public function services()
    {
        $services = Service::latest()->take(6)->get();
        $testimonials = Testimonial::with('image')->latest()->take(3)->get();

        return view('front.service', compact('services','testimonials'));
    }


    public function donation()
    {
         $cases = Cause::with(['image', 'category', 'donations'])
            ->where('status', 'open')
            ->latest()->take(3)
            ->get();
        return view('front.donation',compact('cases'));
    }

    public function events()
    {
        $events = Event::with('image')->latest()->take(6)->get();

        return view('front.event', compact('events'));
    }

    public function features()
    {
        $statistics = Statistic::latest()->take(4)->get();

        return view('front.feature', compact('statistics'));
    }

    public function teams()
    {
        $teams = Team::with('image')->latest()->take(6)->get();

        return view('front.team', compact('teams'));
    }

    public function testimonials()
    {
        $testimonials = Testimonial::with('image')->latest()->take(3)->get();

        return view('front.testimonial', compact('testimonials'));
    }
    public function subscriptions(Request $request)
    {
        // dd($request->all);
        $request->validate([
            'email' => 'required|email',
        ]);
        Subscription::create([
            'email' => $request->email,
        ]);

        return redirect()->back();
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function contact_data(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',

        ]);

        $data = $request->all();
        Massage::create($data);
        Mail::to('mohmmedbssam97@gmail.com')->send(new ContactUs($data));
        // dd('Email sent successfully');
        return redirect()->route('front.index');
    }
}