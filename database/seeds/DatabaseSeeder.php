<?php

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
        $faker = Faker\Factory::create('zh_TW');
        $user = App\User::find(1);
        for ($i = 0; $i < 10; ++$i) {
            $user->publish(new App\Post([
                'title' => $faker->realText('15'),
                'body' => $faker->realText('200'),
            ]));
        }
    }
}
