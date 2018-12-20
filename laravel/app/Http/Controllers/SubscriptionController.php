<?php

namespace App\Http\Controllers;

use App\Subscription;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('sub');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function monthly(Request $request)
    {
        //
        $user = Auth::user();
        if($user->subscribed('prod_EBezTZOsApxwwb') || $user->subscribed('prod_EBaPJtFVdyzYel')){
            session()->put('error', 'You have an active subscription already!');
            return back();
        }
        if($user->newSubscription('prod_EBezTZOsApxwwb', 'plan_EBezwFz2XzGXAV')->create($request->stripeToken)){
            session()->put('success', 'Thank you! You have subscribed!');
            return route('profile');
        }
        //dd($request, $user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function yearly(Request $request)
    {
        //
        $endingDate = Carbon::now("+1 year");
        $user = Auth::user();
        if($user->subscribed('prod_EBezTZOsApxwwb') || $user->subscribed('prod_EBaPJtFVdyzYel')){
            session()->put('error', 'You have an active subscription already!');
            return back();
        }
        if($user->newSubscription('prod_EBaPJtFVdyzYel', 'plan_EBaQM46SOZCCLM')->create($request->stripeToken)){
            session()->put('success', 'Thank you! You have subscribed!');
            return route('profile');
        }

        dd($endingDate);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function cancelSubscription()
    {
        //
        $sub = Auth::user()->subed()->get()->first();
        if(Auth::user()->subscription($sub->stripe_plan)->cancel()){
            session()->put('impinfo', 'We are sorry to see you go! please consider letting me know in Discord why you have decided to cancel your subscription. Thanks!');
            return route('profile');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function getInvoice(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        //
    }
}
