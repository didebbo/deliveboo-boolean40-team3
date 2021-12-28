<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Dish;

class DishTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $dishes = [
            [
                'user_id' => $users[0]->id,
                'name' => "Disco Piatto 1",
                'price' => 12,
                'visible' => 1,
            ],
            [
                'user_id' => $users[0]->id,
                'name' => "Disco Piatto 2",
                'price' => 10,
                'visible' => 1,
            ],
            [
                'user_id' => $users[0]->id,
                'name' => "Pizza Mista 1",
                'price' => 6,
                'visible' => 1,
            ],
            [
                'user_id ' => $users[0]->id,
                'name' => "Pizza Mista 2",
                'price' => 4,
                'visible' => 1,
            ],
        ];
        foreach ($dishes as $dish) {
            User::create($dish);
        }
    }
}
