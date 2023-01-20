<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = [
            [
                'name' => 'Business Plan', 
                'slug' => 'business-plan', 
                'stripe_id' => 'price_1MPji0GHSUEs0BqqZkx83Q2T', 
                'price' => 20.00, 
                'description' => 'Business Plan'
            ],
            [
                'name' => 'Premium Plan', 
                'slug' => 'premium', 
                'stripe_id' => 'price_1MPjeUGHSUEs0BqqbekZfBBl', 
                'price' => 30.00, 
                'description' => 'Premium'
            ]
        ];
   
        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
    }

