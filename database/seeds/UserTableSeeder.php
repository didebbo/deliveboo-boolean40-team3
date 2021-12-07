<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'email' => 'ristodisco@mail.com',
                'password' => 'admin1234',
                'name' => 'Risto Disco',
                'city' => 'milano',
                'address' => 'Piazza Disco 12, 1234',
                'vat' => '12345678901',
                'adv' => 'Risco Disco, mentre mangi... balli'
            ],
            [
                'email' => 'pizzamista@mail.com',
                'password' => 'admin1234',
                'name' => 'Pizza Mista',
                'city' => 'milano',
                'address' => 'Piazza Mista 13, 4321',
                'vat' => '10987654321',
                'adv' => 'Pizza Mista, unico gusto!'
            ]
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
