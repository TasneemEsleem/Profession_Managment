<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::get();

        return Response()->view('cms.subscription.plans', ['plans' => $plans]);
    }
    public function show(Plan $plan)
    {
        $intent = auth()->user()->createSetupIntent();
        return Response()->view('cms.subscription.subscription', [
            'plan' => $plan, 'intent' => $intent
        ]);
    }

    public function subscription(Request $request)
    {
        $plan = Plan::find($request->plan);

        $subscription = $request->user()->newSubscription($request->plan, $plan->stripe_id)
            ->create($request->token);

        return Response()->view('cms.subscription.subscription_success');
    }
}
