<?php

namespace Tests\Feature;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use App\Todo;
use App\User;

class TodoTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function can_get_all_the_todos()
    {
        $user = factory('App\User')->create();
        $todos = factory('App\Todo', 3)->make()->each(function($todo) use($user){
          $todo->user_id = $user->id;
          $todo->save();
        });

        $response = $this->actingAs($user)->json('GET','/todos');

        // echo $response->getContent();

        $response->assertStatus(200)
             ->assertJson($todos->toArray());
    }


}
