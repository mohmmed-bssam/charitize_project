<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Massage;
use App\Models\Setting;
use App\Models\Subscription;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
    public function messages()
    {
        $messages = Massage::latest()->paginate(env('PAGE_SIZE'));
        return view('dashboard.messages', compact('messages'));
    }
    public function subscriptions()
    {
        $subscriptions = Subscription::latest()->paginate(env('PAGE_SIZE'));

        return view('dashboard.subscriptions', compact('subscriptions'));
    }
    public function settings()
    {
        // $settings=Setting::all()->pluck('value', 'key')->toArray();
        // dd($settings);
        return view('dashboard.settings');
    }
    public function settings_update(Request $request)
    {
        $data = $request->except(['_token', '_method','site_logo']);
        if ($request->hasFile('site_logo')) {
           $data['site_logo'] =  $request->file('site_logo')
           ->store('uploads/settings', 'custom');
        }
        foreach ($data as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
        flash()->success('Settings updated successfully');

        return redirect()->back();

        // return view('dashboard.settings');
    }
}
