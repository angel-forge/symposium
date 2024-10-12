<?php

use App\Models\Talk;
use App\Models\User;

test('it lists talks on the  talks index page', function () {
    $user = User::factory()
        ->has(Talk::factory()->count(3))
        ->create();

    $otherTalk = Talk::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get(route('talks.index'))
        ->assertSee($user->talks->first()->title)
        ->assertDontSee($otherTalk->title);

    $response->assertOk();
});

test('it shows basic talk details on the talk show page', function () {
    $talk = Talk::factory()->create();

    $response = $this
        ->actingAs($talk->author)
        ->get(route('talks.show', ['talk' => $talk]))
        ->assertSee($talk->title);

    $response->assertOk();
});

test('users cant see other users talks', function () {
    $talk = Talk::factory()->create();
    $otherUser = User::factory()->create();

    $response = $this
        ->actingAs($otherUser)
        ->get(route('talks.show', ['talk' => $talk]))
        ->assertStatus(403);
});
