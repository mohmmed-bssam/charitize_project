<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function donors()
    {
        $donors = User::with('donations')->where('type', 'donor')->latest()
            ->paginate(env('PAGE_SIZE'));
        return view('dashboard.donors', compact('donors'));
    }
    public function donations()
    {
        $donations = Payment::with(['donor', 'case'])
            ->latest()
            ->paginate(env('PAGE_SIZE'));
        return view('dashboard.donations',compact('donations'));
    }
}