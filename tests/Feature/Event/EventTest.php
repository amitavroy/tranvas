<?php

namespace Tests\Feature\Event;

use App\Modules\Event\Event;
use App\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class EventTest extends TestCase
{
    use DatabaseMigrations;

    private $user;

    protected function setUp()
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
    }

    /** @test */
    public function a_guest_should_not_see_events_section()
    {
        $this->get(route('events'))
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function a_user_can_see_list_of_events()
    {
        $event = factory(Event::class)->create();

        $this->actingAs($this->user)
            ->get(route('events'))
            ->assertStatus(200)
            ->assertSeeText($event->title)
            ->assertSeeText(limit_words($event->description, 50));
    }

    /** @test */
    public function a_user_can_view_event_details()
    {
        $event = factory(Event::class)->create();

        $this->actingAs($this->user)
            ->get(route('event-view', $event->slug))
            ->assertStatus(200)
            ->assertSeeText($event->title)
            ->assertSeeText($event->creator->name);
    }

    /** @test */
    public function a_user_can_create_an_event_and_view_it()
    {
        $faker = Factory::create();
        $title = $faker->sentence(3);

        $postData = [
            'title' => $title,
            'description' => $faker->paragraph(3),
            'address' => $faker->address,
            'start_date' => $faker->dateTime,
            'end_date' => $faker->dateTime,
            'lat' => $faker->latitude,
            'lng' => $faker->longitude,
        ];

        $this->actingAs($this->user)
            ->post(route('event-save'), $postData)
            ->assertRedirect(route('events'));

        $this->get(route('events'))
            ->assertSee($title);
    }

    /** @test */
    public function confirm_fields_are_required_to_create_event()
    {
        $this->actingAs($this->user)
            ->post(route('event-save'), [])
            ->assertSessionHasErrors([
                'title', 'description', 'address', 'start_date', 'end_date', 'lat', 'lng'
            ]);
    }
}
