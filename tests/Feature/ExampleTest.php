<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $purch = DB::table('purchases')
        ->select('products.name AS name', 'total_purchased_item AS quantity')
        ->where('users.id', 'Halberg Ng')
        ->join('users', 'users.id', '=', 'purchases.user_id')
        ->join('products', 'products.id', '=', 'purchases.purchased_item_id')->get();

        self::assertCount(0, $purch);
    }
}
