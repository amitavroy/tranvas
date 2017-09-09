<?php

namespace Tests\Feature\User;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use DatabaseMigrations;

    private $user;

    protected function setUp()
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
    }

    /** @test */
    public function guest_cannot_see_login_page()
    {
        $this->get(route('profile'))
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function a_user_can_see_his_profile_details()
    {
        $this->actingAs($this->user)
            ->get(route('profile'))
            ->assertSee($this->user->name);
    }

    /** @test */
    public function name_field_is_required_on_profile_edit()
    {
        $this->actingAs($this->user)
            ->post(route('profile-save'), [])
            ->assertSessionHasErrors([
                'name'
            ]);
    }

    /** @test */
    public function a_user_cannot_edit_email_through_form()
    {
        $this->actingAs($this->user)
            ->post(route('profile-save'), ['email' => 'asdf@gmail.com']);

        $this->actingAs($this->user)
            ->get(route('profile'))
            ->assertSee($this->user->email)
            ->assertDontSee('asdf@gmail.com');
    }
}
