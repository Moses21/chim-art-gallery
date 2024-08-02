<?php

namespace Tests\Feature\Wishlist;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WishlistTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_user_can_visit_wishlist_route(): void
    {
        $response = $this->get('/wishlist');

        $response->assertStatus(200);
    }


    public function test_user_can_add_item_to_wishlist(): void
    {
        $response = $this->get('/wishlist');
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/wishlist');

        $response->assertStatus(200);
    }
}
