<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\Customer;
use App\Models\Website;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'website_id' => 'required|exists:websites,id',
        ]);

        $subscription = Subscription::firstOrCreate([
            'customer_id' => $request->customer_id,
            'website_id' => $request->website_id,
        ]);

        return response()->json($subscription, 201);
    }
}
