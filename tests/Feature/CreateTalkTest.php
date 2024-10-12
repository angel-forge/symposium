<?php

use App\Enums\TalkType;
use App\Models\User;

test('user can create a talk', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)
        ->from(route('talks.create'))
        ->post(route('talks.store'), [
            'title' => 'My first talk',
            'type' => TalkType::STANDARD->value,
            'length' => 30,
        ]);

    $response->assertRedirect(route('talks.index'));

    $this->assertDatabaseHas('talks', [
        'title' => 'My first talk',
    ]);
});
