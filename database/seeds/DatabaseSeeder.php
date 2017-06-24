<?php

use App\Modules\Event\Event;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class)->create([
            'name' => 'Amitav Roy',
            'email' => 'reachme@amitavroy.com',
            'password' => bcrypt('password'),
            'is_active' => 1,
        ]);

        factory(Event::class, 20)->create();
    }
}
