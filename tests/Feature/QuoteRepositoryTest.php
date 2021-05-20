<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QuoteRepositoryTest extends TestCase
{
    public function test_auth_user_can_create_quote()
    {
        $user = $this->fakerUser();
        $this->authentificateAs($user);

       $quote =  $this->post('api/restify/quotes',[
            'quote' => 'Some quote will be here'
        ])->assertCreated()->json('data');

        $this->assertDatabaseHas( 'quotes', [
            'id' => $quote['id'],
            'quote' => 'Some quote will be here',
        ]);
    }

    public function test_auth_user_can_create_quote_after_delete()
    {
        $user = $this->fakerUser();
        $this->authentificateAs($user);

        $quote =  $this->post('api/restify/quotes',[
            'quote' => 'Some quote will be here'
        ])->assertCreated()->json('data');

        $this->assertDatabaseHas( 'quotes', [
            'id' => $quote['id'],
            'quote' => 'Some quote will be here',
        ]);

        $this->delete("api/restify/quotes/{$quote['id']}");

        $this->assertDatabaseMissing( 'quotes', [
            'id' => $quote['id'],
            'quote' => 'Some quote will be here',
        ]);
    }
    public function test_auth_user_can_update_quote()
    {
        $user = $this->fakerUser();
        $this->authentificateAs($user);

        $quote =  $this->post('api/restify/quotes',[
            'quote' => 'Some quote will be here'
        ])->assertCreated()->json('data');

        $this->assertDatabaseHas( 'quotes', [
            'id' => $quote['id'],
            'quote' => 'Some quote will be here',
        ]);

        $this->patch("api/restify/quotes/{$quote['id']}", [
            'quote' => 'Updated quote'
        ]);

        $this->assertDatabaseHas( 'quotes', [
            'id' => $quote['id'],
            'quote' => 'Updated quote'
        ]);
    }
}
