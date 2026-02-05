<?php

namespace App\Http\Controllers;

use App\Models\Cause;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function donate(Cause $cause)
    {
        // dd($cause->title_trans);
        return view('front.donate', [
            'case' => $cause
        ]);
    }
    public function donate_process(Request $request)
    {
        dd($request->all());
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $case = Cause::findOrFail($request->case_id);
        $amount = $request->amount;



        return redirect()->back()->with('success', "Thank you for your donation of $$amount to the cause: {$case->title_trans}.");
    }
}
