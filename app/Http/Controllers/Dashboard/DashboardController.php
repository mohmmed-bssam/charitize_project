<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Massage;
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
        return view('dashboard.messages',compact('messages'));
    }
    public function subscriptions()
    {
                $subscriptions = Subscription::latest()->paginate(env('PAGE_SIZE'));

        return view('dashboard.subscriptions',compact('subscriptions'));
    }
    public function donner() {}
}
