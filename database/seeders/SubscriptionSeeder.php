<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subscription;
use App\Models\Customer;
use App\Models\Website;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = Customer::all();
        $websites = Website::all();

        foreach ($customers as $customer) {
            foreach ($websites as $website) {
                Subscription::create(['customer_id' => $customer->id, 'website_id' => $website->id]);
            }
        }
    }
}
