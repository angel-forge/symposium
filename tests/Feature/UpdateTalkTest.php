<?php

use App\Enums\TalkType;
use App\Models\Talk;
use App\Models\User;

test('user can update a talk', function () {
    $talk = Talk::factory()->create(['title' => 'Wow']);

    $response = $this->actingAs($talk->author)
        ->from(route('talks.edit', ['talk' => $talk]))
        ->patch(route('talks.update', ['talk' => $talk]), [
            'title' => 'Title is changed',
            'type' => TalkType::STANDARD->value,
            'length' => 30,
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect(route('talks.show', ['talk' => $talk]));

    $this->assertEquals($talk->fresh()->title, 'Title is changed');

    $this->assertDatabaseHas('talks', [
        'title' => 'Title is changed',
        'type' => TalkType::STANDARD->value,
        'length' => 30,
    ]);
});

test('a user cannot update other users talk', function () {
    $title = 'Original Title';

    $talk = Talk::factory()->create(['title' => $title]);
    $otherUser = User::factory()->create();

    $response = $this
        ->actingAs($otherUser)
        ->from(route('talks.edit', ['talk' => $talk]))
        ->patch(route('talks.update', ['talk' => $talk]), [
            'title' => 'Title is changed',
            'type' => TalkType::STANDARD->value,
            'length' => 30,
        ]);

    $response->assertForbidden();

    $this->assertEquals($talk->fresh()->title, $title);
});
