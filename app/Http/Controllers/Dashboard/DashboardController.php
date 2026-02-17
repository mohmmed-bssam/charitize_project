<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Massage;
use App\Models\Setting;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;
use Mockery\Matcher\Not;

use function Flasher\Prime\flash;

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
    public function delete_messages($id){
        $message = Massage::findOrFail($id);
        $message->delete();

        flash()->warning('the Massages Deleted!');
        return redirect()->back();

    }
    public function notifications()
    {
        // $notifications = auth()->user()->unreadNotifications()->latest()->paginate(env('PAGE_SIZE'));
        $notifications = Auth::user()->notifications;

        return view('dashboard.notifications', compact('notifications'));
    }
        public function markAsRead(DatabaseNotification $notification)
        {
           $notification->update(['read_at' => now()]);
            return redirect()->back();
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
        if ($request->hasFile('about_logo')) {
           $data['about_logo'] =  $request->file('about_logo')
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
